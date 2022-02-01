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
    public static function getAutoIncrementField(
    ): ?SqlFieldInterface;

    /**
     * @return SqlFieldInterface[]
     */
    public static function getPrimaryKeyFields(
    ): array;

    /**
     * @return SqlFieldInterface[]
     */
    public static function getRegularFields(
    ): array;
}