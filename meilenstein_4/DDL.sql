DROP DATABASE IF EXISTS emensawerbeseite;
CREATE DATABASE IF NOT EXISTS emensawerbeseite;
USE emensawerbeseite;
DROP TABLE IF EXISTS gericht;
DROP TABLE IF EXISTS allergen;
DROP TABLE IF EXISTS kategorie;
DROP TABLE IF EXISTS gericht_hat_allergen;
DROP TABLE IF EXISTS gericht_hat_kategorie;
SET NAMES utf8mb4;

CREATE TABLE gericht(
  id INT(8),
  name VARCHAR(80) NOT NULL,
  beschreibung VARCHAR(80) NOT NULL,
  erfasst_am DATE NOT NULL,
  vegetarisch BOOLEAN NOT NULL,
  vegan BOOLEAN NOT NULL,
  preis_intern DOUBLE NOT NULL CHECK(preis_intern <= preis_extern),
  preis_extern DOUBLE NOT NULL CHECK(preis_intern <= preis_extern),
  PRIMARY KEY (id)
);

CREATE TABLE allergen(
  code CHAR(4),
  name VARCHAR(300) NOT NULL,
  typ VARCHAR(20) NOT NULL,
  PRIMARY KEY (code)
);

CREATE TABLE kategorie(
  id INT(8) NOT NULL,
  name VARCHAR(80) NOT NULL,
  eltern_id INT(8),
  bildname VARCHAR(200),
  FOREIGN KEY (eltern_id) REFERENCES kategorie(id),
  PRIMARY KEY (id)
);

CREATE TABLE gericht_hat_allergen(
  code CHAR(4),
  gericht_id INT(8) NOT NULL,
  FOREIGN KEY (code) REFERENCES allergen(code),
  FOREIGN KEY (gericht_id) REFERENCES gericht(id),
  PRIMARY KEY (code, gericht_id)
);

CREATE TABLE gericht_hat_kategorie(
  gericht_id INT(8),
  kategorie_id INT(8),
  FOREIGN KEY (gericht_id) REFERENCES gericht(id),
  FOREIGN KEY (kategorie_id) REFERENCES kategorie(id),
  PRIMARY KEY (gericht_id, kategorie_id)
);

CREATE TABLE wunschgericht(
  ID INT(8) NOT NULL AUTO_INCREMENT,
  Name VARCHAR(20),
  Beschreibung VARCHAR(80),
  Erstelldatum DATE,
  PRIMARY KEY (ID)
);

CREATE TABLE erstellerin(
  Name VARCHAR(20),
  E_Mail VARCHAR(30),
  PRIMARY KEY (E_Mail)
);

CREATE TABLE wunschgericht_hat_erstellerin(
  erstellerin VARCHAR(30),
  wunschgericht_id INT(8),
  FOREIGN KEY (erstellerin) REFERENCES erstellerin(E_Mail),
  FOREIGN KEY (wunschgericht_id) REFERENCES wunschgericht(ID)
);