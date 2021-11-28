<?php
class kapcsolatController {
    
    private $model;
    
    function __construct() {
        $this->model = new kapcsolatModel();
    }
    
    function render() {
        
        $result = [];
        
        if(isset( $_POST['name']))
            $name = $_POST['name'];
        if(isset( $_POST['email']))
            $email = $_POST['email'];
        if(isset( $_POST['message']))
            $message = $_POST['message'];
        if(isset( $_POST['subject']))
            $subject = $_POST['subject'];

        if (!empty($_POST)) {
            $errorMessage = '';

            if ($name === ''){
                $errorMessage = "Name nem lehet üres.";
            }
            if ($email === ''){
                $errorMessage = "Email nem lehet üres.";

            } else {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $errorMessage = "Email hibás formátumú.";
                }
            }
            if ($subject === ''){
                $errorMessage = "Tárgy nem lehet üres.";
            }
            if ($message === ''){
                $errorMessage = "Üzenet nem lehet üres.";
            }
            
            if ($errorMessage === '') {
                $result = $this->model->mentes($name, $email, $subject, $message);
            } else {
                $result['errorMessage'] = $errorMessage;
            }
        }
        
        return render('View/kapcsolat.php', $result);
    }   
}