<?php
require('ModelFiles.php');

class FilesModel extends ModelFiles{

    private static $directory;

    protected function __construct(){

        self::$directory = parent::get_users_file_directory();

    }
    

    protected function get_files(){
        $dirint = dir(self::$directory);

        $files_array = array();

        while( ($file = $dirint->read()) !== false) {

            if( mb_eregi('gif', $file) || mb_eregi('jpg', $file) || mb_eregi('png', $file) || mb_eregi('jpeg', $file) ){

                array_push($files_array, self::$directory.$file);

            }
        }
        $dirint->close();
        return $files_array;

    }

    


    protected function add_file($file_name_array){
        
        $file_array = $file_name_array;
        $file = $file_array['tmp_name'];
        $date = date('Y-m-d');
        $name = str_replace( ' ', '-', $file_array['name']);
        $dir = self::$directory . "$date-$name";

        if( !file_exists($dir) ){

            if(  $file_array['type'] === 'image/jpeg' || $file_array['type'] === 'image/jpg' || $file_array['type'] === 'image/png' || $file_array['type'] === 'image/gif'){
                
                if( $file_array['size'] < 2048000 ) {
                    
                    $message = 'Archivo subido con éxito';
                    move_uploaded_file($file, $dir);
                    
                }else $message = 'El archivo es demaciado grande. Tamaño máximo: 2Mb.';
                
                
            }else $message = 'Formato de archivo invalido. Solo se admiten imágenes en formato ".jpeg", ".jpg", ".png" y ".gif".';
            
            return $message;
        
        }else{

            return $message = 'El archivo no se pudo subir. Ya existe un archivo con el mismo nombre.';
        
        }    
    }

    protected function delete_file($url){

        $rute_array = explode('/', $url);
        $file_name = $rute_array[count($rute_array) - 1];
        $url = self::$directory . '/' . $file_name . '';

        if( file_exists($url) ){

            $delete = unlink($url);
            
            if($delete){
                return $message = 'El archivo fue eliminado';
            }else{
                return $message = 'El archivo no se pudo eliminar';
            }

        }else{
            return $message = 'El archivo ya no existe';
        }

    }
    


}