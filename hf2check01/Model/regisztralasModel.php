<?php
class regisztralasModel {
    function regisztralas($felhasznalo, $vezeteknev, $utonev, $jelszo) {
        try {
            // Kapcsolódás
            $dbh = Database::connect();
            
            // Létezik már a felhasználói név?
            $sqlSelect = "select id from felhasznalok where bejelentkezes = :bejelentkezes";
            $sth = $dbh->prepare($sqlSelect);
            $sth->execute(array(':bejelentkezes' => $felhasznalo));
            if($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                $uzenet = "A felhasználói név már foglalt!";
                $ujra = "true";
            }
            else {
                // Ha nem létezik, akkor regisztráljuk
                $sqlInsert = "insert into felhasznalok(id, csaladi_nev, uto_nev, bejelentkezes, jelszo)
                              values(0, :csaladinev, :utonev, :bejelentkezes, :jelszo)";
                $stmt = $dbh->prepare($sqlInsert); 
                $stmt->execute(array(':csaladinev' => $vezeteknev, ':utonev' => $utonev,
                                     ':bejelentkezes' => $felhasznalo, ':jelszo' => sha1($jelszo)));
                                     
                if($count = $stmt->rowCount()) {
                    $newid = $dbh->lastInsertId();
                    $uzenet = "A regisztrációja sikeres.<br>Azonosítója: {$newid}<br><a href=\"/bejelentkezes\">Kattintson ide a bejelentkezéshez</a>";
                    $ujra = false;
                }
                else {
                    $uzenet = "A regisztráció nem sikerült.";
                    $ujra = true;
                }
            }
        }
        catch (PDOException $e) {
            $uzenet = "Hiba: ".$e->getMessage();
            $ujra = true;
        }
        return ['uzenet' => $uzenet, 'ujra' => $ujra, 'newid' => $newid];
    }
}