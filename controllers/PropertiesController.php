<?php
class PropertiesController extends PropertiesModel {

    private $model;

    public function __construct(){

        $this->model = new PropertiesModel();

    }

    public function get($contract = 'rent', $city = '', $type = array(0) , $rooms = 0, $bedrooms = 0, $currency = 'ARS', $price_min = '', $price_max = '', $all = true, $status = 'all'){

        return $this->model->get($contract, $city, $type, $rooms, $bedrooms, $currency, $price_min, $price_max, $all, $status);
    
    }

    public function set($property_data = array()){

        return $this->model->set($property_data);

    }

    public function del($id_property = ''){

        return $this->model->del($id_property);
    }


    

}