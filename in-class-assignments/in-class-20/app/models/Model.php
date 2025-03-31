<?php

namespace app\models;

use PDO;
use PDOException;

abstract class Model {

    private function connect() {
        $dsn = "mysql:hostname=" . DBHOST .";dbname=" . DBNAME . ";port=" . DBPORT . ";";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
        try {
            return new PDO($dsn, DBUSER, DBPASS, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), $e->getCode());
        }
    }

    public function query($query, $data = []) {
        $con = $this->connect();
        $stm = $con->prepare($query);
        $check = $stm->execute($data);
        if ($check) {
            //return as an associated array
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            if (is_array($result) && count($result)) {
                return $result;
            }
        }
        return false;
    }

}