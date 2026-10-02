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
        $stmt=$this->pdo->prepare('SELECT * FROM challenges');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }
        public function delet( int $item){
        $stmt=$this->pdo->prepare('DELETE FROM challenges WHERE id =?');
        return $stmt->execute([$item]);
        


}

}



?>
