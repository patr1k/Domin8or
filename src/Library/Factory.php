<?php

namespace Domin8or\Library;

class Factory
{
    /**
     * @var callable[]
     */
    protected static $factories = [];

    /**
     * @var \stdClass[]
     */
    protected static $services  = [];

    /**
     * @param string $serviceName
     * @param callable|object $factory
     */
    public static function register(string $serviceName, $factory): void
    {
        if (\is_callable($factory)) {
            self::$factories[$serviceName] = $factory;
        } elseif (\is_object($factory)) {
            self::$services[$serviceName] = $factory;
        }
    }

    /**
     * @param string $serviceName
     * @return null|\stdClass
     */
    public static function get(string $serviceName)
    {
        if (array_key_exists($serviceName, self::$services)) {
            return self::$services[$serviceName];
        }

        if (array_key_exists($serviceName, self::$factories)) {
            self::$services[$serviceName] = self::$factories[$serviceName]();
            return self::$services[$serviceName];
        }

        return null;
    }
}