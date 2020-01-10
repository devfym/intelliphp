<?php

namespace devfym\Tests\Math;

use devfym\IntelliPHP\Data\DataFrame;
use devfym\IntelliPHP\Math\Correlation;
use PHPUnit\Framework\TestCase;

class CorrelationTest extends TestCase
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

    /**
     * CorrelationTest constructor.
     * @param null|string $name
     * @param array $data
     * @param string $dataName
     */
    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->df = new DataFrame();

        $this->df->readArray($this->data);
    }

    /**
     * Test: Pearson Correlation.
     */
    public function testPearson() : void
    {
        $expected_r = -0.4423;

        $this->assertEquals($expected_r, Correlation::pearson($this->df, 'height_cm', 'weight_kg'));

        $expected_r_array = [
            [1, -0.3384, 0.7746, -0.896, 0.2679],
            [-0.3384, 1, 0.0234, 0.4395, -0.3059],
            [0.7746, 0.0234, 1, -0.4423, 0.0432],
            [-0.896, 0.4395, -0.4423, 1, -0.5118],
            [0.2679, -0.3059, 0.0432, -0.5118, 1]
        ];

        $this->assertEquals($expected_r_array, Correlation::pearsonAll($this->df));
    }

    /**
     * Test: Spearman Rank Correlation.
     */
    public function testSpearman() : void
    {
        $expected_p = 0.2;

        $this->assertEquals($expected_p, Correlation::spearman($this->df, 'height_cm', 'weight_kg'));

        $expected_p_array = [
            [1, -0.15, 0.7, -0.5, 0.2],
            [-0.15, 1, 0.35, 0.55, 0.05],
            [0.7, 0.35, 1, 0.2, 0.4],
            [-0.5, 0.55, 0.2, 1, 0.2],
            [0.2, 0.05, 0.4, 0.2, 1]
        ];

        $this->assertEquals($expected_p_array, Correlation::spearmanAll($this->df));
    }

    /**
     * Test: Kendall Rank Correlation
     */
    public function testKendall() : void
    {
        $expected_t = 0.1;

        $this->assertEquals($expected_t, Correlation::kendall($this->df, 'gpa'));
    }
}