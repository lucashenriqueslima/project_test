<?php

function site(string $param = null): string
    {
        if($param && !empty(SITE[$param])){
            return SITE[$param];
        }

        return SITE["root"];
    }

    function views(string $path): string
    {
        return VIEWSPATH.$path.".php";
    }

    function route(string $path = null): string
    {
        return site().$path;
    }

    function asset(string $path, $time = true): string
    {
        return SITE['root']."/views/assets/{$path}";
        
/*
        if($time && file_exists($fileOnDir)){
            $file .="?time=".filemtime($fileOnDir);
        }
         
        return $file;
        */
    }

    function flash(string $type = null, string $message = null): ?string
    {
        if($type && $message){
            $_SESSION["flash"] = [
                "type"=> $type,
                "message"=> $message
            ];
            
            return null;
        }

        if(!empty($_SESSION["flash"])){
            
            echo "<script> alert('".$_SESSION['flash']['type']."', '".$_SESSION['flash']['message']."') </script>";

            unset($_SESSION['flash']);
        }

        return null;
    }

    function scriptJs($script)
    {
        return "<script> ".$script." </script>";
    }

 
    