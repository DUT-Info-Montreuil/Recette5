-- phpMyAdmin SQL Dump
-- version 5.1.1deb3+bionic1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 05 déc. 2022 à 23:43
-- Version du serveur : 5.7.40
-- Version de PHP : 7.2.24-0ubuntu0.18.04.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dutinfopw201631`
--

-- --------------------------------------------------------

--
-- Structure de la table `Appartenir`
--

CREATE TABLE `Appartenir` (
  `idRecette` bigint(20) UNSIGNED NOT NULL,
  `idCategorie` bigint(20) UNSIGNED NOT NULL,
  `idSousCategorie` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Appartenir`
--

INSERT INTO `Appartenir` (`idRecette`, `idCategorie`, `idSousCategorie`) VALUES
(167, 1, NULL),
(163, 2, 3),
(164, 4, 8),
(161, 1, 10),
(162, 1, 10),
(165, 1, 10),
(166, 4, 13),
(168, 5, 14),
(169, 5, 20);

-- --------------------------------------------------------

--
-- Structure de la table `Categorie`
--

CREATE TABLE `Categorie` (
  `idCategorie` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Categorie`
--

INSERT INTO `Categorie` (`idCategorie`, `nom`) VALUES
(1, 'Plat'),
(2, 'Dessert'),
(3, 'Boisson'),
(4, 'Entree'),
(5, 'Accompagnement');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `idCommentaire` bigint(20) UNSIGNED NOT NULL,
  `commentaire` varchar(500) NOT NULL,
  `idUtilisateur` bigint(20) UNSIGNED NOT NULL,
  `idRecette` bigint(20) UNSIGNED NOT NULL,
  `dateAjout` date NOT NULL,
  `heureAjout` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`idCommentaire`, `commentaire`, `idUtilisateur`, `idRecette`, `dateAjout`, `heureAjout`) VALUES
(61, 'super recette', 15, 161, '2022-12-05', '23:42:57');

-- --------------------------------------------------------

--
-- Structure de la table `Detenir`
--

CREATE TABLE `Detenir` (
  `idRole` bigint(20) UNSIGNED NOT NULL,
  `idDroit` bigint(20) UNSIGNED NOT NULL,
  `valeur` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Detenir`
--

INSERT INTO `Detenir` (`idRole`, `idDroit`, `valeur`) VALUES
(1, 1, 1),
(1, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `DonnerAvis`
--

CREATE TABLE `DonnerAvis` (
  `idUtilisateur` bigint(20) UNSIGNED NOT NULL,
  `favori` tinyint(1) DEFAULT NULL,
  `aime` tinyint(1) DEFAULT NULL,
  `idRecette` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `DonnerAvis`
--

INSERT INTO `DonnerAvis` (`idUtilisateur`, `favori`, `aime`, `idRecette`) VALUES
(15, NULL, 1, 162),
(16, NULL, 0, 161);

-- --------------------------------------------------------

--
-- Structure de la table `droit`
--

CREATE TABLE `droit` (
  `idDroit` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `droit`
--

INSERT INTO `droit` (`idDroit`, `nom`) VALUES
(1, 'supprimerUtilisateur'),
(2, 'bannirUtilisteur');

-- --------------------------------------------------------

--
-- Structure de la table `EtreAmis`
--

CREATE TABLE `EtreAmis` (
  `idUtilisateur` bigint(20) UNSIGNED NOT NULL,
  `idUtilisateur_1` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `EtreAmis`
--

INSERT INTO `EtreAmis` (`idUtilisateur`, `idUtilisateur_1`) VALUES
(15, 16);

-- --------------------------------------------------------

--
-- Structure de la table `Ingredient`
--

CREATE TABLE `Ingredient` (
  `idIngredient` bigint(20) UNSIGNED NOT NULL,
  `nomIngredient` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Ingredient`
--

INSERT INTO `Ingredient` (`idIngredient`, `nomIngredient`) VALUES
(1, 'sucre'),
(2, 'lait'),
(3, 'frommage'),
(4, 'sel'),
(5, 'steak'),
(6, 'eau'),
(7, 'tomates'),
(9, 'macis'),
(10, 'acidifiant'),
(14, 'dinde'),
(15, 'farine'),
(16, 'miel'),
(17, 'oeuf'),
(18, 'poisson'),
(19, 'riz'),
(20, 'spaghetti'),
(21, 'lasagne'),
(22, 'blanc de poulet'),
(23, 'cote de boeuf'),
(24, 'aile de poulet'),
(25, 'amande'),
(26, 'pomme'),
(27, 'chocolat noir'),
(28, 'chocolat blanc'),
(29, 'chocolat au lait');

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `idPhoto` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `idRecette` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`idPhoto`, `photo`, `idRecette`) VALUES
(161, '638e70ef7cb2d7.49813408.png', 161),
(162, '638e719d19fd48.70341781.jpg', 162),
(163, '638e726672ef27.13325964.jpg', 163),
(164, NULL, 164),
(165, '638e730d027380.51175660.jpg', 165),
(166, NULL, 166),
(167, NULL, 167),
(168, NULL, 168),
(169, NULL, 169);

-- --------------------------------------------------------

--
-- Structure de la table `Recette`
--

CREATE TABLE `Recette` (
  `idRecette` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(50) DEFAULT NULL,
  `tpsPreparration` int(11) DEFAULT NULL,
  `datePublication` date DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `noteAnnexe` varchar(50) DEFAULT NULL,
  `vegan` tinyint(1) DEFAULT NULL,
  `idUtilisateur` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Recette`
--

INSERT INTO `Recette` (`idRecette`, `titre`, `tpsPreparration`, `datePublication`, `description`, `noteAnnexe`, `vegan`, `idUtilisateur`) VALUES
(161, 'lasagne au steak', 10, '2022-12-05', 'Pelez les oignons et hachez-les grossiÃ¨rement.\r\n\r\nGESTES TECHNIQUES\r\n\r\nTailler un oignon\r\n2\r\nA l\'aide d\'une fourchette, hachez les steaks hachÃ©s.\r\n\r\n3\r\nFaites chauffer dans une sauteuse 1 c. Ã  soupe d\'huile d\'olive, ajoutez les oignons hachÃ©s et faites-les cuire pendant 5 min Ã  feu modÃ©rÃ©.\r\n\r\n4\r\nAjoutez la viande hachÃ©e et faites cuire 10 min en remuant de temps en temps.\r\n\r\n5\r\nSalez, poivrez, incorporez 2 c. Ã  soupe de coulis de tomate, laissez cuire encore 2 min et retirez du feu.\r\n\r\n6\r\nRetirez la viande de la sauteuse et rÃ©servez-la.\r\n\r\n7\r\nVersez le reste d\'huile dans la sauteuse, ajoutez le coulis de tomate restant, mÃ©langez, salez et laissez cuire une dizaine de minutes Ã  feu doux.\r\n\r\n8\r\nDÃ©taillez la mozzarella en tranches de 1/2 cm d\'Ã©paisseur.\r\n\r\n', '', 1, 16),
(162, 'spaghetti bolognaise', 30, '2022-12-05', 'Ã‰TAPE 1\r\nail\r\noignon\r\ncarotte\r\ncÃ©leri\r\nHachez l\'ail, l\'oignon, puis coupez la carotte et le cÃ©leri en petits dÃ©s (enlevez les principales nervures du cÃ©leri).\r\n\r\nÃ‰TAPE 2\r\nhuile\r\nFaites chauffer l\'huile dans une casserole assez grande. Faites revenir l\'ail, l\'oignon, la carotte et le cÃ©leri Ã  feu doux pendant 5 min en remuant.\r\n\r\nÃ‰TAPE 3\r\nboeuf hachÃ©\r\nAugmenter la flamme, puis ajoutez le boeuf. Faites brunir et remuez de faÃ§on Ã  ce que la viande ne fasse pas de gros paquets.\r\n\r\nÃ‰TAPE 4\r\nvin rouge\r\nbouillon\r\nsucre\r\npersil\r\nAjoutez le bouillon, le vin rouge, les tomates prÃ©alablement coupÃ©es assez grossiÃ¨rement, le sucre et le persil hachÃ©. Portez Ã  Ã©bullition.\r\n\r\nÃ‰TAPE 5\r\nBaisser ensuite le feu et laissez mijoter Ã  couvert 1h Ã  1h30, de faÃ§on Ã  ce que le vin s\'Ã©vapore.\r\n\r\nÃ‰TAPE 6\r\nspaghetti\r\nFaites cuire les spaghetti, puis mettez-les dans un plat.', '', 0, 16),
(163, 'gÃ¢teau au chocolat', 70, '2022-12-05', 'Ã‰tape 1\r\nPrÃ©chauffez votre four Th. 4/5 (150Â°C). Faites fondre le chocolat au bain-marie. Ajoutez le beurre coupÃ© en petits morceaux, laissez-le fondre puis mÃ©langez avec le sucre, la farine, les Å“ufs et les Ã©pices.\r\n\r\nÃ‰tape 2\r\nBeurrez et farinez votre moule puis versez-y la prÃ©paration. Faites cuire au four environ 25 minutes.\r\n\r\nÃ‰tape 3\r\nDÃ©gustez tiÃ¨de ou froid avec une boule de glace Ã  la vanille.', '', 0, 15),
(164, 'plat', 10, '2022-12-05', 'test', '', 0, 15),
(165, 'riz steak', 210, '2022-12-05', 'riz steak', '', 0, 15),
(166, 'vide', 10, '2022-12-05', 'a', '', 0, 15),
(167, 'videe', 10, '2022-12-05', 'pour la pagination', 'v', 0, 15),
(168, 'videpage', 10, '2022-12-05', 'azza', 'zaza', 0, 15),
(169, 'dzadz', 10, '2022-12-05', 'zdazaddz', 'zadd', 1, 15);

-- --------------------------------------------------------

--
-- Structure de la table `Role`
--

CREATE TABLE `Role` (
  `idRole` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Role`
--

INSERT INTO `Role` (`idRole`, `nom`) VALUES
(1, 'Admin');

-- --------------------------------------------------------

--
-- Structure de la table `sousCategorie`
--

CREATE TABLE `sousCategorie` (
  `idSousCategorie` bigint(20) UNSIGNED NOT NULL,
  `nomSousCategorie` varchar(50) NOT NULL,
  `idCategorie` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sousCategorie`
--

INSERT INTO `sousCategorie` (`idSousCategorie`, `nomSousCategorie`, `idCategorie`) VALUES
(1, 'Fromage', 1),
(2, 'Feculents', 1),
(3, 'Chocolat', 2),
(4, 'Fruit', 2),
(5, 'Vanille', 2),
(7, 'Poisson', 1),
(8, 'Soupe', 4),
(9, 'Salade', 4),
(10, 'Viande', 1),
(11, 'Cocktail', 3),
(12, 'Gazeux', 3),
(13, 'Legumes', 4),
(14, 'Pomme de terre', 5),
(15, 'Vegetarien', 1),
(16, 'Fruits rouge', 2),
(17, 'Fruit', 3),
(18, 'Chaud', 3),
(19, 'Pates', 5),
(20, 'Legumes', 5),
(21, 'Riz', 5),
(22, 'Cereales', 5),
(23, 'Fritures', 4),
(24, 'Cafe', 2),
(26, 'Lait', 3),
(27, 'Fromage', 4);

-- --------------------------------------------------------

--
-- Structure de la table `tableEquipe`
--

CREATE TABLE `tableEquipe` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(20) NOT NULL,
  `anneecreation` year(4) NOT NULL,
  `description` text NOT NULL,
  `pays` bigint(20) NOT NULL,
  `logo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tableEquipe`
--

INSERT INTO `tableEquipe` (`id`, `nom`, `anneecreation`, `description`, `pays`, `logo`) VALUES
(1, 'psg', 2012, 'balablbalbl', 5, 'azdifkjdfs'),
(2, 'om', 2012, 'ici cest payet', 12, 'zafzudhusdfi');

-- --------------------------------------------------------

--
-- Structure de la table `tableJoueur`
--

CREATE TABLE `tableJoueur` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` text NOT NULL,
  `biographie` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tableJoueur`
--

INSERT INTO `tableJoueur` (`id`, `nom`, `biographie`) VALUES
(1, 'zidane', 'Zinédine Zidane, né le 23 juin 1972 à Marseille, est un footballeur international français évoluant au poste de milieu offensif, comme meneur de jeu devenu entraîneur. Surnommé Zizou, il est considéré comme l\'un des plus grands joueurs de l\'histoire du football.'),
(2, 'henry', 'Thierry Henry, né le 17 août 1977 aux Ulis (France), est un footballeur international français qui a évolué au poste d\'attaquant entre 1994 et 2014. Durant sa jeunesse, il évolue dans plusieurs clubs de la région parisienne avant d\'intégrer le centre de préformation de l\'INF Clairefontaine.'),
(5, 'Mbappe', 'Kylian Mbappé est un footballeur français né le 20 décembre 1998 à Paris. Il grandit dans une famille de sportif qui lui donne très tôt le goût de l\'activité physique, et en particulier du football. En effet, son père est un ex-footballeur aux racines camerounaises, ensuite reconverti en tant qu\'entraîneur.'),
(7, 'rami', 'Adil Rami, né le 27 décembre 1985 à Bastia (France), est un footballeur international français, évoluant au poste de défenseur à l\'ES Troyes AC. Rami commence sa carrière de footballeur à l\'ES Fréjus, sans être passé par un centre de formation. Il est alors remarqué par le LOSC Lille avec qui il débute en Ligue 1.'),
(12, 'AA', 'AAA'),
(13, 'AAA', 'AAAA'),
(14, 'emilio', 'le bg');

-- --------------------------------------------------------

--
-- Structure de la table `tabletest`
--

CREATE TABLE `tabletest` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `texte` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `testAjax`
--

CREATE TABLE `testAjax` (
  `testText` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `testAjax`
--

INSERT INTO `testAjax` (`testText`) VALUES
('azgzabghazb'),
('aaaa'),
('aaaa'),
('aaa'),
('aaa'),
('aaa'),
('aaa'),
('aa'),
('aa'),
('aa'),
('aa'),
('aa'),
('aa'),
('aa'),
('aaaa'),
('aaaa'),
('aaaa'),
('aaa'),
('aaa');

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateurs`
--

CREATE TABLE `Utilisateurs` (
  `idUtilisateur` bigint(20) UNSIGNED NOT NULL,
  `login` varchar(50) DEFAULT NULL,
  `mdp` varchar(200) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `idRole` bigint(20) UNSIGNED DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `banni` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Utilisateurs`
--

INSERT INTO `Utilisateurs` (`idUtilisateur`, `login`, `mdp`, `email`, `idRole`, `photo`, `description`, `banni`) VALUES
(15, 'psolanki', '$argon2i$v=19$m=65536,t=4,p=1$SnJTc3ZBa2ExSkdmNFdRZw$FeDJO8BHNUZhADHO69nADXiDmHtQpB5TRVdpySmFC4M', 'psolanki@condorcet93.fr', 1, '638e30d10f8417.61143516.jpg', 'Ce site est sympa', 0),
(16, 'emsko', '$argon2i$v=19$m=65536,t=4,p=1$OEtZR3Fud3hYRnNmNlVhVA$fg3Lj32q5WMAhqm1u+H7djWm+YeGgV3vaWanwNJniw4', 'bambou252@gmail.com', 1, '63871dd343fe78.98594931.png', 'Testos', 0);

-- --------------------------------------------------------

--
-- Structure de la table `Utiliser`
--

CREATE TABLE `Utiliser` (
  `idRecette` bigint(20) UNSIGNED NOT NULL,
  `idIngredient` bigint(20) UNSIGNED NOT NULL,
  `Quantite` double DEFAULT NULL,
  `unite` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Utiliser`
--

INSERT INTO `Utiliser` (`idRecette`, `idIngredient`, `Quantite`, `unite`) VALUES
(161, 5, 500, 'g'),
(161, 21, 800, 'g'),
(162, 5, 400, 'g'),
(162, 7, 10, 'nb'),
(162, 20, 5, 'kg'),
(163, 28, 500, 'g'),
(165, 5, 200, 'g'),
(165, 19, 500, 'g'),
(167, 22, 500, 'kg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Appartenir`
--
ALTER TABLE `Appartenir`
  ADD PRIMARY KEY (`idRecette`,`idCategorie`) USING BTREE,
  ADD KEY `fk_idCategorie` (`idCategorie`),
  ADD KEY `idRecette` (`idRecette`) USING BTREE,
  ADD KEY `fk_idSousCategorie` (`idSousCategorie`);

--
-- Index pour la table `Categorie`
--
ALTER TABLE `Categorie`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`idCommentaire`),
  ADD UNIQUE KEY `idCommentaire` (`idCommentaire`),
  ADD KEY `fk_commentaire` (`idUtilisateur`),
  ADD KEY `fk_commentaire2` (`idRecette`);

--
-- Index pour la table `Detenir`
--
ALTER TABLE `Detenir`
  ADD PRIMARY KEY (`idRole`,`idDroit`),
  ADD KEY `fk_detenir1` (`idDroit`);

--
-- Index pour la table `DonnerAvis`
--
ALTER TABLE `DonnerAvis`
  ADD PRIMARY KEY (`idUtilisateur`,`idRecette`),
  ADD KEY `DonnerAvis_ibfk_2` (`idRecette`);

--
-- Index pour la table `droit`
--
ALTER TABLE `droit`
  ADD PRIMARY KEY (`idDroit`),
  ADD UNIQUE KEY `idDroit` (`idDroit`);

--
-- Index pour la table `EtreAmis`
--
ALTER TABLE `EtreAmis`
  ADD PRIMARY KEY (`idUtilisateur`,`idUtilisateur_1`),
  ADD KEY `EtreAmis_ibfk_2` (`idUtilisateur_1`);

--
-- Index pour la table `Ingredient`
--
ALTER TABLE `Ingredient`
  ADD PRIMARY KEY (`idIngredient`),
  ADD UNIQUE KEY `idIngredient` (`idIngredient`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`idPhoto`),
  ADD UNIQUE KEY `idPhoto` (`idPhoto`),
  ADD KEY `photo_ibfk_1` (`idRecette`);

--
-- Index pour la table `Recette`
--
ALTER TABLE `Recette`
  ADD PRIMARY KEY (`idRecette`),
  ADD UNIQUE KEY `idRecette` (`idRecette`),
  ADD KEY `idRecette_2` (`idRecette`),
  ADD KEY `idRecette_3` (`idRecette`),
  ADD KEY `Recette_ibfk_1` (`idUtilisateur`);

--
-- Index pour la table `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`idRole`),
  ADD UNIQUE KEY `idRole` (`idRole`);

--
-- Index pour la table `sousCategorie`
--
ALTER TABLE `sousCategorie`
  ADD PRIMARY KEY (`idSousCategorie`),
  ADD UNIQUE KEY `is_sousCategorie` (`idSousCategorie`),
  ADD KEY `fk_categorie` (`idCategorie`);

--
-- Index pour la table `tableEquipe`
--
ALTER TABLE `tableEquipe`
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `tableJoueur`
--
ALTER TABLE `tableJoueur`
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `tabletest`
--
ALTER TABLE `tabletest`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  ADD PRIMARY KEY (`idUtilisateur`),
  ADD UNIQUE KEY `idUtilisateur` (`idUtilisateur`),
  ADD KEY `idRole` (`idRole`);

--
-- Index pour la table `Utiliser`
--
ALTER TABLE `Utiliser`
  ADD PRIMARY KEY (`idRecette`,`idIngredient`),
  ADD KEY `Utiliser_ibfk_2` (`idIngredient`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Appartenir`
--
ALTER TABLE `Appartenir`
  MODIFY `idRecette` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT pour la table `Categorie`
--
ALTER TABLE `Categorie`
  MODIFY `idCategorie` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `idCommentaire` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT pour la table `droit`
--
ALTER TABLE `droit`
  MODIFY `idDroit` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `Ingredient`
--
ALTER TABLE `Ingredient`
  MODIFY `idIngredient` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `idPhoto` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT pour la table `Recette`
--
ALTER TABLE `Recette`
  MODIFY `idRecette` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT pour la table `Role`
--
ALTER TABLE `Role`
  MODIFY `idRole` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `sousCategorie`
--
ALTER TABLE `sousCategorie`
  MODIFY `idSousCategorie` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `tableEquipe`
--
ALTER TABLE `tableEquipe`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tableJoueur`
--
ALTER TABLE `tableJoueur`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `tabletest`
--
ALTER TABLE `tabletest`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  MODIFY `idUtilisateur` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Appartenir`
--
ALTER TABLE `Appartenir`
  ADD CONSTRAINT `fk_idCategorie` FOREIGN KEY (`idCategorie`) REFERENCES `Categorie` (`idCategorie`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_idRecette` FOREIGN KEY (`idRecette`) REFERENCES `Recette` (`idRecette`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_idSousCategorie` FOREIGN KEY (`idSousCategorie`) REFERENCES `sousCategorie` (`idSousCategorie`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `fk_commentaire` FOREIGN KEY (`idUtilisateur`) REFERENCES `Utilisateurs` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_commentaire2` FOREIGN KEY (`idRecette`) REFERENCES `Recette` (`idRecette`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `Detenir`
--
ALTER TABLE `Detenir`
  ADD CONSTRAINT `fk_detenir1` FOREIGN KEY (`idDroit`) REFERENCES `droit` (`idDroit`),
  ADD CONSTRAINT `fk_detenir2` FOREIGN KEY (`idRole`) REFERENCES `Role` (`idRole`);

--
-- Contraintes pour la table `DonnerAvis`
--
ALTER TABLE `DonnerAvis`
  ADD CONSTRAINT `DonnerAvis_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `Utilisateurs` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `DonnerAvis_ibfk_2` FOREIGN KEY (`idRecette`) REFERENCES `Recette` (`idRecette`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `EtreAmis`
--
ALTER TABLE `EtreAmis`
  ADD CONSTRAINT `EtreAmis_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `Utilisateurs` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `EtreAmis_ibfk_2` FOREIGN KEY (`idUtilisateur_1`) REFERENCES `Utilisateurs` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`idRecette`) REFERENCES `Recette` (`idRecette`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `Recette`
--
ALTER TABLE `Recette`
  ADD CONSTRAINT `Recette_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `Utilisateurs` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `sousCategorie`
--
ALTER TABLE `sousCategorie`
  ADD CONSTRAINT `fk_categorie` FOREIGN KEY (`idCategorie`) REFERENCES `Categorie` (`idCategorie`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  ADD CONSTRAINT `Utilisateurs_ibfk_1` FOREIGN KEY (`idRole`) REFERENCES `Role` (`idRole`);

--
-- Contraintes pour la table `Utiliser`
--
ALTER TABLE `Utiliser`
  ADD CONSTRAINT `Utiliser_ibfk_1` FOREIGN KEY (`idRecette`) REFERENCES `Recette` (`idRecette`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `Utiliser_ibfk_2` FOREIGN KEY (`idIngredient`) REFERENCES `Ingredient` (`idIngredient`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
