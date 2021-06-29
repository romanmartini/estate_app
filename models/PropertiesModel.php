<?php
require('Model.php');

class PropertiesModel extends Model {

    protected function get($contract, $city, $type, $rooms, $bedrooms, $currency, $price_min, $price_max, $all, $status){
        
        /* Format variables */
        if( !empty($city) ) $city = trim($city);
        if( $type == 0) $type = null;

        $status = ( isset($_GET['from_home']) ) ? 'actived' : $status;
        $id_user = ( isset($_SESSION['id_user']) && !isset($_GET['from_home']) ) ? $_SESSION['id_user'] : false;
        $id_property = ( isset($_GET['id_property']) ) ? $_GET['id_property'] : false;

        /* Set query */
        if( !$all ){

            $query = "
            SELECT *, pt.property_type FROM property AS p
            INNER JOIN property_type AS pt
            ON p.type = pt.id_property_type
            WHERE currency = '$currency'
            AND city LIKE '%$city%' 
            AND price >= '$price_min'";

            if( $contract != 'all' ) $query .="
            AND contract = '$contract'";
            
            if ( !empty($price_max) ) $query .="
            AND price <= '$price_max'";
            
            if ( $type != 0) $query .= "
            AND type = '$type'";
            
            
            if( $bedrooms == 5) $query .="
            AND bedrooms >= '$bedrooms'";
            elseif( $bedrooms != 0) $query .="
            AND bedrooms = '$bedrooms'";

            if( $rooms == 5) $query .="
            AND rooms >= '$rooms'";
            elseif( $rooms != 0) $query .="
            AND rooms = '$rooms'";

            if( $id_user ) $query .="
            AND creator = '$id_user'";
            
            if ( $status != 'all' ) $query .= "
            AND status = '$status'";
        
        }elseif( $all ){
            
            $query = "SELECT *, pt.property_type 
            FROM property AS p
            INNER JOIN property_type AS pt
            ON p.type = pt.id_property_type 
            WHERE currency = '$currency'";

            if ( $status != 'all' ) $query .= "
            AND status = '$status'";

            if( $contract != 'all' ) $query .="
            AND contract = '$contract'"; 

            if( $id_user ) $query .="
            AND creator = '$id_user'";

            if( $id_property ) $query .= "
            AND id_property = '$id_property'";

        } 
        /* Run query */


        $this->query = $query;
        
        $this->get_query();

        foreach( $this->rows as $key => $property){
            $this->rows[$key]["img"] = explode(" ", $this->rows[$key]["img"]);
        }

        return $this->rows;
    }
    protected function set($property_data = array()){
        
        foreach( $property_data as $key => $value ) $$key = $value;

        $img = ( isset($img) ) ? self::implode_img($img) : '';
        $creator = $_SESSION['id_user'];
        
        $this->query = "REPLACE INTO property SET creator = '$creator', title = '$title', description = '$description',  img = '$img',  address = '$address',  city = '$city',  region = '$region',  country = '$country',  rooms = '$rooms',  bathrooms = '$bathrooms',  bedrooms = '$bedrooms',  total_area = '$total_area',  covered_area = '$covered_area',  new = '$new',  balcony = '$balcony',  garage = '$garage',  yard = '$yard',  light_yard = '$light_yard',  lat = '$lat',  lon = '$lon',  contract = '$contract',  currency = '$currency',  price = '$price',  expenses = '$expenses',  type = '$type',  status = '$status'";
        if( isset($id_property) ) $this->query .= ", id_property = '$id_property'";
        $this->set_query();
    }

    private static function implode_img($img = array()){

        $img_name_array = array();

        foreach( $img as $value ) {
            
            $img_name = explode('/', $value);
            $img_name = $img_name[count($img_name) - 1];
            array_push($img_name_array, $img_name);
            
        }

        $img_name_string = implode(' ', $img_name_array);
        return $img_name_string;

    }

    protected function del($id_property){

        $this->query = "DELETE FROM property WHERE id_property = '$id_property'";
        $this->set_query();
        }
}