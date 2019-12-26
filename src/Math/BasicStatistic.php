<?php

namespace devfym\IntelliPHP\Math;

class BasicStatistic
{
    /**
     * @var
     * Stores series of data in single array format.
     */
    protected $Sample;

    /**
     * @var
     * Stores total number of $Sample.
     */
    protected $SampleCount;

    /**
     * @var
     * Stores if $Sample data is numeric or string value.
     */
    protected $DataType;

    /**
     * BasicStatistics constructor.
     */
    public function __construct()
    {
        $this->Sample = [];
        $this->SampleCount = 0;
        $this->DataType = 'Object';
    }

    /**
     * @param array $Sample
     *                      Set $Sample value.
     */
    public function setSample($Sample = []) : void
    {
        $this->Sample = $Sample;
        $this->SampleCount = count($Sample);
        $this->DataType = $this->isNumeric();
    }

    /**
     * @return string
     *                Determine if $Sample data is 'Numeric' or 'Object' type.
     */
    public function isNumeric() : string
    {
        try {
            $DataType = 'Numeric';

            foreach ($this->Sample as $s) {
                if (!is_numeric($s)) {
                    $DataType = 'Object';
                }
            }

            return $DataType;
        } catch (\Throwable $e) {
            throw new $e();
        }
    }

    /**
     * @return string
     *                Get DataType of Series.
     */
    public function getDataType() : string
    {
        return $this->DataType;
    }

    /**
     * @return array
     *               Get $Sample value.
     */
    public function getSample() : array
    {
        return $this->Sample;
    }

    /**
     * @param int $FloatPoint
     *
     * @return float
     *               Compute mean value of $Sample.
     */
    public function mean($FloatPoint = 2) : float
    {
        try {
            return round(array_sum($this->Sample) / $this->SampleCount, $FloatPoint);
        } catch (\Throwable $e) {
            throw new $e();
        }
    }

    /**
     * @param int $FloatPoint
     *
     * @return float
     *               Determine max value in $Sample.
     */
    public function max($FloatPoint = 2) : float
    {
        try {
            // Initialize max value with 1st index of $Sample.
            $max = $this->Sample[0];

            for ($i = 1; $i < $this->SampleCount; $i++) {
                if ($this->Sample[$i] > $max) {
                    $max = $this->Sample[$i];
                }
            }

            return round($max, $FloatPoint);
        } catch (\Throwable $e) {
            throw new $e();
        }
    }

    /**
     * @param int $FloatPoint
     *
     * @return float
     *               Determine min value in $Sample.
     */
    public function min($FloatPoint = 2) : float
    {
        try {
            //Initialize min value with 1st index of $Sample.
            $min = $this->Sample[0];

            for ($i = 1; $i < $this->SampleCount; $i++) {
                if ($this->Sample[$i] < $min) {
                    $min = $this->Sample[$i];
                }
            }

            return round($min, $FloatPoint);
        } catch (\Throwable $e) {
            throw new $e();
        }
    }
}
