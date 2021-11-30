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

    function termekek($oprendszer = null, $gyarto = null, $processzor = null) {
        $where = 'WHERE 1 = 1';

        if ($oprendszer !== null) {
            $where .= ' AND oprendszer.id = ' . intval($oprendszer);
        }

        if ($gyarto !== null) {
            $where .= ' AND gep.gyarto = "' . filter_var($gyarto, FILTER_SANITIZE_STRING) . '"';
        }

        if ($processzor !== null) {
            $where .= ' AND processzor.gyarto = "' . filter_var($processzor, FILTER_SANITIZE_STRING) . '"';
        }

        $rows = Database::query('SELECT gep.*, processzor.tipus as processzor, oprendszer.nev as oprendszer from gep LEFT JOIN processzor ON processzor.id = gep.processzorid LEFT JOIN oprendszer ON oprendszer.id = gep.oprendszerid ' . $where . ' order by id desc ');
        return $rows;
    }
}