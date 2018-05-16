<?php
$dsn = 'mysql:host=localhost;dbname=ebay_clone';
$db_user = 'root';
$db_pass = '';

try{
    $db = new PDO($dsn, $db_user, $db_pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e){
    echo "Error: " . $e->getMessage();
}