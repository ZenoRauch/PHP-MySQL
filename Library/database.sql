CREATE DATABASE library;

USE library;


CREATE TABLE author(
    id INT NOT NULL auto_increment Primary Key,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE BOOKS(
    id INT NOT NULL auto_increment Primary Key,
    title VARCHAR(255) NOT NULL,
    authorid INT NOT NULL,
    descript TEXT NOT NULL,
    Foreign Key(authorid) references author(id)
);