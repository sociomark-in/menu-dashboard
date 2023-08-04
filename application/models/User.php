<?php
class User extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function get($id){
        $result = $this->db->query("SELECT * FROM `trl_users` WHERE `id` = '" . $id . "'")->result()[0];
        return $result;

    }

    public function authorize(array $request){
        $result = $this->db->query("SELECT * FROM `trl_users` WHERE `username` = '" . $request['username'] . "' AND `password` = '". $request['password']  . "'")->result()[0];
        
        return (array)$result;
    }

    public function new($data){
        $this->db->insert('trl_users', $data);
    }
}


?>