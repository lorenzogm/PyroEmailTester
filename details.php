<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * PyroEmailTester
 *
 * Email tester Utilities Module for PyroCMS. Allows you
 * to test your email' settings.
 * 
 * @author 		Lorenzo García
 * @link		https://github.com/willaser/PyroEmailTester
 */
class Module_Email_tester extends Module {

	public $version = '1.0';

	public function info()
	{
		$info = array(
			'name' => array(
				'en' => 'Email tester'
			),
			'description' => array(
				'en' => 'Test your email\' settings.'
			),
			'frontend' => false,
			'backend'  => true,
			'menu'	  => 'utilities'
		);

		// Sections
		$info['sections']['email_tester'] = array(
			'name' => 	'email_tester:email_tester',
			'uri' => 	'admin/email_tester'
		);

		return $info;
	}

	public function install()
	{
        
        	$table = $this->db->dbprefix('email_templates');
        	
        	$sql = ("INSERT INTO $table VALUES(NULL, 'email_tester', 'Test email settings', 'Template for testing email settings', 'Email test', '<p>\n	You have just receive a testing email from {{ settings:site_name }}</p>', 'en', 0, '');
");
			if(!$this->db->query($sql))
				return false;
				
		return true;
	}

	public function uninstall()
	{
		return true;
	}

	public function upgrade( $upgrade_version )
	{
		return true;
	}

	public function help()
	{
		return "No documentation has been added for this module.";
	}

}