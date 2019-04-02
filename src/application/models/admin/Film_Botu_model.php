<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Film_Botu_model extends CI_Model {
    
    public function get($where = array()){
		$row = $this->db->where($where)->get("brkdndr_uyeler")->row();
        return $row;
	}
    
    function istatistikler(){
        $data['film_sayisi'] = $this->db->count_all('brkdndr_filmler');
        $data['yorum_sayisi'] = $this->db->count_all('brkdndr_film_yorumlar');
        $data['ziyaretci_sayisi'] = $this->db->count_all('brkdndr_filmler');
        $data['iletisim_mesaj_sayisi'] = $this->db->count_all('brkdndr_iletisim');
        ## Toplam Görüntülenme Sayısı ##
        $this->db->select_sum('film_goruntulenme');
        $result = $this->db->get('brkdndr_filmler')->row();
        $data['film_goruntulenme'] =  $result->film_goruntulenme;
        ## Toplam Görüntülenme Sayısı ##

        return $data;
        
        
        
    }
}
