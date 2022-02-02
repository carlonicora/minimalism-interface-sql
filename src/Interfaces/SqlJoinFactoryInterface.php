<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Interfaces;

use CarloNicora\Minimalism\Interfaces\Sql\Enums\SqlJoinType;
use UnitEnum;

interface SqlJoinFactoryInterface
{
    /**
     * @param UnitEnum $primaryKey
     * @param UnitEnum $foreignKey
     * @param SqlJoinType|null $joinType
     */
    public function __construct(
        UnitEnum $primaryKey,
        UnitEnum $foreignKey,
        ?SqlJoinType $joinType=null,
    );

    /**
     * @return string
     */
    public function getSql(
    ): string;
}