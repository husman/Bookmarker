<?php
include 'controllers/base/Controller.php';
include 'models/User.php';

class IndexController extends Controller {
    public function index() {
        if(!isset($_SESSION['user'])) {
            header('Location: /src/?c=login&a=index');
            exit;
        }
        $this->render('bookmark_list', array());
    }
}