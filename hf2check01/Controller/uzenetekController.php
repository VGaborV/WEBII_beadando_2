<?php
class uzenetekController {
    
    private $model;
    
    function __construct() {
        $this->model = new uzenetekModel();
    }
    
    function render() {
        
        return render('View/uzenetek.php', ['rows' => $this->model->getUzenetek()]);
    }   
}