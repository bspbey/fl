<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filmler_model extends CI_Model {

	public function get_all(){
		
        $result = $this->db->get("brkdndr_filmler")->result();
        
        return $result;
	}

    public function get($where){
        
		$result = $this->db->where($where)->get("brkdndr_filmler")->row();
        
        return $result;
	}

    public function insert($data){

        $insert = $this->db->insert("brkdndr_filmler", $data);
        return $insert;

    }
    
    public function update($where, $data){
		
        $update = $this->db->where($where)->update("brkdndr_filmler", $data);
        return $update;
	}
    
    public function delete($where){
		
        $delete = $this->db->where($where)->delete("brkdndr_filmler");
        return $delete;
	}
	
    function update_counter($id) {
    $this->db->where('id', $id);
    $this->db->select('film_goruntulenme');
    $count = $this->db->get('brkdndr_filmler')->row();
    $this->db->where('id', $id);
    $this->db->set('film_goruntulenme', ($count->film_goruntulenme + 1));
    $this->db->update('brkdndr_filmler');
    }

    public function kategoriler_v2(){
        $result = $this->db->get("brkdndr_kategoriler")->result();
        return $result;
    }

    public function admin_son_filmler(){
        $this->db->select('brkdndr_filmler.*');
        $this->db->where('brkdndr_filmler.film_durum', 1);
        $query = $this->db->get('brkdndr_filmler')->result();
        return $query;
    }

    public function begeni_ekle($data){

        $insert = $this->db->insert("brkdndr_film_begeniler", $data);
        return $insert;

    }
}
