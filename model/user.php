<?php

class User extends Model {
    
    function __construct(private $table = 'user')
    {
        parent::__construct();   
    }
    public function new_user($email,$password,$name){
        $sql = "INSERT INTO {$this->table} (email,password,name) VALUES (:email,:password,:name);";
        $result = $this->run_query($sql,[
            'email'=>$email ,
            'password'=>password_hash($password,PASSWORD_DEFAULT),
            'name'=>$name,
        ]);
        return $result;
    }
    public function get_user_by_email($email){
        $sql = "select * from {$this->table} where email=:email;";
        $result = $this->run_query($sql,['email' => $email],true);
        return $result;
    }
    public function get_user_details($id){
        $sql = "select id,email , name from {$this->table} where id=:id;";
        $result = $this->run_query($sql,['id' => $id],true);
        return $result;
    }
}