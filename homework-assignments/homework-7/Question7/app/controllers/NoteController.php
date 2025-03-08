<?php

namespace app\controllers;

class NoteController
{
    public function saveNote() {

        $title = $_POST['title'] ?? null;
        $description = $_POST['description'] ?? null;
        $errors = [];

        if ($title) {
            $title = htmlspecialchars($title);
            if (strlen($title) <= 3) {
                $errors['title'] = 'Error: Title is not more than 3 characters long';
            }
        } 
        else {
            $errors['title'] = 'Error: Title is required';
        }

        if ($description) {
            $description = htmlspecialchars($description);
            if (strlen($description) <= 10) {
                $errors['description'] = 'Error: Description is not more than 10 characters long';
            }
        } 
        else {
            $errors['description'] = 'Error: Description is required';
        }

        if (!empty($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }

        $savedNote = [
            'title' => $title,
            'description' => $description
        ];
        echo json_encode($savedNote);
        exit();
    }

    

}