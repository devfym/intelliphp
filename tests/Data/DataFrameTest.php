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
            'name'   => ['a', 'b', 'c', 'd'],
            'age'    => [12, 14, 16, 18],
            'height' => [168, 172, 178, 180],
        ];

        //DataFrameにデータを追加
        $df->readArray($data);

        //カラム名だけ取得
        $this->assertEquals(['name', 'age', 'height'], $df->getColumns());

        //データのindexを取得
        $this->assertEquals(4, $df->getIndex());

        //Nameのseriesを取得
        $this->assertEquals(['a', 'b', 'c', 'd'], $df->name->getSample());

        //Ageの平均値を取得
        $this->assertEquals(15, $df->age->mean());

        //Ageの最大値を取得
        $this->assertEquals(18, $df->age->max());

        //Ageの最小値を取得
        $this->assertEquals(12, $df->age->min());

        //DataFrameにあるすべての平均値を取得
        $this->assertEquals(['age' => 15, 'height' => 174.5], $df->mean());

        //DataFrameにあるすべての最大値を取得
        $this->assertEquals(['age' => 18, 'height' => 180], $df->max());

        //DataFrameにあるすべての最小値を取得
        $this->assertEquals(['age' => 12, 'height' => 168], $df->min());
    }
}
