<?php

class FilesController extends FilesModel{

        private $model;


    public function __construct(){
        
        $this->model = new FilesModel();
    }

    public function get_files(){

        return $this->model->get_files();

    }

    public function add_file($file_name_array){

        return $this->model->add_file($file_name_array);
    }

    public function delete_file($url){

        return $this->model->delete_file($url);

    }

}