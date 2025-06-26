-- Création de la base de données
CREATE DATABASE IF NOT EXISTS `ma_bibliotheque` 
  DEFAULT CHARACTER SET utf8mb4 
  COLLATE utf8mb4_unicode_ci;
USE `ma_bibliotheque`;

--
-- Table structure for table `UTILISATEUR`
--
DROP TABLE IF EXISTS `UTILISATEUR`;
CREATE TABLE `UTILISATEUR` (
  `ID_UTIL` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant du membre',
  `NOM_UTIL` VARCHAR(100) NOT NULL COMMENT 'Nom du membre',
  `MOT_DE_PASSE` VARCHAR(255) NOT NULL COMMENT 'Mot de passe (hashé)',
  PRIMARY KEY (`ID_UTIL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
  COMMENT='Table des utilisateurs';

--
-- Dumping data for table `UTILISATEUR`
--
LOCK TABLES `UTILISATEUR` WRITE;
/*!40000 ALTER TABLE `UTILISATEUR` DISABLE KEYS */;
INSERT INTO `UTILISATEUR` VALUES
  (1, 'Dupont',   'pass123'),
  (2, 'Martin',   'azerty'),
  (3, 'Leblanc',  'qwerty'),
  (4, 'Nguyen',   '1234abcd'),
  (5, 'Garcia',   'monMotDePasse');
/*!40000 ALTER TABLE `UTILISATEUR` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `LIVRES`
--
DROP TABLE IF EXISTS `LIVRES`;
CREATE TABLE `LIVRES` (
  `ID_LIVRE` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant du livre',
  `NOM_LIVRE` VARCHAR(255) NOT NULL COMMENT 'Titre du livre',
  `STATUS` ENUM('VALABLE','NON_VALABLE') NOT NULL DEFAULT 'VALABLE' COMMENT 'Disponibilité du livre',
  `DESCRIPTION` TEXT NULL COMMENT 'Description longue du livre',
  `COVER_IMAGE` LONGBLOB NULL COMMENT 'Image de couverture (donnée binaire)',
  `PROPRIETAIRE_ID` INT(11) NOT NULL COMMENT 'Référence à l’utilisateur propriétaire',
  PRIMARY KEY (`ID_LIVRE`),
  KEY `FK_LIVRES_UTILISATEUR` (`PROPRIETAIRE_ID`),
  CONSTRAINT `FK_LIVRES_UTILISATEUR`
    FOREIGN KEY (`PROPRIETAIRE_ID`)
    REFERENCES `UTILISATEUR` (`ID_UTIL`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
  COMMENT='Table des livres prêtés';

--
-- Dumping data for table `LIVRES`
--
LOCK TABLES `LIVRES` WRITE;
/*!40000 ALTER TABLE `LIVRES` DISABLE KEYS */;
INSERT INTO `LIVRES` (`ID_LIVRE`,`NOM_LIVRE`,`STATUS`,`DESCRIPTION`,`COVER_IMAGE`,`PROPRIETAIRE_ID`) VALUES
  (1, 'Le Petit Prince',    'VALABLE',    'Conte poétique et philosophique',          NULL, 1),
  (2, '1984',               'VALABLE',    'Roman dystopique de George Orwell',        NULL, 2),
  (3, 'Les Misérables',     'NON_VALABLE','Épopée sociale de Victor Hugo',            NULL, 3),
  (4, 'Clean Code',         'VALABLE',    'Guide pour écrire un code propre',         NULL, 4),
  (5, 'Introduction SQL',   'VALABLE',    'Cours et exercices sur le langage SQL',    NULL, 5);
/*!40000 ALTER TABLE `LIVRES` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `MESSAGES`
--
DROP TABLE IF EXISTS `MESSAGES`;
CREATE TABLE `MESSAGES` (
  `ID_MESSAGE` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant du message',
  `ID_SENDER` INT(11) NOT NULL COMMENT 'Émetteur du message',
  `ID_RECEIVER` INT(11) NOT NULL COMMENT 'Destinataire du message',
  `CONTENT` TEXT NOT NULL COMMENT 'Contenu du message',
  `DATE_ENVOI` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date et heure d’envoi',
  PRIMARY KEY (`ID_MESSAGE`),
  KEY `FK_MESSAGES_SENDER` (`ID_SENDER`),
  KEY `FK_MESSAGES_RECEIVER` (`ID_RECEIVER`),
  CONSTRAINT `FK_MESSAGES_SENDER`
    FOREIGN KEY (`ID_SENDER`)
    REFERENCES `UTILISATEUR` (`ID_UTIL`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK_MESSAGES_RECEIVER`
    FOREIGN KEY (`ID_RECEIVER`)
    REFERENCES `UTILISATEUR` (`ID_UTIL`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
  COMMENT='Table des échanges de messages entre utilisateurs';

--
-- Dumping data for table `MESSAGES`
--
LOCK TABLES `MESSAGES` WRITE;
/*!40000 ALTER TABLE `MESSAGES` DISABLE KEYS */;
INSERT INTO `MESSAGES` (`ID_MESSAGE`,`ID_SENDER`,`ID_RECEIVER`,`CONTENT`,`DATE_ENVOI`) VALUES
  (1, 1,  2, 'Bonjour, je suis intéressé par ton livre.',        '2025-06-20 09:15:00'),
  (2, 2,  1, 'Salut, il est encore disponible ?',               '2025-06-20 10:00:00'),
  (3, 3,  4, 'Peux-tu me prêter Clean Code ce week-end ?',       '2025-06-21 14:30:00'),
  (4, 4,  3, 'Oui, je te le réserve jusqu’à dimanche soir.',    '2025-06-21 15:00:00'),
  (5, 5,  1, 'Merci, où doit-on se rencontrer pour la remise ?', '2025-06-22 11:45:00');
/*!40000 ALTER TABLE `MESSAGES` ENABLE KEYS */;
UNLOCK TABLES;
