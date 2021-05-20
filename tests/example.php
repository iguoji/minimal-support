<?php
declare(strict_types=1);

require dirname(__DIR__) . '/src/Arr.php';
require dirname(__DIR__) . '/src/Type.php';

use Minimal\Support\Arr;
use Minimal\Support\Type;

$array = [
    'a' =>  [
        'b' =>  [
            'c' =>  123,
        ],
    ],
];

var_dump(
    // Arr::has($array, 'a.b.c'),
    // Arr::get($array, 'a.b.c.d'),
    Arr::set($array, 'a.b.c.d', 456),
    $array,
);


exit;
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