<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Interfaces;

use CarloNicora\Minimalism\Interfaces\Sql\Enums\SqlJoinType;

interface SqlJoinFactoryInterface
{
    /**
     * @param SqlFieldInterface $primaryKey
     * @param SqlFieldInterface $foreignKey
     * @param SqlJoinType|null $joinType
     */
    public function __construct(
        SqlFieldInterface $primaryKey,
        SqlFieldInterface $foreignKey,
        ?SqlJoinType $joinType=null,
    );

    /**
     * @return string
     */
    public function getSql(
    ): string;
}