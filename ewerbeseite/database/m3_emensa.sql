

CREATE TABLE IF NOT EXISTS allergen (
  code char(4) NOT NULL,
  name varchar(300) NOT NULL,
  typ varchar(20) NOT NULL,
  PRIMARY KEY (code)
);

CREATE TABLE IF NOT EXISTS gericht (
  id int(8) NOT NULL,
  name varchar(80) NOT NULL,
  beschreibung varchar(800) NOT NULL,
  erfasst_am date NOT NULL,
  vegetarisch tinyint(4) NOT NULL DEFAULT '0',
  vegan tinyint(4) NOT NULL DEFAULT '0',
  preis_intern double NOT NULL DEFAULT '0',
  preis_extern double NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
);


CREATE TABLE IF NOT EXISTS gericht_hat_allergen (
  code char(4) NOT NULL,
  gericht_id int(8) NOT NULL,
  KEY FK__allergen (code),
  KEY FK__gericht (gericht_id),
  CONSTRAINT FK__allergen FOREIGN KEY (code) REFERENCES allergen (code),
  CONSTRAINT FK__gericht FOREIGN KEY (gericht_id) REFERENCES gericht (id)
);

CREATE TABLE IF NOT EXISTS gericht_hat_kategorie (
  gericht_id int(8) NOT NULL,
  kategorie_id int(8) NOT NULL,
  KEY FKGericht (gericht_id),
  KEY FKKategorie (kategorie_id),
  CONSTRAINT FKGericht FOREIGN KEY (gericht_id) REFERENCES gericht (id),
  CONSTRAINT FKKategorie FOREIGN KEY (kategorie_id) REFERENCES kategorie (id)
);

CREATE TABLE IF NOT EXISTS kategorie (
  id int(8) NOT NULL,
  name varchar(80) NOT NULL,
  eltern_id int(8) DEFAULT NULL,
  bildname varchar(200) DEFAULT NULL,
  PRIMARY KEY (id)
);