<?php $admin = $this->session->userdata("admin"); ?>
<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title><?php echo $title; ?></title>
<link href="<?php echo base_url("assets/a/vendor/bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet">
<link href="<?php echo base_url("assets/a/vendor/font-awesome/css/font-awesome.min.css"); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url("assets/a/vendor/datatables/dataTables.bootstrap4.css"); ?>" rel="stylesheet">
<link href="<?php echo base_url("assets/a/css/sb-admin.css"); ?>" rel="stylesheet">
</head>
<body class="fixed-nav sticky-footer bg-dark sidenav-toggled" id="page-top">
<?php $this->load->view("admin/menu");?>
<div class="content-wrapper">
<div class="container-fluid">
<ol class="breadcrumb">
<li class="breadcrumb-item">
<a href="<?php echo base_url("yonetim/anasayfa"); ?>">Panel</a>
</li>
<li class="breadcrumb-item active">Film Düzenle</li>
</ol>
<div class="card mb-3">
<div class="card-header">
<i class="fa fa-sticky-note"></i> Film Düzenle</div>
<div class="card-body">
<form action="<?php echo base_url("admin/filmler/duzenle/update/$filmler->id"); ?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="yazar_id" value="<?php $user = $this->session->userdata("user"); echo $user["id"]; ?>">
<div class="form-group">
<label for="film_baslik">Başlık</label>
<input type="text" class="form-control" id="film_baslik" name="film_baslik" value="<?php echo $filmler->film_baslik; ?>">
</div>
<div class="form-group">
<label for="film_url">Kısa URL (Boş bırakırsanız, otomatik olarak oluşturulur)</label>
<input type="text" class="form-control" id="film_url" name="film_url" value="<?php echo $filmler->film_url; ?>">
</div>
<div class="form-row">
<div class="form-group col-md-4">
<label for="film_yil">Filmin Yılı</label>
<select class="form-control" id="film_yil" name="film_yil">
<?php for($i=date("Y");$i>=1986;$i--) {
($i == $filmler->film_yil) ? $selected = "selected":$selected = "";
?>
<option value="<?php echo $i; ?>" <?php echo $selected; ?>><?php echo $i; ?></option>
<?php } ?>
</select>
</div>
<div class="form-group col-md-4">
<label for="film_dk">Film Kaç Dakika?</label>
<input type="text" class="form-control" id="film_dk" name="film_dk" value="<?php echo $filmler->film_dk; ?>">
</div>
<div class="form-group col-md-4">
<label for="film_tmdb">TMDb Puanı</label>
<input type="text" class="form-control" id="film_tmdb" name="film_tmdb" value="<?php echo $filmler->film_tmdb; ?>">
</div>
</div>
<div class="form-group">
<label for="film_kategori">Kategori Seçiniz</label>
<select class="form-control" id="film_kategori" name="film_kategori">
<?php foreach ($list as $row) {
($row->id == $filmler->kategori_id) ? $selected = "selected":$selected = "";
?>
<option value="<?php echo $row->id; ?>" <?php echo $selected; ?>><?php echo $row->kategori_adi; ?></option>
<?php } ?>
</select>
</div>
<div class="form-group">
<label for="etiket">Etiketler (Etiketi giriniz ve virgüle basınız)</label>
<input type="text" class="form-control" id="etiket" name="etiket" value="<?php echo html_escape($etikets); ?>">
</div>
<div class="form-group">
<label for="film_resim">Öne çıkan görsel</label>
<input type="file" class="form-control-file" id="film_resim" name="film_resim">
<br>
<img width="250" height="300" src="<?php echo base_url("uploads/".$filmler->film_resim); ?>">
</div>
<div class="form-group">
<label for="film_icerik">Yazı İçeriği</label>
<textarea rows="5" class="form-control" id="film_icerik" name="film_icerik"><?php echo html_escape($filmler->film_icerik); ?></textarea>
</div>
<div class="form-group">
<label for="film_durum">Onaylı mı?</label>
<select class="form-control" id="film_durum" name="film_durum">
<option value="1" <?php if($filmler->film_durum=="1"){echo "selected";}; ?>>Onaylı</option>
<option value="0" <?php if($filmler->film_durum=="0"){echo "selected";}; ?>>Onaysız</option>
</select>
</div>
<input type="hidden" name="id" value="<?php echo $filmler->id; ?>">
<div class="form-group">
<button type="submit" class="btn btn-primary">Kaydet</button>
</div>
</form>
</div>
</div>
</div>
<footer class="sticky-footer">
<div class="container">
<div class="text-center">
<small>Copyright © Burak Dündar 2019</small>
</div>
</div>
</footer>
<a class="scroll-to-top rounded" href="#page-top">
<i class="fa fa-angle-up"></i>
</a>
<?php $this->load->view("admin/cikis_yap");?>
<script src="<?php echo base_url("assets/a/vendor/jquery/jquery.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/a/vendor/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/a/vendor/jquery-easing/jquery.easing.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/a/vendor/datatables/jquery.dataTables.js"); ?>"></script>
<script src="<?php echo base_url("assets/a/vendor/datatables/dataTables.bootstrap4.js"); ?>"></script>
<script src="<?php echo base_url("assets/a/js/sb-admin.js"); ?>"></script>
<script src="<?php echo base_url("assets/a/js/sb-admin-datatables.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/sweetalert2.all.js"); ?>"></script>
<?php $this->load->view("admin/alert"); ?>
</div>
</body>
</html>