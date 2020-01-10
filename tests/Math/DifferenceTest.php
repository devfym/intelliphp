<?php

namespace devfym\Tests\Math;

use devfym\IntelliPHP\Data\DataFrame;
use devfym\IntelliPHP\Math\Difference;
use PHPUnit\Framework\TestCase;

class DifferenceTest extends  TestCase
{
    /**
     * Sample Data
     */
    protected $data = [
        'student_id' => [1, 2, 3, 4, 5],
        'name'       => ['aaron', 'bambi', 'celine', 'dennise', 'edwin'],
        'age'       => [14.5, 12.2, 15, 14, 12.2],
        'height_cm' => [162, 158, 162, 170, 168],
        'weight_kg' => [68, 58, 56, 56, 52],
        'gpa'       => [1.25, 4.0, 2.75, 4.0, 2.25]
    ];

    /**
     * @var DataFrame
     */
    protected $df;

    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->df = new DataFrame();

        $this->df->readArray($this->data);
    }

    /**
     * Test: F Test
     */
    public function testFTest()
    {
        $this->assertEquals( 0.6667, Difference::FTest($this->df,'height_cm', 'weight_kg'));

        $this->assertEquals( 0.6667, Difference::FTest($this->df,'weight_kg', 'height_cm'));
    }


}