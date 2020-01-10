<?php

namespace devfym\IntelliPHP\Math;

use devfym\IntelliPHP\Data\DataFrame;

class Difference
{
    /**
     * @param $df
     * @param $xColumn
     * @param $yColumn
     * @return float
     */
    public static function FTest(DataFrame $df, $xColumn, $yColumn) : float
    {
        $xVariance = $df->{$xColumn}->variance();
        $yVariance = $df->{$yColumn}->variance();

        if ($xVariance < $yVariance) {
            $f = $xVariance / $yVariance;
        } else {
            $f = $yVariance / $xVariance;
        }

        return round($f, 4);
    }
}