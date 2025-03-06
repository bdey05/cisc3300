<?php 
namespace app\models;

class Post {
    public function getAllPosts() {
        $allPosts = [
            [
                'title' => 'Post 1',
                'description' => 'This is Post 1',
                'body' => 'This is the content of Post 1',

            ],
            [
                'title' => 'Post 2',
                'description' => 'This is Post 2',
                'body' => 'This is the content of Post 2',

            ],
            [
                'title' => 'Post 3',
                'description' => 'This is Post 3',
                'body' => 'This is the content of Post 3',

            ]
        ];

        return $allPosts;
    }
}


?>