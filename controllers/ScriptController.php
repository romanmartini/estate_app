<?php

class ScriptController{

    private static $script_directory = './public/js/';
    private static $script_default ="
        <script async src='https://kit.fontawesome.com/719649c35f.js' crossorigin='anonymous'></script>";

    public function load_script($view){
        
        $script_view = self::$script_directory . $view . '.js';

        $script_view = ( file_exists($script_view) ) 
            ? "<script type='module' src='$script_view'></script>"
            : '';

        $script =  self::$script_default . $script_view;
                        
        return $script;

    }
}