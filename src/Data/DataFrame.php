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
     * Store given array-formatted data into series.
     */
    public function readArray($arr = []) : void
    {
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
     * @return array
     * Get List of Object in Class.
     */
    public function getObjectVariables() : array
    {
        return get_object_vars($this);
    }
}
