<?php


class controller {
    public function render(string $page, string $title, array $var = []){
        require_once $_SERVER['DOCUMENT_ROOT'] . "/View/partials/header.php";
        require_once $_SERVER['DOCUMENT_ROOT'] . "/View/partials/navbar.php";
        require_once $_SERVER['DOCUMENT_ROOT'] . "/view/" . $page. ".php";
        require_once $_SERVER['DOCUMENT_ROOT'] . "/View/partials/footer.php";
    }
}