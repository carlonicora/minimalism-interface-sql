<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Interfaces;

use CarloNicora\Minimalism\Interfaces\SimpleObjectInterface;

interface SqlDataObjectInterface extends SimpleObjectInterface
{
    /**
     * @return string
     */
    public function getTableClass(
    ): string;

    /**
     * @return SqlTableInterface
     */
    public function getTable(
    ): SqlTableInterface;

    /**
     * @param string $fieldName
     * @param mixed $value
     * @return mixed
     */
    public function translateCustomField(
        string $fieldName,
        mixed $value=null,
    ): mixed;
}