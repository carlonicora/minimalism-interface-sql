<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Data;

use CarloNicora\Minimalism\Interfaces\Sql\Abstracts\AbstractSqlFactory;
use CarloNicora\Minimalism\Interfaces\Sql\Factories\SqlQueryFactory;
use CarloNicora\Minimalism\Interfaces\Sql\Interfaces\SqlOrderByInterface;
use UnitEnum;
use CarloNicora\Minimalism\Exceptions\MinimalismException;
use CarloNicora\Minimalism\Interfaces\Sql\Interfaces\SqlFieldInterface;

class SqlOrderByObject extends AbstractSqlFactory implements SqlOrderByInterface
{
    /**
     * @param UnitEnum $field
     * @param bool $isDesc
     */
    public function __construct(
        private readonly UnitEnum $field,
        private readonly bool $isDesc=false,
    )
    {
    }

    /**
     * @return SqlFieldInterface
     * @throws MinimalismException
     */
    public function getField(
    ): SqlFieldInterface
    {
        /** @var SqlFieldInterface $response */
        return self::$sqlInterface->getFactory(SqlQueryFactory::class)::create(get_class($this->field))->getTable()->getFieldByName($this->field->name);
    }

    /**
     * @return bool
     */
    public function isDesc(
    ): bool
    {
        return $this->isDesc;
    }
}