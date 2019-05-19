
DROP DATABASE IF EXISTS yoguisportsdb;
CREATE DATABASE yoguisportsdb;

USE yoguisportsdb;

CREATE TABLE news(
  id INT(11) AUTO_INCREMENT,
  titulo VARCHAR(100) NOT NULL,
  imagen VARCHAR(255),
  fecha DATE NOT NULL,
  descripcion TEXT NOT NULL,
  PRIMARY KEY (ID)
);

CREATE TABLE users(
  id_user int(11) AUTO_INCREMENT,
  name varchar(50) not null,
  user_name varchar(20) not null,
  user_pass varchar(20) not null,

  primary key (id_user)
);

insert into USERS(name, user_name, user_pass) values
  ('daniel ayala', 'daniel', 'daniel123');
