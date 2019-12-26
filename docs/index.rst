IntelliPHP
==========

|PHP from Packagist| |Latest Stable Version| |Latest Unstable Version|
|Build Status| |CircleCI| |Documentation Status| |Total Downloads|
|License|

Composer Library for Machine Learning.

Requirements
------------

Currently it requires PHP Version >= 7.2

How to install package
----------------------

No stable version yet, so please install dev-master.

``composer require devfym/intelliphp:dev-master``

Features
--------

-  Data

   -  `DataFrame <Data/DataFrame.md>`__
   -  `Series <Data/Series.md>`__

-  Regression

   -  `Linear Regression <Regression/LinearRegression.md>`__

Examples
--------

DataFrame
^^^^^^^^^

.. code:: php

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

Linear Regression
^^^^^^^^^^^^^^^^^

.. code:: php

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

.. |PHP from Packagist| image:: https://img.shields.io/packagist/php-v/devfym/intelliphp
.. |Latest Stable Version| image:: https://poser.pugx.org/devfym/intelliphp/v/stable
   :target: https://packagist.org/packages/devfym/intelliphp
.. |Latest Unstable Version| image:: https://poser.pugx.org/devfym/intelliphp/v/unstable
   :target: https://packagist.org/packages/devfym/intelliphp
.. |Build Status| image:: https://travis-ci.com/devfym/intelliphp.svg?branch=master
   :target: https://travis-ci.com/devfym/intelliphp
.. |CircleCI| image:: https://circleci.com/gh/devfym/intelliphp/tree/master.svg?style=svg
   :target: https://circleci.com/gh/devfym/intelliphp/tree/master
.. |Documentation Status| image:: https://readthedocs.org/projects/intelliphp/badge/?version=latest
   :target: https://intelliphp.readthedocs.io/en/latest/?badge=latest
.. |Total Downloads| image:: https://poser.pugx.org/devfym/intelliphp/downloads
   :target: https://packagist.org/packages/devfym/intelliphp
.. |License| image:: https://poser.pugx.org/devfym/intelliphp/license
   :target: https://packagist.org/packages/devfym/intelliphp