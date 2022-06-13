<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Interfaces;

use UnitEnum;

interface SqlCommandInterface
{
    /**
     * @param SqlConnectionFactoryInterface $connectionFactory
     * @param SqlQueryFactoryInterface|SqlDataObjectInterface $factory
     * @param array $options
     */
    public function __construct(
        SqlConnectionFactoryInterface $connectionFactory,
        SqlQueryFactoryInterface|SqlDataObjectInterface $factory,
        array $options,
    );

    /**
     *
     */
    public function rollback(): void;

    /**
     *
     */
    public function commit(): void;

    /**
     * @return int|null
     */
    public function getInsertedId(
    ): ?int;

    /**
     * @param UnitEnum $databaseOperationType
     * @param SqlQueryFactoryInterface|SqlDataObjectInterface $queryFactory
     * @param int $retry
     * @return array|null
     */
    public function execute(
        UnitEnum $databaseOperationType,
        SqlQueryFactoryInterface|SqlDataObjectInterface $queryFactory,
        int $retry=0,
    ): ?array;

    /**
     * @param array $record
     */
    public function setOriginalValues(array &$record): void;

    /**
     * @param bool $on
     * @return void
     */
    public function runOptions(
        bool $on=true,
    ): void;
}