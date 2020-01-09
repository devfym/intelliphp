<?php

namespace devfym\Tests\Data;

use devfym\IntelliPHP\Data\Series;
use PHPUnit\Framework\TestCase;

class SeriesTest extends TestCase
{

    /**
     * Sample Data
     */
    protected $data = [
        'name'      => ['aaron', 'bambi', 'celine', 'dennise', 'edwin'],
        'height_cm' => [150, 168, 172, 178, 180],
        'weight_kg' => [36, NULL, 56, 60, 78],
        'location'  => ['makati', 'manila', NULL, 'pasay', 'pasig']
    ];


    /**
     * Test: Data type is numeric.
     */
    public function testNumericSeries() : void
    {
        // Create new instance.
        $series = new Series();

        // Set Sample Data.
        $series->setSample($this->data['height_cm']);

        // Count number of NULL values in Series.
        $this->assertEquals(0, $series->nullCount());

        // Return Series data type in string format.
        $this->assertEquals('Numeric', $series->dataType());

        // Return mean value in Series.
        $this->assertEquals(169.6, $series->mean());

        // Return max value in Series.
        $this->assertEquals(180, $series->max());

        // Return min value in Series.
        $this->assertEquals(150, $series->min());

        // Return 1st quartile of Series.
        $this->assertEquals(150, $series->quartile(1));

        // Return median (2nd quartile) of Series.
        $this->assertEquals(172, $series->median());

        // Return variance of Series.
        $this->assertEquals(114.24, $series->variance());

        // Return Standard deviation of Series.
        $this->assertEquals(10.69, $series->std());

        // Return all data in Series.
        $this->assertEquals($this->data['height_cm'], $series->all());

        // Return data within indices.
        $this->assertEquals([168, 172, 178], $series->withinIndexOf(1, 3));

        // Return single data in Series.
        $this->assertEquals(172, $series->get(2));
    }

    /**
     * Test : Data type is String.
     */
    public function testStringSeries() : void
    {
        // Create new instance.
        $series = new Series();

        // Set Sample Data.
        $series->setSample($this->data['name']);

        // Count number of NULL values in Series.
        $this->assertEquals(0, $series->nullCount());

        // Return Series data type in string format.
        $this->assertEquals('Object', $series->dataType());

        // Return mean value in Series.
        $this->assertEquals(0, $series->mean());

        // Return max value in Series.
        $this->assertEquals(0, $series->max());

        // Return min value in Series.
        $this->assertEquals(0, $series->min());

        // Return 1st quartile of Series.
        $this->assertEquals(0, $series->quartile(1));

        // Return median (2nd quartile) of Series.
        $this->assertEquals(0, $series->median());

        // Return variance of Series.
        $this->assertEquals(0, $series->variance());

        // Return Standard deviation of Series.
        $this->assertEquals(0, $series->std());

        // Return all data in Series.
        $this->assertEquals($this->data['name'], $series->all());

        // Return data within indices.
        $this->assertEquals(['bambi', 'celine', 'dennise'], $series->withinIndexOf(1, 3));

        // Return single data in Series.
        $this->assertEquals('celine', $series->get(2));
    }

    /**
     * Test : Data type is numeric with NULL value.
     */
    public function testNumericNullSeries() : void
    {
        // Create new instance.
        $series = new Series();

        // Set Sample Data.
        $series->setSample($this->data['weight_kg']);

        // Count number of NULL values in Series.
        $this->assertEquals(1, $series->nullCount());

        // Return Series data type in string format.
        $this->assertEquals('Numeric', $series->dataType());

        // Return mean value in Series.
        $this->assertEquals(57.5, $series->mean());

        // Return max value in Series.
        $this->assertEquals(78, $series->max());

        // Return min value in Series.
        $this->assertEquals(36, $series->min());

        // Return 1st quartile of Series.
        $this->assertEquals(36, $series->quartile(1));

        // Return median (2nd quartile) of Series.
        $this->assertEquals(56, $series->median());

        // Return variance of Series.
        $this->assertEquals(222.75, $series->variance());

        // Return Standard deviation of Series.
        $this->assertEquals(14.92, $series->std());

        // Return all data in Series.
        $this->assertEquals($this->data['weight_kg'], $series->all());

        // Return data within indices.
        $this->assertEquals([NULL, 56, 60], $series->withinIndexOf(1, 3));

        // Return single data in Series.
        $this->assertEquals(56, $series->get(2));
    }

    /**
     * Test : Data type is String with NULL value.
     */
    public function testStringNullSeries() : void
    {
        // Create new instance.
        $series = new Series();

        // Set Sample Data.
        $series->setSample($this->data['location']);

        // Count number of NULL values in Series.
        $this->assertEquals(1, $series->nullCount());

        // Return Series data type in string format.
        $this->assertEquals('Object', $series->dataType());

        // Return mean value in Series.
        $this->assertEquals(0, $series->mean());

        // Return max value in Series.
        $this->assertEquals(0, $series->max());

        // Return min value in Series.
        $this->assertEquals(0, $series->min());

        // Return 1st quartile of Series.
        $this->assertEquals(0, $series->quartile(1));

        // Return median (2nd quartile) of Series.
        $this->assertEquals(0, $series->median());

        // Return variance of Series.
        $this->assertEquals(0, $series->variance());

        // Return Standard deviation of Series.
        $this->assertEquals(0, $series->std());

        // Return all data in Series.
        $this->assertEquals($this->data['location'], $series->all());

        // Return data within indices.
        $this->assertEquals(['manila', NULL, 'pasay'], $series->withinIndexOf(1, 3));

        // Return single data in Series.
        $this->assertEquals(NULL, $series->get(2));
    }
}