<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Traits;

use CarloNicora\Minimalism\Interfaces\Sql\Attributes\DbTable;
use CarloNicora\Minimalism\Interfaces\Sql\Factories\SqlTableFactory;
use CarloNicora\Minimalism\Interfaces\Sql\Interfaces\SqlTableInterface;
use Exception;
use ReflectionClass;

trait SqlDataObjectTrait
{
    /**
     * @return string
     */
    final public function getTableClass(
    ): string
    {
        $reflection = new ReflectionClass(static::class);
        return $reflection->getAttributes(DbTable::class)[0]->getArguments()['tableClass'];
    }

    /**
     * @return SqlTableInterface
     * @throws Exception
     */
    final public function getTable(
    ): SqlTableInterface
    {
        return SqlTableFactory::create($this->getTableClass());
    }

    /**
     * @param string $fieldName
     * @param mixed $value
     * @return mixed
     * @noinspection PhpUnusedParameterInspection
     */
    public function translateCustomField(
        string $fieldName,
        mixed $value=null,
    ): mixed
    {
        return null;
    }
}