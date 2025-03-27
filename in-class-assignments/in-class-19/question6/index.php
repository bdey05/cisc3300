<?php

$env = parse_ini_file('./.env');
define('DBNAME', $env['DBNAME']);
define('DBHOST', $env['DBHOST']);
define('DBUSER', $env['DBUSER']);
define('DBPASS', $env['DBPASS']);
define('DBPORT', $env['DBPORT']);

$dsn = "mysql:hostname=" . DBHOST .";dbname=" . DBNAME . ";port=" . DBPORT . ";";

$options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];
try {
    $pdo = new PDO($dsn, DBUSER, DBPASS, $options);
    echo "Database connection successful <br> Data from posts table: <br>";
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), $e->getCode());
}

$uri = strtok($_SERVER["REQUEST_URI"], '?');


$uriArray = explode("/", $uri);


if ($uriArray[1] === 'posts' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $pdo->query("SELECT * FROM posts");
    $rows = $stmt->fetchAll();
    echo json_encode($rows);
}

?>

