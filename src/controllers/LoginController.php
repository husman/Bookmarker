<?php
include 'controllers/base/Controller.php';
include 'models/User.php';

class LoginController extends Controller {
    public function index() {
        $view_data = array(
            'error' => $_GET['error']? true : false
        );

        $this->render('login_page', $view_data);
    }

    public function login() {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if($email == NULL || $password == NULL)
            header('Location: /?c=login&a=index&error=1');

        $user = User.get(array(
                'email' => $email,
                'password' => $password
            ));

        if($user) {
            $_SESSION['user'] = $user;
            header('Location: /');
        }
    }
}