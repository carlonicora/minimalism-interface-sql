<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Attributes;

use Attribute;
use CarloNicora\Minimalism\Interfaces\Sql\Enums\DbFieldType;
use UnitEnum;

#[Attribute]
class DbField
{
    /**
     * @param UnitEnum|null $field
     * @param DbFieldType|null $transformator
     */
    public function __construct(
        ?UnitEnum $field=null,
        ?DbFieldType $transformator=DbFieldType::Simple,
    )
    {
    }
}