<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Abstracts;

use CarloNicora\JsonApi\Objects\ResourceObject;
use CarloNicora\Minimalism\Factories\ObjectFactory;
use CarloNicora\Minimalism\Interfaces\SimpleObjectInterface;
use CarloNicora\Minimalism\Interfaces\Sql\Interfaces\SqlDataObjectInterface;
use CarloNicora\Minimalism\Interfaces\Sql\Interfaces\SqlTableInterface;
use CarloNicora\Minimalism\Services\Path;

abstract class AbstractSqlDataObject implements SqlDataObjectInterface, SimpleObjectInterface
{
    /** @var array  */
    private array $originalValues = [];

    /**
     * @param ObjectFactory $objectFactory
     * @param array|null $data
     * @param Path|null $path
     */
    public function __construct(
        protected ObjectFactory $objectFactory,
        ?array $data = null,
        protected ?Path $path=null,
    )
    {
        if ($data !== null) {
            if (array_key_exists('originalValues', $data)) {
                $this->originalValues = $data['originalValues'];
            }

            $this->import(
                data: $data
            );
        }
    }

    /**
     * @return SqlTableInterface
     */
    abstract public function getTable(
    ): SqlTableInterface;

    /**
     * @param array $data
     */
    abstract public function import(
        array $data,
    ): void;

    /**
     * @return array
     */
    public function export(
    ): array
    {
        $response = [];

        if ($this->originalValues !== []){
            $response['originalValues'] = $this->originalValues;
        }

        return $response;
    }

    /**
     * @return ResourceObject
     */
    abstract public function generateResource(
    ): ResourceObject;
}