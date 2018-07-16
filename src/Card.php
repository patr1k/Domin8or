<?php

namespace Domin8or;

abstract class Card
{
    /**
     * @return int
     */
    abstract public static function getCost(): int;

    /**
     * @return int
     */
    public static function getCardCount(): int
    {
        // Most of the cards have 10
        return 10;
    }

    /**
     * @return string
     */
    public static function getName(): string
    {
        $class_name = strrchr(static::class, '\\');
        $class_name = substr($class_name, 1);
        $class_len  = \strlen($class_name);
        $name = '';
        for ($i = 0; $i < $class_len; $i++) {
            $letter = $class_name[$i];
            if ($i && ctype_upper($letter)) {
                $name .= ' ';
            }
            $name .= $letter;
        }
        return $name;
    }
}