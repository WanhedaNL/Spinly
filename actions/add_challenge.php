<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    header('Allow: POST');
    exit('POST request required');
}

if (!isset($_POST['item']) || !is_string($_POST['item'])) {
    http_response_code(400);
    exit('item is required');
}

$item = trim($_POST['item']);

if ($item === '') {
    http_response_code(400);
    exit('item is required');
}

require_once __DIR__ . '/../database/Database.php';
require_once __DIR__ . '/../classes/challenge.php';

$config = require __DIR__ . '/../config/databese.php';

$database = new Database(
    $config['host'],
    $config['username'],
    $config['password'],
    $config['dbname']
);

$pdo = $database->connect();
$challenge = new Challenge($item, $pdo);

if ($challenge->add($item)) {
    echo 'Challenge added';
} else {
    http_response_code(500);
    echo 'Challenge could not be added';
}
