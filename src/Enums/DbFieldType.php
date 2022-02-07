<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Enums;

enum DbFieldType
{
    case Simple;
    case IntDateTime;
    case Bool;
    case Array;
    case Custom;
}