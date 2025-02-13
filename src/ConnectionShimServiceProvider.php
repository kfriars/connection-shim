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
                $base = $factory->make($config, $name);

                if (!in_array($config['driver'], ['sqlite', 'mysql', 'mariadb', 'pgsql', 'sqlsrv'])) {
                    continue;
                }

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
