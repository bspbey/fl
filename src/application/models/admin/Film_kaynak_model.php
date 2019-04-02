<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Film_kaynak_model extends CI_Model {

	public function get_all(){

        $this->db->join('brkdndr_filmler', 'brkdndr_filmler.id = brkdndr_film_kaynak.film_id');
        $this->db->select('brkdndr_film_kaynak.*, brkdndr_filmler.film_url as film_url');
        $this->db->where('brkdndr_film_kaynak.kaynak_durum', 1);
        $query = $this->db->get('brkdndr_film_kaynak')->result();
        return $query;
	}

    public function get($where){
        
		$result = $this->db->where($where)->get("brkdndr_film_kaynak")->row();
        
        return $result;
	}

    public function insert($data){

        $insert = $this->db->insert("brkdndr_film_kaynak", $data);
        return $insert;

    }
    
    public function update($where, $data){
		
        $update = $this->db->where($where)->update("brkdndr_film_kaynak", $data);
        return $update;
	}
    
    public function delete($where){
		
        $delete = $this->db->where($where)->delete("brkdndr_film_kaynak");
        return $delete;
	}


    public function filmler(){
        $result = $this->db->get("brkdndr_filmler")->result();
        return $result;
    }

    public function film_kynk_gtr($film_id){

	    $this->db->select('brkdndr_film_kaynak.*');
        $this->db->where('brkdndr_film_kaynak.kaynak_durum', 1);
        $this->db->where('brkdndr_film_kaynak.film_id', $film_id);
        $query = $this->db->get('brkdndr_film_kaynak')->result();
        return $query;
    }
}
