<?php

namespace Neubert\EvalancheInterface\Support;

use \Scn\EvalancheSoapStruct\Struct\Generic\HashMap as HashMapArray;
use \Scn\EvalancheSoapStruct\Struct\Generic\HashMapItem;

class HashMap
{
    // Documentation Missing
    public static function parse(array $values)
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
}
