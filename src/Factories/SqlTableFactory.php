<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Factories;

use CarloNicora\Minimalism\Interfaces\Sql\Abstracts\AbstractSqlFactory;
use CarloNicora\Minimalism\Interfaces\Sql\Interfaces\SqlTableInterface;

class SqlTableFactory extends AbstractSqlFactory
{
    /**
     * @param string $tableClass
     * @param string|null $overrideDatabaseIdentifier
     * @return SqlTableInterface
     */
    public static function create(
        string $tableClass,
        ?string $overrideDatabaseIdentifier=null,
    ): SqlTableInterface
    {
        $implementationClass = self::$sqlInterface->getFactory(__CLASS__);
        /** @var SqlTableInterface  $response */
        /** @noinspection PhpUnnecessaryLocalVariableInspection */
        $response = $implementationClass::create($tableClass, $overrideDatabaseIdentifier);
        return $response;
    }
}