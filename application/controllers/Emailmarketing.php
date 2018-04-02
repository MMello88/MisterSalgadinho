<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emailmarketing extends CI_Controller {

	public function index()
	{
    $this->data['link'] = base_url();
		$this->data['mensagem'] = '';
		$this->load->view('email_marketing_html', $this->data);
	}
  
  public function enviarEmail(){
    $link = base_url();
    $this->data['link'] = $link;
    $nome = "Matheus";
    $html = 
      "<!DOCTYPE html>
      <html lang=\"pt-br\">
        <head>
        <style>
          
        </style>
        </head>
        <body> 
          <h4><b>Olá,  {$nome}.</b></h4>
          <h1>Nós da <b>Mister</b> Salgadinho</h1>
          <p>
          <b>Agradecemos pela preferência.</b> Seu pedido foi recebido com <b>sucesso.</b> <br>
          Em breve este <b>delicioso salgadinho</b> será produzido e entrege no <b>local, data e hora</b> nos informado.<br>
          </p>
          <img src=\"{$link}assets/template/img/boneco_2.png\">
        </body>
      </html>";

    $this->load->library('email');
    $this->email
      ->from('pedido@mistersalgadinhos.com.br', 'Mister Salgadinhos')
      ->to('matheusnarciso@hotmail.com, matheus.gnu@gmail.com')
      ->subject("Mister Salgadinhos - Seu pedido foi recebido com sucesso!.")
      ->message($html)
      ->send();
      
    $this->data['mensagem'] = 'Email enviado com sucesso!';
		$this->load->view('email_marketing_html', $this->data);  
  }
}