<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Interfaces;

interface SqlTableInterface
{
    /**
     * @return string
     */
    public function getTableName(
    ): string;
    
    /**
     * @return SqlFieldInterface|null
     */
    public function getAutoIncrementField(
    ): ?SqlFieldInterface;

    /**
     * @return SqlFieldInterface[]
     */
    public function getPrimaryKeyFields(
    ): array;

    /**
     * @return SqlFieldInterface[]
     */
    public function getRegularFields(
    ): array;
}