<?php

namespace AlterEgo\BitrixAPI\Classes;

use AlterEgo\BitrixAPI\Bitrix;
use ReflectionClass;
use ReflectionMethod;

abstract class Entity
{
    private $client;

    /**
     * Entity constructor.
     * @param Bitrix $client
     */
    public function __construct(Bitrix $client)
    {
        $this->client = $client;
    }

    /**
     * @return Bitrix
     */
    protected function getClient()
    {
        return $this->client;
    }

    /**
     * @param string $functionName
     * @param array $args
     * @return mixed
     */
    protected function call($functionName, $args)
    {
        $reflect = new ReflectionClass($this);

        $namespaceArray = explode('\\', $reflect->getName());
        $apiKey = array_search('Api', $namespaceArray);
        $namespaceArray[++$apiKey] = $this->client->getType();
        $namespace = implode('\\', $namespaceArray);

        $reflectionMethod = new ReflectionMethod($namespace, $functionName);

        $entity = new $namespace($this->client);

        return $reflectionMethod->invokeArgs($entity, $args);
    }
}
