<?php

namespace Neubert\EvalancheInterface\Support;

use \Scn\EvalancheSoapStruct\Struct\Generic\HashMap as HashMapArray;
use \Scn\EvalancheSoapStruct\Struct\Generic\HashMapItem;

/**
 * @method static HashMapArray|array compose(array $values, bool $returnArray = false)
 * @method static array composeMultible(array $values)
 * @method static array decompose(array|HashMapItem $item)
 * @see Neubert\EvalancheInterface\Support\HashMap
 */
class HashMap
{
    /**
     * Returns a EvalancheSoapStruct conform hash map for a key-value array.
     *
     * @param  array    $values
     * @param  boolean  $returnArray
     * @return HashMapArray|array
     */
    public static function compose(array $values, bool $returnArray = false)
    {
        $hashMap = [];

        foreach ($values as $name => $value) {
            $name = strtoupper($name);

            if (is_array($value)) {
                $value = join('|', $value);
            }

            if ($returnArray) {
                $hashMap[$name] = $value;
            } else {
                $hashMap[] = new HashMapItem($name, $value);
            }
        }

        return $returnArray ? $hashMap : new HashMapArray($hashMap);
    }

    /**
     * Returns multible hash maps and all keys for mutltible key-value arrays.
     * @see Neubert\EvalancheInterface\Connectors\PoolConnector::updateProfiles (for massUpdate)
     *
     * @param  array  $values
     * @return array
     */
    public static function composeMultible(array $values): array
    {
        $data = [];
        $attributes = [];

        $data = array_map(function ($current) use (&$attributes) {
            $composed = static::compose($current, true);
            $attributes = array_merge($attributes, array_keys($composed));
            return array_values($composed);
        }, $values);

        return [$attributes, $data];
    }

    /**
     * Parsed a given hash map to an key-value array.
     *
     * @param  array|HashMapArray  $input
     * @return array
     */
    public static function decompose($input): array
    {
        if (is_array($input)) {
            return array_map(function ($single) {
                return static::decompose($single);
            }, $input);
        }

        $items = [];

        foreach (($input->getItems() ?? []) as $item) {
            $items[$item->getKey()] = $item->getValue();
        }

        return $items;
    }
}
