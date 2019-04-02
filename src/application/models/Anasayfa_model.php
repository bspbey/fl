<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anasayfa_model extends CI_Model {

    public function anasayfa_son_filmler(){
        $this->db->join('brkdndr_kategoriler', 'brkdndr_filmler.kategori_id = brkdndr_kategoriler.id');
        $this->db->select('brkdndr_filmler.*, brkdndr_kategoriler.kategori_adi as kategori_adi, brkdndr_kategoriler.kategori_url, brkdndr_uyeler.ad_soyad as uye_ad_soyad');
        $this->db->where('brkdndr_filmler.film_durum', 1);
        $query = $this->db->get('brkdndr_filmler')->result();
        return $query;
    }
    public function anasayfa_film_icerik($url){
        $this->db->join('brkdndr_uyeler', 'brkdndr_filmler.yazar_id = brkdndr_uyeler.id');
        $this->db->join('brkdndr_kategoriler', 'brkdndr_filmler.kategori_id = brkdndr_kategoriler.id');
        $this->db->select('brkdndr_filmler.* , brkdndr_kategoriler.kategori_adi as kategori_adi, brkdndr_kategoriler.kategori_url as kategori_url, brkdndr_uyeler.ad_soyad as uye_ad_soyad');
        $this->db->where('brkdndr_filmler.film_durum', 1);
        $this->db->where('brkdndr_filmler.film_url', $url);
        $query = $this->db->get('brkdndr_filmler');
        return $query->row();
    }

    public function anasayfa_film($id){
        $this->db->where('brkdndr_filmler.id', $id);
        $query = $this->db->get('brkdndr_filmler');
        return $query->row();
    }

    public function film_sayaci($id){
        $filmler = $this->anasayfa_model->anasayfa_film($id);

        if (get_cookie('film_goruntulenme_' . $id) != 1) {
            set_cookie('film_goruntulenme_' . $id, '1');
            $data = array(
                'film_goruntulenme' => $filmler->film_goruntulenme + 1
            );

            $this->db->where('id', $id);
            $this->db->update('brkdndr_filmler', $data);
        }

    }

    public function film_sayisi(){
        $this->db->select('brkdndr_filmler.*');
        $this->db->where('brkdndr_filmler.film_durum', 1);
        $this->db->order_by('brkdndr_filmler.id', 'DESC');
        $query = $this->db->get('brkdndr_filmler');
        return $query->num_rows();
    }

    public function sayfalama_filmleri($per_page, $offset){
        $this->db->join('brkdndr_kategoriler', 'brkdndr_filmler.kategori_id = brkdndr_kategoriler.id');
        $this->db->select('brkdndr_filmler.*, brkdndr_kategoriler.kategori_adi as kategori_adi, brkdndr_kategoriler.kategori_url, brkdndr_uyeler.ad_soyad as uye_ad_soyad');
        $this->db->join('brkdndr_uyeler', 'brkdndr_filmler.yazar_id = brkdndr_uyeler.id');
        $this->db->where('brkdndr_filmler.film_durum', 1);
        $this->db->order_by('brkdndr_filmler.id', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('brkdndr_filmler');
        return $query->result();
    }

    public function insert($data){

        $insert = $this->db->insert("brkdndr_filmler", $data);
        return $insert;

    }

    public function film_yorumlari($id){
        $this->db->join('brkdndr_filmler', 'brkdndr_film_yorumlar.film_id = brkdndr_filmler.id');
        $this->db->where('brkdndr_filmler.id', $id);
        $this->db->where('brkdndr_film_yorumlar.yorum_durum', 1);
        $this->db->select('brkdndr_film_yorumlar.*');
        $this->db->order_by('brkdndr_film_yorumlar.id', 'DESC');
        $query = $this->db->get('brkdndr_film_yorumlar');
        return $query->result();
    }

    public function etikete_ait_film_sayisi($etiket_url){
        $this->db->join('brkdndr_uyeler', 'brkdndr_filmler.yazar_id = brkdndr_uyeler.id');
        $this->db->join('brkdndr_etiketler', 'brkdndr_filmler.id = brkdndr_etiketler.film_id');
        $this->db->join('brkdndr_kategoriler', 'brkdndr_filmler.kategori_id = brkdndr_kategoriler.id');
        $this->db->select('brkdndr_filmler.* , brkdndr_kategoriler.kategori_adi as kategori_adi, brkdndr_kategoriler.kategori_url, brkdndr_etiketler.id as etiket_id,brkdndr_uyeler.ad_soyad as uye_ad_soyad');
        $this->db->where('brkdndr_filmler.film_durum', 1);
        $this->db->where('brkdndr_etiketler.etiket_url', $etiket_url);
        $query = $this->db->get('brkdndr_filmler');
        return $query->num_rows();
    }

    public function etikete_ait_filmler_sayfalama($etiket_url, $per_page, $offset){
        $this->db->join('brkdndr_uyeler', 'brkdndr_filmler.yazar_id = brkdndr_uyeler.id');
        $this->db->join('brkdndr_etiketler', 'brkdndr_filmler.id = brkdndr_etiketler.film_id');
        $this->db->join('brkdndr_kategoriler', 'brkdndr_filmler.kategori_id = brkdndr_kategoriler.id');
        $this->db->select('brkdndr_filmler.* , brkdndr_kategoriler.kategori_adi as kategori_adi, brkdndr_kategoriler.kategori_url, brkdndr_etiketler.id as etiket_id,brkdndr_uyeler.ad_soyad as uye_ad_soyad');
        $this->db->where('brkdndr_filmler.film_durum', 1);
        $this->db->where('brkdndr_etiketler.etiket_url', $etiket_url);
        $this->db->order_by('brkdndr_filmler.id', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('brkdndr_filmler');
        return $query->result();
    }

    public function sayfalama_kategorileri($kategori_id, $per_page, $offset){
        $this->db->join('brkdndr_uyeler', 'brkdndr_filmler.yazar_id = brkdndr_uyeler.id');
        $this->db->join('brkdndr_kategoriler', 'brkdndr_filmler.kategori_id = brkdndr_kategoriler.id');
        $this->db->select('brkdndr_filmler.*, brkdndr_kategoriler.kategori_adi as kategori_adi, brkdndr_kategoriler.kategori_url, brkdndr_uyeler.ad_soyad as uye_ad_soyad');
        $this->db->where('brkdndr_filmler.film_durum', 1);
        $this->db->where('kategori_id', $kategori_id);
        $this->db->order_by('brkdndr_filmler.id', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('brkdndr_filmler');
        return $query->result();
    }
    public function kategori_film_sayisi($kategori_id){
        $this->db->join('brkdndr_uyeler', 'brkdndr_filmler.yazar_id = brkdndr_uyeler.id');
        $this->db->join('brkdndr_kategoriler', 'brkdndr_filmler.kategori_id = brkdndr_kategoriler.id');
        $this->db->select('brkdndr_filmler.* , brkdndr_kategoriler.kategori_adi as kategori_adi, brkdndr_kategoriler.kategori_url, brkdndr_uyeler.ad_soyad as uye_ad_soyad');
        $this->db->where('brkdndr_filmler.film_durum', 1);
        $this->db->where('brkdndr_filmler.kategori_id', $kategori_id);
        $query = $this->db->get('brkdndr_filmler');
        return $query->num_rows();
    }

    public function menu_sayfalar(){
        $result = $this->db->get("brkdndr_sayfalar")->result();
        return $result;
    }

    public function enckizlenenler(){
        $this->db->join('brkdndr_kategoriler', 'brkdndr_filmler.kategori_id = brkdndr_kategoriler.id');
        $this->db->select('brkdndr_filmler.*, brkdndr_kategoriler.kategori_adi as kategori_adi, brkdndr_kategoriler.kategori_url,');
        $this->db->where('brkdndr_filmler.film_durum', 1);
        $this->db->order_by('brkdndr_filmler.film_goruntulenme', 'DESC');
        $this->db->limit($this->ayarlar->enckizlenen_film_sayisi);
        $query = $this->db->get('brkdndr_filmler');
        return $query->result();
    }

    public function sayfa($sayfa_url)
    {
        $this->db->where('sayfa_url', $sayfa_url);
        $query = $this->db->get('brkdndr_sayfalar');
        return $query->row();
    }

    public function sayfalama_aramalari($q, $per_page, $offset){
        $this->db->join('brkdndr_uyeler', 'brkdndr_filmler.yazar_id = brkdndr_uyeler.id');
        $this->db->join('brkdndr_kategoriler', 'brkdndr_filmler.kategori_id = brkdndr_kategoriler.id');
        $this->db->select('brkdndr_filmler.*, brkdndr_kategoriler.kategori_adi as kategori_adi, brkdndr_kategoriler.kategori_url, brkdndr_uyeler.ad_soyad as uye_ad_soyad');
        $this->db->where('brkdndr_filmler.film_durum', 1);
        $this->db->like('brkdndr_filmler.film_baslik', $q);
        $this->db->or_like('brkdndr_filmler.tmdb_id', $q);
        $this->db->or_like('brkdndr_filmler.film_icerik', $q);
        $this->db->order_by('brkdndr_filmler.id', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('brkdndr_filmler');
        return $query->result();
    }
    public function arama_film_sayisi($q){
        $this->db->join('brkdndr_uyeler', 'brkdndr_filmler.yazar_id = brkdndr_uyeler.id');
        $this->db->join('brkdndr_kategoriler', 'brkdndr_filmler.kategori_id = brkdndr_kategoriler.id');
        $this->db->select('brkdndr_filmler.*, brkdndr_kategoriler.kategori_adi as kategori_adi, brkdndr_kategoriler.kategori_url, brkdndr_uyeler.ad_soyad as uye_ad_soyad');
        $this->db->where('brkdndr_filmler.film_durum', 1);
        $this->db->like('brkdndr_filmler.film_baslik', $q);
        $this->db->or_like('brkdndr_filmler.film_icerik', $q);
        $this->db->order_by('brkdndr_filmler.id', 'DESC');
        $query = $this->db->get('brkdndr_filmler');
        return $query->num_rows();
    }

    public function sayfalama_encokizlenen_filmleri($per_page, $offset){
        $this->db->join('brkdndr_kategoriler', 'brkdndr_filmler.kategori_id = brkdndr_kategoriler.id');
        $this->db->select('brkdndr_filmler.*, brkdndr_kategoriler.kategori_adi as kategori_adi, brkdndr_kategoriler.kategori_url, brkdndr_uyeler.ad_soyad as uye_ad_soyad');
        $this->db->join('brkdndr_uyeler', 'brkdndr_filmler.yazar_id = brkdndr_uyeler.id');
        $this->db->where('brkdndr_filmler.film_durum', 1);
        $this->db->order_by('brkdndr_filmler.film_goruntulenme', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('brkdndr_filmler');
        return $query->result();
    }

    public function sayfalama_begenilen_filmleri($per_page, $offset){
        $this->db->join('brkdndr_kategoriler', 'brkdndr_filmler.kategori_id = brkdndr_kategoriler.id');
        $this->db->select('brkdndr_filmler.*, brkdndr_kategoriler.kategori_adi as kategori_adi, brkdndr_kategoriler.kategori_url, brkdndr_uyeler.ad_soyad as uye_ad_soyad');
        $this->db->join('brkdndr_uyeler', 'brkdndr_filmler.yazar_id = brkdndr_uyeler.id');
        $this->db->join('brkdndr_film_begeniler', 'brkdndr_filmler.id = brkdndr_film_begeniler.begeni_film_id');
        $this->db->where('brkdndr_filmler.film_durum', 1);
        $this->db->group_by('brkdndr_film_begeniler.begeni_film_id');
        $this->db->order_by('count(brkdndr_film_begeniler.begeni_film_id)', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('brkdndr_filmler');
        return $query->result();
    }

    public function film_begenileri($id){
        $this->db->join('brkdndr_filmler', 'brkdndr_film_begeniler.begeni_film_id = brkdndr_filmler.id');
        $this->db->where('brkdndr_filmler.id', $id);
        $this->db->select('brkdndr_film_begeniler.*');
        $query = $this->db->get('brkdndr_film_begeniler');
        return $query->num_rows();
    }

    public function begeni_varmi($begeni_film_id="", $ip_adresi=""){
        $this->db->select('brkdndr_film_begeniler.*');
        $this->db->where('brkdndr_film_begeniler.begeni_film_id', $begeni_film_id);
        $this->db->where('brkdndr_film_begeniler.ip_adresi', $ip_adresi);
        $query = $this->db->get('brkdndr_film_begeniler');
        return $query->result();
    }


}