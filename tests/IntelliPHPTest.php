<?php

namespace devfym\Tests;

use devfym\IntelliPHP\IntelliPHP;
use devfym\IntelliPHP\Regression\LinearRegression;
use PHPUnit\Framework\TestCase;

class IntelliPHPTest extends TestCase
{
    public function testExample() : void
    {
        $fun = new IntelliPHP();
        $this->assertEquals('This is a Test.', $fun->test());

        $linear = new LinearRegression();

        $linearTest1 = [[1, 2, 3, 4, 5], [1, 2, 3, 4, 5]];
        $linearTest2 = [[2, 4, 6, 8, 10], [1, 2, 3, 4, 5]];

        $linear->setTrain($linearTest1[0], $linearTest1[1]);
        $linear->model();

        $this->assertEquals(100, $linear->predict(100));

        $linear->setTrain($linearTest2[0], $linearTest2[1]);
        $linear->model();

        $this->assertEquals(25, $linear->predict(50));
    }
}
