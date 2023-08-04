<?php
class User extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function get($id){
        $result = $this->db->query("SELECT `id`, `username`, `password` FROM `users` WHERE `id` = '" . $id . "'")->result()[0];
        return $result;

    }

    public function authorize(array $request){
        $result = $this->db->query("SELECT `id`, `username`, `password` FROM `users` WHERE `username` = '" . $request['username'] . "' AND `password` = '". $request['password']  . "'")->result()[0];
        $id = $result->id;
        return $id;
    }
}


?>