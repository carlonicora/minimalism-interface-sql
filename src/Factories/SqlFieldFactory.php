<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Factories;

use CarloNicora\Minimalism\Interfaces\Sql\Abstracts\AbstractSqlFactory;
use CarloNicora\Minimalism\Interfaces\Sql\Interfaces\SqlFieldInterface;
use CarloNicora\Minimalism\Interfaces\Sql\Interfaces\SqlQueryFactoryInterface;
use UnitEnum;

class SqlFieldFactory extends AbstractSqlFactory
{
    public static function create(
        UnitEnum $field,
    ): SqlFieldInterface
    {
        $implementationClass = self::$sqlInterface->getFactory(SqlQueryFactory::class);
        /** @var SqlQueryFactoryInterface $queryFactory */
        $queryFactory = (new $implementationClass($field::class))->selectAll();
        return $queryFactory->getTable()->getField($field);
    }
}