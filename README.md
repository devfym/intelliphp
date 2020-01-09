# IntelliPHP
![PHP from Packagist](https://img.shields.io/packagist/php-v/devfym/intelliphp)
[![Latest Stable Version](https://poser.pugx.org/devfym/intelliphp/v/stable)](https://packagist.org/packages/devfym/intelliphp)
[![Build Status](https://travis-ci.com/devfym/intelliphp.svg?branch=master)](https://travis-ci.com/devfym/intelliphp)
[![Coverage Status](https://coveralls.io/repos/github/devfym/intelliphp/badge.svg?branch=master)](https://coveralls.io/github/devfym/intelliphp?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/devfym/intelliphp/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/devfym/intelliphp/?branch=master)
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
    - [DataFrame](docs/Data/DataFrame.md)
    - [Series](docs/Data/Series.md)
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

[MIT](LICENSE)
