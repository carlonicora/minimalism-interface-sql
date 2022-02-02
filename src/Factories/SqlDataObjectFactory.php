<?php
namespace CarloNicora\Minimalism\Interfaces\Sql\Factories;

use CarloNicora\Minimalism\Factories\ObjectFactory;
use CarloNicora\Minimalism\Interfaces\Sql\Attributes\DbField;
use CarloNicora\Minimalism\Interfaces\Sql\Enums\DbFieldType;
use CarloNicora\Minimalism\Interfaces\Sql\Interfaces\SqlDataObjectInterface;
use Exception;
use ReflectionObject;
use Throwable;

class SqlDataObjectFactory
{
    /**
     * @template InstanceOfType
     * @param ObjectFactory $objectFactory
     * @param class-string<InstanceOfType> $objectClass
     * @param array $data
     * @return InstanceOfType
     * @throws Exception
     */
    public static function createObject(
        ObjectFactory $objectFactory,
        string $objectClass,
        array $data,
    ): SqlDataObjectInterface
    {
        $response = $objectFactory->create($objectClass);

        foreach ((new ReflectionObject($response))->getProperties() as $property){
            $attributes = $property->getAttributes(DbField::class);
            if (!empty($attributes)){
                $propertyKey = $attributes[0]->getArguments()['field']->name ?? $property->getName();
                /** @noinspection PhpExpressionResultUnusedInspection */
                $property->setAccessible(true);
                $property->setValue(
                    objectOrValue: $response,
                    value: self::getValue(
                        name: $propertyKey,
                        data: $data,
                        fieldType: $attributes[0]->getArguments()['fieldType'] ?? DbFieldType::Simple,
                        isNullable: $property->getType()?->allowsNull(),
                    ),
                );
            }
        }

        return $response;
    }

    /**
     * @param SqlDataObjectInterface $object
     * @return array
     */
    public static function createData(
        SqlDataObjectInterface $object,
    ): array
    {
        $response = [];

        foreach ((new ReflectionObject($object))->getProperties() as $property){
            $attributes = $property->getAttributes(DbField::class);
            if (!empty($attributes)){
                $propertyKey = $attributes[0]->getArguments()['field']->name ?? $property->getName();
                /** @noinspection PhpExpressionResultUnusedInspection */
                $property->setAccessible(true);
                try {
                    $value = $property->getValue($object);
                } catch (Exception|Throwable) {
                    $value = null;
                }

                switch ($attributes[0]->getArguments()['fieldType'] ?? DbFieldType::Simple) {
                    case DbFieldType::Simple:
                        $response[$propertyKey] = $value;
                        break;
                    case DbFieldType::IntDateTime:
                        if ($property->getType()?->allowsNull()) {
                            $response[$propertyKey] = ($value === null ? null : date('Y-m-d H:i:s', $value));
                        } else {
                            $response[$propertyKey] = date('Y-m-d H:i:s', $value ?? time());
                        }
                        break;
                    case DbFieldType::Bool:
                        $response[$propertyKey] = $value ?? false;
                }

            }
        }

        return $response;
    }

    /**
     * @param string $name
     * @param array $data
     * @param DbFieldType $fieldType
     * @param bool $isNullable
     * @return mixed
     */
    private static function getValue(
        string $name,
        array $data,
        DbFieldType $fieldType,
        bool $isNullable,
    ): mixed
    {
        if (!array_key_exists($name, $data)){
            return null;
        }

        $response = null;

        switch ($fieldType){
            case DbFieldType::Simple:
                $response = $data[$name];
                break;
            case DbFieldType::IntDateTime:
                if ($isNullable){
                    $response = strtotime($data[$name]);
                } else {
                    $response = strtotime($data[$name]) ?? time();
                }
                break;
            case DbFieldType::Bool:
                $response = $data[$name] ?? false;
                break;
        }

        return $response;
    }
}