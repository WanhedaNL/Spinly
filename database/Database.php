<?php 

class Database{


    private $localhost;
    private $username;
    private $password;
    private $dbname;
    public function __construct($localhost,$username,$password,$db_name)
    {
        $this->localhost=$localhost;
        $this->username=$username;
        $this->password=$password;
        $this->dbname=$db_name;

    }
    
    public function connect(){
        try{
            $pdo= new PDO('mysql:host='.$this->localhost.';dbname='.$this->dbname.';charset=utf8mb4',$this->username,$this->password);
            return $pdo;
           

        }catch(PDOException $e){
            exit('Error Connecting To DataBase');

        }

    }



}



?>
