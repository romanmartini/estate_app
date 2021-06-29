<?php
class UsersController extends UsersModel{

    private $model;

    public function __construct(){

        $this->model = new UsersModel();
    
    }

    public function get(){

        return $this->model->get();

    }

    public function create($user_data = array()){

        return $this->model->create($user_data);

    }

    public function update($user_data = array()){

        $this->model->update($user_data);

    }

    public function del(){

        return $this->model->del();

    }

}