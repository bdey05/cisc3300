<?php 
require "./classes/item.php";

use fakebusiness\classes\Item;

$item1 = new Item("Endpoint Management", 400, 24);

$item1info = $item1->getItemInfo();

foreach($item1info as $key => $value){
    echo "$key: $value <br>";
}

?>