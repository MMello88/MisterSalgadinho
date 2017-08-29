<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		if (!$this->session->userdata('logado') or $this->session->userdata('logado') == 'false'){
			$this->session->set_userdata('logado', 'false');
			if (!$this->session->userdata('login_erro')){
				$this->data["login_erro"] = "sr-only";
			} else {
				$this->data["login_erro"] = "";
			}
			$this->load->view('restrito/login_html', $this->data);
		} else {
			$this->data["view_pedidos"] = $this->view_pedidos();
			$this->load->view('restrito/admin_html', $this->data);
		}
	}
	
	public function logar(){
		$usuario = "mister";
		$senha = "#@!mr";
		$user = $this->input->post("user");
		$pass = $this->input->post("pass");
		
		if ($usuario == $user and $senha == $pass){
			$this->session->set_userdata('logado', 'true');
		} else {
			$this->session->set_userdata('login_erro', 'true');
		}
		redirect('Admin/Main');
	}

	public function view_pedidos(){
		$id_pedido = "";
		$nome      = "";
		$email     = "";

		if ($_POST){
			if (!empty($_POST['valuePesq'])) {
				$valuePesq = $_POST['valuePesq'];
				$tipoPesq  = $_POST['tipoPesq' ];

				$id_pedido = $_POST['tipoPesq' ] == "id_pedido" ? $_POST['valuePesq'] : "";
				$nome      = $_POST['tipoPesq' ] == "nome"      ? $_POST['valuePesq'] : "";
				$email     = $_POST['tipoPesq' ] == "email"     ? $_POST['valuePesq'] : "";
			}
		}

		$this->load->model('ListaPedidos');
		$pedidos = $this->ListaPedidos->getPedidosSolicitados($nome, $email, $id_pedido);
		$html = "";
		foreach ($pedidos as $pedido) {
			$pedido->valor_total = number_format($pedido->valor_total, 2, '.', '');
			$html .= "  <tr> " .
					 "    <th scope='row' class='grid-p'> " .
					 "       {$pedido->id_pedido} " .
					 "    </th> " .
					 "    <td class='grid-p'> " .
					 "       {$pedido->data_pedido} " .
					 "    </td> " .
		   		     "    <td class='grid-p'> " .
					 "       {$pedido->nome}" .
					 "    </td> " .
		   		     "    <td class='grid-p'> " .
					 "       {$pedido->telefone} " .
					 "    </td> " .
		   		     "    <td class='grid-p'> " .
					 "       R$ {$pedido->valor_total} " .
					 "    </td> " .
		   		     "    <td class='grid-p'> " .
					 "       {$pedido->festa} " .
					 "    </td> " .
		   		     "    <td class='grid-p'> " .
					 "       {$pedido->desc_situacao} " .
					 "    </td> " .
					 "    <td class='grid-p'> " .
					 "      <div class='btn-toolbar' role='toolbar' aria-label='Toolbar with button groups'> " .
				     "        <div class='btn-group btn-group-sm' role='group' aria-label='First group'> " .
				     "          <form method='post' action='' id='formSitPedido'>" .
					 "            <input type='hidden' name='id_pedido' value='{$pedido->id_pedido}'> " .
					 "            <input type='hidden' name='situacao' value='v'> " .
					 "            <button type='submit' class='btn btn-warning btn-sm'>v</button> " .
					 "          </form>" .
					 "        </div> " .
					 "        <div class='btn-group btn-group-sm' role='group' aria-label='First group'> " .
				     "          <form method='post' action='' id='formSitPedido'>" .
					 "            <input type='hidden' name='id_pedido' value='{$pedido->id_pedido}'> " .
					 "            <input type='hidden' name='situacao' value='p'> " .
					 "            <button type='submit' class='btn btn-warning btn-sm'>p</button> " .
					 "          </form>" .
					 "        </div> " .
					 "        <div class='btn-group btn-group-sm' role='group' aria-label='First group'> " .
				     "          <form method='post' action='' id='formSitPedido'>" .
					 "            <input type='hidden' name='id_pedido' value='{$pedido->id_pedido}'> " .
					 "            <input type='hidden' name='situacao' value='t'> " .
					 "            <button type='submit' class='btn btn-warning btn-sm'>t</button> " .
					 "          </form>" .
					 "        </div> " .
					 "        <div class='btn-group btn-group-sm' role='group' aria-label='First group'> " .
				     "          <form method='post' action='' id='formSitPedido'>" .
					 "            <input type='hidden' name='id_pedido' value='{$pedido->id_pedido}'> " .
					 "            <input type='hidden' name='situacao' value='e'> " .
					 "            <button type='submit' class='btn btn-warning btn-sm'>e</button> " .
					 "          </form>" .
					 "        </div> " .
					 "      </div> " .
					 "    </td> " .
					 "  </tr> " .
					 "";
		}
		if (!empty($_POST))
			echo $html;
		return $html;
	}

	public function alterar_situacao_pedido(){
		$this->load->model('Pedido');
        $this->Pedido->update_situacao();
        //redirect('Admin/Main');
	}
}