<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Interfaces;

interface SqlConnectionFactoryInterface
{
    /**
     * @param string $databaseConfigurations
     */
    public function __construct(
        string $databaseConfigurations,
    );

    /**
     *
     */
    public function __destruct();

    /**
     * @return array
     */
    public function getConfigurations(
    ): array;

    /**
     * @param SqlTableInterface $table
     * @return mixed
     */
    public function create(
        SqlTableInterface $table,
    ): mixed;

    /**
     *
     */
    public function resetDatabases(
    ) : void;
}