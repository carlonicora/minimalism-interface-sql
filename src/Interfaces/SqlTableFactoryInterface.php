<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Interfaces;

use CarloNicora\Minimalism\Exceptions\MinimalismException;

interface SqlTableFactoryInterface
{
    /**
     * @param array $connectionStrings
     * @return void
     */
    public static function initialise(
        array $connectionStrings,
    ): void;

    /**
     * @param string $databaseIdentifier
     * @return string
     */
    public static function getDatabaseName(
        string $databaseIdentifier,
    ): string;

    /**
     * @param string $tableClass
     * @param string|null $overrideDatabaseIdentifier
     * @return SqlTableInterface
     * @throws MinimalismException
     */
    public static function create(
        string $tableClass,
        ?string $overrideDatabaseIdentifier=null,
    ): SqlTableInterface;
}