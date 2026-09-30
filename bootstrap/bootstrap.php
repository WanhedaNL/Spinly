<?php 
require_once __DIR__ . '/../classes/challenge.php';
require_once __DIR__ . '/../database/Database.php';
$config=require __DIR__ . '/../config/databese.php';

$database= new Database(
    $config['host'],
    $config['username'],
      $config['password'],
    $config['dbname']
);
$pdo=$database->connect();



?>

