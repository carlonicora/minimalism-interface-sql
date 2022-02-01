<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Interfaces;

interface SqlFactoryInterface
{
    /**
     * @return SqlTableInterface
     */
    public function getTable(
    ): SqlTableInterface;

    /**
     * @param SqlTableInterface $table
     * @return void
     */
    public function selectAll(
        SqlTableInterface $table,
    ): void;

    /**
     * @param SqlTableInterface $table
     * @param SqlFieldInterface[] $fields
     * @return void
     */
    public function selectFields(
        SqlTableInterface $table,
        array $fields,
    ): void;

    /**
     * @param SqlTableInterface $table
     * @return void
     */
    public function delete(
        SqlTableInterface $table,
    ): void;

    /**
     * @param SqlTableInterface $table
     * @return void
     */
    public function update(
        SqlTableInterface $table,
    ): void;

    /**
     * @param SqlTableInterface $table
     * @return void
     */
    public function insert(
        SqlTableInterface $table,
    ): void;

    /**
     * @param SqlJoinFactoryInterface $join
     * @return void
     */
    public function addJoin(
        SqlJoinFactoryInterface $join
    ): void;

    /**
     * @param SqlFieldInterface[] $fields
     * @return void
     */
    public function addGroupByFields(
        array $fields,
    ): void;

    /**
     * @param array{SqlFieldInterface,bool} $fields
     * @return void
     */
    public function addOrderByFields(
        array $fields,
    ): void;

    /**
     * @return string
     */
    public function getSql(
    ): string;

    /**
     * @param SqlTableInterface $table
     * @param string $sql
     */
    public function setSql(
        SqlTableInterface $table,
        string $sql,
    ): void;

    /**
     * @return array
     */
    public function getParameters(
    ): array;

    /**
     * @param SqlFieldInterface $field
     * @param mixed $value
     * @return void
     */
    public function addParameter(
        SqlFieldInterface $field,
        mixed $value,
    ): void;

    /**
     * @param SqlFieldInterface $field
     * @param mixed $value
     * @return void
     */
    public function addHavingParameter(
        SqlFieldInterface $field,
        mixed $value,
    ): void;
}