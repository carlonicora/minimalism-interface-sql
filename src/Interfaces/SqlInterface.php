<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Interfaces;

use CarloNicora\Minimalism\Interfaces\Cache\Interfaces\CacheBuilderInterface;
use CarloNicora\Minimalism\Interfaces\Data\Interfaces\DataObjectInterface;

interface SqlInterface
{
    /**
     * @param DataObjectInterface|DataObjectInterface[] $factory
     * @param CacheBuilderInterface|null $cacheBuilder
     * @return array
     */
    public function create(
        DataObjectInterface|array $factory,
        ?CacheBuilderInterface $cacheBuilder=null,
    ): array;

    /**
     * @param SqlFactoryInterface $factory
     * @param CacheBuilderInterface|null $cacheBuilder
     * @param string|null $singleReturnedObjectInterfaceName
     * @param string|null $arrayReturnedObjectInterfaceName
     * @return DataObjectInterface|array
     */
    public function read(
        SqlFactoryInterface $factory,
        ?CacheBuilderInterface $cacheBuilder=null,
        ?string $singleReturnedObjectInterfaceName=null,
        ?string $arrayReturnedObjectInterfaceName=null,
    ): DataObjectInterface|array;

    /**
     * @param DataObjectInterface|DataObjectInterface[] $factory
     * @param CacheBuilderInterface|null $cacheBuilder
     * @return void
     */
    public function update(
        DataObjectInterface|array $factory,
        ?CacheBuilderInterface $cacheBuilder=null,
    ): void;

    /**
     * @param DataObjectInterface|SqlFactoryInterface $factory
     * @param CacheBuilderInterface|null $cacheBuilder
     * @return void
     */
    public function delete(
        DataObjectInterface|SqlFactoryInterface $factory,
        ?CacheBuilderInterface $cacheBuilder=null,
    ): void;
}