CREATE DATABASE fantacalcio_db;

USE fantacalcio_db;

CREATE TABLE team(
	id INT AUTO_INCREMENT PRIMARY KEY,
	name NVARCHAR(20) NOT NULL
);

CREATE TABLE `role` (
	id INT AUTO_INCREMENT PRIMARY KEY,
	description NVARCHAR(20)
);

CREATE TABLE status (
	id INT AUTO_INCREMENT PRIMARY KEY,
	description NVARCHAR(20) NOT NULL
);

CREATE TABLE football_player(
	id INT AUTO_INCREMENT PRIMARY KEY,
	name NVARCHAR(30) NOT NULL,
	team INT NOT NULL,
	`role` INT NOT NULL,
	available BOOLEAN DEFAULT 1,
	status INT NOT NULL,
	date_birth DATE NOT NULL,
	value INT NOT NULL
);

ALTER TABLE football_player 
ADD CONSTRAINT fk_fp_team FOREIGN KEY (team) REFERENCES team(id);

ALTER TABLE football_player 
ADD CONSTRAINT fk_fp_role FOREIGN KEY (`role`) REFERENCES `role`(id);

ALTER TABLE football_player 
ADD CONSTRAINT fk_fp_status FOREIGN KEY (status) REFERENCES status(id);

CREATE TABLE `user`(
	id INT AUTO_INCREMENT PRIMARY KEY,
	email NVARCHAR(50) NOT NULL UNIQUE,
	`password` NVARCHAR(64) NOT NULL,
	username NVARCHAR(20) NOT NULL UNIQUE,
	active BOOLEAN DEFAULT 1
);

CREATE TABLE squad(
	id INT AUTO_INCREMENT PRIMARY KEY,
	`user` INT NOT NULL,
	name NVARCHAR(20) NOT NULL,
	credits INT NOT NULL,
	points INT NOT NULL
);

ALTER TABLE squad 
ADD CONSTRAINT fk_squad_user FOREIGN KEY (`user`) REFERENCES `user` (id);

CREATE TABLE squad_player(
	squad INT NOT NULL,
	player INT NOT NULL 
);

ALTER TABLE squad_player
ADD CONSTRAINT pk_sp PRIMARY KEY (player);

ALTER TABLE squad_player
ADD CONSTRAINT fk_sp_player FOREIGN KEY (player) REFERENCES football_player(id);

ALTER TABLE squad_player
ADD CONSTRAINT squad FOREIGN KEY (squad) REFERENCES squad(id);