<?php
include 'controllers/base/Controller.php';
include 'models/User.php';
include 'models/Bookmark.php';

class IndexController extends Controller {
    public function index() {
        if(!isset($_SESSION['user_id'])) {
            header('Location: /src/?c=login&a=index');
            exit;
        }
        $user = User::get($_SESSION['user_id']);

        // get all of the user's bookmarks
        $user_bookmarks = Bookmark::get(array(
            'user' => $user
        ));

        $view_data = array(
            'bookmarks'=> $user_bookmarks
        );

        $this->render('bookmark_list', $view_data);
    }
}