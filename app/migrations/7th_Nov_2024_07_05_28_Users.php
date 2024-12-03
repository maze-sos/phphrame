<?php

namespace Phrame;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Users class
 */
class Users extends Migration
{
	
	public function up()
	{

		/** create a table **/
		$this->addColumn('id int(11) NOT NULL AUTO_INCREMENT');
		$this->addColumn('username varchar(30) NULL');
		$this->addColumn('email varchar(100) NULL');
		$this->addColumn('role varchar(20) NULL');
		$this->addColumn('password varchar(255) NULL');
		$this->addColumn('date_created datetime NULL');
		$this->addColumn('date_updated datetime NULL');
		$this->addPrimaryKey('id');
		/*
		$this->addUniqueKey();
		*/
		$this->createTable('users');

		/** insert data **/
		// $this->addData('username','Admin');
		// $this->addData('email','email@email.com');
		// $this->addData('password',password_hash('password', PASSWORD_DEFAULT));
		// // $this->addData('role','admin');
		// $this->addData('date_created',date("Y-m-d H:i:s"));
		// $this->addData('date_updated',date("Y-m-d H:i:s"));

		// $this->insertData('users');
	} 


	public function down()
	{
		$this->dropTable('users');
	}

}