<?php

namespace Kfriars\ConnectionShim\Connection;

use Illuminate\Database\Connection;
use Kfriars\ConnectionShim\Concerns\HasConfigurableSchema;
use Kfriars\ConnectionShim\Contracts\ConfigurableSchema;

class ConnectionShim extends Connection implements ConfigurableSchema
{
    use HasConfigurableSchema;
}
