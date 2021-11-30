<?php
class gepController {
    
    private $model;

    public $isAjax = true;
    
    function __construct() {
        $this->model = new gepModel();
    }
    
    function render() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return render('View/gep.php', ['data' => $this->model->gepek()]);
        } else if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            $id = explode('/', $_SERVER['REQUEST_URI']);
            $id = end($id);
            $this->model->delete($id);
            return '';
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $insert = [];
            foreach(['id', 'gyarto', 'tipus', 'kijelzo', 'memoria', 'merevlemez', 'videovezerlo', 'ar', 'processzorid', 'oprendszerid', 'db'] as $field) {
                if (!isset($_POST[$field]) || $_POST[$field] === '') {
                    continue;
                }
                $insert[$field] = filter_var($_POST[$field], FILTER_SANITIZE_STRING);
            }
            $this->model->insert($insert);
            http_response_code(201);
            return '';
        } else if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
            parse_str(file_get_contents("php://input"),$post_vars);

            $update = [];
            foreach(['id', 'gyarto', 'tipus', 'kijelzo', 'memoria', 'merevlemez', 'videovezerlo', 'ar', 'processzorid', 'oprendszerid', 'db'] as $field) {
                if (!isset($post_vars[$field]) || $post_vars[$field] === '') {
                    continue;
                }
                $update[$field] = filter_var($post_vars[$field], FILTER_SANITIZE_STRING);
            }

            $id = explode('/', $_SERVER['REQUEST_URI']);
            $id = end($id);

            $this->model->update($id, $update);
            http_response_code(200);
            return '';
        }



    }   
}