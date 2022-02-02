<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Attributes;

use Attribute;

#[Attribute]
class DbTable
{
    /**
     * @param string $tableClass
     */
    public function __construct(
        string $tableClass,
    )
    {
    }
}