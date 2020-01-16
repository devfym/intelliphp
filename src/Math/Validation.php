<?php

namespace devfym\IntelliPHP\Math;

class Validation
{
    /**
     * @param array $expected
     * @param array $actual
     * @return float
     */
    public static function MeanSquaredError(array $expected, array $actual) : float
    {
        $n = count($actual);
        $total_diff = 0;

        for ($i = 0; $i < $n; $i++) {
            $total_diff += $actual[$i] - $expected[$i];
        }

        $total_diff /= $n;

        return round($total_diff, 4);
    }

    /**
     * @param array $expected
     * @param array $actual
     * @return float
     */
    public static function RootMeanSquaredError(array $expected, array $actual) : float
    {
        return round(sqrt(abs(self::MeanSquaredError($expected, $actual))), 4);
    }
}