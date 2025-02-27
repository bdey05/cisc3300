<?php 
    header("Access-Control-Allow-Origin: *");

    $uri = strtok($_SERVER["REQUEST_URI"], '?');
    
    $uriArray = explode("/", $uri);
    
    if ($uriArray[1] === 'backend' && $_SERVER['REQUEST_METHOD'] === 'GET') {
        $menuItems = [
            ['item' => 'Sandwich'],
            ['item' => 'Hot Dog'],
            ['item' => 'Salad'],
            ['item' => 'Chips']
        ];
        echo json_encode($menuItems);
        exit();
    }
?>
