<?php

    namespace Source;

    class Router
    {   

        private array $handlers;
        private $notFound;
        private $className = SITE["route"];
        private const METHOD_POST = 'POST';
        private const METHOD_GET = 'GET';

        /**
         * Função responsável por adicionar rotas com o método GET.
         */
        public function get(string $path, $handler): void
        {   
            $path = "/project_test".$path;
            $this->addHandler(self::METHOD_GET, $path, $handler);
        }
        
        /**
         * Função responsável por adicionar rotas com o método POST.
         */
        public function post(string $path, $handler): void
        {
            $path = "/project_test".$path;
            $this->addHandler(self::METHOD_POST, $path, $handler);
        }
        
        /**
         * Função responsável por adicionar controladores a rota.
         */
        private function addHandler(string $method, string $path, $handler): void
        {
            $this->handlers[$method . $path] = [
                'path' => $path,
                'method' => $method,
                'handler' => $handler
            ];

        }

        /**
         * Função responsável por definir o controlador que será chamado caso não encontre nenhuma rota.
         */
        public function notFound($handler)
        {
            $this->notFound = $handler; 
        }

        /**
         * Função responsável por executar as rotas.
         */
        public function run()
        {   
            
            $requestUri = parse_url($_SERVER["REQUEST_URI"]);
            $requestPath =  $requestUri['path'];
            
            $method = $_SERVER['REQUEST_METHOD'];

            $callback = null;

            echo $callback;

            foreach($this->handlers as $handler)
            {
                /**
                 * Verifica se existe rota.
                 */
                if($handler['path'] === $requestPath && $method === $handler['method']){
                    $callback = $handler['handler'];
                }
            }

            /**
             * Chama rota existente.
             */
            if(is_string($callback)){

                $parts = explode(':', $callback);
                if(is_array($parts)){
                    $this->className .= current($parts);
                    $handler = new $this->className;
                    $method = end($parts);
                    $callback = [$handler, $method];
                }
            }

            /**
             * Verifica se existe rota existente e chama notFound se não existir.
             */
            if(!$callback){
                header("HTTP/1.0 404 Not Found");
                if(!empty($this->notFound)){
                    $callback = $this->notFound;
                }
            }

            
            call_user_func_array($callback, [
                array_merge($_GET, $_POST)
            ]);
        }

    }