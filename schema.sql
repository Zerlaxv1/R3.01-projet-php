CREATE TABLE `Joueur` (
	`id` INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
	`Nom` VARCHAR(255) NOT NULL,
	`Prenom` VARCHAR(255) NOT NULL,
	`License` VARCHAR(255) NOT NULL UNIQUE,
	`DateDeNaissance` DATE NOT NULL,
	`Taille` NUMERIC NOT NULL,
	`Poids` FLOAT NOT NULL,
	`EquipeID` INTEGER,
	`Status` ENUM("Actif", "Blessé", "Suspendu", "Absent") NOT NULL,
	`Poste` ENUM("Pillier", "Talonneur", "Demi", "Trois-quart") NOT NULL,
	`Commentaire` TEXT(65535),
	PRIMARY KEY(`id`)
);


CREATE TABLE `Entraineur` (
	`id` INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
	`Identifiant` VARCHAR(255) NOT NULL,
	`motDePasse` VARCHAR(255) NOT NULL,
	PRIMARY KEY(`id`)
);


CREATE TABLE `Match` (
	`id` INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
	`EquipeAdverse` VARCHAR(255) NOT NULL,
	`Date-Heure` DATETIME NOT NULL,
	`Lieu` ENUM("Domicile", "Exterieur") NOT NULL,
	`Resultat` VARCHAR(255),
	PRIMARY KEY(`id`)
);


CREATE TABLE `Participe` (
	`MatchID` INTEGER NOT NULL,
	`JoueurID` INTEGER NOT NULL,
	`Note` INTEGER NOT NULL,
	PRIMARY KEY(`MatchID`, `JoueurID`)
);


ALTER TABLE `Participe`
ADD FOREIGN KEY(`MatchID`) REFERENCES `Match`(`id`)
ON UPDATE NO ACTION ON DELETE NO ACTION;
ALTER TABLE `Participe`
ADD FOREIGN KEY(`JoueurID`) REFERENCES `Joueur`(`id`)
ON UPDATE NO ACTION ON DELETE NO ACTION;
