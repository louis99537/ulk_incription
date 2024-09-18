CREATE DATABASE universite;

USE universite;

CREATE TABLE etudiants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    post_nom VARCHAR(50),
    prenom VARCHAR(50),
    sexe ENUM('M', 'F'),
    date_naissance DATE,
    promotion VARCHAR(20),
    filiere VARCHAR(50),
    photo VARCHAR(255),
    matricule VARCHAR(20) UNIQUE
);