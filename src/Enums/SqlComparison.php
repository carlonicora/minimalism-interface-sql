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
    case In='IN';
    case NotIn='NOT IN';
    case LikeLeft='%LIKE';
    case LikeRight='LIKE%';
    Case Like='LIKE';
}