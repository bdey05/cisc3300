<?php 
    declare(strict_types = 1);

    //Question 6
    $playerInfo = [
        "name" => "Lionel Messi",
        "age" => 37,
        "height" => 170,
        "jerseyNumber" => 10,
        "team" => "Inter Miami CF"
    ]; 
    echo "Player Information: <br><br>"; 
    foreach ($playerInfo as $key => $value) {
        echo "$key: $value <br>";
    }
    echo "<br>";

    //Question 7
    function printMessage(int $count, string $message="Optional parameter") : string {
        return str_repeat($message, $count);
    }
    
    echo printMessage(3);
    echo "<br>";
    echo printMessage(4, "This is a test message.");
    
?>