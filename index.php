<?php
require_once("config.php");
require_once("model/model.php");
require_once("model/post.php");
require_once("model/user.php");
require_once("controller/postController.php");
require_once("controller/UserController.php");
session_start();
// var_dump($_SERVER);
// var_dump($_FILES);
// routing 
// route 

// $user = new User();
// $u = $user->get_user_details(3);
// var_dump($u);
// exit();
$posts = new PostController();
$user = new UserController();

if(isset($_GET['page']) && $_GET['page'] !=''){
    $route = $_GET['page'];
    if($route == 'post'){
        if(isset($_SESSION['is_logged_in'])){
            if($_SESSION['is_logged_in']){
                // header('Content-Type: application/json; charset=utf-8');
                echo $posts->get_api();
                return;
            }
        }
        echo $user->get_login_view();
    }
    if($route == 'registration'){
       $user->get_view();
    }
    if($route == 'logout'){
       $user->logout();
    }
    if($route == 'login'){
       $user->get_login_view();
    }
    if($route == 'post_registration'){
       if($_SERVER["REQUEST_METHOD"]=='POST'){
        // print_r($_POST);
        if(isset($_POST['email'],$_POST['password'],$_POST['name'])){
            $user->register($_POST['email'],$_POST['password'],$_POST['name']);
        }
       }
    }
    if($route == 'new_post'){
        if(isset($_SESSION['is_logged_in'])){
            if(!$_SESSION['is_logged_in']){
                $user->get_login_view();
            }
            $user->get_login_view();
        }
        else{
             $user->get_login_view();
        }
       if($_SERVER["REQUEST_METHOD"]=='POST'){
        // print_r($_POST);
            echo "test";
            if(isset($_POST['title'],$_POST['content'],$_FILES['image'])){
                echo "test1";
                $target_dir = "./uploads/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
                    $posts->new_post($_POST['title'],$_POST['content'],$target_file);
                }
            }
       }else {
        $posts->get_add_view();
       }
    }
    if($route == 'post_login'){
       if($_SERVER["REQUEST_METHOD"]=='POST'){
        // print_r($_POST);
        if(isset($_POST['email'],$_POST['password'])){
            $user->login($_POST['email'],$_POST['password']);
        }
       }
    }

}
else{
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode([
        "error"=>true,
        "message"=>"Route Not Found"
    ]);
}


