<?php 

namespace prabutama\e_learning\Controller;

class HomeController {
    public function index() {
        $this->view('home');
    }
    public function view($view, $data = []) {
        extract($data);
        $view = "../app/view/$view.php";
        require_once "../app/view/layouts/main.php";
    }

}

