<?php

namespace Kfriars\ConnectionShim\Contracts;

use Illuminate\Database\Schema\Builder as SchemaBuilder;

interface ConfigurableSchema
{
    /**
     * Set the SchemaBuilder instance on the connection
     */
    public function setSchemaBuilder(SchemaBuilder $schema): void;
}
