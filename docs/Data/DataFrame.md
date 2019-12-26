# DataFrame

- Load DataFrame class.
- Import data into DataFrame.
- DataFrame Methods
- Series Methods

## Load DataFrame class

Import composer packages by calling `autoload.php`.

```php
require_once __DIR__ . '/vendor/autoload.php';
```
then load `DataFrame` class 

```php
use devfym\Data\DataFrame;
```

Create new instance of `DataFrame`

```php
$df = new DataFrame();
```

For `Method` examples, use following sample data:

```php
$sample = [
    'name'      => ['aaron','bambi','celine','dennise', 'edwin'],
    'age'       => [12, 14, 16, 18, 20],
    'height_cm' => [150, 168, 172, 178, 180],
    'weight_kg' => [36, 40, 56, 60, 78]
];
```

* The `$sample` is consists of `4 columns` with `5 indices`.

## Methods

### readArray($sample = [])

- @param array $sample

Set sample data into instance of `DataFrame`.

```php
$df->readArray($sample);
```

### getColumns()

- @return array

It will return list of columns in DataFrame instance.

```php
$df->getColumns();

// return ['name', 'age', 'height_cm', 'weight_kg']
```

### getIndex()

- @return int

It will return count of samples in DataFrame instance.

```php
$df->getIndex();

// return 5
```

### mean ($floatPoint = 1)

- @param int $floatPoint
- @return array

Get list of mean value in `DataFrame` where `DataType = "Numeric"`.

```php
$df->mean();

// return ['age' => 16.0, 'height_cm' => 169.6, 'weight_kg' = 54.0]
```

### max ($floatPoint = 1)

- @param int $floatPoint
- @return array

Get list of max value in `DataFrame` where `DataType = "Numeric"`.

```php
$df->max();

// return ['age' => 20.0, 'height_cm' => 180.0, 'weight_kg' => 78.0]
```

### min ($floatPoint = 1)

- @param int $floatPoint
- @return array

Get list of min value in `DataFrame` where `DataType = "Numeric"`.

```php
$df->min();

// return ['age' => 12.0, 'height_cm' => 150.0, 'weight_kg' => 36.0]
```