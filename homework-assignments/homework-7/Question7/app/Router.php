<?php

namespace app;

require "./app/controllers/NoteController.php";

use app\controllers\NoteController;

class Router {

    public function handleRoutes() {
        $url = strtok($_SERVER["REQUEST_URI"], '?');
        $uriArray = explode("/", $url);
        $this->noteRoutes($uriArray);
    }

    protected function noteRoutes($uriArray) {
        
        if ($uriArray[1] === 'api' && $uriArray[2] === 'notes' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $noteController = new noteController();
            $noteController->saveNote();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require './public/views/notes.html';
            exit();
        }

    }
}