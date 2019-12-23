# DataFrame

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