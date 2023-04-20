<?php

    require_once("./models/RentalModel.php");

    function index () {
        $rentals = RentalModel::findAll();

        render("rental s/index",[
            "title" => "List of Rentals",
            "rentals" => $rentals
        ]);
    }

    function _new () {
        render("rentals/new", ["title" => "New Rental", "action" => "create"]);
    }

    function edit ($request) {
        $rentals = RentalModel::find($request["params"]["id"]);

        render("rentals/edit", [
            "title" => "Edit Rentals",
            "rentals" => $rentals,
            "action" => "update"
        ]); 
    }

    function create () {
        validate($_POST, "rentals/new");

        RentalModel::create($_POST);

        redirect("rentals", ["success" => "rentals was created successfully"]);
    }

    function update () {
        if(!isset($_POST["id"])){
            return redirect("rentals", ["errors" => "Missing required ID parameter"]);
        }
        validate($_POST, "rentals/edit/{$_POST["id"]}");

        RentalModel::update($_POST);

        redirect("rentals", ["success" => "Rentals was updated successfully"]);
    }

    function delete ($request) {
        if(!isset($_POST["id"])){
            return redirect("rentals", ["errors" => "Missing required ID parameter"]);
        }

        RentalModel::delete($request["params"]["id"]);

        redirect("rentals", ["success" => "Rentals was deleted successfully"]);
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
