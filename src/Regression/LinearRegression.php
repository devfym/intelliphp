<?php

namespace devfym\IntelliPHP\Regression;

class LinearRegression
{
    /**
     * @var array
     */
    private $predictors;

    /**
     * @var array
     */
    private $outcomes;

    /**
     * @var int
     */
    private $sample_size;

    /**
     * @var float
     */
    private $slope;

    /**
     * @var float
     */
    private $intercept;

    /**
     * LinearRegression constructor.
     */
    public function __construct()
    {
        $this->predictors = [];
        $this->outcomes = [];
        $this->sample_size = 0;
        $this->slope = 0;
        $this->intercept = 0;
    }

    private function getMean($list = []) : float
    {
        $mean = (array_sum($list) / count($list));

        return round($mean, 4);
    }

    public function setTrain($predictors = [], $outcomes = []) : void
    {
        $this->sample_size = count($predictors);
        $this->predictors = $predictors;
        $this->outcomes = $outcomes;
    }

    public function model() : void
    {
        $mx = $this->getMean($this->predictors);
        $my = $this->getMean($this->outcomes);

        $this->slope = $my / $mx;
        $this->intercept = $my - ($mx * $this->slope);
    }

    public function getSlope() : float
    {
        return round($this->slope, 4);
    }

    public function getIntercept() : float
    {
        return round($this->intercept, 4);
    }

    public function predict($p = 0) : float
    {
        return round(($p * $this->slope) + $this->intercept, 2);
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
