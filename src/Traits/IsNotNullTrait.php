<?php

namespace devfym\IntelliPHP\Traits;

trait IsNotNullTrait
{
    function is_not_null($value)
    {
        return !is_null($value);
    }
}