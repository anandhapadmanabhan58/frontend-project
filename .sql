CREATE project;

USE project;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(255),
    lastname VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    date TIMESTAMP DEFAULT NULL,
    address VARCHAR(255) DEFAULT NULL,
    phone_number VARCHAR(20) DEFAULT NULL,
    country VARCHAR(255) DEFAULT NULL,
    province VARCHAR(255) DEFAULT NULL,
    postal_code VARCHAR(10) DEFAULT NULL,
    gender VARCHAR(10) DEFAULT NULL
);
