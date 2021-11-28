<?php
class belepController {
    
    private $model;
    
    function __construct() {
        $this->model = new belepModel();
    }
    
    function render() {
        $result = [];
        
        if (isset($_POST['felhasznalo']) && isset($_POST['jelszo'])) {
            $result = $this->model->belep($_POST['felhasznalo'], $_POST['jelszo']);
        }
        
        return render('View/belep.php', $result);
    }   
}