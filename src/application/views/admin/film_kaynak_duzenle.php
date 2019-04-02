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
<li class="breadcrumb-item active">Film Kaynağı Düzenle</li>
</ol>
<div class="card mb-3">
<div class="card-header">
<i class="fa fa-sticky-note"></i> Film Kaynağı Düzenle</div>
<div class="card-body">
<form action="<?php echo base_url("admin/film_kaynak/duzenle/update/$film_kaynaklar->kaynak_id"); ?>" method="post">
<div class="form-group">
<label for="kaynak_adi">Kaynak Adı</label>
<input type="text" class="form-control" id="kaynak_adi" name="kaynak_adi" value="<?php echo $film_kaynaklar->kaynak_adi; ?>">
</div>
<div class="form-group">
<label for="film_id">Film Seçiniz</label>
<select class="form-control" id="film_id" name="film_id">
<?php foreach ($filmler as $row) {
($row->id == $film_kaynaklar->film_id) ? $selected = "selected":$selected = "";
?>
<option value="<?php echo $row->id; ?>" <?php echo $selected; ?>><?php echo $row->film_baslik; ?></option>
<?php } ?>
</select>
</div>
<div class="form-group">
<label for="kaynak_icerik">Kaynak Kodu (Embed Linki örn: https://www.youtube.com/embed/v0671zC2a3A)</label>
<textarea rows="5" class="form-control" id="kaynak_icerik" name="kaynak_icerik"><?php echo html_escape($film_kaynaklar->kaynak_icerik); ?></textarea>
</div>
<div class="form-group">
<label for="kaynak_durum">Onaylı mı?</label>
<select class="form-control" id="film_durum" name="kaynak_durum">
<option value="1" <?php if($film_kaynaklar->kaynak_durum=="1"){echo "selected";}; ?>>Onaylı</option>
<option value="0" <?php if($film_kaynaklar->kaynak_durum=="0"){echo "selected";}; ?>>Onaysız</option>
</select>
</div>
<input type="hidden" name="id" value="<?php echo $film_kaynaklar->kaynak_id; ?>">
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