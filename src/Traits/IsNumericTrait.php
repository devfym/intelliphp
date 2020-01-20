<?php

namespace devfym\IntelliPHP\Traits;

trait IsNumericTrait
{
    function is_numeric($inputs)
    {
        $DataType = 'Numeric';

        foreach ($inputs as $i) {
            if (!is_numeric($i)) {
                if (!is_null($i)) {
                    $DataType = 'Object';
                }
            }
        }

        return $DataType;
    }
}