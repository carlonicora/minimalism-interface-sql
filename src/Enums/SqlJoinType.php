<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Enums;

enum SqlJoinType: string
{
    case Inner='INNER';
    case Outer='OUTER';
    case Left='LEFT';
    case Right='RIGHT';
}