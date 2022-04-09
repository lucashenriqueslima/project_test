<?php

session_start();

require "autoload.php";

use Source\Router;

$router = new Router();

/**
 * App
 */
$router->get("/",  "App:home");
$router->get("/adicionar-cliente", "App:add");
$router->get("/editar-cliente", "App:update");

/**
 * Req
 */
$router->post("/req/add_client", "Req:add_client");

// /**
//  * Auth Web
//  */
// $router->post("/auth/login", "Auth:login");
// $router->post("/auth/reset", "Auth:msg");



// /**
//  * App
//  */
// $router->get("/me", "App:home");
// $router->get("/me/painel-de-controle", "App:dashboard");
// $router->get("/me/cadastrar-empresa", "App:registerCompany");
// $router->get("/me/logoff", "App:logoff");



// /*
// $router->notFound(function(){
//     $title = "TITULO";
//     require_once __DIR__."/views/themes/404.php";  
// });
// */




$router->run();