<div class="card my-4">
<h5 class="card-header">En Çok İzlenen Filmler</h5>
<div class="card-body">
<div class="row">
<div class="encklg">
<ul class="enck list-unstyled">
<?php foreach(enckizlenenler() as $enck) { ?>
<?php
$metin = $enck->film_baslik;
$uzunluk = strlen($metin);
$sinir = 11;
if ($uzunluk> $sinir) {
$film_baslik_v2 = substr($metin,0,$sinir);
}
else if($uzunluk<$sinir){
$film_baslik_v2 = $metin;
}
?>
<a href="<?php echo base_url("film/".$enck->film_url); ?>">
<div class="film-listesi col-md-12">
<div class="mb-3" style="background:#343a40;color:#fff;">
<img style="width:50%;" class="card-img-top" src="<?php echo base_url("uploads/$enck->film_resim"); ?>" alt="<?php echo $enck->film_baslik; ?>">
<a href="<?php echo base_url("film/".$enck->film_url); ?>"></a>
<div class="flm-enck-sag" style="padding:5px;width:50%;float:left;">
<strong style="font-size:14px;"> <?php echo $film_baslik_v2; ?>...</strong><hr>
<p style="font-size:14px;"><?php echo strip_tags($enck->kategori_adi); ?></p><hr>
<p style="font-size:14px;">TMDb: <?php echo $enck->film_tmdb; ?>/10</p><hr>
<p style="font-size:14px;"><?php echo $enck->film_goruntulenme; ?> izlenme</p>
</div>
</div>
</div></a>
<?php } ?>
</ul>
</div>
</div>
<a href="<?php echo base_url("en-cok-izlenenler");?>"style="width:100%;" class="btn btn-primary">Daha fazla</a>
</div>
</div>