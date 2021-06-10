<?php
require('Model.php');

class PropertiesModel extends Model {

    protected function get($id_user, $contract, $city, $type, $rooms, $bedrooms, $currency, $price_min, $price_max, $all, $status){
        
        /* Format variables */
        if( !empty($city) ) $city = trim($city);
        if( $type == 0) $type = null;

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
            WHERE status = '$status'";

            if( $contract != 'all' ) $query .="
            AND contract = '$contract'"; 

            if( $id_user ) $query .="
            AND creator = '$id_user'";

        } 
        /* Run query */


        $this->query = $query;
        
        $this->get_query();

        foreach( $this->rows as $key => $property){
            $this->rows[$key]["img"] = explode(" ", $this->rows[$key]["img"]);
        }

        return $this->rows;
    }
    protected function set(){
        
    }
    protected function del(){
        
    }
}