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

            public function update_client()
            {
                (new Clients())->updateClient($_POST, $_GET["id_client"]);
                flash("success", "Cliente editado com sucesso!");
                header("Location: ".route()."");
                die;
            }

            public function delete_client()
            {
                (new Clients())->deleteClient($_GET["id_client"]);
                flash("success", "Cliente deletado com sucesso!");
                header("Location: ".route()."");
                die;
            }

    
    }