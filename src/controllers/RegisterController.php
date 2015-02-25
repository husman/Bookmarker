<?php
include 'controllers/base/Controller.php';
include 'models/User.php';

class RegisterController extends Controller {
    public function index() {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repeat_password = $_POST['repeat_password'];

        if($password != $repeat_password) {
            $_SESSION['register_error'] = 1;
            $_SESSION['register_error_message'] = 'Your passwords do not match';
            header('Location: /src/?c=login&a=login');
            exit;
        }

        if($email == NULL) {
            $_SESSION['register_error'] = 1;
            $_SESSION['register_error_message'] = 'E-mail cannot be empty';
            header('Location: /src/?c=login&a=login');
            exit;
        }

        $existing_user = User::get(array(
            'email' => $email
        ));

        if($existing_user) {
            $_SESSION['register_error'] = 1;
            $_SESSION['register_error_message'] = 'The E-mail address is already in use.';
            header('Location: /src/?c=login&a=login');
            exit;
        }

        unset($_SESSION['register_error']);
        unset($_SESSION['register_error_message']);

        $user = new User(array(
            'email' => $email,
            'password' => $password
        ));
        $user->save();

        // Login the new user
        $_SESSION['user_id'] = $user->id;
        header('Location: /');
    }
}