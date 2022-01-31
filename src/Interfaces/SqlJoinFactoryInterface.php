<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Interfaces;

use CarloNicora\Minimalism\Interfaces\Sql\Enums\SqlJoinType;

interface SqlJoinFactoryInterface
{
    /**
     * @param SqlTableInterface $joinedTable
     * @param SqlFieldInterface $primaryKey
     * @param SqlFieldInterface $foreignKey
     * @param SqlJoinType|null $joinType
     */
    public function __construct(
        SqlTableInterface $joinedTable,
        SqlFieldInterface $primaryKey,
        SqlFieldInterface $foreignKey,
        ?SqlJoinType $joinType,
    );

    /**
     * @return string
     */
    public function getSql(
    ): string;
}