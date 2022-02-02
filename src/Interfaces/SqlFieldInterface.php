<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Interfaces;

use IntBackedEnum;

interface SqlFieldInterface
{
    /**
     * @param IntBackedEnum $fieldType
     * @param IntBackedEnum|null $fieldOption
     * @param string $name
     * @param string $tableName
     * @param string $databaseName
     */
    public function __construct(
        IntBackedEnum $fieldType,
        ?IntBackedEnum $fieldOption=null,
        string $name='',
        string $tableName='',
        string $databaseName='',
    );

    /**
     * @return string
     */
    public function getName(
    ): string;

    /**
     * @return string
     */
    public function getFullName(
    ): string;

    /**
     * @return string
     */
    public function getType(
    ): string;

    /**
     * @return bool
     */
    public function isPrimaryKey(
    ): bool;

    /**
     * @return bool
     */
    public function isAutoIncrement(
    ): bool;
}