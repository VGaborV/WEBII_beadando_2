<?php
class belepModel {
    function belep($felhasznalo, $jelszo) {
        try {
            // Kapcsolódás
            $dbh = Database::connect();
            
            // Felhsználó keresése
            $sqlSelect = "select id, csaladi_nev, uto_nev, szerepkor from felhasznalok where bejelentkezes = :bejelentkezes and jelszo = sha1(:jelszo)";
            $sth = $dbh->prepare($sqlSelect);
            $sth->execute(array(':bejelentkezes' => $felhasznalo, ':jelszo' => $jelszo));
            $row = $sth->fetch(PDO::FETCH_ASSOC);
            if($row) {
                $_SESSION['csn'] = $row['csaladi_nev'];
                $_SESSION['un'] = $row['uto_nev'];
                $_SESSION['login'] = $_POST['felhasznalo'];
                $_SESSION['szerepkor'] = $row['szerepkor'];
            }
            return $row;
        }
        catch (PDOException $e) {
            $errormessage = "Hiba: ".$e->getMessage();
            return ['errormessage' => $errormessage];
        }     
        return [];
    }
}