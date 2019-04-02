<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anasayfa extends Genel_MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('fonksiyonlar');
    }

    public function index(){

        //sayfalama
        $sayfa = $this->security->xss_clean($this->input->get('sayfa'));
        if (empty($sayfa)) {
            $sayfa = 0;
        }

        if ($sayfa != 0) {
            $sayfa = $sayfa - 1;
        }
        $config['base_url'] = base_url();
        $config['total_rows'] = $this->anasayfa_model->film_sayisi();
        $config['per_page'] = $this->ayarlar->anasayfa_film_sayisi;
        $this->pagination->initialize($config);

        //Ayarları veritabanından getirme
        $genel_ayarlar = $this->ayarlar_model->get_all();
        //Videoların listesini veritabanından getirme
        $film_listesi = $this->anasayfa_model->sayfalama_filmleri($config['per_page'], $sayfa * $config['per_page']);

        $ktg_list = $this->filmler_model->kategoriler_v2();
        $viewData["list"] = $ktg_list;

        $syf_list = $this->sayfalar_model->get_aktif();
        $viewData["list"] = $syf_list;

        $data = array(
            'kategoriler' => $ktg_list,
            'film_listesi' => $film_listesi,
            'genel_ayarlar' => $genel_ayarlar,
            'sayfalar' => $syf_list
        );
        $this->load->view("anasayfa", $data);

    }

    public function film_icerik($url){

        $data["kategoriler"] = $this->filmler_model->kategoriler_v2();

        $film_url_v2 = $this->security->xss_clean($url);
        $data['film_icerik'] = $this->anasayfa_model->anasayfa_film_icerik($film_url_v2);

        $id = $data['film_icerik']->id;
        $data['yorumlar'] = $this->anasayfa_model->film_yorumlari($id);

        $data['sayfalar'] = $this->sayfalar_model->get_aktif();

        $data['begeni_sayisi'] = $this->anasayfa_model->film_begenileri($id);

        $url = $data['film_icerik']->film_url;

        if (empty($data['film_icerik']->film_durum) || ($url == '')) {
            redirect(base_url());
        }

//        $data['yorum_sayisi'] = $this->anasayfa_model->film_yorum_sayisi($id);
        $data['film_etiketler'] = $this->etiketler_model->film_etiketleri($id);

        $data['film_kaynak'] = $this->film_kaynak_model->film_kynk_gtr($id);

        $this->load->view("icerik", $data);

        $this->load->helper('cookie');
        $this->anasayfa_model->film_sayaci($id);
    }

    public function yorum_ekle(){

        $film_id = $this->input->post("film_id");
        $film_url = $this->input->post("film_url");
        $yorum_ad_soyad = $this->input->post("yorum_ad_soyad");
        $yorum_email    = $this->input->post("yorum_email");
        $yorum_icerik = $this->input->post("yorum_icerik");
        $yorum_spoiler = $this->input->post("yorum_spoiler");
        $createdAt   = date("Y-m-d H:i:s");

        if($yorum_ad_soyad && $yorum_email && $yorum_icerik){

            $data = array(
                "film_id"   => $film_id,
                "yorum_ad_soyad"   => $yorum_ad_soyad,
                "yorum_email"   => $yorum_email,
                "yorum_icerik"   => $yorum_icerik,
                "yorum_spoiler"   => $yorum_spoiler,
                "createdAt"     => $createdAt
            );
            $insert = $this->yorumlar_model->yorum_ekle($data);

            if($insert){
                $alert = array(
                    "title" => "",
                    "text" => "Yorum ekleme işlemi başarılıdır, yorumunuzun görünmesi için yönetici onayı gereklidir.",
                    "type" => "success"
                );
            }
            else{
                $alert = array(
                    "title" => "",
                    "text" => "Yorum ekleme işlemi başarısızdır, lütfen tekrar deneyin.",
                    "type" => "error"
                );
            }
        }else{

            $alert = array(
                "title" => "",
                "text" => "Lütfen boş alan bırakmayınız...",
                "type" => "error"
            );
        }


        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("film/".$film_url));

    }

    public function kategori($kategori_url){

        $kategori_url = $this->security->xss_clean($kategori_url);

        $data['kategori'] = $this->kategoriler_model->kategori_getir($kategori_url);

        if (empty($data['kategori'])) {
            redirect(base_url());
        }

        $kategori_id = $data['kategori']->id;

        $data["kategoriler"] = $this->filmler_model->kategoriler_v2();

        $data['kategori_title'] = html_escape('"'.$data['kategori']->kategori_adi).'"'.' kategorisine ait filmler';
        $data['kategori_url'] = $data['kategori']->kategori_url;
        $sayfa = $this->security->xss_clean($this->input->get('sayfa'));
        if (empty($sayfa)) {
            $sayfa = 0;
        }

        if ($sayfa != 0) {
            $sayfa = $sayfa - 1;
        }

        $config['base_url'] = base_url() . '/kategori/' . $kategori_url;
        $config['total_rows'] = $this->anasayfa_model->kategori_film_sayisi($kategori_id);
        $config['per_page'] = $this->ayarlar->anasayfa_kategori_sayisi;
        $this->pagination->initialize($config);

        $data['filmler'] = $this->anasayfa_model->sayfalama_kategorileri($kategori_id, $config['per_page'], $sayfa * $config['per_page']);

        $data['sayfalar'] = $this->sayfalar_model->get_aktif();

        $this->load->view('kategori', $data);

    }

    public function etiket($etiket_url){

        $etiket_url = $this->security->xss_clean($etiket_url);

        $data["kategoriler"] = $this->filmler_model->kategoriler_v2();
        $data['etiket'] = $this->etiketler_model->etiket_getir($etiket_url);

        if (empty($data['etiket'])) {
            redirect(base_url());
        }

        $etiket_id = $data['etiket']->id;

        $data['etiket'] = html_escape('"'.$data['etiket']->etiket).'"'.' etiketine ait filimler';

        $sayfa = $this->security->xss_clean($this->input->get('sayfa'));
        if (empty($sayfa)) {
            $sayfa = 0;
        }

        if ($sayfa != 0) {
            $sayfa = $sayfa - 1;
        }

        $config['base_url'] = base_url() . '/etiket/' . $etiket_url;
        $config['total_rows'] = $this->anasayfa_model->etikete_ait_film_sayisi($etiket_url);
        $config['per_page'] = $this->ayarlar->anasayfa_etiket_sayisi;
        $this->pagination->initialize($config);
        $data['etiket_urlsi'] =  base_url() . 'etiket/' . $etiket_url;
        $data['filmler'] = $this->anasayfa_model->etikete_ait_filmler_sayfalama($etiket_url, $config['per_page'], $sayfa * $config['per_page']);


        $data['sayfalar'] = $this->sayfalar_model->get_aktif();


        $this->load->view('etiket', $data);
    }

    public function sayfa($sayfa_url){

        $sayfa_url = $this->security->xss_clean($sayfa_url);

        //index page
        if (empty($sayfa_url)) {
            redirect(base_url());
        }

        $data['sayfalar'] = $this->sayfalar_model->get_aktif();


        $data["kategoriler"] = $this->filmler_model->kategoriler_v2();
        $data['sayfa'] = $this->anasayfa_model->sayfa($sayfa_url);

        if ($data['sayfa']->sayfa_durum == 0 || $data['sayfa']->sayfa_url == '') {
            redirect(base_url());
        } else {
            $data['sayfa_title'] = $data['sayfa']->sayfa_baslik;
            $data['sayfa_icerik'] = $data['sayfa']->sayfa_icerik;
            $data['sayfa_url'] = $data['sayfa']->sayfa_url;
            $this->load->view('sayfa', $data);

        }
    }

    public function arama(){

        $q = $this->input->get('q', TRUE);

        $data['q'] = $q;
        $data['arama_title'] = "'".$q. "' ". html_escape("için arama sonuçları");
        $data['arama_description'] = "'".$q. "' ". html_escape("için arama sonuçları");

        $data["kategoriler"] = $this->filmler_model->kategoriler_v2();

        $sayfa = $this->security->xss_clean($this->input->get('sayfa'));
        if (empty($sayfa)) {
            $sayfa = 0;
        }

        if ($sayfa != 0) {
            $sayfa = $sayfa - 1;
        }
        $data['arama_film_sayisi'] = $this->anasayfa_model->arama_film_sayisi($q);

        $config['base_url'] = base_url() . '/arama?q=' . $q;
        $config['total_rows'] = $data['arama_film_sayisi'];
        $config['per_page'] = $this->ayarlar->anasayfa_film_sayisi;
        $this->pagination->initialize($config);

        $data['filmler'] = $this->anasayfa_model->sayfalama_aramalari($q, $config['per_page'], $sayfa * $config['per_page']);

        $data['sayfalar'] = $this->sayfalar_model->get_aktif();

        $this->load->view('arama', $data);
    }

    public function en_cok_izlenenler(){

        //sayfalama
        $sayfa = $this->security->xss_clean($this->input->get('sayfa'));
        if (empty($sayfa)) {
            $sayfa = 0;
        }

        if ($sayfa != 0) {
            $sayfa = $sayfa - 1;
        }
        $config['base_url'] = base_url();
        $config['total_rows'] = $this->anasayfa_model->film_sayisi();
        $config['per_page'] = $this->ayarlar->anasayfa_film_sayisi;
        $this->pagination->initialize($config);

        //Ayarları veritabanından getirme
        $genel_ayarlar = $this->ayarlar_model->get_all();
        //Videoların listesini veritabanından getirme
        $film_listesi = $this->anasayfa_model->sayfalama_encokizlenen_filmleri($config['per_page'], $sayfa * $config['per_page']);

        $ktg_list = $this->filmler_model->kategoriler_v2();
        $viewData["list"] = $ktg_list;

        $syf_list = $this->sayfalar_model->get_aktif();
        $viewData["list"] = $syf_list;

        $data = array(
            'kategoriler' => $ktg_list,
            'film_listesi' => $film_listesi,
            'genel_ayarlar' => $genel_ayarlar,
            'sayfalar' => $syf_list
        );
        $this->load->view("encokizlenenler_sayfa", $data);

    }

    public function en_cok_begenilenler(){

        //sayfalama
        $sayfa = $this->security->xss_clean($this->input->get('sayfa'));
        if (empty($sayfa)) {
            $sayfa = 0;
        }

        if ($sayfa != 0) {
            $sayfa = $sayfa - 1;
        }
        $config['base_url'] = base_url();
        $config['total_rows'] = $this->anasayfa_model->film_sayisi();
        $config['per_page'] = $this->ayarlar->anasayfa_film_sayisi;
        $this->pagination->initialize($config);

        //Ayarları veritabanından getirme
        $genel_ayarlar = $this->ayarlar_model->get_all();
        //Videoların listesini veritabanından getirme
        $film_listesi = $this->anasayfa_model->sayfalama_begenilen_filmleri($config['per_page'], $sayfa * $config['per_page']);

        $ktg_list = $this->filmler_model->kategoriler_v2();
        $viewData["list"] = $ktg_list;

        $syf_list = $this->sayfalar_model->get_aktif();
        $viewData["list"] = $syf_list;

        $data = array(
            'kategoriler' => $ktg_list,
            'film_listesi' => $film_listesi,
            'genel_ayarlar' => $genel_ayarlar,
            'sayfalar' => $syf_list
        );
        $this->load->view("encokbegenilenler_sayfa", $data);

    }

    public function oylama(){

        if(isset($_GET["like"])){

            $id = $_GET["like"];
            $ip_adresi = GetIP();

            if(!empty($this->anasayfa_model->begeni_varmi($id,$ip_adresi))){
                $json['error'] = 'Gardaşım zaten bu filmi beğenmişsin. Daha fazla beğeni gönderemezsin, başka filmlere gönder :) ';
                echo json_encode($json);
            } else {
            $data = array(
                "ip_adresi"   => $ip_adresi,
                "begeni_film_id"   => $id
            );

            $json = ["begeni_film_id" => "$id", "success" => "Beğeni başarıyla gönderildi :)"];
            echo json_encode($json);

            $this->filmler_model->begeni_ekle($data);

            }

        } else {

            $json = ["error" => "Beğeni gönderilirken bir hata oluştu :("];
            echo json_encode($json);
        }


    }
}
