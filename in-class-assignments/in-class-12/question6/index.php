<?php
header("Access-Control-Allow-Origin: *");

$uri = strtok($_SERVER["REQUEST_URI"], '?');


$uriArray = explode("/", $uri);


if ($uriArray[1] === 'html') {
    echo '<h2>HTML Head Tag</h>';
    exit();
}

if ($uriArray[1] === 'json') {
    $people = [
        [
            'name' => 'Bob'
        ],
        [
            'name' => 'Joe'
        ]
    ];
    echo json_encode($people);
    exit();
}


?>
