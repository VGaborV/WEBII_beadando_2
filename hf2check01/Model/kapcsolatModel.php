<?php
class kapcsolatModel {
    function mentes($name, $email, $subject, $message) {
        $dbh = Database::connect();
        
        $sqlInsert = "insert into kapcsolat(id, nev, email, targy, message)
                          values(null, :name, :email, :targy, :message)";
        $stmt = $dbh->prepare($sqlInsert);
        $stmt->execute(array(':name' => $name, ':email' => $email,
            ':targy' => $subject, ':message' => $message));
            
        if($count = $stmt->rowCount()) {
            $newid = $dbh->lastInsertId();
            $uzenet = "A beküldés sikeres.<br>Azonosítója: {$newid}";
            $ujra = false;
        }
        else {
            $uzenet = "A regisztráció nem sikerült.";
            $ujra = true;
        }
        
        return ['newid' => $newid, 'uzenet' => $uzenet, 'ujra' => $ujra];
    }
}