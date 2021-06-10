<?php
class UsersModel extends Model{

    protected function validate_user($email, $pass){
        
        $this->query = "SELECT * FROM users WHERE email = '$email' AND pass = MD5('$pass')";
        $this->get_query();
        $data = array();

        foreach( $this->rows as $value ) {
            array_push($data, $value);
        }

        return $data;

    }

}