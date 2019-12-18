<?php

namespace devfym\Tests\Regression;

use devfym\IntelliPHP\Regression\LinearRegression;
use PHPUnit\Framework\TestCase;

class LinearRegressionTest extends TestCase
{
    public function testExample() : void
    {
        $linear = new LinearRegression();

        srand(2019);

        $x_train = [];
        $y_train = [];

        for ($i = 0; $i < 1000000; $i++) {
            $random_value = round(rand(0, 1000000) / rand(1, 10), 4);
            $x_train[$i] = $random_value;
            $y_train[$i] = round($random_value + (rand(1, 10) * rand(1, 5)), 4);
        }

        $linear->setTrain($x_train, $y_train);
        $linear->model();

        // Test Slope
        $this->assertEquals(1.0001, $linear->getSlope());

        // Test Intercept
        $this->assertEquals(0, $linear->getIntercept());

        // Test Error Rate
        for ($n = 0; $n < 100; $n++) {
            $y_predict = $linear->predict($x_train[$n]);
            $this->assertGreaterThan($y_train[$n] * 0.95, $y_predict);
            $this->assertLessThan($y_train[$n] * 1.05, $y_predict);
        }
    }
}
