<?php

namespace app\controllers;

use Exception;

class ErrorController {

    public function checkContractLength($months) {
        if ($months < 5){
            throw new Exception("Invalid contract length");
        }
        return true;
    }
    public function viewErrors() {
        try {
            echo "Testing for error (Call to checkContractLength(3))<br>";
            $this->checkContractLength(3);
        } catch (Exception $e) {
            echo 'Error Message: ' .$e->getMessage();
        }
    }
}