<?php

namespace Kfriars\ConnectionShim;

use Illuminate\Database\Connectors\ConnectionFactory;
use Illuminate\Database\DatabaseManager;
use Illuminate\Support\ServiceProvider;
use Kfriars\ConnectionShim\Connection\MariaDbConnectionShim;
use Kfriars\ConnectionShim\Connection\MySqlConnectionShim;
use Kfriars\ConnectionShim\Connection\PostgresConnectionShim;
use Kfriars\ConnectionShim\Connection\SQLiteConnectionShim;
use Kfriars\ConnectionShim\Connection\SqlServerConnectionShim;

class ConnectionShimServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->booting(function () {
            /** @var DatabaseManager $db */
            $db = $this->app['db'];

            /** @var ConnectionFactory $factory */
            $factory = $this->app['db.factory'];

            foreach ($this->app['config']['database.connections'] as $name => $config) {
                // Don't attempt to make Testbench's sqlite connection before it had a chance
                // to configure itself. This issue is no longer present in current versions of
                // testbench.
                if ($config['driver'] === 'sqlite' && str_contains($config['database'], 'orchestra/testbench-core')) {
                    continue;
                }

                $base = $factory->make($config, $name);

                $shimmed = match ($config['driver']) {
                    'sqlite' => new SQLiteConnectionShim($base->getRawPdo(), $base->getDatabaseName(), $base->getTablePrefix(), $config),
                    'mysql' => new MySqlConnectionShim($base->getRawPdo(), $base->getDatabaseName(), $base->getTablePrefix(), $config),
                    'mariadb' => new MariaDbConnectionShim($base->getRawPdo(), $base->getDatabaseName(), $base->getTablePrefix(), $config),
                    'pgsql' => new PostgresConnectionShim($base->getRawPdo(), $base->getDatabaseName(), $base->getTablePrefix(), $config),
                    'sqlsrv' => new SqlServerConnectionShim($base->getRawPdo(), $base->getDatabaseName(), $base->getTablePrefix(), $config),
                };

                $db->extend($name, fn () => $shimmed);
            }
        });
    }
}
