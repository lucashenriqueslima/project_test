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

        public function update()
        {
            $client = (new Clients())->getClientById($_GET['id_client']);
            
            parent::render("/update", [
                "title" => site('name')."Editar Cliente",
                "client" => $client,
            ]);
        }

    }