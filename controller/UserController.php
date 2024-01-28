<?php


class UserController{
    private $model;

    function __construct()
    {
        $this->model = new User();
    }

    public function register($email,$name,$password){
        $this->model->new_user($email,$name,$password);
        header('Location:./view/login.php');
    }

    public function get_view(){
        header('Location:./view/register.php');
    }
    public function get_login_view(){
        header('Location:./view/login.php');
    }

    public function logout(){
        $_SESSION['is_logged_in'] = false;
        $_SESSION['user_id'] = null;
    }

    public function login($email,$password) {
        $user = $this->model->get_user_by_email($email);
        if(!$user){
            header('Content-Type: application/json; charset=utf-8');
            return  json_encode(['Error'=>"user not found"]);
        }
        // check password
        var_dump($user);
        if(!password_verify($password,$user['password'])){
            header('Content-Type: application/json; charset=utf-8');
            return  json_encode(['Error'=>"Password Or User is wrong"]);
        }
        $_SESSION['is_logged_in'] = true;
        $_SESSION['user_id'] = $user['id'];
        header('Location:./index.php?page=post');
    }

}
