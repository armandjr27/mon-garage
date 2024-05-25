<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller 
{
	public function view($page = 'home')
	{
		if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		if ($page == 'home') 
		{
			$this->load->model('voiture_model');
			$data['voitures'] = $this->voiture_model->getVoitures();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('pages/'.$page);
		$this->load->view('templates/footer');
	}
}
