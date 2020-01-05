<?php

namespace devfym\IntelliPHP\Data;

use devfym\IntelliPHP\Math\StatisticInterface;

class DataFrame implements StatisticInterface
{
    /**
     * @var array
     * List of Column names.
     */
    private $columns = [];

    /**
     * @var int
     * Number of Sample.
     */
    private $index = 0;

    /**
     * DataFrame constructor.
     */
    public function __construct()
    {
        //
    }

    /**
     * @param array $arr
     * @return array
     * Transpose array.
     */
    public function transpose($arr = []) : array
    {
        $columns = array_keys($arr[0]);

        $arr = array_map(null, ...$arr);

        foreach($columns as $index => $column) {
            $arr[$column] = $arr[$index];
            unset($arr[$index]);
        }

        return $arr;
    }

    /**
     * @param array $arr
     * @param bool $transpose
     * Store given array-formatted data into series.
     */
    public function readArray($arr = [], $transpose = false) : void
    {

        if ($transpose == true) {
            $arr = $this->transpose($arr);
        }

        // Set Columns
        $this->columns = array_keys($arr);

        // Set Index
        $this->index = count($arr[$this->columns[0]]);

        // Create Series instance for each column.
        foreach ($this->columns as $column) {
            $this->{$column} = new Series();
            $this->{$column}->setSample($arr[$column]);
        }
    }

    /**
     * @return array
     * Get list of column names.
     */
    public function getColumns() : array
    {
        return $this->columns;
    }

    /**
     * @return int
     * Get Number of Sample.
     */
    public function getIndex() : int
    {
        return $this->index;
    }

    /**
     * @param int $floatPoint
     * @return array
     * Get list of mean value in DataFrame.
     */
    public function mean($floatPoint = 1) : array
    {
        // Initialize mean.
        $mean = [];

        foreach ($this->columns as $column) {
            if ($this->{$column}->dataType() == 'Numeric') {
                $mean[$column] = $this->{$column}->mean($floatPoint);
            }
        }

        return $mean;
    }

    /**
     * @param int $floatPoint
     * @return array
     * Get list of max value in DataFrame.
     */
    public function max($floatPoint = 2) : array
    {
        // Initialize max.
        $max = [];

        foreach ($this->columns as $column) {
            if ($this->{$column}->dataType() == 'Numeric') {
                $max[$column] = $this->{$column}->max($floatPoint);
            }
        }

        return $max;
    }

    /**
     * @param int $floatPoint
     * @return array
     * Get list of min value in DataFrame.
     */
    public function min($floatPoint = 2) : array
    {
        // Initialize min.
        $min = [];

        foreach ($this->columns as $column) {
            if ($this->{$column}->dataType() == 'Numeric') {
                $min[$column] = $this->{$column}->min($floatPoint);
            }
        }

        return $min;
    }

    /**
     * @param int $Q
     * @param int $floatPoint
     * @return array
     * Get list of Q-th quartile value in DataFrame.
     */
    public function quartile($Q = 1, $floatPoint = 2) : array
    {
        // Initialize quartile.
        $quartile = [];

        foreach ($this->columns as $column) {
            if ($this->{$column}->dataType() == 'Numeric') {
                $quartile[$column] = $this->{$column}->quartile($Q, $floatPoint);
            }
        }

        return $quartile;
    }

    /**
     * @param int $floatPoint
     * @return array
     * Get list of 2nd Quartile value in DataFrame.
     */
    public function median($floatPoint = 2) : array
    {
        return $this->quartile(2, $floatPoint);
    }

    /**
     * @param int $floatPoint
     * @return array
     * Get list of Variance in DataFrame.
     */
    public function variance($floatPoint = 4) : array
    {
        // Initialize quartile.
        $variance = [];

        foreach ($this->columns as $column) {
            if ($this->{$column}->dataType() == 'Numeric') {
                $variance[$column] = $this->{$column}->variance($floatPoint);
            }
        }

        return $variance;
    }

    /**
     * @param int $floatPoint
     * @return array
     * Get list of Standard Deviation in DataFrame.
     */
    public function std($floatPoint = 2) : array
    {
        // Initialize quartile.
        $std = [];

        foreach ($this->columns as $column) {
            if ($this->{$column}->dataType() == 'Numeric') {
                $std[$column] = $this->{$column}->std($floatPoint);
            }
        }

        return $std;
    }

    /**
     * @param $xColumn
     * @param $yColumn
     * @return float
     * Get Pearson's Correlation Coefficient.
     */
    public function pearsonCorrelation($xColumn, $yColumn) : float
    {
        $n = $this->getIndex();

        $x = 0; $y = 0; $xy = 0; $x2 = 0; $y2 = 0;

        for ($i = 0; $i < $n; $i++) {

            $cx = $this->{$xColumn}->get($i);
            $cy = $this->{$yColumn}->get($i);

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
     * @return array
     * Get List of Object in Class.
     */
    public function getObjectVariables() : array
    {
        return get_object_vars($this);
    }
}
