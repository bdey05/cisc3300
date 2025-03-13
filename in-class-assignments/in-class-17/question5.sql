CREATE DATABASE cisc3300;

CREATE TABLE fakebusinessplans ( 
    product_id INT AUTO_INCREMENT, 
    product_name VARCHAR(20) NOT NULL, 
    product_price FLOAT NOT NULL, 
    contract_length_months INT NOT NULL, 
    PRIMARY KEY(product_id) 
);

INSERT INTO fakebusinessplans(product_name, product_price, contract_length_months) VALUES 
("Endpoint Management", 400, 5), 
("Identity & Access Management", 700, 3), 
("SIEM", 300, 12), 
("Cloud Security", 950, 2);

SELECT * FROM fakebusinessplans;
