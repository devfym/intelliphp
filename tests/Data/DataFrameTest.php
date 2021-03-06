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
            'name'      => ['aaron','bambi','celine','dennise', 'edwin'],
            'age'       => [12, 14, 16, 18, 20],
            'height_cm' => [150, 168, 172, 178, 180],
            'weight_kg' => [36, 40, 56, 60, 78]
        ];

        //DataFrameにデータを追加
        $df->readArray($data);

        //カラム名だけ取得
        $this->assertEquals(['name', 'age', 'height_cm', 'weight_kg'], $df->getColumns());

        //Numericカラム名だけ取得
        $this->assertEquals(['age', 'height_cm', 'weight_kg'], $df->getNumericColumns());

        //データのindexを取得
        $this->assertEquals(5, $df->getIndex());

        //Nameのseriesを取得
        $this->assertEquals(['aaron','bambi','celine','dennise', 'edwin'], $df->name->all());

        //Ageの平均値を取得
        $this->assertEquals(16, $df->age->mean());

        //Ageの最大値を取得
        $this->assertEquals(20, $df->age->max());

        //Ageの最小値を取得
        $this->assertEquals(12, $df->age->min());

        //DataFrameにあるすべての平均値を取得
        $this->assertEquals(['age' => 16, 'height_cm' => 169.6, 'weight_kg' => 54.0], $df->mean());

        //DataFrameにあるすべての最大値を取得
        $this->assertEquals(['age' => 20, 'height_cm' => 180, 'weight_kg' => 78], $df->max());

        //DataFrameにあるすべての最小値を取得
        $this->assertEquals(['age' => 12, 'height_cm' => 150, 'weight_kg' => 36], $df->min());

        //Get name within index of 1 - 3
        $this->assertEquals(['bambi','celine','dennise'], $df->name->withinIndexOf(1,3));

        //Get 2nd Quartile of age
        $this->assertEquals(16, $df->age->quartile(2));

        //Get List of 2nd Quartile
        $this->assertEquals(['age' => 16, 'height_cm' => 172, 'weight_kg' => 56], $df->quartile(2));

        //Get Median of Age
        $this->assertEquals(16, $df->age->median());

        //Get List of Median
        $this->assertEquals(['age' => 16, 'height_cm' => 172, 'weight_kg' => 56], $df->median());

        //Get Variance of Age
        $this->assertEquals(8, $df->age->variance());

        //Get List of Variance
        $this->assertEquals(['age' => 8, 'height_cm' => 114.24, 'weight_kg' => 227.2], $df->variance());

        //Get Standard Deviation of Age
        $this->assertEquals(2.83, $df->age->std());

        //Get List of Standard Deviation
        $this->assertEquals(['age' => 2.83, 'height_cm' => 10.69, 'weight_kg' => 15.07], $df->std());

        //Test Transpose data in DataFrame

        $data2 = [
            ['a' => 1, 'b' => 2, 'c' => 9],
            ['a' => 4, 'b' => 5, 'c' => 6],
            ['a' => 7, 'b' => 8, 'c' => 3]
        ];

        $df2 = new DataFrame();

        $df2->readArray($data2, true);

        $this->assertEquals(['a','b','c'], $df2->getColumns());
    }
}

