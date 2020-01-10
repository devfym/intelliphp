<?php

namespace devfym\IntelliPHP\Math;

use devfym\IntelliPHP\Data\DataFrame;

class Correlation
{
    /**
     * @param $df
     * @param $xColumn
     * @param $yColumn
     * @return float
     * Get Pearson's Correlation Coefficient.
     */
    public static function pearson(DataFrame $df, $xColumn, $yColumn) : float
    {
        $n = $df->getIndex();
        $x = 0; $y = 0; $xy = 0; $x2 = 0; $y2 = 0;

        for ($i = 0; $i < $n; $i++) {

            $cx = $df->{$xColumn}->get($i);
            $cy = $df->{$yColumn}->get($i);

            $x += $cx;
            $y += $cy;

            $xy += $cx * $cy;

            $x2 += $cx * $cx;
            $y2 += $cy * $cy;

        }

        $r = (($n * $xy) - ($x * $y)) / sqrt((($n * $x2) - ($x * $x)) * (($n * $y2) - ($y * $y)));

        return round($r, 4);
    }

    /**
     * @param DataFrame $df
     * @param $xColumn
     * @param $yColumn
     * @return float
     */
    public static function spearman(DataFrame $df, $xColumn, $yColumn) : float
    {
        $xValue = $df->{$xColumn}->all();
        $yValue = $df->{$yColumn}->all();

        $xSort  = array_unique($xValue);
        $ySort  = array_unique($yValue);

        rsort($xSort);
        rsort($ySort);

        $xRank = [];
        $yRank = [];
        $diffRank = 0;

        for ($i = 0; $i < $df->getIndex(); $i++) {

            $xR = array_keys($xSort, $xValue[$i]);
            $yR = array_keys($ySort, $yValue[$i]);

            $xRank[$i] = $xR[0] + 1;
            $yRank[$i] = $yR[0] + 1;

            $diffRank += pow($xRank[$i] - $yRank[$i], 2);

        }

        $p = 1 - ((6 * $diffRank) / ($df->getIndex() * (($df->getIndex() * $df->getIndex()) - 1)));

        return round($p, 4);
    }

    /**
     * @param DataFrame $df
     * @param $xColumn
     * @return float
     */
    public static function kendall(DataFrame $df, $xColumn) : float
    {

        $concordant = [];
        $discordant = [];

        for ($i = 0; $i < $df->getIndex(); $i++) {

            $concordant_count = 0;
            $discordant_count = 0;

            for ($j = $i + 1; $j < $df->getIndex(); $j++) {

                if ($df->{$xColumn}->get($i) < $df->{$xColumn}->get($j)) {

                    $concordant_count++;

                }

                if ($df->{$xColumn}->get($i) > $df->{$xColumn}->get($j)) {

                    $discordant_count++;

                }
            }

            $concordant[$i] = $concordant_count;
            $discordant[$i] = $discordant_count;

        }

        $scon = array_sum($concordant);
        $sdis = array_sum($discordant);

        $t = ($scon - $sdis) / ($df->getIndex() * ($df->getIndex() - 1) / 2);

        return round($t, 4);
    }

    /**
     * @param DataFrame $df
     * @return array
     */
    public static function pearsonAll(DataFrame $df) : array
    {
        $arr = [];

        $columns = $df->getNumericColumns();

        $numeric_count = count($columns);

        for ($i = 0; $i < $numeric_count; $i++) {

            for ($j = 0; $j < $numeric_count; $j++) {

                $arr[$i][$j] = self::pearson($df, $columns[$i], $columns[$j]);

            }

        }

        return $arr;
    }

    /**
     * @param DataFrame $df
     * @return array
     */
    public static function spearmanAll(DataFrame $df) : array
    {
        $arr = [];

        $columns = $df->getNumericColumns();

        $numeric_count = count($columns);

        for ($i = 0; $i < $numeric_count; $i++) {

            for ($j = 0; $j < $numeric_count; $j++) {

                $arr[$i][$j] = self::spearman($df, $columns[$i], $columns[$j]);

            }

        }

        return $arr;
    }
}