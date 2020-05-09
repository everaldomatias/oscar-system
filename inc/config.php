<?php

session_start();

$host     = "localhost";
$username = "root";
$password = "";
$dbname   = "oscar_dev";

global $pdo;

// Connect ro DB with PDO
try {
    
    $pdo = new PDO( "mysql:dbname=" . $dbname . "; host=" . $host, $username, $password );
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

} catch( PDOException $e ) {

    echo "ERRO: " . $e->getMessage();

}
