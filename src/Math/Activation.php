<?php

namespace devfym\IntelliPHP\Math;

class Activation
{
    /**
     * @param float $input
     * @return float
     */
    public static function ReLU(float $input) : float
    {
        return max(0, $input);
    }

    /**
     * @param float $input
     * @return float
     */
    public static function Sigmoid(float $input) : float
    {
        return round(1 / (1 + exp(-$input)), 4);
    }

    /**
     * @param array $inputs
     * @return array
     */
    public static function Softmax(array $inputs) : array
    {
        $exp = array_map('exp', $inputs);

        $sum_exp = array_sum($exp);

        $y = [];

        foreach($exp as $e) {

            array_push($y,$e / $sum_exp);

        }

        return $y;
    }
}