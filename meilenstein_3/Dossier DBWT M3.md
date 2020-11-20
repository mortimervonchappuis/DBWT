# Dossier DBWT M3

| Aufgabe | Geschäzt          | Tatsächlich |
| ------- | ----------------- | ----------- |
| $1$     | 30 min            | 60 min      |
| $2$     | 20 min            | 100 min      |
| $3$     | 60 min (Linux...) | 150 min     |
| $4$     | 60 min            | 20 min      |
| $5$     | 90 min            | 70 min             |
| $6$     | 30 min            | 30 min      |
| $7$     | 60 min            | 100 min     |
| $8$     | 40 min            | 80 min      |
| $9$     | 20 min            | 10 min      |

### Aufgabe 8.1

Folgende Argumente sprechen für die Verwendung einer Datenbank über die einer Datei:

- Eine Datenbank ermöglicht es schneller auf Größere Datenmengen zuzugreifen

- Eine Datenbank bietet mehreren Nutzern die Möglichkeit gleichzeitig auf den Daten zu arbeiten und Änderungen vorzunehmen

- Eine Datenbank bietet eine Höhere Sicherheit als eine einzelne Datei

- Bei verteilten Systemen muss für den Zugriff auf die Datei ein Server eingesetzt werden, bei einer Datenbank ist dieser bereits vorhanden

- Eine Datenbank bietet leichteres Erfragen von Daten durch SQL als eine einzige Datei

### Aufgabe 8.2.2, 8.2.3

> Rückfrage(<u>Rückfragenummer</u>, Alter, Dringlichkeit, Text, Erfassungszeitpunkt, <p style="text-decoration:underline;text-decoration-style: dotted;">Kontakt</p>, Lieferungszeitfenster, <p style="text-decoration:underline;text-decoration-style: dotted;">Thema</p>)
> 
> 
> 
> Thema(), Frage(), Beschwerde(), Wunsch()
> 
> 
> 
> Kontakt(<u>ID</u>, E-Mail, Anrede, Telefonnummer,  Vorname, Nachname, <p style="text-decoration:underline;text-decoration-style: dotted;">Rechnungsaddresse</p>)
> 
> 
> 
> Lieferant(<u>ID</u>, E-Mail, Anrede, Telefonnummer, Vorname, Nachname, Rechnungsaddresse, <p style="text-decoration:underline;text-decoration-style: dotted;">Lieferungszeitfenster ID</p>)
> 
> 
> 
> Lieferungszeitfenster(<u>ID</u>, Wochentag), Morgens(<u>ID</u>, Wochentag), Mittags(<u>ID</u>, Wochentag), Abends(<u>ID</u>, Wochentag)
> 
> 
> 
> Kontakt(<u>ID</u>, E-Mail, Anrede, Telefonnummer, Vorname, Nachname, Rechnungsaddresse, <p style="text-decoration:underline;text-decoration-style: dotted;">Hausanschrift ID</p>)
> 
> 
> 
> Hausanschrift(<u>ID</u>, Straße, Hausnummer, PLZ, Ort)
> 
> Hauptswohnsitz(<u>ID</u>, Straße, Hausnummer, PLZ, Ort)
> 
> Zweitwohnsitz(<u>ID</u>, Straße, Hausnummer, PLZ, Ort)


