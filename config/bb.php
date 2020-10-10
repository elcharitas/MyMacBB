<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Board Configuration Set
    |--------------------------------------------------------------------------
    |
    | This option controls the default configuration sets used in "config" files.
    |
    */
    "config" => [
        // Garbage Collector
        "gc" => [
            "expire" => env('GARBAGE_EXPIRY', 300),
            "prefix" => env('APP_NAME', 'MacBB'),
            "path" => env('GARBAGE_PATH')
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Board Objects
    |--------------------------------------------------------------------------
    |
    | This option controls the objects configuration called in App\Support\BB::obj
    |
    */
    "objects" => [
        "bb" => []
    ],
];