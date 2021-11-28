<?php
class devizavaltasController {
    
    private $model;
    
    function __construct() {
        $this->model = new devizavaltasModel();
    }
    
    function render() {
        //print_r($this->model->getData());
        return render('View/devizavaltas.php', [
            'valutes' => $this->model->valutes(),
            'data' => $this->model->getData(empty($_POST['date']) ? null : $_POST['date'])
        ]);
    }   
}