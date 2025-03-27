DROP DATABASE IF EXISTS in_class_19;

CREATE DATABASE in_class_19;

USE in_class_19;

CREATE TABLE posts (
    post_id INT(11) NOT NULL AUTO_INCREMENT,
    author VARCHAR(20) NOT NULL,
	content TEXT NOT NULL,
	PRIMARY KEY(post_id)
);

INSERT INTO posts (author, content) VALUES
("Bob", "Test Content 1"),
("Joe", "Test Content 2");