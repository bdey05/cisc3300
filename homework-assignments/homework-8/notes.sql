#Question 5
DROP DATABASE IF EXISTS homework8;

CREATE DATABASE homework8;

USE homework8;

CREATE TABLE notes (
  id INT(11) NOT NULL AUTO_INCREMENT,
  title VARCHAR(80) NOT NULL,
  description TEXT NOT NULL,
  PRIMARY KEY(id)
);

#Question 6
INSERT INTO notes (title, description) VALUES
("CISC 3300 Notes", "These are my notes for CISC 3300 with vowels"),
("HIST 3823 Notes", "These are my notes for HIST 3823"),
("ENGL 3037 Notes", "These are my notes for ENGL 3037"),
("CISC 3650 Notes", "Ths r my nts fr CSC 3650"),
("THEO 3611 Notes", "Ths r my nts fr THE 3611"),
("PHIL 3000 Notes", "These are my notes for PHIL 3000");

UPDATE notes SET description = "These are my new notes for HIST 3823" WHERE id = 2;
UPDATE notes SET title = "Updated ENGL 3037 Notes" WHERE title LIKE "%ENGL%";

DELETE FROM notes WHERE id = 3;
DELETE FROM notes WHERE title LIKE "%PHIL 3000%";

#Question 7
SELECT * FROM notes 
ORDER BY title DESC; 

SELECT * FROM notes 
LIMIT 1 OFFSET 1; 

SELECT * FROM notes WHERE 
description LIKE "%a%" OR 
description LIKE "%e%" OR 
description LIKE "%e%" OR 
description LIKE "%i%" OR 
description LIKE "%o%" OR 
description LIKE "%u%";






