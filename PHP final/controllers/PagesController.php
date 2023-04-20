<?php

    function index () {
        render("pages/index", [
            "title" => "Big City Rentals",
            "page_stylesheet" => "home"
        ]);
    }

?>