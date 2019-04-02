<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filmler extends CI_Controller {

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
    'title' => "Filmler | Admin Paneli",
    );
    $this->load->view("admin/filmler", $data);
}

public function update_form($id){
    $etikets = "";
    $count = 0;
    $etikets_array = $this->etiketler_model->film_etiketleri($id);
//        if (is_array($etikets_array) || is_object($etikets_array)){
    foreach ($etikets_array as $item) {
        if ($count > 0) {
            $etikets .= ",";
        }
        $etikets .= $item->etiket;
        $count++;
    }
//        }

    $where = array(
        "id" => $id
    );

    $list = $this->filmler_model->kategoriler_v2();
    $viewData["list"] = $list;
    $filmler = $this->filmler_model->get($where);


    $data = array(
    'filmler' => $filmler,
    'list' => $list,
    'etikets' => $etikets,
    'title' => "Filmi Düzenle | Admin Paneli"
    );
    $data['film_icerik'] = $this->filmler_model->get($where);
    if (is_null($data['film_icerik']->film_durum) || ($id == '')) {
        redirect(base_url("admin/filmler"));
    }

    $this->load->view("admin/film_duzenle", $data);
}

public function update($id){

    $img = $_FILES["film_resim"]["name"];

    if($img){

        $config["upload_path"]   = "uploads/";
        $config["allowed_types"] = "gif|jpg|png";

        $this->load->library("upload", $config);

        $upload = $this->upload->do_upload("film_resim");

        if($upload){

            if($this->input->post("film_url") == '') {
                $film_url2 = str_slug($this->input->post("film_baslik"));
            } else {
                $film_url2 = $this->input->post("film_url");
            }

            //Resim varsa
            $data = array(
                "film_baslik" => $this->input->post("film_baslik"),
                "kategori_id" => $this->input->post("film_kategori"),
                "yazar_id" => $this->input->post("yazar_id"),
                "film_resim" => $this->upload->data("file_name"),
                "film_icerik" => $this->input->post("film_icerik"),
                "film_yil" => $this->input->post("film_yil"),
                "film_dk" => $this->input->post("film_dk"),
                "film_tmdb" => $this->input->post("film_tmdb"),
                "film_url" => $film_url2,
                "film_durum" => $this->input->post("film_durum"),
                "updatedAt" => date("Y-m-d H:i:s")
            );
        } else {

            $alert = array(
                "title" => "İşlem Başarısızdır!!",
                "text" => "Resim Upload işlemi sırasında bir hata oluştu...",
                "type" => "error"
            );
        }



    } else {
        if($this->input->post("film_url") == '') {
            $film_url2 = str_slug($this->input->post("film_baslik"));
        } else {
            $film_url2 = $this->input->post("film_url");
        }
        //Resim yoksa
        $data = array(
            "film_baslik" => $this->input->post("film_baslik"),
            "kategori_id" => $this->input->post("film_kategori"),
            "yazar_id" => $this->input->post("yazar_id"),
            "film_icerik" => $this->input->post("film_icerik"),
            "film_yil" => $this->input->post("film_yil"),
            "film_dk" => $this->input->post("film_dk"),
            "film_tmdb" => $this->input->post("film_tmdb"),
            "film_url" => $film_url2,
            "film_durum" => $this->input->post("film_durum"),
            "updatedAt" => date("Y-m-d H:i:s")
        );

    }
    $where = array(
        "id" => $id,
    );

    $this->etiketler_model->film_etiket_guncelle($id);
    $update = $this->filmler_model->update($where, $data);

    if($update){

        $alert = array(
            "title" => "İşlem Başarılıdır",
            "text" => "Güncelleme işlemi başarılıdır...",
            "type" => "success"
        );
    }
    else{
        $alert = array(
            "title" => "İşlem Başarısızdır!!",
            "text" => "Güncelleme işlemi başarısızdır...",
            "type" => "error"
        );
    }

    $this->session->set_flashdata("alert", $alert);
    redirect(base_url("admin/filmler"));
}

public function insert_form(){

    $list = $this->filmler_model->kategoriler_v2();
    $viewData["list"] = $list;
    $data = array(
        'list' => $list,
        'title' => "Film Ekle | Admin Paneli"
    );

    $this->load->view("admin/film_ekle", $data);
}

public function insert(){

    if(isset($_POST["film_ekle"])) {

        $film_baslik = $this->input->post("film_baslik");
        $kategori_id = $this->input->post("film_kategori");
        $yazar_id = $this->input->post("yazar_id");
        $film_icerik = $this->input->post("film_icerik");
        $film_yil = $this->input->post("film_yil");
        $film_dk = $this->input->post("film_dk");
        $film_tmdb = $this->input->post("film_tmdb");
        if ($this->input->post("film_url") == '') {
            $film_url = str_slug($this->input->post("film_baslik"));
        } else {
            $film_url = $this->input->post("film_url");
        }
        $film_durum = $this->input->post("film_durum");
        $createdAt = date("Y-m-d H:i:s");
        $img = $_FILES["film_resim"]["name"];

        if ($film_baslik && $kategori_id && $yazar_id && $film_icerik) {

            if ($img) {

                $config["upload_path"] = "uploads/";
                $config["allowed_types"] = "gif|jpg|png";

                $this->load->library("upload", $config);

                if ($this->upload->do_upload("film_resim")) {

                    $film_resim = $this->upload->data("file_name");

                    $data = array(
                        "film_baslik" => $film_baslik,
                        "kategori_id" => $kategori_id,
                        "yazar_id" => $yazar_id,
                        "film_resim" => $film_resim,
                        "film_icerik" => $film_icerik,
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
                        "text" => "Resim yükleme işlemi başarısızdır...",
                        "type" => "error"
                    );
                }
            } else {

                $data = array(
                    "film_baslik" => $film_baslik,
                    "kategori_id" => $kategori_id,
                    "yazar_id" => $yazar_id,
                    "film_icerik" => $film_icerik,
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

public function delete($id){

    $where = array(
        "id" => $id
    );

    $delete = $this->filmler_model->delete($where);

    if($delete){

        $alert = array(
            "title" => "İşlem Başarılıdır!!",
            "text" => "Silme işlemi başarılıdır...",
            "type" => "success"
        );
    }else {

        $alert = array(
            "title" => "İşlem Başarısızdır!!",
            "text" => "Silme işlemi başarısızdır...",
            "type" => "error"
        );
    }

    $this->session->set_flashdata("alert", $alert);
    redirect(base_url("admin/filmler"));
}

}