CREATE DATABASE bewerbungsvorbereiter;

USE bewerbungsvorbereiter;

CREATE TABLE firm(
    id INT NOT NULL auto_increment Primary Key,
    firm VARCHAR(255) NOT NULL,
    datetime VARCHAR(15) NOT NULL, /* Eigenes Format, da DATE noch nicht gross angewandt wurde*/
    length VARCHAR(5) NOT NULL,
    Person VARCHAR(255) NOT NULL,
    place VARCHAR(255) NOT NULL,
    clothes VARCHAR(255) NOT NULL,
    strengths text NOT NULL,
    weaknesses text NOT NULL,
    questions text NOT NULL,
    jobdescription text NOT NULL
);
