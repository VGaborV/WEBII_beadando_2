<?php
/**
 * Uzenet model
 */
class uzenetekModel {
    
    // Fetch messages
    function getUzenetek() {
        $rows = Database::query('SELECT * from kapcsolat order by id desc');
        return $rows;
    }
}