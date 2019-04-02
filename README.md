# Açık kaynak Film scripti
Merhaba arkadaşlar, sizlere codeigniter ile yazmış olduğum TMDb botu içeren "BDN Film" scriptini ücretsiz olarak veriyorum :)

# Yönetim paneli özellikleri
-Filmler Sayfası (Ekle - Düzenle - Sil)<br>
-Film Kaynakları Sayfası (Ekle - Düzenle - Sil)<br>
-TMDb Film Botu Sayfası (ID ile veri çekme - Ekle)<br>
-Kategoriler Sayfası (Ekle - Düzenle - Sil)<br>
-Yöneticiler Sayfası (Ekle - Düzenle - Sil)<br>
-Sayfalar Sayfası :) (Ekle - Düzenle - Sil)<br>
-Yorumlar Sayfası (Düzenle - Sil)<br>
-İletişim Mesajları Sayfası (Görüntüle - Sil)<br>
-Reklamlar Sayfası (Düzenle - Aktif/Pasif)<br>
-Genel Ayarlar (Düzenle)

# Açıklama
Film sitesi açmak isteyenlere tamamen açık kaynak kodlu uygun bir scripttir. Anasayfa kısmında StartBootstrap tarafından ücretsiz yayınlanan "Blog Home" ve "Blog Post" kullanılmıştır. Admin paneli kısmında StartBootstrap tarafından ücretsiz yayınlanan "SB Admin" kullanılmıştır. Kullanımı son derece basit ve kolaydır. Anasayfada gösterilecek olan filmlerin sayısını "Genel Ayarlar" kısmından "Anasayfada görünecek olan film sayısı" bölümünü doldurmaları yeterlidir.

# TMDb Bot Kullanımı
Script kurulumundan sonra menüden "Ayarlar" kısmına gidip burada "Film botu için TMDB API Anahtarı" yazan değeri bırakmış olduğum linkten aldığınız api anahtarı ile doldurunuz ve kaydediniz.
Daha sonra TMDb sitesinden istediğiniz bir filmin idsini, menüden "Filmler-Film Botu" kısmına gidip "TMDb Film ID giriniz" yazan yere yazdıktan sonra "Film bilgilerini getir" butonuna basmanız yeterlidir. Bot girmiş olduğunuz idye ait olan filmin bilgilerini ve afişini sizin yerinize otomatik olarak getirecektir. Size kalan tek iş gelen sayfada "Kaydet" butonuna basmanız olacaktır :)


# Yönetim paneli bilgileri (demo panel bilgileri için bu adresten iletişime geçebilirsiniz: http://desponres.ml/iletisim)
website.com/admin
Kullanıcı adı: admin@admin.com
Şifre: 123456789
(Bu bilgileri daha sonra yönetim panelinden değiştirebilirsiniz.)

# Kurulum
->application->config->config.php = bu dizindeki dosyanın içerisinde;

$config['base_url'] = 'dizin buraya';

bu alana scriptin kurulu olduğu dizini yazın.


->application->config->database.php = bu dizindeki dosyanın içerisinde;

  'hostname' => 'buraya veritabanı sunucunuzun adı',
	'username' => 'buraya veritabanı kullanıcı adınız',
	'password' => 'buraya veritabanı şifreniz',
	'database' => 'buraya veritabanı adınız',
  
  bu alanları kendinize göre doldurunuz.
  
# <a href="http://scriptdenemeler.ml" target="_blank">BDN Film Scripti Demo</a>
# <a href="https://www.r10.net/ucretsiz-scriptler/2019076-bdn-film-scripti-tmdb-film-botu-ile-birlikte.html" target="_blank">r10.net forum konusu</a>

# Kurulum Videosu #
(Kurulum adımları itiraf scripti ile aynı olduğu için ekstra olarak kurulum videosu çekmedim)
  <a href="http://www.youtube.com/watch?feature=player_embedded&v=vCHJIBJN6PY
" target="_blank"><img src="http://img.youtube.com/vi/vCHJIBJN6PY/0.jpg" 
alt="BDN Film Scripti Kurulumu" width="240" height="180" border="10" /></a>
<br>
#Notlar<br>
Not 1: Eğer kurulumda bir sorun çıkarsa veya yardımcı olabileceğim bir konu olursa bana sosyal medya adreslerimden ulaşabilirsiniz.(Script üzerinde düzenleme - ekleme vs. yapmamaktayım.)<br>
Not 2: Bu script tamamen açık kaynak ve ücretsizdir. Kendinize göre düzenleyebilirsiniz.<br>
Not 3: Scriptte hazır girilmiş kategoriler ve 24 adet film bulunmaktadır (Filmlerin kaynakları ekli değildir). Eğer hazır girilmiş kategoriler ve filmleri istiyorsanız "sql" klasöründe "bdnfilm_DOLU.sql" verilerini kullanmalısınız.<br>
Not 4: Script kurulumundan sonra admin paneli veya diğer sayfalarda 404 hatası alıyorsanız gizli dosyaları görünür yapıp .htaccess dosyalarını tekrar ftp programı ile sunucuya atmayı unutmayınız.
