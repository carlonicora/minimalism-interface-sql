<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Interfaces;

use CarloNicora\Minimalism\Interfaces\Data\Interfaces\DataObjectInterface;

interface SqlDataObjectInterface extends DataObjectInterface
{
    /**
     * @return SqlTableInterface
     */
    public function getTable(
    ): SqlTableInterface;
}