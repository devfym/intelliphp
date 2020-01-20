<?php

namespace devfym\Tests\Math;

use devfym\IntelliPHP\Math\Measurement;
use PHPUnit\Framework\TestCase;

class MeasurementTest extends TestCase
{
    protected $data = [
        'height_cm' => [168, 150, 172, 178, 180],
        'weight_kg' => [36, NULL, 56, 60, 78],
    ];

    public function testNumeric() : void
    {
        // Create new instance.
        $measure = new Measurement($this->data['height_cm']);

        // Return mean value in Series.
        $this->assertEquals(169.6, $measure->mean());

        // Return max value in Series.
        $this->assertEquals(180, $measure->max());

        // Return min value in Series.
        $this->assertEquals(150, $measure->min());

        // Return 1st quartile of Series.
        $this->assertEquals(150, $measure->quartile(1));

        // Return median (2nd quartile) of Series.
        $this->assertEquals(172, $measure->median());

        // Return variance of Series.
        $this->assertEquals(114.24, $measure->variance());

        // Return Standard deviation of Series.
        $this->assertEquals(10.6883, $measure->std());
    }

    public function testNull() : void
    {
        $measure = new Measurement($this->data['weight_kg']);

        $this->assertEquals(57.5, $measure->mean());

        $this->assertEquals(78, $measure->max());

        $this->assertEquals(36, $measure->min());

        $this->assertEquals(36, $measure->quartile(1));

        $this->assertEquals(56, $measure->median());

        $this->assertEquals(222.75, $measure->variance());

        $this->assertEquals(14.9248, $measure->std());
    }
}