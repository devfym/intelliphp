<?php

namespace devfym\IntelliPHP\Data;

use devfym\IntelliPHP\Math\StatisticInterface;

class Series implements StatisticInterface, DataManipulationInterface
{
    /**
     * @var array
     * Stores series of data in single array format.
     */
    protected $Sample = [];

    /**
     * @var int
     * Stores total number of $Sample.
     */
    protected $SampleCount = 0;

    /**
     * @var string
     * Stores if $Sample data is numeric or string value.
     */
    protected $DataType = 'Object';

    /**
     * @var int
     * Count number of NULL values in data.
     */
    protected $null_counter = 0;

    /**
     * BasicStatistics constructor.
     */
    public function __construct()
    {
        //
    }

    /**
     * @param array $Sample
     * Set $Sample value.
     */
    public function setSample($Sample = []) : void
    {
        $this->Sample = $Sample;

        $this->SampleCount = count($Sample);

        $this->null_counter = $this->nullCount();

        $this->DataType = $this->isNumeric();
    }

    public function nullCount() : int
    {
        $nullCount = 0;

        foreach ($this->Sample as $s) {
            if (is_null($s)) {
                $nullCount++;
            }
        }

        return $nullCount;
    }

    /**
     * @return string
     * Determine if $Sample data is 'Numeric' or 'Object' type.
     */
    public function isNumeric() : string
    {
        try {

            $DataType = 'Numeric';

            foreach ($this->Sample as $s) {
                if (!is_numeric($s)) {
                    if (!is_null($s)) {
                        $DataType = 'Object';
                    }
                }
            }

            return $DataType;

        } catch (\Throwable $e) {

            throw new $e();

        }
    }

    /**
     * @return string
     * Get DataType of Series.
     */
    public function dataType() : string
    {
        return $this->DataType;
    }

    /**
     * @param int $floatPoint
     * @return float
     * Compute mean value of $Sample.
     */
    public function mean($floatPoint = 2) : float
    {
        try {

            return round(array_sum($this->Sample) / ($this->SampleCount - $this->null_counter), $floatPoint);

        } catch (\Throwable $e) {

            throw new $e();

        }
    }

    /**
     * @param int $floatPoint
     * @return float
     * Determine max value in $Sample.
     */
    public function max($floatPoint = 2) : float
    {
        try {

            // Initialize max value with 1st index of $Sample.
            $max = $this->Sample[0];

            for ($i = 1; $i < $this->SampleCount; $i++) {
                if ($this->Sample[$i] > $max && !is_null($this->Sample[$i])) {
                    $max = $this->Sample[$i];
                }
            }

            return round($max, $floatPoint);

        } catch (\Throwable $e) {

            throw new $e();

        }
    }

    /**
     * @param int $floatPoint
     * @return float
     * Determine min value in $Sample.
     */
    public function min($floatPoint = 2) : float
    {
        try {

            //Initialize min value with 1st index of $Sample.
            $min = $this->Sample[0];

            for ($i = 1; $i < $this->SampleCount; $i++) {
                if ($this->Sample[$i] < $min && !is_null($this->Sample[$i])) {
                    $min = $this->Sample[$i];
                }
            }

            return round($min, $floatPoint);

        } catch (\Throwable $e) {

            throw new $e();

        }
    }

    /**
     * @param int $Q
     * @param int $floatPoint
     * @return float
     * Determine Q-th Quartile in $Sample.
     */
    public function quartile($Q = 1, $floatPoint = 2) : float
    {
        if ($this->dataType() == 'Object') {
            return 0;
        }

        try {

            //Sort Data into ascending order.
            $sorted_sample = $this->Sample;

            $sorted_sample = array_filter($sorted_sample);

            sort($sorted_sample);

            $quartile = ($Q / 4) * ((count($this->Sample) - $this->null_counter) + 1);

            return $sorted_sample[$quartile - 1];

        } catch (\Throwable $e) {

            throw new $e();

        }
    }

    /**
     * @param int $floatPoint
     * @return float
     * Determine 2nd Quartile in $sample.
     */
    public function median($floatPoint = 2) : float
    {
        try {

            return $this->quartile(2, $floatPoint);

        } catch (\Throwable $e) {

            throw new $e();

        }
    }

    /**
     * @param int $floatPoint
     * @return float
     * Determine Variance of $Sample.
     */
    public function variance($floatPoint = 4) : float
    {
        if ($this->dataType() == 'Object') {
            return 0;
        }

        try {

            $mean = $this->mean(4);
            $total_s = 0;

            foreach($this->Sample as $s) {
                if (!is_null($s)) {
                    $total_s += pow(($s - $mean), 2);
                }
            }

            $variance = $total_s / (count($this->Sample) - $this->null_counter);

            return round($variance, $floatPoint);


        } catch (\Throwable $e) {

            throw new $e;

        }
    }

    /**
     * @param int $floatPoint
     * @return float
     * Determine Standard Deviation of $Sample.
     */
    public function std($floatPoint = 2) : float
    {
        try {

            $std = sqrt($this->variance());

            return round($std, $floatPoint);

        } catch (\Throwable $e) {

            throw new $e();

        }
    }

    /**
     * @return array
     * Get $Sample value.
     */
    public function all() : array
    {
        return $this->Sample;
    }

    /**
     * @param int $from
     * @param int $to
     * @return array
     * Return all values in data within index $from $to.
     */
    public function withinIndexOf($from = 0, $to = 1) : array
    {
        try {

            // Initialize sample.
            $Sample = [];

            for ($i = $from; $i <= $to; $i++) {
                $Sample[] = $this->Sample[$i];
            }

            return $Sample;

        } catch (\Throwable $e) {

            throw new $e();

        }
    }

    public function get($index = 0)
    {
        return $this->Sample[$index];
    }
}
