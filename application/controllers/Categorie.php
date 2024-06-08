<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorie extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('categorie_model');
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
        $config['base_url']    = base_url() . 'categorie';
        $config['total_rows']  = $this->categorie_model->getCountAll();
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
        $config['last_tag_open']   =  '<li class="page-item"><span class="page-link">';
        $config['last_tag_close']  = '</span></li>';
        $config['cur_tag_open']    = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close']   = '</a></li>';
        $config['num_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']   = '</span></li>';
        //Fin du style de la pagination

        $this->pagination->initialize($config);

        $data['title'] = 'Liste categories';
        $data['links'] = $this->pagination->create_links();
        $data['categories'] = $this->categorie_model->getCategories($config['per_page'], $numero);

        $this->_view($data, 'categories/list-categories');
    }

    public function view($page, $id = NULL)
    {
        switch ($page) {
            case 'ajouter':

                $this->_view(['title' => 'Ajouter categorie'], 'categories/create-update-categorie');
                
                break;

            case 'modifier':
                $data['categorie'] = $this->categorie_model->getCategories($id);
                
                if (empty($data['categorie'])) 
                {
                    show_404();
                }

                $data['title'] = 'Modifier categorie';

                $this->_view($data, 'categories/create-update-categorie');

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
                    ->set_rules('nom', 'Nom', 'htmlspecialchars|trim|required|alpha_numeric_spaces|min_length[3]')
                    ->set_rules('description', 'Description', 'htmlspecialchars|trim|required|min_length[5]');
    
        if (! $this->form_validation->run()) 
        {
            (! $id) ? $this->view('ajouter') : $this->view('modifier', $id);
        } 
        else
        {
            $data = [
                'nom'         => $this->input->post('nom'),
                'description' => $this->input->post('description'),
            ];
    
            if(!$id) 
            {
                $this->categorie_model->insertCategorie($data);
            } 
            else
            {
                $this->categorie_model->updateCategorie($data, $id);
            }
    
            redirect(base_url('categorie'), 'location', 302);
        }
    }

    public function delete($id)
    {
        $deleted = $this->categorie_model->deleteCategorie($id);

        if (empty($deleted)) 
        {
            show_404();
        }

        redirect(base_url('categorie'), 'location', 302);
    }

    /*public function search()
    {
        $key = $this->input->post('search-category');

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($this->categorie_model->searchCategorie($key)));
    }*/
}

/* End of file Categorie.php and path \application\controllers\categorie\Categorie.php */
