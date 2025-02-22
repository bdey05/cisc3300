<?php

header("Access-Control-Allow-Origin: *");

$uri = strtok($_SERVER["REQUEST_URI"], '?');

$uriArray = explode("/", $uri);


if ($uriArray[1] === 'products' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $products = [
        [
            'name' => 'Real-time Cloud Protection',
            'price' => 300 
        ],
        [
            'name' => 'AI-based Email Security',
            'price' => 250 
        ],
        [
            'name' => 'Network Detection and Response',
            'price' => 500 
        ],
        [
            'name' => 'Endpoint Protection',
            'price' => 750 
        ],
        [
            'name' => 'Identity Threat Detection and Response',
            'price' => 900 
        ]
    ];

    echo json_encode($products);
    exit();
}

if ($uriArray[1] === 'form' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    echo json_encode([
        'message' => 'Message Successfully Sent. We received your message and we will get back to you within 48-72 hours.'
    ]);
    exit();
}


?>
