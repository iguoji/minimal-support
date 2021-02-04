<?php
declare(strict_types=1);

require '../src/Type.php';

use Minimal\Support\Type;

var_dump([
    // Type::isFloat(10),
    // Type::isFloat(-10),
    // Type::isFloat("10"),
    // Type::isFloat("-10"),
    // Type::isFloat(10.0),
    // Type::isFloat(-10.0),

    10 / 3,
    // (float) number_format(10 / 3, 2)
    in_array("1", [0, 1])
]);