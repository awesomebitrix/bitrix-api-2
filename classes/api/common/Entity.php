<?php
/**
 * Created by PhpStorm.
 * User: sgavka
 * Date: 27.01.17
 * Time: 17:02
 */

namespace AlterEgo\BitrixAPI\classes\api\common;

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

    protected function call($function, $args)
    {
        $reflect = new ReflectionClass($this);


        $namespaceArray = explode('\\', $reflect->getName());
        $apiKey = array_search('api', $namespaceArray);
        $namespaceArray[++$apiKey] = $this->client->getType();
        $namespace = implode('\\', $namespaceArray);

        $reflectionMethod = new ReflectionMethod($namespace, $function);

        $entity = new $namespace($this->client);

        return $reflectionMethod->invokeArgs($entity, $args);
    }
}
