<?php

namespace devfym\IntelliPHP\Regression;

class LinearRegression
{
    private $x;
    private $y;
    private $n;
    private $m;
    private $c;

    public function __construct()
    {
        $this->x = [];
        $this->y = [];
        $this->n = 0;
        $this->m = 0;
        $this->c = 0;
    }

    private function getMean($l = []) : float
    {
        $k = count($l);
        $t = 0;

        for ($i = 0; $i < $k; $i++) {
            $t += $l[$i];
        }

        return $t / $k;
    }

    public function setTrain($x = [], $y = []) : void
    {
        $this->n = count($x);
        $this->x = $x;
        $this->y = $y;
    }

    public function model() : void
    {
        $mx = $this->getMean($this->x);
        $my = $this->getMean($this->y);

        $this->m = $my / $mx;
        $this->c = $my - ($mx * $this->m);
    }

    public function getSlope() : float
    {
        return round($this->m, 4);
    }

    public function getIntercept() : float
    {
        return round($this->c, 4);
    }

    public function predict($p = 0) : float
    {
        return round(($p * $this->m) + $this->c, 2);
    }

    public function validate($validation_type, $y_train, $y_test) : float
    {
        $n = count($y_train);
        $total_diff = 0;

        if ($validation_type == 'mean_squared_error') {
            for ($i = 0; $i < $n; $i++) {
                $total_diff += $y_test[$i] - $y_train[$i];
            }
            $total_diff /= $n;
        }

        return $total_diff;
    }
}
