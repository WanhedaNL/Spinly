<?php
require_once __DIR__ . '/bootstrap/bootstrap.php';
?>
<!DOCTYPE html>
<html lang="nl">
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
            <label for="item">Nieuwe uitdaging</label>
            <input type="text" id="item" name="item" placeholder="Voer een naam in" maxlength="20" aria-describedby="item-hint" required>
            <p id="item-hint">Maximaal 20 tekens.</p>
            <button type="submit">Toevoegen</button>
        </form>
     <?php 

        $challenge = new Challenge('', $pdo);
        $kayitlar = $challenge->getAll();
        if (isset($_SESSION['random_challenge'])) {
            $randomChallenge = $_SESSION['random_challenge'];
        }
        ?>

    <?php
     foreach ($kayitlar as $kayit): 
    ?>

    <p class="challenge">
         <?= htmlspecialchars($kayit['name']) ?>
       
         <form class="" action="actions/delet.php" method="POST">
        <input type="hidden" name="id" value="<?= $kayit['id'] ?>">
        <button type="submit">Delet</button>
    </form>

     
    </p>

<?php endforeach; ?>

<?php 





?>
     
    <form class="spin-form" action="actions/spin.php"  method="POST">
        <button type="submit">Spin</button>
    </form>

    <?php if (isset($randomChallenge)): ?>
        <p class="challenge">
            <strong>Jouw uitdaging:</strong>
            <?= htmlspecialchars($randomChallenge['name']) ?>
        </p>
    <?php endif; ?>


   



    
    </main>
    
</body>
</html>
