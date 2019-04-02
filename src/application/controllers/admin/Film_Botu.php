<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Film_Botu extends Genel_MY_Controller {

public function __construct(){
     parent::__construct();

    $user = $this->session->userdata("user");

    if(!$user){
        redirect(base_url("admin"));
    }
}

public function index(){

    $list = $this->filmler_model->get_all();

    $viewData["list"] = $list;

    //2 Adet data gönderme
    $data = array(
    'list' => $list,
    'title' => "Film Botu | Admin Paneli",
    );
    $this->load->view("admin/film_botu", $data);
}

public function film_getir()
{

    if (isset($_POST["film_bilgi_getir"])) {

        $ayarlar =$this->ayarlar_model->ayarlari_getir();

        $curl = curl_init();
        $film_id = $this->input->post("film_tmdb_id");
        $curl_url = "https://api.themoviedb.org/3/movie/$film_id?language=tr-TR&api_key=$ayarlar->site_tmdb_api";

        curl_setopt_array($curl, array(
            CURLOPT_URL => $curl_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "{}",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $data = json_decode($response, true);
        }
        $film_turleri = array($data["genres"]);
        foreach ($film_turleri as $d) {
            if (is_array($d)) {
                foreach ($d as $film_turu) {
                    $film_turu["name"] . " ";
                }

            } else {
                print_r("dizi hatası");
            }
        }

        $list = $this->filmler_model->kategoriler_v2();
        $viewData["list"] = $list;
        $data = array(
            'title' => "TMDb Film Botu ile Film Ekle | Admin Paneli",
            'list' => $list,
            'tmdb_id' => $data["id"],
            'film_baslik' => $data["title"],
            'film_tur' => $film_turu["name"],
            'film_aciklama' => $data["overview"],
            'film_poster' => $data["poster_path"],
            'film_tarih' => $data["release_date"],
            'film_sure' => $data["runtime"],
            'film_tmdb_puan' => $data["vote_average"]
        );

        $this->load->view("admin/film_botu_ekle", $data);
    } else {
        echo "krdşm formu kullansana ne arıyon buralarda";
    }
}



    public function insert(){

        if(isset($_POST["film_ekle"])) {

             function poster_indir($curl_url,$saveto){
                $ch = curl_init ($curl_url);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
                $raw=curl_exec($ch);
                curl_close ($ch);
                if(file_exists($saveto)){
                    unlink($saveto);
                }
                $fp = fopen($saveto,'x');
                fwrite($fp, $raw);
                fclose($fp);
            }

            $tmdb_id = $this->input->post("tmdb_id");
            $film_baslik = $this->input->post("film_baslik");
            $kategori_id = $this->input->post("film_kategori");
            $yazar_id = $this->input->post("yazar_id");
            $film_icerik = $this->input->post("film_icerik");
            $film_yil = $this->input->post("film_yil");
            $film_dk = $this->input->post("film_dk");
            $film_tmdb = $this->input->post("film_tmdb");
            $film_poster = $this->input->post("film_poster");
            if ($this->input->post("film_url") == '') {
                $film_url = str_slug($this->input->post("film_baslik"));
            } else {
                $film_url = $this->input->post("film_url");
            }
            $film_durum = $this->input->post("film_durum");
            $createdAt = date("Y-m-d H:i:s");

            $poster_adi = $film_url."-".rand(1,999999);
            poster_indir("$film_poster",'uploads/'.$poster_adi.'.jpg');


            if ($film_baslik && $kategori_id && $yazar_id && $film_icerik) {

                    $data = array(
                        "tmdb_id" => $tmdb_id,
                        "film_baslik" => $film_baslik,
                        "kategori_id" => $kategori_id,
                        "yazar_id" => $yazar_id,
                        "film_icerik" => $film_icerik,
                        "film_resim" => $poster_adi.".jpg",
                        "film_url" => $film_url,
                        "film_yil" => $film_yil,
                        "film_dk" => $film_dk,
                        "film_tmdb" => $film_tmdb,
                        "film_durum" => $film_durum,
                        "createdAt" => $createdAt
                    );

                    $insert = $this->filmler_model->insert($data);

                    if ($insert) {
                        $alert = array(
                            "title" => "İşlem Başarılıdır",
                            "text" => "Ekleme işlemi başarılıdır...",
                            "type" => "success"
                        );
                        $last_id = $this->db->insert_id();
                        $this->etiketler_model->film_etiket_ekle($last_id);
                    } else {
                        $alert = array(
                            "title" => "İşlem Başarısızdır!!",
                            "text" => "Ekleme işlemi başarısızdır...",
                            "type" => "error"
                        );
                    }



            } else {

                $alert = array(
                    "title" => "İşlem Başarısızdır!!",
                    "text" => "Lütfen boş alan bırakmayınız...",
                    "type" => "error"
                );
            }
        }


        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("admin/filmler"));


    }


}