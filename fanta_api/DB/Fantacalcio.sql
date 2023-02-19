CREATE DATABASE fantacalcio_db;

USE fantacalcio_db;

CREATE TABLE team(
	id INT AUTO_INCREMENT PRIMARY KEY,
	name NVARCHAR(20) NOT NULL
);

CREATE TABLE `role` (
	id INT AUTO_INCREMENT PRIMARY KEY,
	description NVARCHAR(1)
);

CREATE TABLE football_player(
	id INT AUTO_INCREMENT PRIMARY KEY,
	name NVARCHAR(30) NOT NULL,
	id_team INT,
	id_role INT
);

ALTER TABLE football_player 
ADD CONSTRAINT fk_fp_team FOREIGN KEY (id_team) REFERENCES team(id);

ALTER TABLE football_player 
ADD CONSTRAINT fk_fp_role FOREIGN KEY (id_role) REFERENCES `role`(id);

