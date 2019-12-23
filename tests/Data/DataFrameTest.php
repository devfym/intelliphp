<?php

namespace devfym\Tests\Data;

use devfym\IntelliPHP\Data\DataFrame;
use PHPUnit\Framework\TestCase;

class DataFrameTest extends TestCase
{
    public function testExample() : void
    {
        $df = new DataFrame();

        $data = [
          'name' => ['a', 'b', 'c', 'd'],
          'age'  => [12, 14, 16, 18]
        ];

        //データをセット
        $df->readArray($data);

        //カラム名だけ取得
        $this->assertEquals(['name', 'age'], $df->getColumns());

        //データのindexを取得
        $this->assertEquals(4, $df->getIndex());

        //Nameのseriesを取得
        $this->assertEquals(['a', 'b', 'c', 'd'], $df->name->getList());

        //Ageの平均値を取得
        $this->assertEquals(15, $df->age->mean());

        //print_r($df->getObjectVariables());
    }
}