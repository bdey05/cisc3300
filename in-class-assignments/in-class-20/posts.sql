DROP DATABASE IF EXISTS in_class_20;

CREATE DATABASE in_class_20;

USE in_class_20;

CREATE TABLE posts (
    id INT(11) NOT NULL AUTO_INCREMENT,
    author VARCHAR(20) NOT NULL,
    title TEXT NOT NULL, 
	content TEXT NOT NULL,
	PRIMARY KEY(id)
);

/*INSERT INTO posts (author, content) VALUES
("Bob", "Test Content 1"),
("Joe", "Test Content 2");*/