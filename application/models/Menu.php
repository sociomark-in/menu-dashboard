<?php
class Menu extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function all_master(){
        $master = [];
        $categories = $this->db->query("SELECT * FROM `menu-categories`")->result();
        $categories_array = [];
        for ($i=0; $i < count($categories); $i++) { 
            $categories[$i] = (array)$categories[$i];
            $categories_array[$i] = $categories[$i];
            $items = $this->db->query("SELECT * FROM `menu-items` WHERE `menu-items`.`cat_id` = " . $categories[$i]['id'])->result();
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
        $result = $this->db->query("SELECT * FROM `menu-categories`")->result();
        return $result;
    }

    public function items_by_($cat_id =null){
        if($cat_id === null){
            $result = $this->db->query("SELECT * FROM `menu-items` INNER JOIN `menu-categories` ON `menu-items`.`cat_id` = `menu-categories`.`id`")->result();
        } else{
            $result = $this->db->query("SELECT * FROM `menu-items` INNER JOIN `menu-categories` ON `menu-items`.`cat_id` = `menu-categories`.`id` WHERE `menu-categories`.`id` =" . $cat_id)->result();
        }
        return $result;
    }
}
