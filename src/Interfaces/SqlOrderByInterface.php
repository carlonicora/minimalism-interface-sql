<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Interfaces;

use UnitEnum;

interface SqlOrderByInterface
{
    /**
     * @param UnitEnum $field
     * @param bool $isDesc
     */
    public function __construct(
        UnitEnum $field,
        bool $isDesc=false,
    );

    /**
     * @return SqlFieldInterface
     */
    public function getField(
    ): SqlFieldInterface;

    /**
     * @return bool
     */
    public function isDesc(
    ): bool;
}