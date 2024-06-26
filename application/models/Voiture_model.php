<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Voiture_model extends CI_Model 
{
    public function getCountAll()
    {
        return $this->db->count_all('voitures');
    }

    public function getVoitures($limit = NULL, $start = NULL, $id = NULL)
    {
        $this->db->select('*')
                 ->from('voitures')
                 ->join('categories', 'categories.id_categorie = voitures.id_categorie');
        
        if (!$id) {
            $this->db->limit($limit, $start);
            $query = $this->db->get();
            return $query->result_array();
        }

        $this->db->where('id_voiture', $id);
        $query = $this->db->get();

        return $query->row_array();
    }                        
    
    public function insertVoiture($data)
    {
        return $this->db->insert('voitures', $data);
    }

    public function updateVoiture($data, $id)
    {
        return $this->db->update('voitures', $data, ['id_voiture' => $id]);
    }

    public function deleteVoiture($id)
    {
        return $this->db->delete('voitures', ['id_voiture' => $id]);
    }

    public function searchVoiture($key)
    {
        $this->db->select('*')
                 ->from('voitures')
                 ->join('categories', 'categories.id_categorie = voitures.id_categorie')
                 ->like('marque', $key);
        $query = $this->db->get();

        return $query->result_array();
    }
}


/* End of file Voiture_model.php and path \application\models\Voiture_model.php */
