<?php
class PropertiesController extends PropertiesModel {

    private $model;

    public function __construct(){

        $this->model = new PropertiesModel();

    }

    public function get($id_user = '', $contract = 'rent', $city = '', $type = '', $rooms = 0, $bedrooms = 0, $currency = 'ARS', $price_min = '', $price_max = '', $all = true, $status = 'actived'){

        return $this->model->get($id_user, $contract, $city, $type, $rooms, $bedrooms, $currency, $price_min, $price_max, $all, $status);
    
    }


    

}