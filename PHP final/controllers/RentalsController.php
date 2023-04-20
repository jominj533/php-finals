<?php

    require_once("./models/RentalModel.php");
    require_once("./models/CityModel.php");

    function index () {
        $rentals = RentalModel::findAll();
        render("rentals/index", [ 
            "title" => "List of Rentals", 
            "rentals" => $rentals
        ]);
    }

    function _new () {
        render("rentals/new", ["title" => "New Rental", "action" => "create"]);
    }

    function edit ($request) {}

    function create () {

            validate($_POST, "rentals/new");
            
            RentalModel::create($_POST);
            
            redirect("rentals", ["success" => "rentals was created successfully"]);

            
    }

    function update () {}

    function delete ($request) {}

    function validate ($package, $error_redirect_path) {
            $fields = ["owner_name"];
            $errors = [];
            
            foreach ($fields as $field) {
            
            if (empty($package[$field])) {
             $humanize = ucwords(str_replace("_","",$field));
            $errors[] = "{$humanize} cannot be empty";
            }
         }
                        
            if (count($errors)) {
            return redirect($error_redirect_path, [
            
            "form_fields" => $package,
            
            "errors" => $errors
        ]);
    }
}
?>