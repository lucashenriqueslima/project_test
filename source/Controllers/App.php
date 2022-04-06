<?php 

    namespace Source\Controllers;

    class App extends Controller
    {

        

        public function __construct()
        {
            $this->template = views("/_app_template");  
        }

        public function home()
        {   
            parent::render("/home", [
                "title" => site('name')."Home",
            ]);
        }

    }