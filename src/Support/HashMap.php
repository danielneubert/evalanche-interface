<?php

namespace Neubert\EvalancheInterface\Support;

use \Scn\EvalancheSoapStruct\Struct\Generic\HashMap as HashMapArray;
use \Scn\EvalancheSoapStruct\Struct\Generic\HashMapItem;

class HashMap
{
    // Documentation Missing
    public static function compose(array $values)
    {
        $hashMap = [];

        foreach ($values as $name => $value) {
            $name = strtoupper($name);

            if (is_array($value)) {
                $value = join('|', $value);
            }

            $hashMap[] = new HashMapItem($name, $value);
        }

        return new HashMapArray($hashMap);
    }

    // Documentation Missing
    public static function decompose($input)
    {
        if (is_array($input)) {
            return array_map(function ($single) {
                return static::convert($single);
            }, $input);
        }

        $items = [];

        foreach (($input->getItems() ?? []) as $item) {
            $items[$item->getKey()] = $item->getValue();
        }

        return $items;
    }
}
