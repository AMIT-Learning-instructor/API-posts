<?php

abstract class Model {
    private $pdo;
    function __construct(private $username = DB_USERNAME,private $password=DB_PASSWORD,private $db=DB,private $hostname=DB_HOSTNAME)
    {
        $dsn = "mysql:host={$this->hostname};dbname={$this->db};charset=UTF8";
        try {
            $this->pdo = new PDO($dsn,$this->username,$this->password);
        
            if ($this->pdo) {
              return true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    protected function run_query(string $sql,?array $prams,$fetch_one = false){

        $statement = $this->pdo->prepare($sql);
       
        $statement->execute($prams);
        if($fetch_one){
            return $statement->fetch(PDO::FETCH_ASSOC);
        }
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function __destruct()
    {
        unset($this->pdo);
    }

}


// $db = new Model();
// $r = $db->run_query("select * from user where name=:name;",['name'=>'Youssef2']);
// var_dump($db); 
// var_dump($r); 