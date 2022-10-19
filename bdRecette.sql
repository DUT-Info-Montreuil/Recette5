-- creation table utilisateurs
 drop table if exists Categorie ;
CREATE TABLE Categorie(
   idCategrorie serial,
   nom VARCHAR(50),
   idCategorieMere INT,
   PRIMARY KEY(idCategrorie)
);

 drop table if exists Ingredient ;
CREATE TABLE Ingredient(
   idIngredient serial,
   nomIngredient VARCHAR(50),
   PRIMARY KEY(idIngredient)
);



 drop table if exists droit ;
CREATE TABLE droit(
   idDroit serial,
   nom VARCHAR(50),
   valeur boolean NOT NULL,
   PRIMARY KEY(idDroit)
);
 drop table if exists Role ;
CREATE TABLE Role(
   idRole serial,
   nom VARCHAR(50),
   idDroit bigint(20) UNSIGNED,
   PRIMARY KEY(idRole),
   FOREIGN KEY(idDroit) REFERENCES droit(idDroit)
);
 drop table if exists Utilisateurs ;
CREATE TABLE Utilisateurs(
   idUtilisateur serial,
   login VARCHAR(50),
   mdp VARCHAR(50),
   email VARCHAR(50),
   idRole bigint(20) UNSIGNED,
   PRIMARY KEY(idUtilisateur),
   FOREIGN KEY(idRole) REFERENCES Role(idRole)
);

 drop table if exists Recette ;
CREATE TABLE Recette(
   idRecette serial,
   titre VARCHAR(50),
   tpsPreparration INT,
   datePublication TIME,
   description VARCHAR(50),
   noteAnnexe VARCHAR(50),
   vegan boolean,
   idUtilisateur bigint(20) UNSIGNED,
   PRIMARY KEY(idRecette),
   FOREIGN KEY(idUtilisateur) REFERENCES Utilisateurs(idUtilisateur)
);

 drop table if exists photo ;
CREATE TABLE photo(
   idPhoto serial,
   photo VARCHAR(50),
   idRecette bigint(20) UNSIGNED,
   PRIMARY KEY(idPhoto),
   FOREIGN KEY(idRecette) REFERENCES Recette(idRecette)
);


 drop table if exists possede ;
CREATE TABLE Possede(
   idCategrorie bigint(20) UNSIGNED,
   idRecette bigint(20) UNSIGNED,
   PRIMARY KEY(idCategrorie, idRecette),
   FOREIGN KEY(idCategrorie) REFERENCES Categorie(idCategrorie),
   FOREIGN KEY(idRecette) REFERENCES Recette(idRecette)
);

 drop table if exists Utiliser ;

CREATE TABLE Utiliser(
   idRecette bigint(20) UNSIGNED,
   idIngredient bigint(20) UNSIGNED,
   Quantite DOUBLE,
   unite VARCHAR(50),
   PRIMARY KEY(idRecette, idIngredient),
   FOREIGN KEY(idRecette) REFERENCES Recette(idRecette),
   FOREIGN KEY(idIngredient) REFERENCES Ingredient(idIngredient)
);


 drop table if exists DonnerAvis ;
CREATE TABLE DonnerAvis(
   idUtilisateur bigint(20) UNSIGNED,
   commentaire VARCHAR(50),
   favori boolean,
   aime boolean,
   idRecette bigint(20) UNSIGNED,
   PRIMARY KEY(idUtilisateur),
   FOREIGN KEY(idUtilisateur) REFERENCES Utilisateurs(idUtilisateur),
   FOREIGN KEY(idRecette) REFERENCES Recette(idRecette)
);

 drop table if exists EtreAmis ;

CREATE TABLE EtreAmis(
   idUtilisateur bigint(20) UNSIGNED,
   idUtilisateur_1 bigint(20) UNSIGNED,
   PRIMARY KEY(idUtilisateur, idUtilisateur_1),
   FOREIGN KEY(idUtilisateur) REFERENCES Utilisateurs(idUtilisateur),
   FOREIGN KEY(idUtilisateur_1) REFERENCES Utilisateurs(idUtilisateur)
);
