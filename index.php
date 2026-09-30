<?php 

require_once __DIR__ . '/database/Database.php';

$config = require __DIR__ . '/config/databese.php';

$database = new Database(
    $config['host'],
    $config['username'],
    $config['password'],
    $config['dbname']
);

$pdo = $database->connect();


?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Spinly</title>
</head>
<body>
    <main class="container">
        <h1>Spinly</h1>
        <form action="./actions/add_challenge.php" method="post">
            <label for="item">Yeni meydan okuma</label>
            <input type="text" id="item" name="item" placeholder="Bir isim yaz" maxlength="20" aria-describedby="item-hint" required>
            <p id="item-hint">En fazla 20 karakter.</p>
            <button type="submit">Ekle</button>
        </form>
    </main>
</body>
</html>
