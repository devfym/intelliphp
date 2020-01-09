# IntelliPHP
![PHP from Packagist](https://img.shields.io/packagist/php-v/devfym/intelliphp)
[![Latest Stable Version](https://poser.pugx.org/devfym/intelliphp/v/stable)](https://packagist.org/packages/devfym/intelliphp)
[![Build Status](https://travis-ci.com/devfym/intelliphp.svg?branch=master)](https://travis-ci.com/devfym/intelliphp)
[![Coverage Status](https://coveralls.io/repos/github/devfym/intelliphp/badge.svg?branch=master)](https://coveralls.io/github/devfym/intelliphp?branch=master)
[![Documentation Status](https://readthedocs.org/projects/intelliphp/badge/?version=latest)](https://intelliphp.readthedocs.io/en/latest/?badge=latest)
[![Total Downloads](https://poser.pugx.org/devfym/intelliphp/downloads)](https://packagist.org/packages/devfym/intelliphp)
[![License](https://poser.pugx.org/devfym/intelliphp/license)](https://packagist.org/packages/devfym/intelliphp)

Composer Library for Machine Learning.

## Requirements

Currently it requires PHP Version >= 7.2

## How to install package

```composer require devfym/intelliphp```

## Features

- Data
    - [DataFrame](Data/DataFrame.md)
    - [Series](Data/Series.md)
- Math (method in DataFrame / Series)
    - Min, Max, Mean, Median
    - Standard Deviation
    - Variance
    - Quartile
- Statistic
    - Correlation
        - Pearson Correlation
        - Spearman Rank Correlation
        - Kendall Rank Correlation
    - Differences
        - F Test
- Regression
    - [Linear Regression](Regression/LinearRegression.md)

## Examples

#### DataFrame

```php
// Call autoload to import Composer packages
require_once __DIR__ . '/vendor/autoload.php';

// Import DataFrame
use devfym\Data\DataFrame;

// Create new instance
$df = new DataFrame();

// Create sample array-formatted data
$data = [
    'name' => ['aaron','bambi','celine','dennise'],
    'age'  => [12, 14, 16, 18]
];

// set data into DataFrame
$df->readArray($data);

// Get Columns
$df->getColumns();

// Get Index
$df->getIndex();

// Get array of Name
$df->name->all();

// Get array of Age
$df->age->all();

// Get Mean of Age
$df->age->mean();

```

#### Linear Regression

```php
// Call autoload to import Composer packages
require_once __DIR__ . '/vendor/autoload.php';

// Import LinearRegression
use devfym\Regression\LinearRegression;

// Create new instance 
$linear = new LinearRegression();

// Create Train Data
$x_train = [2, 4, 6, 8, 10];
$y_train = [1, 3, 5, 7, 9];

// Set Train Data into instance via setTrain(@array predictors, @array outcomes) method. 
$linear->setTrain($x_train, $y_train);

// Generate LinearRegression Model.
$linear->model();

// Predict Value by passing Predictor via predict(@float predictor) method.
$linear->predict(7);

// it will return a value of 6.
```

## License

MIT License

Copyright (c) 2020 IntelliPHP

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

