<?php
include 'controllers/base/Controller.php';
include 'models/User.php';

class LoginController extends Controller {
    public function index() {
        $this->render('login_page', array());
    }
}