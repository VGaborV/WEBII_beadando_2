<?php
class kijelentkezesController {
    
    private $model;
    
    function __construct() {
        $this->model = new kijelentkezesModel();
    }
    
    function render() {
        $result = $this->model->kilep();
        return render('View/kijelentkezes.php', $result);
    }   
}