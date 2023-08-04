<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$this->load->model("User");
	}
	
	 public function index()
	{
        if(isset($_SESSION['user'])){
			$id = $_SESSION['user']['id'];
			$user = (array)$this->User->get($id);
			$this->session->set_userdata(['user'=>$user]);
			// die;
			$data = [
				'page' => [
					'title' => "Dashboard". " • " . APP_NAME
				]
			];
			$data['user'] = $user;
			$this->session->set_userdata(['user'=>$user]);
            $this->load->view('dashboard/index', $data);
        }else{
			redirect('/login');
        }
	}
	
	public function menu_master(){
		if (isset($_SESSION['user'])) {
			$this->load->model("Menu");
			$data = [
				'page' => [
					'title' => "Menu". " • " . APP_NAME
				],
				'menu' => $this->Menu->all_master(),
			];
			$this->load->view('dashboard/menus', $data);
		}else{
			redirect('/login');
        }
	}
	
	public function menu_items($cat_id){
		if (isset($_SESSION['user'])) {
			# code...
			$this->load->model("Menu");
			$data = [
				'page' => [
					'title' => "Menu". " • " . APP_NAME
				],
				'items' => $this->Menu->items_by_($cat_id),
			];
			$this->load->view('dashboard/menu_items', $data);
		} else{
			redirect('/login');
        }
		
	}
}
