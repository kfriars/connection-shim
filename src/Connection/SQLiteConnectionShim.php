<?php

namespace Kfriars\ConnectionShim\Connection;

use Illuminate\Database\SQLiteConnection;
use Kfriars\ConnectionShim\Concerns\HasConfigurableSchema;
use Kfriars\ConnectionShim\Contracts\ConfigurableSchema;

class SQLiteConnectionShim extends SQLiteConnection implements ConfigurableSchema
{
    use HasConfigurableSchema;
}
