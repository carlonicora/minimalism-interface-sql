<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Enums;

enum SqlComparison: string
{
    case Equal='=';
    case NotEqual='<>';
    case GreaterThan='>';
    case LesserThan='<';
    case GreaterOrEqualThen='>=';
    case LesserOrEqualThen='<=';
}