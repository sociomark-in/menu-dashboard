<?php
class Menu extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function map_table_with_formdata($table, array $data){
        $columns = $this->db->list_fields($table);
        $mapped = array_combine([$columns[2], $columns[4], $columns[3]], $data);
        return $mapped;
    }
    
    public function all_master(){
        $master = [];
        $categories = $this->db->query("SELECT * FROM `trl_menu-categories`")->result();
        $categories_array = [];
        for ($i=0; $i < count($categories); $i++) { 
            $categories[$i] = (array)$categories[$i];
            $categories_array[$i] = $categories[$i];
            $items = $this->db->query("SELECT * FROM `trl_menu-items` WHERE `trl_menu-items`.`cat_id` = " . $categories[$i]['id'])->result();
            $categories[$i]['items'] = [];
            for ($j=0; $j < count($items); $j++) {
                $items[$j] = (array)$items[$j];
                $items_array[$j] = $items[$j];
                $categories[$i]['items'][$j] = $items[$j];
            }
        }
        return $categories;
    }

    public function all_categories(){
        $result = $this->db->query("SELECT * FROM `trl_menu-categories`")->result();
        return $result;
    }

    public function items_by_($cat_id =null){
        if($cat_id === null){
            $result = $this->db->query("SELECT * FROM `trl_menu-items` INNER JOIN `trl_menu-categories` ON `trl_menu-items`.`cat_id` = `trl_menu-categories`.`id`")->result();
        } else{
            $result = $this->db->query("SELECT * FROM `trl_menu-items` INNER JOIN `trl_menu-categories` ON `trl_menu-items`.`cat_id` = `trl_menu-categories`.`id` WHERE `trl_menu-categories`.`id` =" . $cat_id)->result();
        }
        return $result;
    }

    public function new($table,array $data){
        $this->db->insert($table, $data);
    }

    public function delete($table, array $where){
        $this->db->delete($table,$where);
    }
    
    public function update($table, array $data, $where = array()){
		$this->db->update($table, $data, $where);
    }
}
