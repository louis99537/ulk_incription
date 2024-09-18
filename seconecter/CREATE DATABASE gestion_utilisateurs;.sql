CREATE DATABASE gestion_utilisateurs;

USE gestion_utilisateurs;

CREATE TABLE utilisateurs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    post_nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    sexe ENUM('Homme', 'Femme') NOT NULL,
    code VARCHAR(8) NOT NULL UNIQUE
);
