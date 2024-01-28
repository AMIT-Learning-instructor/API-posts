<?php


class PostController{
    private $model;

    function __construct()
    {
        $this->model = new Post();
    }

    function get_api(){
        header('Content-Type: application/json; charset=utf-8');
        return json_encode($this->model->get_posts());
    }
    public function new_post($title,$content,$image){
        $this->model->new_post($title,$content,$image);
        header('Location:index.php?page=post');
    }
    public function get_add_view(){
        header('Location:./view/new_post.php');
    }


}
