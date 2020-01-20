<?php

namespace devfym\IntelliPHP\Math;

use devfym\IntelliPHP\Traits\IsNotNullTrait;

class Measurement
{
    protected $sample;

    protected $sum;

    protected $count;

    use IsNotNullTrait;

    public function __construct(array $inputs)
    {
        $this->sample = array_values(array_filter($inputs, array($this, 'is_not_null')));
        $this->sum = array_sum($this->sample);
        $this->count = count($this->sample);
    }

    final public function mean(int $decimal = 4) : float
    {
        return round($this->sum / $this->count, $decimal);
    }

    final public function max(int $decimal = 4) : float
    {
        $max = $this->sample[0];

        for ($i = 1; $i < $this->count; $i++) {
            $max = max($max, $this->sample[$i]);
        }

        return round($max, $decimal);
    }

    final public function min(int $decimal = 4) : float
    {
        $min = $this->sample[0];

        for ($i = 1; $i < $this->count; $i++) {
            $min = min($min, $this->sample[$i]);
        }

        return round($min, $decimal);
    }

    final public function quartile(int $Q, int $decimal = 4) : float
    {
        $sort_sample = $this->sample;
        sort($sort_sample);

        $quartile = ($Q / 4) * (($this->count) + 1);

        return round($sort_sample[$quartile - 1], $decimal);
    }

    final public function median(int $decimal = 4) : float
    {
        return $this->quartile(2, $decimal);
    }

    final public function variance(int $decimal = 4) : float
    {
        $mean = $this->mean(4);
        $total_s = 0;

        foreach ($this->sample as $s) {
            $total_s += pow(($s - $mean), 2);
        }

        $variance = $total_s / $this->count;

        return round($variance, $decimal);
    }

    final public function std(int $decimal = 4) : float
    {
        $std = sqrt($this->variance($decimal));

        return round($std, $decimal);
    }
}