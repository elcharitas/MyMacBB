<?php

return [
    
    "config" => [
        "gc" => [
            "expire" => 300,
            "prefix" => env('APP_NAME'),
            "path" => null
        ],
        "magbb_includes" => [
            "include" => ["core/mag"]
        ],
    ],
    
    "objects" => [
        "bb" => []
    ],
];