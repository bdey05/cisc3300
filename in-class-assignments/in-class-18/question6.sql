DROP DATABASE IF EXISTS in_class_18;
CREATE DATABASE in_class_18;
USE in_class_18;

CREATE TABLE users (
	user_id INT(11) NOT NULL AUTO_INCREMENT,
	f_name VARCHAR(80) NOT NULL,
	l_name VARCHAR(80) NOT NULL,
	username VARCHAR(80) NOT NULL,
	passwordhash VARCHAR(256) NOT NULL,
	PRIMARY KEY(user_id)
);

CREATE TABLE userComments(
	comment_id INT(11) NOT NULL AUTO_INCREMENT,
	user_id INT,
	content TEXT NOT NULL,
	PRIMARY KEY(comment_id),
	FOREIGN KEY(user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

INSERT INTO users (f_name, l_name, username, passwordhash) VALUES 
("Bob", "Dylan", "user1", "9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08"),
("Jane", "Hernandez", "user2", "25a71123466d1dd092aae2fe9ed4db65d7c524437da4ecb30e1522acd2b202cb"),
("Joe", "Fernandez", "user3", "99dc89bbc43404ebff38157e1304e345342767afdbe8af1464ad9eb94adb7117"),
("Jill", "Sullivan", "user4", "7857947e092db322546fe2f7ee8d8c3ec85502b8037cd70752d0ebb243f69e06");

INSERT INTO userComments (user_id, content) VALUES 
(1, "This is User 1's First Comment"),
(2, "This is User 2's First Comment"),
(2, "This is User 1's Second Comment");

#Question 6a
SELECT users.user_id, users.username, userComments.content FROM users 
LEFT JOIN userComments
ON (users.user_id = userComments.user_id);

#Question 6b
SELECT users.user_id, users.username, userComments.content FROM users 
JOIN userComments
ON (users.user_id = userComments.user_id); 
 
