<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Interfaces;

interface SqlFieldInterface
{
    /**
     * @return string
     */
    public function getFieldName(
    ): string;

    /**
     * @return string
     */
    public function getFieldType(
    ): string;

    /**
     * @return bool
     */
    public function isPrimaryKey(
    ): bool;
}