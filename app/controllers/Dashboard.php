<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * dashboard class
 */
class Dashboard
{
	use MainController;

	public function index()
	{
		$data['title'] = "Dashboard";
		//to prevent unauthenticated users
		// $ses = new \Core\Session;
		// if(!$ses->is_logged_in())
		// 	redirect('login');

		$this->view('dashboard', $data);
	}

}
