<?php

    /**
     * Routes are responsible for matching a requested path
     * with a controller and an action. The controller represents
     * a collection of functions you want associated, usually, with
     * a resource. The action is the specific function you want to call.
     */

    $routes = [
        "get" => [
            [
                "pattern" => "/",
                "controller" => "PagesController",
                "action" => "index"
            ],
            [
                "pattern" => "/rentals",
                "controller" => "RentalsController",
                "action" => "index"
            ],
            [
                "pattern" => "/rentals/new",
                "controller" => "RentalsController",
                "action" => "_new"
            ],
            [
                "pattern" => "/rentals/:id",
                "controller" => "RentalsController",
                "action" => "show"
            ],
            [
                "pattern" => "/rentals/edit/:id",
                "controller" => "RentalsController",
                "action" => "edit"
            ],
            [
                "pattern" => "/rentals/delete/:id",
                "controller" => "RentalsController",
                "action" => "delete"
            ],
            [
                "pattern" => "/cities",
                "controller" => "CitiesController",
                "action" => "index"
            ],
            [
                "pattern" => "/cities/new",
                "controller" => "CitiesController",
                "action" => "_new"
            ],
            [
                "pattern" => "/cities/edit/:id",
                "controller" => "CitiesController",
                "action" => "edit"
            ],
            [
                "pattern" => "/cities/delete/:id",
                "controller" => "CitiesController",
                "action" => "delete"
            ],
        ],
        "post" => [
            [
                "pattern" => "/rentals/create",
                "controller" => "RentalsController",
                "action" => "create"
            ],
            [
                "pattern" => "/rentals/update",
                "controller" => "RentalsController",
                "action" => "update"
            ],
            [
                "pattern" => "/cities/create",
                "controller" => "CitiesController",
                "action" => "create"
            ],
            [
                "pattern" => "/cities/update",
                "controller" => "CitiesController",
                "action" => "update"
            ],
        ]
    ];

?>