<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Factories;

use CarloNicora\Minimalism\Interfaces\Sql\Interfaces\SqlQueryFactoryInterface;
use UnitEnum;
use CarloNicora\Minimalism\Interfaces\Sql\Abstracts\AbstractSqlFactory;
use CarloNicora\Minimalism\Interfaces\Sql\Enums\SqlJoinType;
use CarloNicora\Minimalism\Interfaces\Sql\Interfaces\SqlJoinFactoryInterface;

class SqlJoinFactory extends AbstractSqlFactory
{
    /**
     * @param UnitEnum $primaryKey
     * @param UnitEnum $foreignKey
     * @param SqlJoinType|null $joinType
     * @return SqlJoinFactoryInterface
     */
    public static function create(
        UnitEnum $primaryKey,
        UnitEnum $foreignKey,
        ?SqlJoinType $joinType=null,
    ): SqlJoinFactoryInterface
    {
        /** @var SqlQueryFactoryInterface $implementationClass */
        $implementationClass = self::$sqlInterface->getFactory(__CLASS__);
        return (new $implementationClass($primaryKey, $foreignKey, $joinType));
    }
}