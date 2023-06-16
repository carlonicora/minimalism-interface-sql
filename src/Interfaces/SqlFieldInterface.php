<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Interfaces;

use CarloNicora\Minimalism\Interfaces\Sql\Enums\SqlFieldOption;
use CarloNicora\Minimalism\Interfaces\Sql\Enums\SqlFieldType;
use UnitEnum;

interface SqlFieldInterface
{
    /**
     * @param SqlFieldType $fieldType
     * @param SqlFieldOption|null $fieldOption
     * @param string $name
     * @param string $tableName
     * @param string $databaseName
     */
    public function __construct(
        SqlFieldType $fieldType,
        ?SqlFieldOption $fieldOption=null,
        string $name='',
        string $tableName='',
        string $databaseName='',
    );

    /**
     * @return UnitEnum
     */
    public function getIdentifier(
    ): UnitEnum;

    /**
     * @param UnitEnum $identifier
     * @return void
     */
    public function setIdentifier(
        UnitEnum $identifier,
    ): void;

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

    public function getOption(
    ): ?SqlFieldOption;
}