<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Interfaces;

interface SqlJoinFactoryInterface
{
    /**
     * @return string
     */
    public function getSql(
    ): string;
}