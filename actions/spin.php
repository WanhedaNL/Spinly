<?php





require_once __DIR__ . '/../bootstrap/bootstrap.php';
if ($_SERVER['REQUEST_METHOD']!=='POST'){
    http_response_code(405);
    header('Allow: POST');
    exit;
}
$challenge=new Challenge('',$pdo);
$challenges=$challenge->getAll();
if(empty($challenges)){
    exit('Voeg eerst een uitdaging toe.');
}
$randomKey=array_rand($challenges);
$randomChallenge=$challenges[$randomKey];

$_SESSION['random_challenge']=$randomChallenge;
header('Location:../index.php');
exit;




?>

