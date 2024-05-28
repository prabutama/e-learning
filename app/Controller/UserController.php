<?php 

namespace prabutama\e_learning\Controller;
use prabutama\e_learning\models\UserModel;

class UserController {
    private $userModel;
    public function __construct() {
        $this->userModel = new UserModel();
    }
    public function loginForm() {
        $this->view('login');
    }

    public function registerForm() {
        $this->view('register');
    }

    public function store() {
        if( $this->userModel->register($_POST) > 0 ) {
            return $this->redirect('/login');
            
        } else {
            return $this->redirect('/register');
        }
    }

    public function login() {
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $user = $this->userModel->getUserByEmail($email, $password);

        if ($user) {
            session_start();
            if ($password === $user['password']) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['role'] = $user['role'];
                $_SESSION["login"] = true;
                $this->redirect('/dashboard');
            } else {
                $_SESSION['error'] = 'Email atau password salah';
                header('Location: /login');
                exit();
            }
        } else {
            $_SESSION['error'] = 'Pengguna tidak ditemukan';
            header('Location: /login');
            exit();
        }
    }

    public function logout() {
        // Hancurkan semua data sesi
        session_unset();
        session_destroy();
        
        // Redirect ke halaman login atau halaman lain yang sesuai
        $this->redirect('/');
        exit();
    }
    public function view($view = []) {
        $view = "../app/view/$view.php";
        require_once "../app/view/layouts/main.php";
    }

    public function redirect($url) {
        header("Location: " . $url);
        exit();
    }
}