<?php

    require_once("./models/CityModel.php");

    function index () {
        $cities = RentalModel::findAll();
        render("rentals/index", [ 
            "title" => "List of Rentals", 
            "rentals" => $cities
        ]);
    }

    function _new () {
        render("cities/new", ["title" => "New City", "action" => "create"]);
    }

    function edit ($request) {}

    function create () {
        
            validate($_POST, "rentals/new");
            
            RentalModel::create($_POST);
            
            redirect("rentals", ["success" => "rentals was created successfully"]);


    }

    function update () {}

    function delete ($request) {}

    function validate ($package, $error_redirect_path) {}

?>