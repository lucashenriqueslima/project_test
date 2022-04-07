<?php

    namespace Source\Models;
    

    class Clients extends Model{

        public function getClients()
        {
            return $this->pdo->query("SELECT c.id_client, c.name, c.email, c.cpf FROM clients c")->fetchAll();
        }

    }