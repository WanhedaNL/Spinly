<?php 
$error=[];
require_once __DIR__ . '/../bootstrap/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    header('Allow: POST');
    exit('POST request required');

    


}


if (!isset($_POST['id']) || !is_string($_POST['id'])) {
    http_response_code(400);
    exit('item is required');
}
try{
     $challenge = new Challenge('', $pdo);

}catch(ErrorException $e)
{
    $error[]='Method error ';

}
$data = $challenge->getAll();
if(!empty($data)){
    $delet_item=(int)trim($_POST['id']);
    if($delet_item===""){
        $error[]="Je hebt leeg input gedaan";
        header('Location: ../index.php');
        
        
    }
    $isgevonden=false;
    foreach ($data as $db_items){
        
    if($delet_item===$db_items['id']){
        $challenge->delet($delet_item);
        $isgevonden=true;

        header('Location: ../index.php');
        break;
        

    }

}if(!$isgevonden){
        $error[] = 'Niet gevonden check jouw input text';

}


}else{
    

    header('Location: ../index.php');
    exit;
}


?>
<?php foreach ($error as $errorss): ?>
    <p><?= htmlspecialchars($errorss) 
    ?></p>
  
    
<?php endforeach; ?>