# Linear Regression

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