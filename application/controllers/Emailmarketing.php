<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emailmarketing extends CI_Controller {

	public function index()
	{
		$this->data['teste'] = '';
		$this->load->view('email_marketing_html', $this->data);
	}
	

}