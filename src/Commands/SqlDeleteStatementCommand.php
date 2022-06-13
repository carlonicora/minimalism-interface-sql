<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Commands;

use CarloNicora\Minimalism\Exceptions\MinimalismException;
use CarloNicora\Minimalism\Interfaces\Sql\Abstracts\AbstractSqlStatementCommand;
use CarloNicora\Minimalism\Interfaces\Sql\Factories\SqlDataObjectFactory;
use CarloNicora\Minimalism\Interfaces\Sql\Interfaces\SqlDataObjectInterface;
use Exception;

class SqlDeleteStatementCommand extends AbstractSqlStatementCommand
{
    /**
     * @param SqlDataObjectInterface $object
     * @throws MinimalismException
     * @throws Exception
     */
    public function __construct(
        SqlDataObjectInterface $object,
    )
    {
        parent::__construct($object);

        $data = SqlDataObjectFactory::createData(object: $object);

        /** @noinspection UnusedFunctionResultInspection */
        $this->factory->delete();

        foreach ($this->factory->getTable()->getPrimaryKeyFields() as $field){
            /** @noinspection UnusedFunctionResultInspection */
            $this->factory->addParameter($field->getIdentifier(), $data[$field->getName()]);
        }
    }
}