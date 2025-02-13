<?php

namespace Kfriars\ConnectionShim\Concerns;

use Illuminate\Database\Connection;
use Illuminate\Database\Schema\Builder as SchemaBuilder;

/**
 * @mixin Connection
 */
trait HasConfigurableSchema
{
    protected ?SchemaBuilder $schema = null;

    public function setSchemaBuilder(SchemaBuilder $schema): void
    {
        $this->schema = $schema;
    }

    public function getSchemaBuilder()
    {
        return $this->schema
            ?? parent::getSchemaBuilder();
    }
}
