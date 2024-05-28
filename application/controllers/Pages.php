<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
	}

	public function view($page = 'home', $numero = 0)
	{
		if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		if ($page == 'home') 
		{
			$this->load->model('voiture_model');
			$config['base_url']    = base_url() . $page;
			$config['total_rows']  = $this->voiture_model->getCountAll();
			$config['per_page']    = 6;

			//Début du style de la pagination
			$config['full_tag_open']   = '<ul class="pagination">';
			$config['full_tag_close']  = '</ul>';
			$config['first_link']      = 'First';
			$config['last_link']       = 'Last';
			$config['first_tag_open']  = '<li class="page-item"><span class="page-link">';
			$config['first_tag_close'] = '</span></li>';
			$config['prev_link']       = '&laquo';
			$config['prev_tag_open']   = '<li class="page-item"><span class="page-link">';
			$config['prev_tag_close']  = '</span></li>';
			$config['next_link']       = '&raquo';
			$config['next_tag_open']   = '<li class="page-item"><span class="page-link">';
			$config['next_tag_close']  = '</span></li>';
			$config['last_tag_open']   = '<li class="page-item"><span class="page-link">';
			$config['last_tag_close']  = '</span></li>';
			$config['cur_tag_open']    = '<li class="page-item active"><a class="page-link" href="#">';
			$config['cur_tag_close']   = '</a></li>';
			$config['num_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['num_tag_close']   = '</span></li>';
			//Fin du style de la pagination

			$this->pagination->initialize($config);
			
			$data['title']    = 'Liste voitures';
			$data['links']    = $this->pagination->create_links();
			$data['voitures'] = $this->voiture_model->getVoitures($config["per_page"], $numero);

		}

		$data['title'] = ucfirst($page); // Capitalize the first letter

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('pages/'.$page);
		$this->load->view('templates/footer');
	}
}
