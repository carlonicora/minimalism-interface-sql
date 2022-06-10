<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Attributes;

use Attribute;
use RuntimeException;
use UnitEnum;
use CarloNicora\Minimalism\Interfaces\Sql\Enums\SqlFieldOption;
use CarloNicora\Minimalism\Interfaces\Sql\Enums\SqlFieldType;
use CarloNicora\Minimalism\Interfaces\Sql\Interfaces\SqlFieldInterface;

#[Attribute]
class SqlFieldAttribute implements SqlFieldInterface
{

    /** @var UnitEnum  */
    protected UnitEnum $identifier;
    
    /**
     * @param SqlFieldType $fieldType
     * @param SqlFieldOption|null $fieldOption
     * @param string $name
     * @param string $tableName
     * @param string $databaseName
     */
    public function __construct(
        protected SqlFieldType $fieldType,
        protected ?SqlFieldOption $fieldOption=null,
        protected string $name='',
        protected string $tableName='',
        protected string $databaseName='',
    )
    {

    }

    /**
     * @return UnitEnum
     */
    public function getIdentifier(
    ): UnitEnum
    {
        return $this->identifier;
    }

    /**
     * @param UnitEnum $identifier
     * @return void
     */
    public function setIdentifier(
        UnitEnum $identifier,
    ): void
    {
        $this->identifier = $identifier;
    }

    /**
     * @return string
     */
    public function getName(
    ): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getFullName(
    ): string
    {
        throw new RuntimeException('Not implemented');
    }

    /**
     * @return string
     */
    public function getType(
    ): string
    {
        throw new RuntimeException('Not implemented');
    }

    /**
     * @return bool
     */
    public function isPrimaryKey(
    ): bool
    {
        return (($this->fieldOption?->value & SqlFieldOption::PrimaryKey->value) > 0);
    }

    /**
     * @return bool
     */
    public function isAutoIncrement(
    ): bool
    {
        return (($this->fieldOption?->value & SqlFieldOption::AutoIncrement->value) > SqlFieldOption::PrimaryKey->value);
    }
}