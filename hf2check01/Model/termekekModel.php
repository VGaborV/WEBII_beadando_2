<?php
/**
 * Uzenet model
 */
class termekekModel {
    
    // Fetch messages
    function processzorGyarto() {
        $rows = Database::query('SELECT DISTINCT(gyarto) from processzor order by id desc');
        return $rows;
    }

    function oprendszerek() {
        $rows = Database::query('SELECT * from oprendszer order by id desc');
        return $rows;
    }

    function gepGyarto() {
        $rows = Database::query('SELECT DISTINCT(gyarto) from gep order by id desc');
        return $rows;
    }

    function termekek() {
        $rows = Database::query('SELECT * from gep order by id desc');
        return $rows;
    }
}