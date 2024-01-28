<?php

class Post extends Model {
    
    function __construct(private $table = 'post')
    {
        parent::__construct();   
    }
    public function new_post($title,$content,$image_path){
        $sql = "INSERT INTO {$this->table} (title,content,image) VALUES (:title,:content,:image);";
        $result = $this->run_query($sql,[
            'title'=>$title ,
            'content'=>$content,
            'image'=>$image_path
        ]);

        return $result;
    }
    public function get_posts(){
        $sql = "select * from {$this->table};";
        $result = $this->run_query($sql,[]);
        return $result;
    }
}

// $p = new Post();
// // $r = $p->new_post('new 1','test test');
// $r = $p->get_posts();
// var_dump($r);