<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Voiture extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('pagination');
    $this->load->model('voiture_model');
    $this->load->model('categorie_model');
  }

  public function _doUpload()
  {
    $config = [
			'upload_path'   => './public/uploads',
			'allowed_types' => 'jpg|png|gif',
			'max_size'      => 5000,
			'remove_spaces' => true,
			'overwrite'     => true,
		];
		
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('image')) 
		{
			return  ['error' => $this->upload->display_errors('<span class="text-danger">', '</span>')];
		} 
		 else 
		{
			return ['data' => $this->upload->data('file_name')];
		}
  }

  private function _view($array, $file)
  {
    $this->load->view('templates/header', $array);
    $this->load->view('templates/navbar');
    $this->load->view($file);
    $this->load->view('templates/footer');
  }

  public function index($numero)
  {

    $config['base_url']    = base_url() . 'voiture';
    $config['total_rows']  = $this->voiture_model->getCountAll();
    $config['per_page']    = 5;

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

    $this->_view($data, 'voitures/list-voitures');
  }

  public function view($page, $id = NULL)
  {
    $data['categories'] = $this->categorie_model->getCategories();

    switch ($page) {
      case 'ajouter':
        $data['title'] = 'Ajouter voiture';

        $this->_view($data, 'voitures/create-update-voiture');

        break;

      case 'modifier':
        $data['voiture'] = $this->voiture_model->getVoitures($id);

        if (empty($data['voiture'])) 
        {
          show_404();
        }

        $data['title'] = 'Modifier voiture';

        $this->_view($data, 'voitures/create-update-voiture');

        break;

      case 'detail':
        $data['voiture'] = $this->voiture_model->getVoitures($id);

        if (empty($data['voiture'])) 
        {
          show_404();
        }

        $data['title'] = 'Détail voiture' . $data['voiture']['numero'];

        $this->_view($data, 'voitures/detail-voiture');

        break;

      default:
        show_404();
        break;
    }
  }

  public function save($id)
  {
    $this->load->library('form_validation');

    $this->form_validation
				->set_rules('marque', 'Marque', 'htmlspecialchars|trim|required|min_length[3]')
				->set_rules('numero', 'Numero', 'htmlspecialchars|trim|required|min_length[6]')
				->set_rules('couleur', 'Couleur', 'htmlspecialchars|trim|required|alpha_numeric_spaces|min_length[3]')
				->set_rules('categorie', 'Catégorie', 'htmlspecialchars|trim|required|is_natural_no_zero|min_length[1]');

		if (! $this->form_validation->run()) 
		{
      (! $id) ? $this->view('ajouter') : $this->view('modifier', $id);
		} 
    else
    {
      $upload = $this->_doUpload();

      $data = [
        'marque'       => $this->input->post('marque'),
        'numero'       => $this->input->post('numero'),
        'couleur'      => $this->input->post('couleur'),
        'id_categorie' => $this->input->post('categorie')
      ];

			if(isset($upload['error']) && ! $id) 
			{
				$this->session->set_flashdata('error', $upload['error']);

        $this->view('ajouter');
			}
			else
			{
        if(!$id) 
        {
          $data['image'] = $upload['data'];

          $this->voiture_model->insertVoiture($data);
        } 
        else
        {
          date_default_timezone_set("Africa/Nairobi");
          $data['date_creation'] = date("Y-m-d H:i:s");

          if($upload['data']) $data['image'] = $upload['data'];
          
          $this->voiture_model->updateVoiture($data, $id);
        }
    
        redirect(base_url('voiture'), 'location', 302);
			}
    }
  }

  public function delete($id)
  {
    $deleted = $this->voiture_model->deleteVoiture($id);

    if (empty($deleted)) 
    {
      show_404();
    }

    redirect(base_url('voiture'), 'location', 302);
  }

  public function search()
  {
    $key = $this->input->post('search-voiture');

    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($this->voiture_model->searchVoiture($key)));
  }
}

/* End of file Voiture.php and path \application\controllers\voiture\Voiture.php */
