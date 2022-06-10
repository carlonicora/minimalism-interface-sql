<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Interfaces;

use CarloNicora\Minimalism\Exceptions\MinimalismException;
use CarloNicora\Minimalism\Interfaces\Cache\Interfaces\CacheBuilderInterface;
use CarloNicora\Minimalism\Interfaces\ServiceInterface;
use Exception;

interface SqlInterface extends ServiceInterface
{
    /**
     * @template InstanceOfType
     * @param SqlQueryFactoryInterface|SqlDataObjectInterface|SqlDataObjectInterface[] $queryFactory
     * @param CacheBuilderInterface|null $cacheBuilder
     * @param class-string<InstanceOfType>|null $responseType
     * @param bool $requireObjectsList
     * @param array $options
     * @return InstanceOfType|array
     */
    public function create(
        SqlQueryFactoryInterface|SqlDataObjectInterface|array $queryFactory,
        ?CacheBuilderInterface                                $cacheBuilder=null,
        ?string                                               $responseType=null,
        bool                                                  $requireObjectsList=false,
        array $options=[],
    ): SqlDataObjectInterface|array;

    /**
     * @template InstanceOfType
     * @param SqlQueryFactoryInterface $queryFactory
     * @param CacheBuilderInterface|null $cacheBuilder
     * @param class-string<InstanceOfType>|null $responseType
     * @param bool $requireObjectsList
     * @param array $options
     * @return InstanceOfType|array
     * @throws MinimalismException
     * @throws Exception
     */
    public function read(
        SqlQueryFactoryInterface $queryFactory,
        ?CacheBuilderInterface   $cacheBuilder=null,
        ?string                  $responseType=null,
        bool                     $requireObjectsList=false,
        array $options=[],
    ): SqlDataObjectInterface|array;

    /**
     * @param SqlDataObjectInterface|SqlQueryFactoryInterface|SqlDataObjectInterface[] $queryFactory
     * @param CacheBuilderInterface|null $cacheBuilder
     * @param array $options
     * @return void
     */
    public function update(
        SqlDataObjectInterface|SqlQueryFactoryInterface|array $queryFactory,
        ?CacheBuilderInterface $cacheBuilder=null,
        array $options=[],
    ): void;

    /**
     * @param SqlDataObjectInterface|SqlQueryFactoryInterface|SqlDataObjectInterface[]|SqlQueryFactoryInterface[] $queryFactory
     * @param CacheBuilderInterface|null $cacheBuilder
     * @param array $options
     * @return void
     */
    public function delete(
        SqlDataObjectInterface|SqlQueryFactoryInterface|array $queryFactory,
        ?CacheBuilderInterface                                $cacheBuilder=null,
        array $options=[],
    ): void;

    /**
     * @param string $baseFactory
     * @return mixed
     */
    public function getFactory(
        string $baseFactory,
    ): string;
}