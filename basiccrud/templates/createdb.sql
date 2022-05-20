DROP DATABASE IF EXISTS basiccrud;

CREATE DATABASE basiccrud;

USE basiccrud;

DROP TABLE IF EXISTS student;

CREATE TABLE student (

id INT NOT NULL AUTO_INCREMENT,

firstName VARCHAR(50),

surname VARCHAR(50),

PRIMARY KEY (id)

);

ALTER TABLE student
    ADD Email varchar(255),
    ADD telephone_number varchar(10),
    ADD street_name varchar(50) NOT NULL,
    ADD house_number INT NOT NULL,
    ADD huisnummer_toevoeging varchar(10),
    ADD residence varchar(50) NOT NULL,
    ADD post_cose varchar(6) NOT NULL;


