<?php 
namespace fakebusiness\classes;

class Item {
    public string $name;
    public int $monthlyPrice;
    public int $contractLengthInMonths; 

    public function __construct($name, $monthlyPrice, $contractLengthInMonths)
    {
        $this->name = $name;
        $this->monthlyPrice = $monthlyPrice;
        $this->contractLengthInMonths = $contractLengthInMonths;
    }

    public function getItemInfo()
    {
        return ["name" => $this->name, 
                "monthlyPrice" => $this->monthlyPrice, 
                "contractLengthInMonths" => $this->contractLengthInMonths];
    }

}


?>