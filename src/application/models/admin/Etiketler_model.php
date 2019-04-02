<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Etiketler_model extends CI_Model {

   public function film_etiket_ekle($film_id){
        //etiket
        $etikets = trim($this->input->post('etiket', true));

        $etiket_array = explode(",", $etikets);
        foreach ($etiket_array as $etiket) {
            $etiket = trim($etiket);
            if (strlen($etiket) > 1) {
                $data = array(
                    'film_id' => $film_id,
                    'etiket' => trim($etiket),
                    'etiket_url' => str_slug($etiket),
                    'createdAt' => date("Y-m-d H:i:s")
                );
                //etiket ekle
                $this->db->insert('brkdndr_etiketler', $data);
            }
        }
    }
    public function film_etiket_guncelle($film_id){
        //eski etiketleri sil
        $this->etiketler_model->film_etiket_sil($film_id);

        $etikets = trim($this->input->post('etiket', true));

        $etikets_array = explode(",", $etikets);
        foreach ($etikets_array as $etiket) {
            $etiket = trim($etiket);
            if (strlen($etiket) > 1) {
                $data = array(
                    'film_id' => $film_id,
                    'etiket' => trim($etiket),
                    'etiket_url' => str_slug($etiket),
                    'updatedAt' => date("Y-m-d H:i:s")
                );
                //insert tag
                $this->db->insert('brkdndr_etiketler', $data);
            }
        }
    }
    
    public function etiket_getir($etiket_url)
    {
        $this->db->where('etiket_url', $etiket_url);
        $query = $this->db->get('brkdndr_etiketler');
        return $query->row();
    }

    public function film_etiketleri($film_id){
        $this->db->where('film_id', $film_id);
        $query = $this->db->get('brkdndr_etiketler');
        return $query->result();
    }
    public function film_etiket_sil($film_id){
        //etiket ara
        $etikets = $this->etiketler_model->film_etiketleri($film_id);

        foreach ($etikets as $etiket) {
            //sil
            $this->db->where('id', $etiket->id);
            $this->db->delete('brkdndr_etiketler');
        }
    }

}
