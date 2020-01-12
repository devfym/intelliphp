<?php

namespace devfym\Tests\Regression;

use devfym\IntelliPHP\Data\DataFrame;
use devfym\IntelliPHP\Regression\LinearRegression;
use PHPUnit\Framework\TestCase;
use SebastianBergmann\Diff\Line;

class LinearRegressionTest extends TestCase
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
     * @var string
     */
    protected $model;

    /**
     * LinearRegressionTest constructor.
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

    public function testExample() : void
    {
        $linear = new LinearRegression();

        $linear->setTrain($this->df);

        $linear->model('height_cm', 'weight_kg', 'mean_squared_error');

        $y_test = $linear->predict($this->data['height_cm']);

        $this->assertEquals(-0.002, $linear->validate($this->data['weight_kg'], $y_test));

        $linear->saveModel();
        /*
         * @return string
         * "type":"LinearRegression","xColumn":"height_cm","yColumn":"weight_kg","slope":0.35365853658536583,"intercept":0,"metric":"mean_squared_error"
         *
         */

    }

    public function testLoadModel() : void
    {
        $linear = new LinearRegression();

        $linear->setTrain($this->df);

        $model = '{"type":"LinearRegression","xColumn":"height_cm","yColumn":"weight_kg","slope":0.35365853658536583,"intercept":0,"metric":"mean_squared_error"}';

        $linear->loadModel($model);

        $y_test = $linear->predict($this->data['height_cm']);

        $this->assertEquals(-0.002, $linear->validate($this->data['weight_kg'], $y_test));
    }

}
