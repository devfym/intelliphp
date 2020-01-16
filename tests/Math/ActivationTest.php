<?php

namespace devfym\Tests\Math;

use devfym\IntelliPHP\Math\Activation;
use PHPUnit\Framework\TestCase;

class ActivationTest extends TestCase
{
    public function testReLU()
    {
        // When Input Value is less than 0
        $this->assertEquals(0, Activation::ReLU(-100));

        $this->assertEquals(0, Activation::ReLU(-1));

        $this->assertEquals(0, Activation::ReLU(-0.5));

        // When Input Value is 0
        $this->assertEquals(0, Activation::ReLU(0));

        // When Input value is greater than 0
        $this->assertEquals(0.5, Activation::ReLU(0.5));

        $this->assertEquals(1, Activation::ReLU(1));

        $this->assertEquals(100, Activation::ReLU(100));
    }

    public function testSigmoid()
    {
        $this->assertEquals( 0.2689, Activation::Sigmoid(-1.0));

        $this->assertEquals( 0.9933, Activation::Sigmoid(5.0));
    }

    public function testSoftmax()
    {
        $inputs = [-5, -1, -0.5, 0, 0.5, 1, 5];

        $softmax = Activation::Softmax($inputs);

        $softmax_round_4 = [];

        foreach($softmax as $s) {

            array_push($softmax_round_4, round($s, 4));

        }

        $this->assertEquals([0, 0.0024, 0.0039, 0.0065, 0.0107, 0.0176, 0.959], $softmax_round_4);

        $this->assertEquals(1, array_sum($softmax));
    }
}