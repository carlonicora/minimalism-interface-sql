<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Attributes;

use Attribute;
use CarloNicora\Minimalism\Interfaces\Sql\Enums\DbFieldType;

#[Attribute]
class DbField
{
    /**
     * @param string|null $name
     * @param DbFieldType|null $transformator
     */
    public function __construct(
        ?string $name=null,
        ?DbFieldType $transformator=DbFieldType::Simple,
    )
    {
    }
}