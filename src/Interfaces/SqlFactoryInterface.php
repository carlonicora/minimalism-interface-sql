<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Interfaces;

interface SqlFactoryInterface
{
    /**
     * @param SqlTableInterface $table
     * @return SqlFactoryInterface
     */
    public static function create(
        SqlTableInterface $table,
    ): SqlFactoryInterface;

    /**
     * @return SqlFactoryInterface
     */
    public function selectAll(
    ): SqlFactoryInterface;

    /**
     * @param SqlFieldInterface[] $fields
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
     * @param SqlFieldInterface[] $fields
     * @return SqlFactoryInterface
     */
    public function addGroupByFields(
        array $fields,
    ): SqlFactoryInterface;

    /**
     * @param array{SqlFieldInterface,bool} $fields
     * @return SqlFactoryInterface
     */
    public function addOrderByFields(
        array $fields,
    ): SqlFactoryInterface;

    /**
     * @param SqlTableInterface $table
     * @param string $sql
     * @return SqlFactoryInterface
     */
    public function setSql(
        SqlTableInterface $table,
        string $sql,
    ): SqlFactoryInterface;

    /**
     * @param SqlFieldInterface $field
     * @param mixed $value
     * @return SqlFactoryInterface
     */
    public function addParameter(
        SqlFieldInterface $field,
        mixed $value,
    ): SqlFactoryInterface;

    /**
     * @param SqlFieldInterface $field
     * @param mixed $value
     * @return SqlFactoryInterface
     */
    public function addHavingParameter(
        SqlFieldInterface $field,
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