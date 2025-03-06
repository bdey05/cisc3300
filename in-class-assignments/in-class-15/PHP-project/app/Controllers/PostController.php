<?php 
    namespace app\controllers;
    require "../app/Models/Post.php";
    use app\models\Post;

    class PostController {
        public function getPosts(){
            $postModel = new Post();
            $posts = $postModel->getAllPosts();
            echo json_encode($posts);
            exit();
        }
    }

?>