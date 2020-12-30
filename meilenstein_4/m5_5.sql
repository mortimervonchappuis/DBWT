DROP PROCEDURE IF EXISTS `spUser_IncrementLogin`;
CREATE PROCEDURE `spUser_IncrementLogin` (IN email varchar(100))
BEGIN
    UPDATE benutzers SET anzahl_anmeldungen = anzahl_anmeldungen + 1 WHERE E_Mail=email;
END