<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Attributes;

use Attribute;
use RuntimeException;
use UnitEnum;
use CarloNicora\Minimalism\Enums\HttpCode;
use CarloNicora\Minimalism\Exceptions\MinimalismException;
use CarloNicora\Minimalism\Interfaces\Sql\Interfaces\SqlFieldInterface;
use CarloNicora\Minimalism\Interfaces\Sql\Interfaces\SqlTableInterface;

#[Attribute]
class SqlTableAttribute implements SqlTableInterface
{
    /** @var string  */
    protected string $databaseName;

    /** @var SqlFieldInterface[]  */
    protected array $fields=[];

    /**
     * @param string $name
     * @param string $databaseIdentifier
     * @param bool $insertIgnore
     */
    public function __construct(
        protected string $name,
        protected string $databaseIdentifier,
        protected bool $insertIgnore=false,
    )
    {
        
    }

    /**
     * @return string
     */
    public function getDatabaseIdentifier(
    ): string
    {
        return $this->databaseIdentifier;
    }

    /**
     * @param string $databaseIdentifier
     */
    public function setDatabaseIdentifier(
        string $databaseIdentifier,
    ): void
    {
        $this->databaseIdentifier = $databaseIdentifier;
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
    public function getDatabaseName(
    ): string
    {
        return $this->databaseName;
    }

    /**
     * @return bool
     */
    public function isInsertIgnore(
    ): bool
    {
        return $this->insertIgnore;
    }

    /**
     * @return SqlFieldInterface|null
     */
    public function getAutoIncrementField(
    ): ?SqlFieldInterface
    {
        foreach ($this->fields as $field){
            if ($field->isAutoIncrement()){
                return $field;
            }
        }

        return null;
    }

    /**
     * @return SqlFieldInterface[]
     */
    public function getFields(
    ): array
    {
        return $this->fields;
    }

    /**
     * @return SqlFieldInterface[]
     */
    public function getPrimaryKeyFields(
    ): array
    {
        $response = [];

        foreach ($this->fields as $field){
            if ($field->isPrimaryKey()){
                $response[] = $field;
            }
        }

        return $response;
    }

    /**
     * @return SqlFieldInterface[]
     */
    public function getRegularFields(
    ): array
    {
        $response = [];

        foreach ($this->fields as $field){
            if (!$field->isPrimaryKey()){
                $response[] = $field;
            }
        }

        return $response;
    }

    /**
     * @param string $fieldName
     * @return SqlFieldInterface
     * @throws MinimalismException
     */
    public function getFieldByName(
        string $fieldName,
    ): SqlFieldInterface
    {
        if (array_key_exists($fieldName, $this->fields)){
            return $this->fields[$fieldName];
        }

        throw new MinimalismException(
            HttpCode::InternalServerError
        );
    }

    /**
     * @param UnitEnum $field
     * @return SqlFieldInterface
     * @throws MinimalismException
     */
    public function getField(
        UnitEnum $field,
    ): SqlFieldInterface
    {
        return $this->getFieldByName($field->name);
    }
}