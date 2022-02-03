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
     * @param SqlDataObjectInterface|SqlDataObjectInterface[] $factory
     * @param CacheBuilderInterface|null $cacheBuilder
     * @param class-string<InstanceOfType>|null $sqlObjectInterfaceClass
     * @param bool $expectsSingleRecord
     * @return InstanceOfType|array
     */
    public function create(
        SqlDataObjectInterface|array $factory,
        ?CacheBuilderInterface $cacheBuilder=null,
        ?string $sqlObjectInterfaceClass=null,
        bool $expectsSingleRecord=true,
    ): SqlDataObjectInterface|array;

    /**
     * @template InstanceOfType
     * @param SqlFactoryInterface $factory
     * @param CacheBuilderInterface|null $cacheBuilder
     * @param class-string<InstanceOfType>|null $sqlObjectInterfaceClass
     * @param bool $expectsSingleRecord
     * @return InstanceOfType|array
     * @throws MinimalismException|Exception
     */
    public function read(
        SqlFactoryInterface $factory,
        ?CacheBuilderInterface $cacheBuilder=null,
        ?string $sqlObjectInterfaceClass=null,
        bool $expectsSingleRecord=true,
    ): SqlDataObjectInterface|array;

    /**
     * @param SqlDataObjectInterface|SqlDataObjectInterface[] $factory
     * @param CacheBuilderInterface|null $cacheBuilder
     * @return void
     */
    public function update(
        SqlDataObjectInterface|array $factory,
        ?CacheBuilderInterface $cacheBuilder=null,
    ): void;

    /**
     * @param SqlDataObjectInterface|SqlFactoryInterface|SqlDataObjectInterface[]|SqlFactoryInterface[] $factory
     * @param CacheBuilderInterface|null $cacheBuilder
     * @return void
     */
    public function delete(
        SqlDataObjectInterface|SqlFactoryInterface|array $factory,
        ?CacheBuilderInterface $cacheBuilder=null,
    ): void;
}