CREATE DATABASE  IF NOT EXISTS `mydb` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `mydb`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: mydb
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.16-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `angebot`
--

DROP TABLE IF EXISTS `angebot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `angebot` (
  `angebotid` int(11) NOT NULL,
  `lieferbedingungenid` int(11) NOT NULL,
  `preisid` int(11) NOT NULL,
  `lieferantid` int(11) NOT NULL,
  `produktid` int(11) NOT NULL,
  PRIMARY KEY (`angebotid`),
  KEY `lieferantid_idx` (`lieferantid`),
  KEY `lieferbedingungenid_idx` (`lieferbedingungenid`),
  KEY `preisid_idx` (`preisid`),
  KEY `produktid_idx` (`produktid`),
  CONSTRAINT `lieferantid_angebot` FOREIGN KEY (`lieferantid`) REFERENCES `lieferant` (`lieferantid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `lieferbedingungenid_angebot` FOREIGN KEY (`lieferbedingungenid`) REFERENCES `lieferbedingungen` (`lieferbedingungenid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `preisid_angebot` FOREIGN KEY (`preisid`) REFERENCES `preis` (`preisid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `produktid_angebot` FOREIGN KEY (`produktid`) REFERENCES `produkt` (`produktid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `bestellung`
--

DROP TABLE IF EXISTS `bestellung`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bestellung` (
  `bestellungid` int(11) NOT NULL,
  `kundeid` int(11) NOT NULL,
  `zahlungid` int(11) NOT NULL,
  `datum` datetime NOT NULL,
  PRIMARY KEY (`bestellungid`),
  KEY `kid-constraint` (`kundeid`),
  KEY `zid-constraint` (`zahlungid`),
  CONSTRAINT `kid-constraint` FOREIGN KEY (`kundeid`) REFERENCES `kunde` (`kundeid`),
  CONSTRAINT `zid-constraint` FOREIGN KEY (`zahlungid`) REFERENCES `zahlungsinfo` (`zahlungid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `bestellung_produkte`
--

DROP TABLE IF EXISTS `bestellung_produkte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bestellung_produkte` (
  `bestellungid` int(11) NOT NULL,
  `produktid` int(11) NOT NULL,
  `lieferbedingungenid` int(11) NOT NULL,
  `menge` int(11) NOT NULL,
  PRIMARY KEY (`bestellungid`,`produktid`),
  KEY `produktid` (`produktid`),
  KEY `lieferbedingungenid_idx` (`lieferbedingungenid`),
  CONSTRAINT `bestellungid_bp` FOREIGN KEY (`bestellungid`) REFERENCES `bestellung` (`bestellungid`),
  CONSTRAINT `lieferbedingungenid_bp` FOREIGN KEY (`lieferbedingungenid`) REFERENCES `lieferbedingungen` (`lieferbedingungenid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `produktid_bp` FOREIGN KEY (`produktid`) REFERENCES `produkt` (`produktid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `einheit`
--

DROP TABLE IF EXISTS `einheit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `einheit` (
  `einheitID` int(11) NOT NULL,
  `bezeichnung` varchar(50) NOT NULL,
  `kurzbezeichnung` varchar(5) NOT NULL,
  PRIMARY KEY (`einheitID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `kontakt`
--

DROP TABLE IF EXISTS `kontakt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kontakt` (
  `kontaktid` int(11) NOT NULL,
  `strasse` varchar(20) DEFAULT NULL,
  `hausnummer` varchar(20) DEFAULT NULL,
  `plz` int(11) DEFAULT NULL,
  `ort` varchar(40) CHARACTER SET utf8 COLLATE utf8_german2_ci DEFAULT NULL,
  `land` varchar(40) DEFAULT 'Austria',
  `email` varchar(40) NOT NULL,
  `telefon` varchar(20) NOT NULL,
  PRIMARY KEY (`kontaktid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `kunde`
--

DROP TABLE IF EXISTS `kunde`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kunde` (
  `kundeid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `zahlungid` int(11) NOT NULL,
  `kontaktid` int(11) NOT NULL,
  `personid` int(11) NOT NULL,
  `aktiv` tinyint(1) NOT NULL DEFAULT '1',
  `rabattgruppe` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  PRIMARY KEY (`kundeid`),
  KEY `userid` (`userid`),
  KEY `zahlungid_idx` (`zahlungid`),
  KEY `adresseid_idx` (`kontaktid`),
  KEY `personid_idx` (`personid`),
  CONSTRAINT `kontaktid` FOREIGN KEY (`kontaktid`) REFERENCES `kontakt` (`kontaktid`),
  CONSTRAINT `personid` FOREIGN KEY (`personid`) REFERENCES `person` (`personid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `userid` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`),
  CONSTRAINT `zahlungid` FOREIGN KEY (`zahlungid`) REFERENCES `zahlungsinfo` (`zahlungid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lagerstand`
--

DROP TABLE IF EXISTS `lagerstand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lagerstand` (
  `lagerstandID` int(11) NOT NULL,
  `produktID` int(11) NOT NULL,
  `menge` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`lagerstandID`),
  KEY `produktID_idx` (`produktID`),
  CONSTRAINT `produktID_lager` FOREIGN KEY (`produktID`) REFERENCES `produkt` (`produktid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lieferant`
--

DROP TABLE IF EXISTS `lieferant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lieferant` (
  `lieferantid` int(11) NOT NULL,
  `zahlungid` int(11) NOT NULL,
  `kontaktid` int(11) NOT NULL,
  `mitarbeiterid` int(11) NOT NULL COMMENT 'kontaktperson',
  `lieferbdingungenid` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `aktiv` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`lieferantid`),
  KEY `zahlungid_idx` (`zahlungid`),
  KEY `kontaktid_idx` (`kontaktid`),
  KEY `lieferbedingungenid_idx` (`lieferbdingungenid`),
  KEY `kontaktpersonid_idx` (`mitarbeiterid`),
  CONSTRAINT `kontaktid_lieferant` FOREIGN KEY (`kontaktid`) REFERENCES `kontakt` (`kontaktid`),
  CONSTRAINT `lieferbedingungenid` FOREIGN KEY (`lieferbdingungenid`) REFERENCES `lieferbedingungen` (`lieferbedingungenid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `mitarbeiterid` FOREIGN KEY (`mitarbeiterid`) REFERENCES `mitarbeiter` (`mitarbeiterid`),
  CONSTRAINT `zahlungid_lieferant` FOREIGN KEY (`zahlungid`) REFERENCES `zahlungsinfo` (`zahlungid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lieferbedingungen`
--

DROP TABLE IF EXISTS `lieferbedingungen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lieferbedingungen` (
  `lieferbedingungenid` int(11) NOT NULL,
  `lieferdauer` double NOT NULL,
  `lieferkosten` double NOT NULL,
  PRIMARY KEY (`lieferbedingungenid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mitarbeiter`
--

DROP TABLE IF EXISTS `mitarbeiter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mitarbeiter` (
  `mitarbeiterid` int(11) NOT NULL,
  `personid` int(11) NOT NULL,
  `kontaktid` int(11) NOT NULL,
  `abteilung` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`mitarbeiterid`),
  KEY `personid_idx` (`personid`),
  KEY `kontaktid_idx` (`kontaktid`),
  CONSTRAINT `kontaktid_mitarbeiter` FOREIGN KEY (`kontaktid`) REFERENCES `kontakt` (`kontaktid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `personid_mitarbeiter` FOREIGN KEY (`personid`) REFERENCES `person` (`personid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `person`
--

DROP TABLE IF EXISTS `person`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `person` (
  `personid` int(11) NOT NULL,
  `anrede` varchar(10) CHARACTER SET utf8 COLLATE utf8_german2_ci NOT NULL COMMENT 'Geschlecht',
  `vorname` varchar(30) NOT NULL,
  `nachname` varchar(40) NOT NULL,
  PRIMARY KEY (`personid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `preis`
--

DROP TABLE IF EXISTS `preis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preis` (
  `preisid` int(11) NOT NULL,
  `produktid` int(11) NOT NULL,
  `lieferantid` int(11) NOT NULL,
  `einkaufspreis` double NOT NULL,
  `verkaufspreis` double NOT NULL,
  `aufschlag` double NOT NULL,
  PRIMARY KEY (`preisid`),
  KEY `produktid_idx` (`produktid`),
  KEY `lieferantid_idx` (`lieferantid`),
  CONSTRAINT `lieferantid` FOREIGN KEY (`lieferantid`) REFERENCES `lieferant` (`lieferantid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `produktid` FOREIGN KEY (`produktid`) REFERENCES `produkt` (`produktid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `produkt`
--

DROP TABLE IF EXISTS `produkt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produkt` (
  `produktid` int(11) NOT NULL,
  `kategorieid` int(11) NOT NULL,
  `angebotid` int(11) NOT NULL,
  `bezeichnung` varchar(40) CHARACTER SET utf8 NOT NULL,
  `beschreibung` text CHARACTER SET utf8,
  `bildref` varchar(40) COLLATE utf8_german2_ci NOT NULL,
  `lagerbestand` int(11) NOT NULL,
  `lieferbar` tinyint(1) NOT NULL,
  `verpackung` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `mindestbestand` tinyint(1) NOT NULL,
  `basiseinheit` int(11) NOT NULL,
  `angebotseinholung` tinyint(1) NOT NULL,
  `neu` tinyint(1) NOT NULL DEFAULT '1',
  `kategorie` int(11) NOT NULL,
  PRIMARY KEY (`produktid`),
  KEY `angebotid_idx` (`angebotid`),
  KEY `einheitID_produkt_idx` (`basiseinheit`),
  KEY `kategorieID_produkt_idx` (`kategorie`),
  CONSTRAINT `angebotid` FOREIGN KEY (`angebotid`) REFERENCES `angebot` (`angebotid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `einheitID_produkt` FOREIGN KEY (`basiseinheit`) REFERENCES `einheit` (`einheitID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `kategorieID_produkt` FOREIGN KEY (`kategorie`) REFERENCES `produktkategorie` (`kategorieID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `produktkategorie`
--

DROP TABLE IF EXISTS `produktkategorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produktkategorie` (
  `kategorieID` int(11) NOT NULL,
  `bezeichnung` varchar(50) NOT NULL,
  PRIMARY KEY (`kategorieID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `passwort` varchar(35) COLLATE utf8_german2_ci NOT NULL,
  `rolle` varchar(10) COLLATE utf8_german2_ci NOT NULL DEFAULT 'kunde',
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `zahlungsinfo`
--

DROP TABLE IF EXISTS `zahlungsinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zahlungsinfo` (
  `zahlungid` int(11) NOT NULL,
  `art` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `nummer` varchar(40) COLLATE utf8_german2_ci NOT NULL,
  PRIMARY KEY (`zahlungid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping events for database 'mydb'
--

--
-- Dumping routines for database 'mydb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-05 12:35:35
