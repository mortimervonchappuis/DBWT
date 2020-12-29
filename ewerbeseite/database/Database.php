<?php


class Database
{

    private mysqli $mysqli;
    /**
     * Database constructor.
     */
    public function __construct()
    {
        $this->mysqli = new mysqli("localhost", "root", "root", "emensawerbeseite");
        if ($this->mysqli->connect_errno) {
            die("Verbindung fehlgeschlagen: " . $this->mysqli->connect_error);
        }

    }

    public function getAllMeals(){

        $meals = array();
        $sql = "SELECT id, name, preis_intern, preis_extern FROM gericht ORDER BY name ASC";
        $statement = $this->mysqli->prepare($sql);
        $statement->execute();
        $result = $statement->get_result();

        while($row = $result->fetch_assoc()) {

            $row['allergens'] = $this->getAllergensToMeal($row['id']);
            $meals[]=  $row;
        }

        return $meals;
    }

    public function getAllergensToMeal(int $mealId){

        $allergens = array();
        $sql = "SELECT a.* FROM gericht_hat_allergen as ga INNER JOIN allergen a on ga.code = a.code
                    WHERE ga.gericht_id = ?;";
        $statement = $this->mysqli->prepare($sql);
        $statement->bind_param('i', $mealId);
        $statement->execute();

        $result = $statement->get_result();

        while($row = $result->fetch_assoc()) {

            $allergens[]=  $row;
        }

        return $allergens;
    }

    public function getAllAllergens(){

        $allergens = array();
        $sql = "SELECT * FROM allergen";
        $statement = $this->mysqli->prepare($sql);
        $statement->execute();
        $result = $statement->get_result();

        while($row = $result->fetch_assoc()) {

            $allergens[]=  $row;
        }

        return $allergens;
    }

    public function insertWunsch(String $gericht, String $text, String $name, String $email)
    {
        $datum = date("Y-m-d");
        $sql = "INSERT INTO wunschgericht(gerichtname, beschreibung, erstelldatum, name, email) VALUES ('$gericht', '$text', '$datum', '$name', '$email')";
        $statement = $this->mysqli->prepare($sql);
        $statement->execute();
    }
}
