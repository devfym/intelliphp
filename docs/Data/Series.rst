Series
======

Each ``column`` in ``DataFrame`` creates instance of ``Series`` class.

For ``Method`` examples, use following sample data:

.. code:: php

    // Import composer packages.
    require_once __DIR__ . '/vendor/autoload.php';

    // Load DataFrame Class.
    use devfym\Data\DataFrame;

    // Create new instance of DataFrame.
    $df = new DataFrame();

    // Create sample array-formatted sample data.
    $sample = [
        'name'      => ['aaron','bambi','celine','dennise', 'edwin'],
        'age'       => [12, 14, 16, 18, 20],
        'height_cm' => [150, 168, 172, 178, 180],
        'weight_kg' => [36, 40, 56, 60, 78]
    ];

    // Set sample data into instance $df.
    $df->readArray($sample);

Methods
-------

all ()
~~~~~~

-  @return array

Get all data in ``Series``.

.. code:: php

    $df->name->all();

    // return ['aaron','bambi','celine','dennise', 'edwin']

withinIndexOf (:math:`from = 0, `\ to = 1)
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

-  @return array

Get all data in ``Series`` within ``$from`` until ``$to`` indices.

.. code:: php

    $df->name->withinIndexOf(1,3);

    // return ['bambi', 'celine', 'dennise']

mean ($floatPoint = 1)
~~~~~~~~~~~~~~~~~~~~~~

-  @param int $floatPoint
-  @return float

Get mean value of ``Series``.

.. code:: php

    $df->age->mean();

    // return 16.0

max ($floatPoint = 1)
~~~~~~~~~~~~~~~~~~~~~

-  @param int $floatPoint
-  @return float

Get max value in ``Series``.

.. code:: php

    $df->age->max();

    // return 20.0

min ($floatPoint = 1)
~~~~~~~~~~~~~~~~~~~~~

-  @param int $floatPoint
-  @return float

Get min value inb ``Series``.

.. code:: php

    $df->age->min();

    // return 12.0

