<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Enums;

enum SqlComparison: string
{
    case Equal='=';
    case NotEqual='<>';
    case GreaterThan='>';
    case LesserThan='<';
    case GreaterOrEqualThan='>=';
    case LesserOrEqualThan='<=';
    case In='IN';
    case NotIn='NOT IN';
    case LikeLeft='%LIKE';
    case LikeRight='LIKE%';
    Case Like='LIKE';
}