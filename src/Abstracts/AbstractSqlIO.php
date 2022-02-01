<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Abstracts;

use CarloNicora\Minimalism\Enums\HttpCode;
use CarloNicora\Minimalism\Exceptions\MinimalismException;
use CarloNicora\Minimalism\Factories\ObjectFactory;
use CarloNicora\Minimalism\Interfaces\Cache\Interfaces\CacheInterface;
use CarloNicora\Minimalism\Interfaces\SimpleObjectInterface;
use CarloNicora\Minimalism\Interfaces\Sql\Interfaces\SqlInterface;
use Exception;

abstract class AbstractSqlIO implements SimpleObjectInterface
{
    /**
     * @param ObjectFactory $objectFactory
     * @param SqlInterface $data
     * @param CacheInterface|null $cache
     */
    public function __construct(
        protected ObjectFactory $objectFactory,
        protected SqlInterface $data,
        protected ?CacheInterface $cache,
    )
    {
    }

    /**
     * @param array $recordset
     * @param string|null $recordType
     * @return array
     * @throws Exception
     */
    protected function returnSingleValue(
        array $recordset,
        ?string $recordType=null,
    ): array
    {
        if ($recordset === [] || $recordset === [[]]){
            throw new MinimalismException(
                status: HttpCode::NotFound,
                message: $recordType === null
                    ? 'Record not found'
                    : $recordType . ' not found',
            );
        }

        return array_is_list($recordset) ? $recordset[0] : $recordset;
    }
}