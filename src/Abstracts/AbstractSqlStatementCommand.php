<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Abstracts;

use CarloNicora\Minimalism\Interfaces\Sql\Factories\SqlQueryFactory;
use CarloNicora\Minimalism\Interfaces\Sql\Interfaces\SqlDataObjectInterface;
use CarloNicora\Minimalism\Interfaces\Sql\Interfaces\SqlQueryFactoryInterface;
use CarloNicora\Minimalism\Interfaces\Sql\Interfaces\SqlStatementCommandInterface;
use CarloNicora\Minimalism\Interfaces\Sql\Interfaces\SqlTableInterface;

class AbstractSqlStatementCommand extends AbstractSqlFactory implements SqlStatementCommandInterface
{
    /** @var SqlQueryFactoryInterface  */
    protected SqlQueryFactoryInterface $factory;

    /** @var SqlTableInterface  */
    protected SqlTableInterface $table;

    /**
     * @param SqlDataObjectInterface $object
     */
    public function __construct(
        SqlDataObjectInterface $object,
    )
    {
        /** @var SqlQueryFactoryInterface $implementationClass */
        $implementationClass = self::$sqlInterface->getFactory(SqlQueryFactory::class);

        $this->factory = $implementationClass::create($object->getTableClass());
    }

    /**
     * @return string
     */
    final public function getSql(
    ): string
    {
        return $this->factory->getSql();
    }

    /**
     * @return array
     */
    final public function getParameters(
    ): array
    {
        return $this->factory->getParameters();
    }

    /**
     * @return array
     */
    public function getInsertedArray(
    ): array
    {
        return $this->factory->getInsertedArray();
    }

    /**
     * @return SqlTableInterface
     */
    public function getTable(
    ): SqlTableInterface
    {
        return $this->factory->getTable();
    }
}