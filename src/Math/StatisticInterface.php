<?php

namespace devfym\IntelliPHP\Math;

interface StatisticInterface
{
    /**
     * @param int $floatPoint
     * Compute mean value of data.
     */
    public function mean($floatPoint = 2);

    /**
     * @param int $floatPoint
     * Compute max value of data.
     */
    public function max($floatPoint = 2);

    /**
     * @param int $floatPoint
     * Compute min value of data.
     */
    public function min($floatPoint = 2);
}