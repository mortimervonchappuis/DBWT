CREATE TABLE Bewertung(
	id INT(8) NOT NULL AUTO INCREMENT PRIMARY KEY,
	Hervorgehoben BOOLEAN NOT NULL,
	Zeitpunkt DATETIME NOT NULL,
	Beschreibung VARCHAR(500) NOT NULL,
	Bewertung INT(8) NOT NULL)

CREATE TABLE Bewertung_hat_Gericht(
	gericht_id INT(8),
	bewertungen_id INT(8),
	FOREIGN KEY (gerichte_id) REFERENCES gerichte(id), 
	FOREIGN KEY (bewertungen_id) REFERENCES bewertungen(id), 
PRIMARY KEY (gericht_id, bewertungen_id))

CREATE TABLE Bewertung_hat_Benutzer(
	benutzer_id INT(8),
	bewertungen_id INT(8),
	FOREIGN KEY (benutzer_id) REFERENCES benutzer(id), 
	FOREIGN KEY (bewertungen_id) REFERENCES bewertungen(id), 
PRIMARY KEY (benutzer_id, bewertungen_id))