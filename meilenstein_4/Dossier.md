# Dossier

| Aufgabe | Geschätzt | Tatsächlich |
| ------- | --------- | ----------- |
| 1       | 60 min    | 120 min     |
| 2       | 60 min    | 40 min      |
| 3       |           |             |
| 4       | 30 min    | 20 min      |
| 5       | 10 min    | 120 min     |
| 6       | 30 min    | 60 min      |
| 7       | 60 min    | 180 min     |
| 8       | 40 min    | 120 min     |

### Aufgabe 1.6

```sql
SELECT w.ID, w.Name, w.Beschreibung, w.Erstelldatum, e.Name, e.E_Mail
FROM wunschgericht AS w JOIN erstellerin AS e JOIN wunschgericht_hat_erstellerin AS whe
WHERE w.ID = whe.wunschgericht_id AND whe.erstellerin = e.E_Mail ORDER BY w.Erstelldatum DESC LIMIT 5;
```

### Aufgabe 2.3

SQL Injections konnten durch ein einfaches Sanitizen behoben werden

XSS wurde dadurch unschädlich gemacht, dass keine GET parameter direkt in die Webseite eingebaut wurden, und dadurch, dass alle einträge, welche in die Datenbank kommen, Keine html script tags mehr enthalten (sanatize)

### Aufgabe 8

```sql
ALTER TABLE gericht_hat_kategorie ADD CONSTRAINT einzigartig UNIQUE (gericht_id, kategorie_id);
ALTER TABLE gericht ADD INDEX priority (Name);
ALTER TABLE gericht_hat_kategorie ADD CONSTRAINT del_k FOREIGN KEY (gericht_id) REFERENCES gericht(id) ON DELETE CASCADE;
ALTER TABLE gericht_hat_allergen ADD CONSTRAINT del_a FOREIGN KEY (gericht_id) REFERENCES gericht(id) ON DELETE CASCADE;

-- ALTER TABLE kategorie ADD CONSTRAINT no_del ON DELETE (IF EXISTS FOREIGN KEY (eltern_id)) NO ACTION;

ALTER TABLE gericht_hat_allergen ADD CONSTRAINT update_a FOREIGN KEY (code) REFERENCES allergen(code) ON UPDATE CASCADE;
ALTER TABLE gericht_hat_kategorie ADD CONSTRAINT prim PRIMARY KEY (gericht_id, kategorie_id);
```


