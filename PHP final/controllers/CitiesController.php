<?php

    require_once("./models/CityModel.php");

    function index () {
        $cities = CityModel::findAll();

        render("cities/index",[
            "title" => "List of Cities",
            "cities" => $cities
        ]);
    }

    function _new () {
        render("cities/new", ["title" => "New City", "action" => "create"]);
    }

    function edit ($request) {
        $cities = CityModel::find($request["params"]["id"]);

        render("cities/edit", [
            "title" => "Edit cities",
            "cities" => $cities,
            "action" => "update"
        ]); 
    }

    function create () {
        validate($_POST, "cities/new");

        CityModel::create($_POST);

        redirect("cities", ["success" => "cities was created successfully"]);
    }

    function update () {
        if(!isset($_POST["id"])){
            return redirect("cities", ["errors" => "Missing required ID parameter"]);
        }
        validate($_POST, "cities/edit/{$_POST["id"]}");

        CityModel::update($_POST);

        redirect("cities", ["success" => "cities was updated successfully"]);
    }

    function delete ($request) {
        if(!isset($_POST["id"])){
            return redirect("cities", ["errors" => "Missing required ID parameter"]);
        }

        CityModel::delete($request["params"]["id"]);

        redirect("cities", ["success" => "Parents was deleted successfully"]);
    }

    function validate ($package, $error_redirect_path) {
        $fields = ["owner_name", "address", "contact_email", "contact_phone_number", "city_id"];
        $errors = [];

        foreach($fields as $fields){
            if(empty($package[$fields])){
                $humanize = ucwords(str_replace("_"," ", $fields));
                $errors[] = "{$humanize} cannot be empty";
            }
        }
        if(count($errors)){
            return redirect($error_redirect_path,[
                "form_fields" => $package, 
                "errors" => $errors
            ]);
        }
    }

?>
