<?php


namespace app;

header("Access-Control-Allow-Origin: *");


require "../app/Controllers/PostController.php";

use app\controllers\PostController;

class Router {

    public function handleRoutes() {
        $url = strtok($_SERVER["REQUEST_URI"], '?');
        $uriArray = explode("/", $url);
        $this->userRoutes($uriArray);
    }

    protected function userRoutes($uriArray) {
        if ($uriArray[1] === 'posts' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $postController = new PostController();
            $postController->getPosts();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require './views/posts.html';
            exit();
        }

    }
}

?>
