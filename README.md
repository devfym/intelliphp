# IntelliPHP
![PHP from Packagist](https://img.shields.io/packagist/php-v/devfym/intelliphp)
[![Latest Stable Version](https://poser.pugx.org/devfym/intelliphp/v/stable)](https://packagist.org/packages/devfym/intelliphp)
[![Latest Unstable Version](https://poser.pugx.org/devfym/intelliphp/v/unstable)](https://packagist.org/packages/devfym/intelliphp)
[![Build Status](https://travis-ci.com/devfym/intelliphp.svg?branch=master)](https://travis-ci.com/devfym/intelliphp)
[![StyleCI](https://github.styleci.io/repos/228102850/shield?branch=master)](https://github.styleci.io/repos/228102850)
[![CircleCI](https://circleci.com/gh/devfym/intelliphp/tree/master.svg?style=svg)](https://circleci.com/gh/devfym/intelliphp/tree/master)
[![Documentation Status](https://readthedocs.org/projects/intelliphp/badge/?version=master)](http://intelliphp.readthedocs.org/)
[![Total Downloads](https://poser.pugx.org/devfym/intelliphp/downloads)](https://packagist.org/packages/devfym/intelliphp)
[![License](https://poser.pugx.org/devfym/intelliphp/license)](https://packagist.org/packages/devfym/intelliphp)

Composer Library for Machine Learning.

## Requirements

Currently it requires PHP Version >= 7.2

## How to install package

No stable version yet, so please install dev-master.

```composer require devfym/intelliphp:dev-master```

## Features

- Data
    - [DataFrame](docs/Data/DataFrame.md)
- Regression
    - [Linear Regression](docs/Regression/LinearRegression.md)
 
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
$df->name->getList();

// Get array of Age
$df->age->getList();

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