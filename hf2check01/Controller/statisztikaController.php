<?php
class statisztikaController {
    
    private $model;
    
    function __construct() {
        $this->model = new statisztikaModel();
    }
    
    function render() {
        return render('View/statisztika.php', [
            'gyartoBejegyzesek' => $this->model->gyartoDarab(),
        ]);
    }   
}