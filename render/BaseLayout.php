<?php
class BaseLayout {

    public static function renderHead()
    {
        require_once "layout/header.php";
    }

    public static function renderFoot()
    {
        require_once "layout/footer.php";
    }
}