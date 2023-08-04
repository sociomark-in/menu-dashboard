<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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
	
	 public function login()
	{
		$data['token'] = $this->security->get_csrf_hash();
		$form_data = $this->input->post();
		$id = $this->User->authorize($form_data);
		if ($id === null) {

		}else{
			$_SESSION['user']['id'] = $id;
			redirect("/trl-admin");
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
}
