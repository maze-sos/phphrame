<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

class _404
{
	use MainController;
	
	public function index()
	{
		$data['title'] = "404";
		$this->view('404',$data);
	}
}
