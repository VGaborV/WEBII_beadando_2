<?php
class kezdooldalController {
    
    private $model;
    
    function __construct() {
        $this->model = new kezdooldalModel();
    }
    
    function render() {
        return render('View/kezdooldal.php');
    }   
}