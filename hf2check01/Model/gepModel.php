
<?php
class gepModel {

    function gepek() {
        $rows = Database::query('SELECT * from gep order by id desc ');
        return $rows;
    }

    function delete($id) {
        Database::query('DELETE FROM gep WHERE id = ' . intval($id));
    }

    function insert($data) {
        $sql = 'INSERT INTO gep (' . implode(',', array_keys($data)) . ') VALUES ("' . implode('", "', array_values($data)). '")';
        Database::query($sql);
    }

    function update($id, $data) {
        $sql = 'UPDATE gep SET ';

        foreach ($data as $key => $value) {
            $sql .= ' ' . $key . ' = "' . $value . '",';
        }

        $sql = substr($sql, 0, -1);
        $sql .= ' WHERE id = ' . intval($id);
        Database::query($sql);
    }
}