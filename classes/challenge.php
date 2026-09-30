<?php 

class Challenge{
    private PDO $pdo;
    public $item;
    public function __construct($item,PDO $pdo)
    {
        $this->item=$item;
         $this->pdo=$pdo;
    }
    public function add(string $item){
        $stmt=$this->pdo->prepare('INSERT INTO challenges (name) VALUES (?)');
        return $stmt->execute([$item]);

        
    }
    public function getAll(){
        $stmt=$this->pdo->prepare('SELECT * FROM challenges(id)');
        return $stmt->execute();
        
    }


}


?>
