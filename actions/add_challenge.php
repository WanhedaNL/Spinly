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


require_once __DIR__ . '/../bootstrap/bootstrap.php';

$challenge = new Challenge($item, $pdo);
if ($challenge->add($item)) {
    echo 'Challenge added';
    header('Location: ../index.php');
exit;
} else {
    http_response_code(500);
    echo 'Challenge could not be added';
}

