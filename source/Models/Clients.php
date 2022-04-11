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

        public function updateClient(array $data, $id)
        {
            $this->pdo->exec("UPDATE clients SET 
            name = '{$data['name']}',
            cpf = '{$data['cpf']}',
            cell_number = '{$data['cell_number']}',
            cep = '{$data['cep']}',
            street_number = '{$data['street_number']}',
            street = '{$data['street']}',
            neighborhood = '{$data['neighborhood']}',
            city = '{$data['city']}'
            WHERE id_client = {$id}");
        }

        public function deleteClient($id)
        {
            $this->pdo->exec("DELETE FROM clients WHERE id_client = {$id}");
        }


    }
