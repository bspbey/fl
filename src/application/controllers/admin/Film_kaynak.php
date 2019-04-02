<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Film_kaynak extends CI_Controller {

public function __construct(){
     parent::__construct();

    $user = $this->session->userdata("user");

    if(!$user){
        redirect(base_url("admin"));
    }
}

public function index(){

    $list = $this->film_kaynak_model->get_all();
    $viewData["list"] = $list;

    //2 Adet data gönderme
    $data = array(
    'list' => $list,
    'title' => "Film Kaynakları | Admin Paneli"
    );
    $this->load->view("admin/film_kaynak", $data);
}

public function update_form($kaynak_id){
    $where = array(
        "kaynak_id" => $kaynak_id
    );


    $film_kaynaklar = $this->film_kaynak_model->get($where);
    $filmler = $this->film_kaynak_model->filmler();

    $data = array(
    'film_kaynaklar' => $film_kaynaklar,
    'filmler' => $filmler,
    'title' => "Film Kaynağı Düzenle | Admin Paneli"
    );
    $data['film_kaynak'] = $this->film_kaynak_model->get($where);
    if (is_null($data['film_kaynak']->kaynak_durum) || ($kaynak_id == '')) {
        redirect(base_url("admin/filmler"));
    }

    $this->load->view("admin/film_kaynak_duzenle", $data);
}

public function update($kaynak_id){

        $data = array(
            "film_id" => $this->input->post("film_id"),
            "kaynak_adi" => $this->input->post("kaynak_adi"),
            "kaynak_icerik" => $this->input->post("kaynak_icerik"),
            "kaynak_durum" => $this->input->post("kaynak_durum"),
            "updatedAt" => date("Y-m-d H:i:s")
        );

    $where = array(
        "kaynak_id" => $kaynak_id,
    );

    $update = $this->film_kaynak_model->update($where, $data);

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
    redirect(base_url("admin/film_kaynak"));
}

public function insert_form(){

    $filmler = $this->film_kaynak_model->filmler();
    $viewData["list"] = $filmler;
    $data = array(
        'filmler' => $filmler,
        'title' => "Film Kaynağı Ekle | Admin Paneli"
    );

    $this->load->view("admin/film_kaynak_ekle", $data);
}

public function insert(){

        $kaynak_adi = $this->input->post("kaynak_adi");
        $film_id = $this->input->post("film_id");
        $kaynak_icerik = $this->input->post("kaynak_icerik");
        $kaynak_durum  = $this->input->post("kaynak_durum");
        $createdAt   = date("Y-m-d H:i:s");

        if($kaynak_adi && $film_id && $kaynak_icerik){

            $data = array(
                    "kaynak_adi"   => $kaynak_adi,
                    "film_id"   => $film_id,
                    "kaynak_icerik"      => $kaynak_icerik,
                    "kaynak_durum"   => $kaynak_durum,
                    "createdAt"     => $createdAt
                );

                $insert = $this->film_kaynak_model->insert($data);

                if($insert){
                    $alert = array(
                        "title" => "İşlem Başarılıdır",
                        "text" => "Ekleme işlemi başarılıdır...",
                        "type" => "success"
                    );
                }
                else{
                    $alert = array(
                        "title" => "İşlem Başarısızdır!!",
                        "text" => "Ekleme işlemi başarısızdır...",
                        "type" => "error"
                    );
                }



        }else{

            $alert = array(
                "title" => "İşlem Başarısızdır!!",
                "text" => "Lütfen boş alan bırakmayınız...",
                "type" => "error"
            );
        }


        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("admin/film_kaynak"));


    }

public function delete($kaynak_id){

    $where = array(
        "kaynak_id" => $kaynak_id
    );

    $delete = $this->film_kaynak_model->delete($where);

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
    redirect(base_url("admin/film_kaynak"));
}


}