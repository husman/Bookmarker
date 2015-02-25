<?php

class Controller {
    protected function render($view, $data) {
        extract($data);

        ob_start();
        include 'views/'.$view.'.php';
        echo ob_get_clean();
    }
}