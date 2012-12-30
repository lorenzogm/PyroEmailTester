<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * PyroEmailTester
 *
 * Index controller - view basic table stats.
 * 
 * @author 		Lorenzo García
 * @link		https://github.com/willaser/PyroEmailTester
 */
class Admin extends Admin_Controller
{
	protected $section = 'email_tester';

	// --------------------------------------------------------------------------	

	/**
	 * Constructor method
	 *
	 * @access public
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		
		$this->load->language('email_tester');
	}

	// --------------------------------------------------------------------------	
	
	/**
	 * Try to send an email and dump the result
	 *
	 * @access	public
	 */
 	
 	public function index()
 	{
			
		// Set template and destination email
		$email = array(
			'slug' 		=> 'email_tester',
			'to'		=> $this->current_user->email,
		);

		// Send the email
		$sent = Events::trigger( 'email' , $email , 'array' );

		if($sent)
			$message = 'The email\'s test was successful.';
		else
			$message = 'The email`\' test failed.';

		$this->template
			->set('message', $message)
			->build('admin/email_tester'); 		
 	}
}