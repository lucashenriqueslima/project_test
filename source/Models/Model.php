<?php

    namespace Source\Models;

use Source\Db;
use Source\MySql;

    abstract Class Model
    {
        protected $pdo;

        public function __construct()
        {
            $db = (new Db)->connect(); 
            $this->pdo = $db;
        }
    }