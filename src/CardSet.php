<?php

namespace Domin8or;

use Domin8or\Exceptions\InvalidCardSetException;

abstract class CardSet
{
    /**
     * @var Card[]
     */
    public const Cards = [];

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

    /**
     * @return Card[][]
     * @throws InvalidCardSetException
     */
    public static function getCards(): array
    {
        if (10 !== ($count = \count(static::Cards))) {
            $name = self::getName();
            throw new InvalidCardSetException("The card set {$name} has {$count} cards. Should have 10.");
        }

        $cards = [];

        foreach (static::Cards as $card_class) {
            $card_name = $card_class::getName();
            $cards[$card_name] = [];
            for ($i = 0; $i < $card_class::getCardCount(); $i++) {
                $cards[$card_name][] = new $card_class;
            }
        }

        return $cards;
    }

    /**
     * @return string[]
     */
    public static function getSetList(): array
    {
        $list = [];
        $dir = opendir(__DIR__.'/CardSet');
        while ($file = readdir($dir)) {
            if ($file[0] === '.') {
                continue;
            }
            /** @var CardSet $class_name */
            $class_name = __NAMESPACE__.'\CardSet\\'.strstr($file, '.', true);
            $list[] = $class_name::getName();
        }
        return $list;
    }
}