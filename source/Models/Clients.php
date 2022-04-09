<?php

    namespace Source\Models;
    

    class Clients extends Model{

        public function getClients()
        {
            return $this->pdo->query("SELECT c.id_client, c.name, c.cpf, c.cell_number FROM clients c")->fetchAll();
        }

        public function getClientById($id)
        {
           $stmt = $this->pdo->prepare("SELECT c.* FROM clients c WHERE c.id_client = ?");
           $stmt->execute(array($id));
           return $stmt->fetch();
        }

        public function addClient(array $data)
        {
            $this->pdo->exec("INSERT INTO clients 
            (`id_client`, `name`, `cpf`, `cell_number`, `cep`, `street_number`, `street`, `neighborhood`, `city`) VALUES 
            (NULL, '{$data['name']}', '{$data['cpf']}', '{$data['cell_number']}', '{$data['cep']}', '{$data['street_number']}', '{$data['street']}', '{$data['neighborhood']}', '{$data['city']}')");
        }

    }
