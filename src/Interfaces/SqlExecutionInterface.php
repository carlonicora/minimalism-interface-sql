<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Interfaces;

use CarloNicora\Minimalism\Interfaces\Cache\Interfaces\CacheInterface;
use CarloNicora\Minimalism\Interfaces\Data\Interfaces\DataObjectInterface;

interface SqlExecutionInterface
{
    /**
     * @param DataObjectInterface|SqlFactoryInterface $factory
     * @param CacheInterface|null $cache
     * @return DataObjectInterface
     */
    public function create(
        DataObjectInterface|SqlFactoryInterface $factory,
        ?CacheInterface $cache,
    ): DataObjectInterface;

    /**
     * @param SqlFactoryInterface $factory
     * @param CacheInterface|null $cache
     * @return array
     */
    public function read(
        SqlFactoryInterface $factory,
        ?CacheInterface $cache,
    ): array;

    /**
     * @param DataObjectInterface|SqlFactoryInterface $factory
     * @param CacheInterface|null $cache
     * @return void
     */
    public function update(
        DataObjectInterface|SqlFactoryInterface $factory,
        ?CacheInterface $cache,
    ): void;

    /**
     * @param DataObjectInterface|SqlFactoryInterface $factory
     * @param CacheInterface|null $cache
     * @return void
     */
    public function delete(
        DataObjectInterface|SqlFactoryInterface $factory,
        ?CacheInterface $cache,
    ): void;
}