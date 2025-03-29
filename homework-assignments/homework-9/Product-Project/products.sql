DROP DATABASE IF EXISTS fake_business; 

CREATE DATABASE fake_business;

USE fake_business;

CREATE TABLE products ( 
    product_id INT AUTO_INCREMENT, 
    product_name VARCHAR(40) NOT NULL, 
    product_desc VARCHAR(100) NOT NULL, 
    product_price FLOAT NOT NULL, 
    PRIMARY KEY(product_id) 
);

INSERT INTO products(product_name, product_desc, product_price) VALUES 
("Endpoint Management", "Secure all your enterprise devices under one unified console", 400), 
("Identity & Access Management", "Simplify user access and fortify security across various applications and services", 700), 
("SIEM", "Drive business resilience by monitoring, alerting and reporting on business operations", 300), 
("Cloud Security", "Scalable cloud security solution that protects hybrid and multi-cloud environments", 950);

