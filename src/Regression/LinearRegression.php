<?php

namespace devfym\IntelliPHP\Regression;

use devfym\IntelliPHP\Data\DataFrame;

class LinearRegression
{
    /**
     * @var array
     */
    private $xColumn;

    /**
     * @var array
     */
    private $yColumn;

    /**
     * @var int
     */
    private $df;

    /**
     * @var float
     */
    private $slope;

    /**
     * @var float
     */
    private $intercept;

    /**
     * @var String
     */
    private $metric;

    /**
     * LinearRegression constructor.
     */
    public function __construct()
    {
        $this->xColumn = '';
        $this->yColumn = '';
        $this->df = new DataFrame();
        $this->slope = 0;
        $this->intercept = 0;
    }

    /**
     * @param DataFrame $df
     */
    public function setTrain(DataFrame $df) : void
    {
        $this->df = $df;
    }

    /**
     * @param string $xColumn
     * @param string $yColumn
     * @param string $metric
     */
    public function model($xColumn = '', $yColumn = '', $metric = '') : void
    {
        $this->xColumn = $xColumn;
        $this->yColumn = $yColumn;

        $mx = $this->df->{$xColumn}->mean();
        $my = $this->df->{$yColumn}->mean();

        $this->slope = $my / $mx;

        $this->intercept = $my - ($mx * $this->slope);

        $this->metric = $metric;
    }

    /**
     * @param array $x
     * @return array
     */
    public function predict($x = []) : array
    {
        $y = [];

        foreach ($x as $p) {
            array_push($y, round(($p * $this->slope) + $this->intercept, 2));
        }

        return $y;
    }

    /**
     * @param $y_train
     * @param $y_test
     * @return float
     */
    public function validate($y_train, $y_test) : float
    {
        $n = count($y_train);
        $total_diff = 0;

        if ($this->metric == 'mean_squared_error') {
            for ($i = 0; $i < $n; $i++) {
                $total_diff += $y_test[$i] - $y_train[$i];
            }
            $total_diff /= $n;
        }

        return round($total_diff, 4);
    }

    public function saveModel() : string
    {
        $model = [
            'type' => 'LinearRegression',
            'xColumn' => $this->xColumn,
            'yColumn' => $this->yColumn,
            'slope' => $this->slope,
            'intercept' => $this->intercept,
            'metric' => $this->metric
        ];

        return json_encode($model);
    }

    public function loadModel($model = '') : void
    {
        $model = json_decode($model);

        $this->xColumn = $model->xColumn;
        $this->yColumn = $model->yColumn;
        $this->slope = $model->slope;
        $this->intercept = $model->intercept;
        $this->metric = $model->metric;
    }
}
