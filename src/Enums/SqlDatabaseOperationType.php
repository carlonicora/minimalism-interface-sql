<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Enums;

use CarloNicora\Minimalism\Exceptions\MinimalismException;
use CarloNicora\Minimalism\Interfaces\Sql\Commands\SqlCreateStatementCommand;
use CarloNicora\Minimalism\Interfaces\Sql\Commands\SqlDeleteStatementCommand;
use CarloNicora\Minimalism\Interfaces\Sql\Commands\SqlUpdateStatementCommand;
use CarloNicora\Minimalism\Interfaces\Sql\Factories\SqlExceptionFactory;
use CarloNicora\Minimalism\Interfaces\Sql\Interfaces\SqlDataObjectInterface;
use CarloNicora\Minimalism\Interfaces\Sql\Interfaces\SqlStatementCommandInterface;

enum SqlDatabaseOperationType
{
    case Create;
    case Read;
    case Update;
    case Delete;

    /**
     * @param SqlDataObjectInterface $object
     * @return SqlStatementCommandInterface
     * @throws MinimalismException
     */
    public function getSqlStatementCommand(
        SqlDataObjectInterface $object,
    ): SqlStatementCommandInterface
    {
        return match ($this){
            self::Create => new SqlCreateStatementCommand($object),
            self::Update => new SqlUpdateStatementCommand($object),
            self::Delete => new SqlDeleteStatementCommand($object),
            default => throw SqlExceptionFactory::ReadDoesNotHaveSqlStatementCommand->create(),
        };
    }
}