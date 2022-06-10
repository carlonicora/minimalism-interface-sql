<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Factories;

use CarloNicora\Minimalism\Exceptions\MinimalismException;
use CarloNicora\Minimalism\Interfaces\Sql\Abstracts\AbstractSqlFactory;
use CarloNicora\Minimalism\Interfaces\Sql\Interfaces\SqlQueryFactoryInterface;

class SqlQueryFactory extends AbstractSqlFactory
{
    /**
     * @param string $tableClass
     * @param string|null $overrideDatabaseIdentifier
     * @return SqlQueryFactoryInterface
     * @throws MinimalismException
     */
    public static function create(
        string $tableClass,
        ?string $overrideDatabaseIdentifier=null,
    ): SqlQueryFactoryInterface
    {
        /** @var SqlQueryFactoryInterface $implementationClass */
        $implementationClass = self::$sqlInterface->getFactory(__CLASS__);
        return (new $implementationClass($tableClass, $overrideDatabaseIdentifier))->selectAll();
    }
}