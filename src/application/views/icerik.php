<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title><?php echo $film_icerik->film_baslik; ?> | <?php echo strip_tags($ayarlar->site_title); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Burak Dündar" />
<meta name="description" content="<?php echo strip_tags($film_icerik->film_icerik); ?>...">
<meta name="keywords" content="<?php echo strip_tags($ayarlar->site_keywords); ?>">
<meta name="owner" content="Burak Dündar" />
<meta name="copyright" content="Copyright Burak Dündar - Tüm Hakları Saklıdır." />
<meta name="twitter:card" content="summary"/>
<meta name="twitter:site" content="@desponres"/>
<meta name="twitter:url" content="<?php echo base_url(strip_tags("film/".$film_icerik->film_url)); ?>">
<meta name="twitter:title" content="<?php echo $film_icerik->film_baslik; ?>">
<meta name="twitter:description" content="<?php echo strip_tags($film_icerik->film_icerik); ?>...">
<meta name="twitter:image" content="<?php echo base_url("uploads/$film_icerik->film_resim"); ?>">
<meta property="og:locale" content="tr_TR">
<meta property="og:title" content="<?php echo $film_icerik->film_baslik; ?>">
<meta property="og:site_name" content="<?php echo strip_tags($ayarlar->site_title); ?>">
<meta property="og:url" content="<?php echo base_url(strip_tags("film/".$film_icerik->film_url)); ?>">
<meta property="og:image" content="<?php echo base_url("uploads/$film_icerik->film_resim"); ?>">
<meta property="og:image:width" content="150">
<meta property="og:image:height" content="150">
<meta property="og:description" content="<?php echo strip_tags($film_icerik->film_icerik); ?>...">
<link href="<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet">
<link href="<?php echo base_url("assets/css/blg.css"); ?>" rel="stylesheet">
<link href="<?php echo base_url("assets/css/imagehover.min.css"); ?>" rel="stylesheet">
<link href="<?php echo base_url("assets/css/font-awesome.min.css"); ?>" rel="stylesheet">
<link href="<?php echo base_url("assets/css/sweetalert2.min.css"); ?>" rel="stylesheet">
<script>var api_url = '<?php echo base_url('api'); ?>';</script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
<div class="container-fluid">
<a class="navbar-brand" href="<?php echo base_url();?>"><?php echo strip_tags($ayarlar->site_title); ?></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarResponsive">
<ul class="navbar-nav ml-auto">
<?php $this->load->view("menu"); ?>
</ul>
</div>
</div>
</nav>
<div class="container-fluid">
<div class="row">
<div class="col-lg-8">
<br>
<div id="like-msg" style="display: none"></div>
<div class="card">
<div class="card-header">
<form onsubmit="return false;" id="like-form" data-id="<?php echo $film_icerik->id; ?>"></form>
<strong><?php echo $film_icerik->film_baslik; ?> <a onclick="like('#like-form')"><i style="color:black;" class="float-right fa fa-heart"> <?php print_r($begeni_sayisi); ?></i></a></strong>
</div>
<div class="card-body">
<div class="film-ack row">
<div class="film-ack-sol col-md-3">
<img class="img-responsive" width="100%" src="<?php echo base_url("uploads/$film_icerik->film_resim"); ?>" alt="<?php echo $film_icerik->film_baslik; ?>">
</div>
<div class="film-ack-sag col-md-9">
<strong class="card-text" style="font-weight:normal;"><?php echo $film_icerik->film_icerik; ?></strong>
</div>
</div>
<hr>
<!-- film devamı partlar vs -->
<?php foreach($film_kaynak as $film_kynk){ ?>
<a target="film_vd" id="kynk_<?php echo $film_kynk->kaynak_id; ?>" href="<?php echo $film_kynk->kaynak_icerik; ?>" class="btn btn-outline-success"><?php echo $film_kynk->kaynak_adi; ?></a>
<?php } ?>
<hr>
<div class="alert alert-primary"><?php if(!empty($film_kaynak)){ ?> Şuan <strong id="film_alert"><?php echo $film_kaynak[0]->kaynak_adi; ?></strong> kaynağından izlemektesiniz.<?php } else { echo "Henüz hiç bir kaynak eklenmemiş veya kaynaklar uçup gitmiş. En kısa zamanda güncellenecektir."; }?></div>
<?php if($video_onu_reklam->reklam_durum == '1'){?>
<div id="film-tab">
<div id="video" class="tab-icerik">
<div class="tab-reklam">
<div class="tab-reklam-yoksa">
<div class="reklam-logo" <?php if($video_onu_reklam->reklam_durum == '0'){?>style="background:url(<?php echo base_url("assets/images/rek.png"); ?>) no-repeat center transparent;"<?php } ?>><p align="center"><?php if($video_onu_reklam->reklam_durum == '1'){echo $video_onu_reklam->reklam_kodu;}; ?></p></div>
<div class="yoksa">
<div class="loading">
<span class="sure" id="kalansure"></span>
<span class="rkapat"> Reklamı Geç </span>
</div>
</div>
</div>
</div>
<div class="tab-embed">
<?php if(!empty($film_kaynak)){ ?>
<iframe
id="film_vd"
name="film_vd"
width="100%"
height="400"
src="<?php echo $film_kaynak[0]->kaynak_icerik; ?>"
frameborder="0" allowfullscreen
></iframe>
<?php } ?>
</div>
</div>
<!-- Videolar Bitti -->
<div class="temiz"></div>
</div>
<?php } else { ?>
<?php if(!empty($film_kaynak)){ ?>
<iframe
id="film_vd"
name="film_vd"
width="100%"
height="400"
src="<?php echo $film_kaynak[0]->kaynak_icerik; ?>"
frameborder="0" allowfullscreen
></iframe>
<?php } } ?>

<hr>
<p align="center"><?php if($video_alt_reklam->reklam_durum == '1'){echo $video_alt_reklam->reklam_kodu;}; ?></p>
<hr>
<?php
if(!empty($yorumlar)){ ?>
<h4><strong>"<?php echo $film_icerik->film_baslik; ?>" için yapılan yorumlar</strong></h4>
<hr>
<?php } else { ?>
<h4><strong>Bu film için henüz yorum yazılmamış, ilk yorumu sen yaz :)<br>Unutma! Yorumun film ile ilgili önemli bir detay içeriyorsa spoiler butonunu kullanmayı unutma :)</strong></h4>
<hr>
<?php }
foreach ($yorumlar as $yorum) : ?>
<div class="yorum media mb-4">
<img class="d-flex mr-3 rounded-circle" src="<?php echo base_url("assets/images/user.png"); ?>" width="50" height="50">
<div class="media-body">
<h5 class="mt-0"><?php echo strip_tags($yorum->yorum_ad_soyad); ?></h5>
<?php if($yorum->yorum_spoiler == '1'){ ?>
<a href="#yrm_gizle" class="yrm_gizle btn btn-primary" id="yrm_gizle">Spoiler içeren yorumu görüntüle</a>
<a href="#yrm_goster" class="yrm_goster btn btn-primary" id="yrm_goster">Spoiler içeren yorumu gizle</a>
<div class="spoiler">
<p class="spoiler_yorum"><?php echo $yorum->yorum_icerik; ?></p>
</div>

<?php } else { echo $yorum->yorum_icerik; } ?>
</div>
</div>
<hr>
<?php endforeach; ?>
<div class="card my-4">
<h5 class="card-header">Yorum yaz:</h5>
<div class="card-body">
<form method="post" action="<?php echo base_url("yorum-ekle"); ?>">
<input type="hidden" name="film_id" value="<?php echo $film_icerik->id; ?>">
<input type="hidden" name="film_url" value="<?php echo $film_icerik->film_url; ?>">
<div class="form-group">
<input name="yorum_ad_soyad" type="text" class="form-control" placeholder="Ad & Soyad">
</div>
<div class="form-group">
<input name="yorum_email" type="text" class="form-control" placeholder="E-Mail Adresiniz">
<small class="form-text text-muted">E-Mail adresiniz yorumda gözükmeyecektir.</small>
</div>
<div class="form-group">
<input type="checkbox" class="form-control-input" id="yorum_spoiler" name="yorum_spoiler" value="1">
<label class="form-control-label" for="yorum_spoiler">Yorumunuz spoiler içeriyorsa buraya tıklatın :)</label>
</div>
<div class="form-group">
<textarea name="yorum_icerik" class="form-control" rows="4" placeholder="Yorumunuz"></textarea>
</div>
<button type="submit" class="btn btn-primary">Gönder</button>
</form>
</div>
</div>
</div><!-- card-body -->
</div>
</div><!-- col-lg-8 -->
<!-- Sidebar Widgets Column -->
<div class="col-md-4">
<!-- film bilgileri -->
<div class="card my-4">
<h5 class="card-header">Film Bilgileri</h5>
<div class="card-body">
<div class="alert alert-primary" role="alert">
<strong>Film Yılı:</strong> <?php echo $film_icerik->film_yil; ?>
</div>
<div class="alert alert-primary" role="alert">
<strong>Kategori:</strong> <a style="text-decoration: none;" href="<?php echo base_url("kategori/".strip_tags($film_icerik->kategori_url)); ?>"><?php echo strip_tags($film_icerik->kategori_adi); ?></a>
</div>
<?php if(empty(!$film_etiketler)) { ?>
<div class="alert alert-primary" role="alert">
<strong>Etiketler:</strong>
<?php foreach ($film_etiketler as $etiket) : ?>
<a href="<?php echo base_url() . 'etiket/' . strip_tags($etiket->etiket_url); ?>">
<?php echo strip_tags($etiket->etiket); ?>
</a>
<?php endforeach; ?>
<div class="temizle"></div>
</div>
<?php } ?>
<div class="alert alert-primary" role="alert">
<strong>Filmin Süresi:</strong> <?php echo $film_icerik->film_dk; ?> Dk.
</div>
<div class="alert alert-primary" role="alert">
<strong>TMDb Puanı:</strong> <?php echo $film_icerik->film_tmdb; ?>/10
</div>
<div class="alert alert-primary" role="alert">
<strong>İzlenme Sayısı:</strong> <?php echo $film_icerik->film_goruntulenme; ?>
</div>
</div>
</div>
<!-- film bilgileri -->
<?php if($sag_blok_423_250->reklam_durum == '1'){ ?>
<!-- reklam -->
<div class="card my-4">
<?php echo $sag_blok_423_250->reklam_kodu; ?>
</div>
<!-- reklam -->
<?php } ?>
<!-- arama -->
<div class="card my-4">
<h5 class="card-header">Film Ara</h5>
<div class="card-body">
<form action="<?php echo base_url("arama"); ?>">
<div class="input-group">
<input type="text" class="form-control" name="q" placeholder="Film adı veya TMDb id ile ara..." required>
<button class="btnara btn btn-secondary" type="submit">Ara!</button>
</div>
</form>
</div>
</div>
<!-- arama -->
<!-- film türleri -->
<div class="card my-4">
<h5 class="card-header">Film Türleri</h5>
<div class="card-body">
<div class="row">
<div class="ktgrlg col-lg-6">
<ul class="ktgr list-unstyled mb-0">
<?php foreach($kategoriler as $ktg) { ?>
<li><i class="fa fa-angle-double-right"></i> <a href="<?php echo base_url("kategori/$ktg->kategori_url"); ?>"><?php echo $ktg->kategori_adi; ?></a></li>
<?php } ?>
</ul>
</div>
</div>
</div>
</div>
<!-- film türleri -->
<?php $this->load->view("enckizlenenler"); ?>
</div><!-- col-md-4 -->
</div><!-- row -->
</div><!-- container -->
<?php if($alt_sabit_728_90->reklam_durum == '1'){ ?>
<!-- footer reklam -->
<div class="iframekapat" id="footer_728_reklam" style="position:fixed; bottom:0; color=#fff;z-index: 9999;margin-left: 90px;display:none;">
<a href="#" class="reklami_kapat" style="color:#FFFFFF;background: #000;">Reklamı Kapat</a>
<div id="clearfix"></div>
<?php echo $alt_sabit_728_90->reklam_kodu; ?></div>
<!-- footer reklam -->
<?php } ?>
<!-- Footer -->
<footer class="footer bg-dark">
<div class="container">
<p class="m-2 text-center text-white" <?php if(empty($sayfalar)) { ?>style="line-height: 60px;height: 70px;bottom: 0;"><?php } ?>Copyright &copy; 2019 - <u><a target="_blank" class="text-white" href="https://desponres.ml/">Burak Dündar</a></u> tarafından ıssız gecelerde kodlanmıştır :)</p>
<?php if(!empty($sayfalar)) { ?>
<hr>
<div class="m-2 text-center text-white footer-nav">
<?php foreach($sayfalar as $syf) { ?>
| <a href="<?php echo base_url("sayfa/$syf->sayfa_url"); ?>" class="text-white"><?php echo $syf->sayfa_baslik; ?></a> |
<?php } ?>
</div>
<?php } ?>
</div>
</footer>
<script src="<?php echo base_url("assets/vendor/jquery/jquery.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendor/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/app.js"); ?>"></script>
<script type="text/javascript">
$(function(){
var saniye = 10;
$.geriyeSay = function(){
if (saniye > 1){
saniye--;
$("#kalansure").text(saniye);
} else {
$("#film-tab .tab-reklam").hide();
$("#film-tab .tab-embed").show();
}
}
$("#kalansure").text(saniye);
setInterval("$.geriyeSay()", 1000);

$('.rkapat').click(function(){
$("#film-tab .tab-reklam").hide();
$("#film-tab .tab-embed").show();
});
});
</script>
<script type="text/javascript">
$(document).ready(function(){
<?php foreach($film_kaynak as $film_kynk){ ?>
$("#kynk_<?php echo $film_kynk->kaynak_id; ?>").click(function(){
var alert=$("#kynk_<?php echo $film_kynk->kaynak_id; ?>").html();
$("#film_alert").html(alert);
});
<?php } ?>
});
</script>
<script src="<?php echo base_url("assets/js/sweetalert2.all.js"); ?>"></script>
<?php $this->load->view("admin/alert"); ?>
<script>
jQuery(".reklami_kapat").click(function(e){
e.preventDefault();
jQuery("#footer_728_reklam").css("display","none");
});
</script>
<script type="text/javascript">
var iframekapat=false;
if(iframekapat){
jQuery(".iframekapat").remove();
}else{
jQuery(".iframekapat").css('display','');
}
</script>
</body>
</html>
