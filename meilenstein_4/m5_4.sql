CREATE VIEW suppen_gerichte AS
    SELECT name
    FROM gerichtes
    WHERE name LIKE '%suppe%';

CREATE VIEW login_benutzer AS
    SELECT E_Mail, anzahl_anmeldungen
    FROM benutzers
    ORDER BY anzahl_anmeldungen desc ;

Create view veggie_kat as
    Select kat.name, group_concat(distinct g.name) from kategories kat
    left join gericht_hat_kategories ghk on ghk.kategorie_id = kat.id
    left join gerichtes g on ghk.gericht_id = g.id
    and g.vegetarisch=1
    group by kat.name;


