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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <form action="./actions/add_challenge.php" method="post" >


    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <label class="input-group-text" for="item">Item</label>
        </div>
        <input type="text" class="form-control" id="item" placeholder="Item" name="item" maxlength="20" required>
    </div>

  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    
</body>
</html>
