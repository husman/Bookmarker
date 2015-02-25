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
        $email = $_POST['email'];
        $password = $_POST['password'];

        if($email == NULL || $password == NULL)
            header('Location: /src/?c=login&a=index&error=1');

        $user = User::get(array(
            'email' => $email,
            'password' => $password
        ));

        if($user != NULL) {
            $_SESSION['user'] = $user;
            header('Location: /src/?c=index&a=index');
        } else {
            header('Location: /src/?c=login&a=index&error=1');
        }
    }
}