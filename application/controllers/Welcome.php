<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{
		if (!$this->session->userdata('id_session')){
			$this->session->set_userdata('id_session', md5(date("Y-m-d H:i:s")));
		}
		
		$this->data['link_cidade'] = !$this->session->userdata('link_cidade') ? '' : $this->session->userdata('link_cidade');
		$this->load->view('index_html', $this->data);
	}

	public function newsletter(){
		if ($_POST){
			$boletim = $this->listanewsletters->getByEmail($this->input->post('email'));
			if (empty($boletim)){
				$this->newsletter->data_criacao = date('Y-m-d', time());
				$this->newsletter->data_atualizacao = date('Y-m-d', time());
				$this->newsletter->insert();
				redirect();
			}
			redirect();			
		}
	}

	public function index2(){
		$this->data['link_cidade'] = !$this->session->userdata('link_cidade') ? '' : $this->session->userdata('link_cidade');
			$this->load->view('includes/header_navbar_fixed_top');
			$this->load->view('index_promocional_html', $this->data);
			$this->load->view('includes/footer_main');
	}
}