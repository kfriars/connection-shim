<?php

namespace Kfriars\ConnectionShim\Connection;

use Illuminate\Database\SqlServerConnection;
use Kfriars\ConnectionShim\Concerns\HasConfigurableSchema;
use Kfriars\ConnectionShim\Contracts\ConfigurableSchema;

class SqlServerConnectionShim extends SqlServerConnection implements ConfigurableSchema
{
    use HasConfigurableSchema;
}
