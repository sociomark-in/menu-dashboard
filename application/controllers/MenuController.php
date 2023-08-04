<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MenuController extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Menu");
	}
	
	public function menu_item_add()
	{
		$data = [];
		$this->Menu->new('trl_menu-items', $data);
	}
	public function menu_item_delete($id)
	{
		$this->Menu->delete('trl_menu-items', ['id'=> $id]);
	}
	public function menu_item_edit($id)
	{
		$data = $this->input->post();
		// print_r($data['item']);
		$purifiedArray = $this->Menu->map_table_with_formdata('trl_menu-items', $data['item']);
		$this->Menu->update('trl_menu-items',$purifiedArray,array('menu_id'=> $id));
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function category_add()
	{
		$data = [];
		$this->Menu->new('trl_menu-categories', $data);
	}
	public function category_delete($id)
	{
		$this->Menu->delete('trl_menu-categories', ['id'=> $id]);
	}
	public function category_edit($id)
	{
		$data = [];
		$this->Menu->update('trl_menu-categories',$data,['id'=> $id]);
	}
}
