<?php

use Illuminate\Database\Schema\SQLiteBuilder;
use Illuminate\Support\Facades\DB;
use Kfriars\ConnectionShim\Connection\SQLiteConnectionShim;
use Kfriars\ConnectionShim\Tests\Helper\TestBuilder;

it('persists the schema builder on the connection', function () {
    $connection = DB::connection();

    expect($connection)->toBeInstanceOf(SQLiteConnectionShim::class);
    expect(DB::getSchemaBuilder())->toBeInstanceOf(SQLiteBuilder::class);

    $connection->setSchemaBuilder(new TestBuilder($connection));

    expect(DB::connection()->getSchemaBuilder())->toBeInstanceOf(TestBuilder::class);
    expect(DB::getSchemaBuilder())->toBeInstanceOf(TestBuilder::class);
});
