<?php 

    namespace Source\Controllers;

    class Web extends Controller
    {

    public function __construct()
    {
        $this->template = views("/_web_template");
    }

    public function login()
    {
        // parent::render("/login", [
        //     "title" => site('name')."Bem-Vindo",
        // ]);
    }

}