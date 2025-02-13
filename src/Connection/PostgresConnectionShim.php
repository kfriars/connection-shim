<?php

namespace Kfriars\ConnectionShim\Connection;

use Illuminate\Database\PostgresConnection;
use Kfriars\ConnectionShim\Concerns\HasConfigurableSchema;
use Kfriars\ConnectionShim\Contracts\ConfigurableSchema;

class PostgresConnectionShim extends PostgresConnection implements ConfigurableSchema
{
    use HasConfigurableSchema;
}
