<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Categorie_model extends CI_Model 
{
    public function getCategories($id = NULL)
    {
        if (!$id) {
            $query = $this->db->get('categories');
            return $query->result_array();
        }

        $query = $this->db->get_where('categories', ['id_categorie' => $id]);
        return $query->row_array();
    }                        
    
    public function insertCategorie($data)
    {
        return $this->db->insert('categories', $data);
    }

    public function updateCategorie($data, $id)
    {
        return $this->db->update('categories', $data, ['id_categorie' => $id]);
    }

    public function deleteCategorie($id)
    {
        return $this->db->delete('categories', ['id_categorie' => $id]);
    }                       
    
    public function searchCategorie($key)
    {
        $this->db->like('nom', $key);
        $query = $this->db->get('categories');

        return $query->result_array();
    }
}


/* End of file Categorie_model.php and path \application\models\Categorie_model.php */
