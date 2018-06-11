<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Example use of the CodeIgniter Sitemap Generator Model
 * 
 * @author Gerard Nijboer <me@gerardnijboer.com>
 * @version 1.0
 * @access public
 * <!-- created with Free Online Sitemap Generator www.xml-sitemaps.com -->
 */
class Sitemap extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// We load the url helper to be able to use the base_url() function
		$this->load->helper('url');
		
		$this->articles = array(
			array(
				'loc' => base_url(''),
				'changefreq' => 'weekly',
				'priority' => '0.8'
			),array(
				'loc' => base_url('vitrine'),
				'changefreq' => 'weekly',
				'priority' => '0.8'
			),
			array(
				'loc' => base_url('index.php/clientes/registrar'),
				'changefreq' => 'weekly',
				'priority' => '0.8'
			),
			array(
				'loc' => base_url('clientes/registrar'),
				'changefreq' => 'weekly',
				'priority' => '0.8'
			),
			array(
				'loc' => base_url('representante/comercial'),
				'changefreq' => 'weekly',
				'priority' => '0.8'
			),
			array(
				'loc' => base_url('clientes/recuperar'),
				'changefreq' => 'weekly',
				'priority' => '0.64'
			),
			array(
				'loc' => base_url('representante/cadastrar'),
				'changefreq' => 'weekly',
				'priority' => '0.64'
			)
		);
	}
	
	/**
	 * Generate a sitemap index file
	 * More information about sitemap indexes: http://www.sitemaps.org/protocol.html#index
	 */
	public function index() {
		$this->sitemapmodel->add(base_url(''), date('Y-m-d', time()));
		$this->sitemapmodel->add(base_url('vitrine'), date('Y-m-d', time()));
		$this->sitemapmodel->add(base_url('index.php/clientes/registrar'), date('Y-m-d', time()));
		$this->sitemapmodel->add(base_url('clientes/registrar'), date('Y-m-d', time()));
		$this->sitemapmodel->add(base_url('representante/comercial'), date('Y-m-d', time()));
		$this->sitemapmodel->add(base_url('clientes/recuperar'), date('Y-m-d', time()));
		$this->sitemapmodel->add(base_url('representante/cadastrar'), date('Y-m-d', time()));
		$this->sitemapmodel->output('sitemap');
	}
	
	/**
	 * Generate a sitemap both based on static urls and an array of urls
	 */
	public function general() {
		foreach ($this->articles as $article) {
			$this->sitemapmodel->add($article['loc'], null, $article['changefreq'], $article['priority']);
		}
		$this->sitemapmodel->output();
	}
	
	/**
	 * Generate a sitemap only on an array of urls
	 */
	public function articles() {
		foreach ($this->articles as $article) {
			$this->sitemapmodel->add($article['loc'],  $article['changefreq'], $article['priority']);
		}
		$this->sitemapmodel->output();
	}
	
}