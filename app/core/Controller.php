<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

Trait MainController
{

	public function view($name, $data = [])
	{
		if(!empty($data))
			extract($data);
		
		$filename = "../app/views/".$name.".phrame.php";
		if(file_exists($filename))
		{
			require $filename;
		}else{

			$filename = "../app/views/404.phrame.php";
			require $filename;
		}
	}
}