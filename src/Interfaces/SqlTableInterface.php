<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Interfaces;

interface SqlTableInterface
{
    /**
     * @param string $name
     * @param string $databaseIdentifier
     */
    public function __construct(
        string $name,
        string $databaseIdentifier,
    );

    /**
     * @return string
     */
    public function getName(
    ): string;

    /**
     * @return string
     */
    public function getFullName(
    ): string;

    /**
     * @return string
     */
    public function getDatabaseName(
    ): string;

    /**
     * @return SqlFieldInterface|null
     */
    public function getAutoIncrementField(
    ): ?SqlFieldInterface;

    /**
     * @return SqlFieldInterface[]
     */
    public function getFields(
    ): array;

    /**
     * @return SqlFieldInterface[]
     */
    public function getPrimaryKeyFields(
    ): array;

    /**
     * @return SqlFieldInterface[]
     */
    public function getRegularFields(
    ): array;

    /**
     * @param string $fieldName
     * @return SqlFieldInterface
     */
    public function getFieldByName(
        string $fieldName,
    ): SqlFieldInterface;
}