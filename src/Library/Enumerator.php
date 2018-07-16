<?php

namespace Domin8or\Library;

abstract class Enumerator
{
    /**
     * @var string
     */
    private $value;

    /**
     * Enumerator constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return Enumerator
     */
    public static function __callStatic(string $name, array $arguments = [])
    {
        return new static(\constant("static::$name"));
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value;
    }
}