<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Interfaces;

use CarloNicora\Minimalism\Factories\ObjectFactory;

interface SqlDataObjectInterface
{
    /**
     * DataObjectInterface constructor.
     * @param ObjectFactory|null $objectFactory
     * @param array|null $data
     */
    public function __construct(
        ?ObjectFactory $objectFactory=null,
        ?array $data=null,
    );

    /**
     * @param array $data
     */
    public function import(
        array $data,
    ): void;

    /**
     * @return array
     */
    public function export(
    ): array;

    /**
     * @return SqlTableInterface
     */
    public function getTable(
    ): SqlTableInterface;
}