<?php 

    namespace Source\Controllers;

use Source\Models\Clients;

    class App extends Controller
    {
        
        public function __construct()
        {
            $this->template = views("/_app_template");  
        }

        public function home()
        {   

            $clients = (new Clients())->getClients();

            parent::render("/home", [
                "title" => site('name')."Home",
                "clients" => $clients,
            ]);
             
        }

        public function add()
        {
            parent::render("/add", [
                "title" => site('name')."Adicionar Cliente",
            ]);
        }

    }