<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Interfaces;

use CarloNicora\Minimalism\Interfaces\Sql\Enums\SqlComparison;
use UnitEnum;

interface SqlQueryFactoryInterface
{
    /**
     * @param string $tableClass
     * @param string|null $overrideDatabaseIdentifier
     * @return SqlQueryFactoryInterface
     */
    public static function create(
        string $tableClass,
        ?string $overrideDatabaseIdentifier=null,
    ): SqlQueryFactoryInterface;

    /**
     * @return SqlQueryFactoryInterface
     */
    public function selectAll(
    ): SqlQueryFactoryInterface;

    /**
     * @param UnitEnum[]|string[] $fields
     * @return SqlQueryFactoryInterface
     */
    public function selectFields(
        array $fields,
    ): SqlQueryFactoryInterface;

    /**
     * @return SqlQueryFactoryInterface
     */
    public function delete(
    ): SqlQueryFactoryInterface;

    /**
     * @return SqlQueryFactoryInterface
     */
    public function update(
    ): SqlQueryFactoryInterface;

    /**
     * @return SqlQueryFactoryInterface
     */
    public function insert(
    ): SqlQueryFactoryInterface;

    /**
     * @param SqlJoinFactoryInterface $join
     * @return SqlQueryFactoryInterface
     */
    public function addJoin(
        SqlJoinFactoryInterface $join
    ): SqlQueryFactoryInterface;

    /**
     * @param UnitEnum[] $fields
     * @return SqlQueryFactoryInterface
     */
    public function addGroupByFields(
        array $fields,
    ): SqlQueryFactoryInterface;

    /**
     * @param SqlOrderByInterface[] $fields
     * @return SqlQueryFactoryInterface
     */
    public function addOrderByFields(
        array $fields,
    ): SqlQueryFactoryInterface;

    /**
     * @param string $sql
     * @return SqlQueryFactoryInterface
     */
    public function setSql(
        string $sql,
    ): SqlQueryFactoryInterface;

    /**
     * @param UnitEnum|string $field
     * @param mixed $value
     * @param SqlComparison|null $comparison
     * @param UnitEnum|null $stringParameterType
     * @return SqlQueryFactoryInterface
     */
    public function addParameter(
        UnitEnum|string $field,
        mixed $value,
        ?SqlComparison $comparison=SqlComparison::Equal,
        ?UnitEnum $stringParameterType=null,
    ): SqlQueryFactoryInterface;

    /**
     * @param UnitEnum|string $field
     * @param mixed $value
     * @param SqlComparison|null $comparison
     * @param UnitEnum|null $stringParameterType
     * @return SqlQueryFactoryInterface
     */
    public function addHavingParameter(
        UnitEnum|string $field,
        mixed $value,
        ?SqlComparison $comparison=SqlComparison::Equal,
        ?UnitEnum $stringParameterType=null,
    ): SqlQueryFactoryInterface;

    /**
     * @param int $start
     * @param int $length
     * @return SqlQueryFactoryInterface
     */
    public function limit(
        int $start,
        int $length,
    ): SqlQueryFactoryInterface;

    /**
     * @return SqlTableInterface
     */
    public function getTable(
    ): SqlTableInterface;

    /**
     * @return string
     */
    public function getTableClass(
    ): string;

    /**
     * @return array
     */
    public function getInsertedArray(
    ): array;

    /**
     * @return string
     */
    public function getSql(
    ): string;

    /**
     * @return array
     */
    public function getParameters(
    ): array;
}