CREATE DATABASE IF NOT EXISTS mglsi_news2;
USE mglsi_news2;

DROP TABLE IF EXISTS Article, Categorie, User, Token;

CREATE TABLE Article(
	id int primary key auto_increment,
	titre varchar(255),
	contenu text,
	dateCreation datetime DEFAULT NOW(),
	dateModification datetime DEFAULT NOW(),
	categorie int
) ENGINE InnoDB DEFAULT CHARSET UTF8;


CREATE TABLE Categorie(
	id int primary key auto_increment,
	libelle varchar(20)
) ENGINE InnoDB DEFAULT CHARSET UTF8;

CREATE TABLE User (
	id int primary key auto_increment,
    email VARCHAR(20),
    motdePasse VARCHAR(255),
	isAdmin Boolean
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

CREATE TABLE Token (
	id int primary key auto_increment,
    valeur VARCHAR(20),
	user int
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;


INSERT INTO Categorie(libelle) VALUES ('Sport'), ('Santé'), ('Education'), ('Politique');

INSERT INTO Article (titre, contenu, categorie) VALUES ('Première victoire du Sénégal', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1),
	('Election en Mauritanie', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 4),
	('Début de la CAN', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1),
	('Pétrole au Sénégal', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 4),
	("Inauguration d'un ENO à l'UVS", 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 3);

ALTER TABLE Article ADD CONSTRAINT fk_categorie_article FOREIGN KEY(categorie) REFERENCES Categorie(id);
ALTER TABLE Token ADD CONSTRAINT fk_user_token FOREIGN KEY(user) REFERENCES User(id);

INSERT INTO User(email,motdePasse) VALUES ('admin@actu.sn', SHA2('password123', 256));
GRANT ALL PRIVILEGES ON mglsi_news.* TO mglsi_user IDENTIFIED BY 'passer';