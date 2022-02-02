<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Interfaces;

use UnitEnum;

interface SqlFactoryInterface
{
    /**
     * @param string $tableClass
     * @return SqlFactoryInterface
     */
    public static function create(
        string $tableClass,
    ): SqlFactoryInterface;

    /**
     * @return SqlFactoryInterface
     */
    public function selectAll(
    ): SqlFactoryInterface;

    /**
     * @param UnitEnum[] $fields
     * @return SqlFactoryInterface
     */
    public function selectFields(
        array $fields,
    ): SqlFactoryInterface;

    /**
     * @return SqlFactoryInterface
     */
    public function delete(
    ): SqlFactoryInterface;

    /**
     * @return SqlFactoryInterface
     */
    public function update(
    ): SqlFactoryInterface;

    /**
     * @return SqlFactoryInterface
     */
    public function insert(
    ): SqlFactoryInterface;

    /**
     * @param SqlJoinFactoryInterface $join
     * @return SqlFactoryInterface
     */
    public function addJoin(
        SqlJoinFactoryInterface $join
    ): SqlFactoryInterface;

    /**
     * @param UnitEnum[] $fields
     * @return SqlFactoryInterface
     */
    public function addGroupByFields(
        array $fields,
    ): SqlFactoryInterface;

    /**
     * @param array{UnitEnum,bool} $fields
     * @return SqlFactoryInterface
     */
    public function addOrderByFields(
        array $fields,
    ): SqlFactoryInterface;

    /**
     * @param string $sql
     * @return SqlFactoryInterface
     */
    public function setSql(
        string $sql,
    ): SqlFactoryInterface;

    /**
     * @param UnitEnum $field
     * @param mixed $value
     * @return SqlFactoryInterface
     */
    public function addParameter(
        UnitEnum $field,
        mixed $value,
    ): SqlFactoryInterface;

    /**
     * @param UnitEnum $field
     * @param mixed $value
     * @return SqlFactoryInterface
     */
    public function addHavingParameter(
        UnitEnum $field,
        mixed $value,
    ): SqlFactoryInterface;

    /**
     * @return SqlTableInterface
     */
    public function getTable(
    ): SqlTableInterface;

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