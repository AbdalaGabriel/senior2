<?php

abstract class i8n 
{
    private static $Lang;
    
    public static function Configure() {
        if (isset($_SESSION["i8n"])) 
        {
            $_SESSION["i8n"];
            
            include 'src/'.$_SESSION["i8n"].'.php';
        } else 
        {
            $_SESSION["i8n"] = "es";
            include 'src/es.php';
        }
    }

    public static function getIdiomas() {
        $directorio = opendir(dirname(__FILE__) . '/src');

        $langs = array();

        while ($archivo = readdir($directorio)) {
            if ($archivo == '.' || $archivo == '..' || strlen($archivo) != 6)
                continue;

            $langs[] = substr($archivo, 0, 2);
        }
        closedir($directorio);

        return $langs;
    }

    public static function setIdioma($lang)
    {
       $_SESSION["i8n"] = $lang;
       include 'src/'.$_SESSION["i8n"].'.php';
    }
    
    public static function __($token) 
    {
        if(!isset($_SESSION["i8n"]) || self::$Lang == NULL)
        {
            return utf8_decode($token);
        } 
        else  
        {
            if(self::$Lang[$token] == NULL)
                return utf8_decode($token);
            
            return utf8_decode(self::$Lang[$token]);
        }
    }
}
