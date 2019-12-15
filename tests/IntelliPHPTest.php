<?php

namespace devfym\Tests;

use devfym\IntelliPHP\IntelliPHP;
use PHPUnit\Framework\TestCase;

class IntelliPHPTest extends TestCase
{
    public function testExample() : void
    {
        $fun = new IntelliPHP();
        $this->assertEquals('This is a Test.', $fun->test());
    }
}
