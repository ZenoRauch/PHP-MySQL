CREATE DATABASE unternehmenxy;

USE unternehmenxy;

CREATE TABLE mitarbeiter(
    id INT NOT NULL auto_increment Primary Key,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE kunde(
    id INT NOT NULL auto_increment Primary Key,
    idbet INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    FOREIGN KEY (idbet) REFERENCES mitarbeiter(id)
);

INSERT INTO mitarbeiter
VALUES (0, "tom"), (0, "nico"), (0, "selena");

INSERT INTO kunde
VALUES (0, "ehrenbeck", 1),
(0, "unehrenbeck", 3),
(0, "uvielleichtehrenbeck", 3),
(0, "okook", 3),
(0, "hoppedihop", 1),
(0, "coop", 2);