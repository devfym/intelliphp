<?php

namespace devfym\IntelliPHP\Data;

class DataFrame
{
    /**
     * @var array
     * List of Column names.
     */

    private $columns;

    /**
     * @var int
     * Number of Sample.
     */

    private $index;

    /**
     * DataFrame constructor.
     */

    public function __construct()
    {
        $this->columns = [];
        $this->index = 0;
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
     * @return array
     * Get list of mean value in DataFrame.
     */

    public function mean($FloatPoint = 2) : array
    {
        // Initialize mean.
        $mean = [];

        foreach ($this->columns as $column) {
            if ($this->{$column}->getDataType() == 'Numeric') {
                $mean[$column] = $this->{$column}->mean($FloatPoint);
            }
        }

        return $mean;
    }

    /**
     * @param int $FloatPoint
     * @return array
     * Get list of max value in DataFrame.
     */

    public function max($FloatPoint = 2) : array
    {
        // Initialize max.
        $max = [];

        foreach ($this->columns as $column) {
            if ($this->{$column}->getDataType() == 'Numeric') {
                $max[$column] = $this->{$column}->max($FloatPoint);
            }
        }

        return $max;
    }

    /**
     * @param int $FloatPoint
     * @return array
     * Get list of min value in DataFrame.
     */

    public function min($FloatPoint = 2) : array
    {
        // Initialize min.
        $min = [];

        foreach ($this->columns as $column) {
            if ($this->{$column}->getDataType() == 'Numeric') {
                $min[$column] = $this->{$column}->min($FloatPoint);
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
