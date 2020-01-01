<?php

namespace devfym\IntelliPHP\Math;

interface StatisticInterface
{
    /**
     * @param int $floatPoint
     * @return mixed
     * Compute mean value of data.
     */
    public function mean($floatPoint = 2);

    /**
     * @param int $floatPoint
     * @return mixed
     * Compute max value of data.
     */
    public function max($floatPoint = 2);

    /**
     * @param int $floatPoint
     * @return mixed
     * Compute min value of data.
     */
    public function min($floatPoint = 2);

    /**
     * @param int $Q
     * @param int $floatPoint
     * @return mixed
     * Compute Q-th quartile of data.
     */
    public function quartile($Q = 0, $floatPoint = 2);

    /**
     * @param int $floatPoint
     * @return mixed
     * Compute median value of data.
     */
    public function median($floatPoint = 2);

    /**
     * @param int $floatPoint
     * @return mixed
     * Compute variance of data.
     */
    public function variance($floatPoint = 4);

    /**
     * @param int $floatPoint
     * @return mixed
     * Compute Standard Deviation of data.
     */
    public function std($floatPoint = 2);
}