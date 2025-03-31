<?php

namespace app\controllers;

use app\models\Post;

class PostController
{
   /* public function validatePost($inputData) {
        $errors = [];
        $firstName = $inputData['firstName'];
        $lastName = $inputData['lastName'];
        $email = $inputData['email'];

        if ($firstName) {
            $firstName = htmlspecialchars($firstName, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($firstName) < 2) {
                $errors['firstNameShort'] = 'first name is too short';
            }
        } else {
            $errors['requiredFirstName'] = 'first name is required';
        }

        if ($lastName) {
            $lastName = htmlspecialchars($lastName, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($lastName) < 2) {
                $errors['lastNameShort'] = 'last name is too short';
            }
        } else {
            $errors['requiredLastName'] = 'last name is required';
        }

        if ($email) {
            $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
            if (!preg_match($regex, $email)) {
                $errors['invalidEmail'] = 'email is invalid.';
            }
        } else {
            $errors['requiredEmail'] = 'email is required';
        }

        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }
        return [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
        ];
    }*/

    public function getAllPosts() {
        $postModel = new Post();
        header("Content-Type: application/json");
        $posts = $postModel->getAllPosts();

        echo json_encode($posts);
        exit();
    }

    public function getPostByID($id) {
        $postModel = new Post();
        header("Content-Type: application/json");
        $post = $postModel->getPostById($id);
        echo json_encode($post);
        exit();
    }

    public function savePost() {
       $inputData = [
            'author' => $_POST['author'] ?: null,
            'title' => $_POST['title'] ?: null,
            'content' => $_POST['content'] ?: null,
        ];
        //$postData = $this->validatePost($inputData);

        $post = new Post();
        $post->savePost(
            [
                'author' => $inputData['author'],
                'title' => $inputData['title'],
                'content' => $inputData['content'],
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function updatePost($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        parse_str(file_get_contents('php://input'), $_PUT);

        $inputData = [
            'author' => $_PUT['author'] ?: null,
            'title' => $_PUT['title'] ?: null,
            'content' => $_PUT['content'] ?: null,
        ];
        //$postData = $this->validatePost($inputData);

        $post = new Post();
        $post->updatePost(
            [
                'id' => $id,
                'author' => $inputData['author'],
                'title' => $inputData['title'],
                'content' => $inputData['content'],
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function deletePost($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        $post = new Post();
        $post->deletePost(
            [
                'id' => $id,
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function postsView() {
        include './app/views/post/posts-view.html';
        exit();
    }

    public function postsAddView() {
        include './app/views/post/posts-add.html';
        exit();
    }

    public function postsDeleteView() {
        include './app/views/post/posts-delete.html';
        exit();
    }

    public function postsUpdateView() {
        include './app/views/post/posts-update.html';
        exit();
    }


}