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
                "activeMenuHome" => true
            ]);
             
        }

        public function add_client()
        {
            parent::render("/add_client", [
                "title" => site('name')."Adicionar Cliente",
                "activeMenuAdd" => true,
            ]);
        }

        public function update_client()
        {
            $client = (new Clients())->getClientById($_GET['id_client']);
            
            parent::render("/update_client", [
                "title" => site('name')."Editar Cliente",
                "page" => "update_client",
                "client" => $client,
            ]);
        }

        public function delete_client()
        {
            $client = (new Clients())->getClientById($_GET['id_client']); 

            parent::render("/delete_client", [
                "title" => site('name')."Deletar Cliente",
                "client" => $client,
            ]);
        }

    }