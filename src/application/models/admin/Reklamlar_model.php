<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reklamlar_model extends CI_Model {

	public function get_all(){

	    $result = $this->db->get("brkdndr_reklamlar")->result();
        return $result;
	}

    public function get($where){
        
		$result = $this->db->where($where)->get("brkdndr_reklamlar")->row();
        return $result;
	}

    public function update($where, $data){
		
        $update = $this->db->where($where)->update("brkdndr_reklamlar", $data);
        return $update;
	}

	public function reklam_getir($where){
        $this->db->select('brkdndr_reklamlar.*');
        $this->db->where('brkdndr_reklamlar.reklam_tipi', $where);
        $query = $this->db->get('brkdndr_reklamlar')->row();
        return $query;
    }

}
