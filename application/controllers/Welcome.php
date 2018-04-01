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
			$this->load->model('Modelo/newsletter');
			$this->load->model('ModeloList/listanewsletters');
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
}