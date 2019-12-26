<?php

namespace devfym\IntelliPHP\Data;

interface DataManipulationInterface
{
    /**
     * @return array
     * Return all values in data.
     */
    public function all() : array;

    /**
     * @param int $from
     * @param int $to
     * @return array
     * Return all values in data within $from $to.
     */
    public function withinIndexOf($from = 0, $to = 1) : array;
}