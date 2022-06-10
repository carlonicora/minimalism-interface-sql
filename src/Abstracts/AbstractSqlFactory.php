<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Abstracts;

use CarloNicora\Minimalism\Interfaces\Sql\Interfaces\SqlInterface;

class AbstractSqlFactory
{
    /** @var SqlInterface  */
    protected static SqlInterface $sqlInterface;

    /**
     * @param SqlInterface $sqlInterface
     * @return void
     */
    public static function setSqlInterface(
        SqlInterface $sqlInterface,
    ): void
    {
        self::$sqlInterface = $sqlInterface;
    }
}