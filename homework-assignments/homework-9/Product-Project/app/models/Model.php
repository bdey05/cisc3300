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

    public function fetchAll($query) {
        $connectedPDO = $this->connect();
        $statementObject = $connectedPDO->query($query);
        return $statementObject->fetchAll();
    }

    public function fetchAllWithParams($query, $data = []) {
        $connection = $this->connect();
        $statementObject = $connection->prepare($query);
        $successOrFail = $statementObject->execute($data);
        if ($successOrFail) {
            $result = $statementObject->fetchAll();
            if (is_array($result) && count($result)) {
                return $result;
            }
        }
        return false;
    }

}