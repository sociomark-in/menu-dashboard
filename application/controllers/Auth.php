<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
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
		$this->load->model("User");
	}

	public function login()
	{
		$form_data = $this->input->post();
		$user = $this->User->authorize($form_data);
		if (count($user)== 0) {
		} else {
			$_SESSION['user'] = $user;
			redirect("/trl-admin");
		}
	}

	public function register()
	{
		$form_data = $this->input->post();
		$user = $this->User->new($form_data);

		$this->session->set_flashdata('success', "Added new user '" . $form_data['username'] . "' Successfully.");
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
