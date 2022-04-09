<?php 

    namespace Source\Controllers;

    use Source\Models\Clients;

    class Req {
            
            public function add_client()
            {
                (new Clients())->addClient($_POST);
                flash("success", "Cliente adicionado com sucesso!");
                header("Location: ".route()."");
                die;
            }
    
    }