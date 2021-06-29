<?php
class UsersModel extends Model{


    protected function get(){
        
        $id_user = $_SESSION['id_user'];

        $this->query = "SELECT id_user, type, name, surname, company, logotype, email, phone, url_whatsapp, pass, role FROM users WHERE id_user = '$id_user'";
        $this->get_query();

        $data = array();

        foreach($this->rows as $value) array_push($data, $value);

        return $data;

    }

    protected function create( $user_data = array() ){

        foreach($user_data as $key => $value) $$key = $value;

        $this->query = "INSERT INTO users SET type = '$type', name = '$name', surname = '$surname', company = '$company', email = '$email', phone = '$phone', url_whatsapp = '$url_whatsapp', pass = MD5($pass), role = '$role'";
        $this->set_query();
        
    }

    protected function update( $user_data = array() ){

        $id_user = $_SESSION['id_user'];

        foreach($user_data as $key => $value) $$key = $value;

        $this->query = "UPDATE users SET type = '$type', name = '$name', surname = '$surname', company = '$company', email = '$email', phone = '$phone', url_whatsapp = '$url_whatsapp' WHERE id_user = '$id_user'";
        $this->set_query();

    }

    protected function del(){

        $id_user = $_SESSION['id_user'];
        var_dump($id_user);
        $this->query = "DELETE FROM users WHERE id_user = '$id_user'";
        return $this->set_query();

    }

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