
<?php
include 'controllers/base/Controller.php';
include 'models/User.php';
include 'models/Bookmark.php';

class BookmarkController extends Controller {
    public function index() {
        header('Content-Type: application/json');

        $user_bookmarks = [];
        if(!isset($_SESSION['user_id'])) {
            echo json_encode($user_bookmarks);
            exit;
        }

        $user = User::get($_SESSION['user_id']);

        // get all of the user's bookmarks
        $user_bookmarks = Bookmark::get(array(
            'user' => $user
        ));

        echo json_encode($user_bookmarks);
    }

    public function remove() {
        if(!isset($_SESSION['user_id']))
            exit;

        $user = User::get($_SESSION['user_id']);

        $bookmark_id = $_POST['id'];
        $bookmark = Bookmark::get(array(
            'id' => $bookmark_id,
            'user' => $user
        ));

        if($bookmark)
            $bookmark[0]->delete();
    }

    public function add() {
        header('Content-Type: application/json');

        if(!isset($_SESSION['user_id']))
            exit;

        $user = User::get($_SESSION['user_id']);

        $bookmark = new Bookmark(array(
            'title' => $_POST['title'],
            'url' => $_POST['url'],
            'user' => $user
        ));

        $bookmark->save();

        echo json_encode($bookmark);
    }
}