<?php
abstract class ModelFiles{

    private static $file_directory = './public/img/';
    private static $id_user;
    private static $user_file_directory;

    protected function get_users_file_directory(){

        self::$id_user = $_SESSION['id_user'];
        self::$user_file_directory = self::$file_directory . self::$id_user . '/';

        if( !file_exists(self::$user_file_directory) ) self::create_users_file_directory();

        return self::$user_file_directory;
    }
    
    private static function create_users_file_directory(){

        mkdir(self::$user_file_directory);
        
    }



}