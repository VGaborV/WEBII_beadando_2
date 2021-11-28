<?php
class termekekController {
    
    private $model;
    
    function __construct() {
        $this->model = new termekekModel();
    }
    
    function render() {

        if (isset($_GET['ajax']) && $_GET['ajax'] === '1') {
            return render('View/termek-lista.php', [
                'termekek' => $this->model->termekek(),
            ]);
        } else {
            return render('View/termekek.php', [
                'processzorGyarto' => $this->model->processzorGyarto(),
                'oprendszerek'  => $this->model->oprendszerek(),
                'gepGyarto'  => $this->model->gepGyarto()
            ]);
        }
    }   
}