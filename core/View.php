<?php
class View {
    public static function render($view, $data = []) {
        extract($data);
        require "../app/views/layout/header.php";
        require "../app/views/{$view}.php";
        require "../app/views/layout/footer.php";
    }
}