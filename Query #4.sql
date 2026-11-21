CREATE DATABASE db_file;
USE db_file;
CREATE TABLE file(
	id INT(10) PRIMARY KEY AUTO_INCREMENT,
	nama_file VARCHAR(100),
	ukuran INT(10),
	created_at DATE
)

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255)
);

CREATE TABLE file(
	id INT(10) PRIMARY KEY AUTO_INCREMENT,
	nama_file VARCHAR(100),
	ukuran INT(10),
	created_at VARCHAR(10000)
)


