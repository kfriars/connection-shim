<?php

namespace Kfriars\ConnectionShim\Connection;

use Illuminate\Database\MySqlConnection;
use Kfriars\ConnectionShim\Concerns\HasConfigurableSchema;
use Kfriars\ConnectionShim\Contracts\ConfigurableSchema;

class MySqlConnectionShim extends MySqlConnection implements ConfigurableSchema
{
    use HasConfigurableSchema;
}
