<?php 

    namespace Source\Controllers;

    abstract class Controller
    {   

        protected $template;

        /**
         * Renderizar a view
         */
        public function render(string $content, array $vars = []): void
        {   
            $content = views($content);
            if(file_exists($content)){
                extract($vars);
                include($this->template);
            }
        }

        public function ajaxResponse(string $param = null, array $values = null): string
        {
            return json_encode([$param => $values]);
        }
        
}


   