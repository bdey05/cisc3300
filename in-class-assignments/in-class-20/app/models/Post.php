<?php

namespace app\models;

class Post extends Model {

    public function getAllPostsByName($title) {
        $query = "select * from posts WHERE title like :title";
        return $this->query($query, [
            'title' => '%' . $title . '%'
        ]);
    }

    public function getAllPosts() {
        $query = "select * from posts";
        return $this->query($query);
    }

    public function getPostById($id){
        $query = "select * from posts where id = :id";
        return $this->query($query, ['id' => $id]);
    }

    public function savePost($inputData){
        $query = "insert into posts (author, title, content) values (:author, :title, :content);";
        return $this->query($query, $inputData);
    }

    public function updatePost($inputData){
        $query = "update posts set author = :author, title = :title, content = :content where id = :id";
        return $this->query($query, $inputData);
    }

    public function deletePost($inputData){
        $query = "DELETE FROM posts where id = :id";
        return $this->query($query, $inputData);
    }
}