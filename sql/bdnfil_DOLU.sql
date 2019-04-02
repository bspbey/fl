-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 02 Nis 2019, 17:10:53
-- Sunucu sürümü: 10.1.31-MariaDB
-- PHP Sürümü: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `bdnfilm`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `brkdndr_etiketler`
--

CREATE TABLE `brkdndr_etiketler` (
  `id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `etiket` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `etiket_url` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `brkdndr_filmler`
--

CREATE TABLE `brkdndr_filmler` (
  `id` int(11) NOT NULL,
  `tmdb_id` text COLLATE utf8_turkish_ci NOT NULL,
  `film_baslik` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `film_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `film_icerik` longtext COLLATE utf8_turkish_ci,
  `film_resim` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `film_durum` int(1) DEFAULT NULL,
  `film_goruntulenme` int(11) DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `yazar_id` int(11) DEFAULT NULL,
  `film_yil` int(11) NOT NULL,
  `film_dk` int(11) NOT NULL,
  `film_tmdb` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `brkdndr_filmler`
--

INSERT INTO `brkdndr_filmler` (`id`, `tmdb_id`, `film_baslik`, `film_url`, `film_icerik`, `film_resim`, `film_durum`, `film_goruntulenme`, `kategori_id`, `yazar_id`, `film_yil`, `film_dk`, `film_tmdb`, `createdAt`, `updatedAt`) VALUES
(1, '0', 'The Dawn Wall', 'the-dawn-wall', 'The Dawn Wall filmi Belgesel, Macera türünde Avusturya yapımı 01 Eylül 2018 (ABD)\'de vizyona girmiş ve sitemizde türkçe altyazılı yayınlanmış bir filmdir. Tommy Caldwell halat ya da emniyet tertibatı hiç kullanmadan kaya tırmanışları tarihinde tartışmasız herkes tarafından görülmüş en büyük başarıyı yakaladı. 3.000ft yüksekliğindeki El Capitan duvarı olarak bilinen yere ilkkez tırmanan kişi ünvanı alacaktır.', 'fullhd-the-dawn-wall.jpg', 1, 36, 30, 1, 2017, 100, '8.2', '2019-02-27 15:24:04', '2019-03-31 10:30:53'),
(2, '0', 'Bumblebee', 'bumblebee', 'Charlie babasını kaybettikten sonra dünyadaki yerini bulmak ve ailesinden bağımsız para kazanıp kendi arabasını almak için bir hurdalıkta çalışmaktadır. Charlie 18 yaşına girmek üzeredir ve onu mutlu edecek tek şey de kendi arabasına sahip olmaktır. 18 yaşına girdiği gün patronu ona hurdalıkta yıllardır duran ve kimsenin sahiplenmediği sarı bir Volkswagen arabayı doğum günü hediyesi olarak verir. Charlie için bu dünyalar demektir ve çok mutludur. \r\nFakat Charlie bu küçük sarı arabasını evinin garajına getirip onu incelemeye başladığında aslında bu küçük sarı hurda yığının hiç de o kadar eski bir teknolojiye ait olmadığını anlar. Fakat Charlie için bu daha bir başlangıçtır çünkü bu sıradışı teknolojinin yeniden uyandığını anlayan düşman uzaylı güçleri yani Decepticonlar direk dünyaya doğru yola çıkmıştır ve tek amaçları bu sarı arabayı yani Bumblebee’yi bulmak ve ne pahasına olursa olsun Optimus Prime’ın yerini öğrenmektir!', 'fullhd-bumblebee-2018-izle-hd-full.jpg', 1, 12, 25, 1, 2018, 114, '7.0', '2019-02-27 15:24:16', '2019-03-31 10:23:22'),
(3, '0', 'Yenilmezler 4 Son Oyun - Avengers 4 End Game', 'yenilmezler-4-son-oyun-avengers-4-end-game', 'Yenilmezler 4 Yıkım - Avengers 4 Annihilation filmi Yönetmen koltuğunda Anthony Russo, Joe Russo yer almaktadır. Oldukça iyi işler çıkartan Jack Kirby, Christopher Markus, Stephen McFeely isimler senaryo ekibindedirler. Yenilmezler 4 filmi Aksiyon, Macera, Fantastik türünde ABD yapımı 01 Mayıs 2019 vizyona girecektir. Serinin devamı filmi Avengers 4 Annihilation thanos parnağını şıklatır ve dünya nüfusu yarıya düşecek insanların çoğu ölecektir. Merakla beklenen yenilmezler yıkım filminde tony stark için zaman taşını veren doktor strange\'nin gördüğü milyonlarca ihtimallerden bir tanesi gerçekleşip thanosu yenebileceklermidir. Yenilmezler 4 yıkım filmi ile marvel evreninde bulunan 22 filmi bir araya getiren son film olarak karşımıza çıkıyor bundan sonra yeni kahramanlar ve yeni evrende yolculuk edeceğiz. Film ilk çıktığında sitemizde türkçe dublaj ve türkçe altyazılı olarak yayınlanacak ve Full hd kalitesinde siz değerli izleyicilerle buluşacaktır. Donmadan tek parça ve hd kalitesinde yenilmez 4 filmi izleyebileceksiniz.Film ismi Yenilmezler 4 Oyun Bitti hatta türkçe ye yenilmezler 4 oyunun sonu şeklinde aktarılabilecekken yenilmezler 4 son oyun şeklinde aktarılmış görünüyor.', 'fullhd-yenilmezler-4-son-oyun-avengers-4-end-game.jpg', 1, 11, 25, 1, 2019, 0, '-', '2019-02-27 15:24:24', '2019-03-31 10:32:39'),
(4, '0', 'Fantastik Canavarlar 2 Grindelwald\'ın Suçları', 'fantastik-canavarlar-2-grindelwaldin-suclari', 'Fantastik Canavarlar 2 Grindelwald\'ın Suçları filminin Yönetmenlğini üstlenen isim David Yates\'olmuştur. Tüm senaryoyı yazan kişi ise J.K. Rowling olacaktır. İngiltere , Abd yapımı olan fantastik canavarlar 2 filmi serinin devamı filmidir ve Macera, Aile, Fantastik türündedir. 2018 kasım ayında yayınlanan filmin hikayesi 1927 senesinde geçmektedir. İnsanları sınıflandırmak isteyen Gellert Grindelwald yattığı hapisden kaçacak ve büyü yapabilen insanları toplayarak yapamayanlara karşı bir savaş başlatacaktır. Onu durdurabilecek tek kişi vardır oda çok önceleri arkadaşı şimdi ise düşmanı olan büyücü Albus Dumbledor olacaktır.', 'fullhd-fantastik-canavarlar-2-grindelwald-in-suclari-full-hd-film-izle1.jpg', 1, 489, 27, 1, 2018, 134, '7.3', '2019-02-27 15:24:50', '2019-03-31 10:21:53'),
(5, '0', 'Captain Marvel - Kaptan Marvel', 'captain-marvel-kaptan-marvel', 'Carol Danvers Amerikan ordusunda savaş pilotudur ve gizli görevler ile zor şartlar için eğitim almaktadır. Carol ve meslektaşı Maria ordudaki tek kadın savaş pilotlarıdır ve kanıtlamaları gereken çok şey vardır. Bu yüzden Carol ordudaki son sınavlarında hile yapar ve keşfedilmemiş bir bölgeden uçmayı tercih eder, ancak Carol’ın uçağı tam da bu bölgede bir uzay aracı tarafından saldırıya uğrar, hasar alır ve Carol’da acil iniş yapmak zorunda kalır. Carol ve kumandanı olan doktor kazadan zar zor kurtulurlar ancak bu sırada onlara saldıran uzay gemisi iner ve Carol’ın hayatı bu noktada tamamen değişir. Çünkü gelen uzaylılar Kree adı verilen ileri düzeyde teknolojiye sahip dünya sınırına yakın olan bir gezegendir ve hiç de dost canlısı değillerdir. Fakat Kree kumandanı Carol’ı öldürmek yerine onu kaçırır ve onu bir Kree’li gibi eğitir. Aradan 6 yıl geçmiştir ve Carol ne insan olduğunu ne de asıl gezegenini hatırlamamaktadır. Ama Kree’ler tarafından eğitim alıp ilk görevine çıktığında Carol bir başka talihsiz olay yaşar ve kendini yeniden dünya gezegeninde bulur ve Carol için korkunç gerçeklerle yüzleşme ve bir seçim yapma zamanı gelir! Yenilmezler son oyun filminin kritik ismi olacaktır.', 'fullhd-kaptan-marvel-captain-marvel-hd-film-izle.jpg', 1, 89, 25, 1, 2019, 123, '7.2', '2019-02-27 15:24:57', '2019-03-31 10:20:36'),
(6, '0', 'X Men Dark Phoenix', 'x-men-dark-phoenix', 'X-Men: Dark Phoenix fimi 2019 yılında vizyona girecektir filmin Yönetmeni Simon Kinberg ve Senaryosunda John Byrne, Chris Claremont, Dave Cockrum bulunmaktadır. Uzaya gidecek ve kurtarma görevine katılacak olan Jean Grey bir güç tarafından sarsılacak ve şoka girecektir. Dünya\'ya döndüğünde bu gizemli gücün ona bişeyler kattığını farkeder eskisinden çok daha güçlüdür. Tüm Mutantların karşısına daha öncesinde hiç böyle güçlü bir düşman çıkmamıştır. Jean Grey bu güç karşısında gittikçe değişmiştir onu farklı biri haline getirecektir. Ekip kısa sürede paramparça olup dağılacaktır düşmanı yenmek için tekrar beraber hareket etmek zorundadırlar . X-Men: Apocalypse filminden yaklaşık olarak 3 sene sonra çıkacak olan X-Men: Dark Phoenix filmi izleyiciler tarafından çok merak edilmektedir.', 'fullhd-x-men-dark-phoenix-2019-film-izle.jpg', 1, 143, 25, 1, 2019, 0, '6.8', '2019-03-01 16:38:53', '2019-03-31 10:14:11'),
(7, '0', 'Takip İstanbul 2', 'takip-istanbul-2', 'Senaristliğini Luc Besson ve Robert Mark Kamen\'in yaptığı aksiyon ve gerilim filmi \'\'Takip: İstanbul\'\'un yönetmenliğini, Olivier Megaton üstlendi. Filmin ilk serisinde Bryan Mills\'in kızını kaçıran ve yine Mills tarafından öldürülen çete elemanlarından birinin babası, bu sefer de intikam almak için Neeson\'ın İstanbul\'da tatil yapan karısını kaçırır. Emekli CIA ajanı Bryan Mills de olayın takipçisi olarak bunu yapanları yakalamaya çalışır. Filmde, Liam Neeson\'ın yanı sıra Maggie Grace, Famke Janssen, Rade Serbedzija, Luke Grimes, John Gries ve Leland Orser rol alıyor.', 'fullhd-takip-istanbul-taken-2-20121.jpg', 1, 1, 24, 1, 2012, 0, '6.7', '2019-03-31 10:40:54', '2019-03-31 10:41:31'),
(8, '0', 'Aquaman', 'aquaman', 'Atlantis kraliçesi olan Atlanna deniz altında verdiği savaşta yara alır ve su yüzeyine baygın olarak sürüklenir. Atlanna\'yı bir fener bekçisi bulur ve iki dünya arasında yaşanmaması gereken yasak bir aşk başlar. Bu aşkın meyvesi ise Arthur adında bir oğlan çocuğudur. Ancak Tom yani fener bekçisi ile Atlanna\'nın mutlulukları uzun sürmez çünkü Atlantis kayıp kraliçesini aramaktadır. Bunun üzerine Atlanna hem oğlunu hem de sevdiği adamı korumak için okyanusa geri döner. Fakat Arthur için hayat daha yeni başlamaktadır çünkü Atlantis ondan gelecekte çok şey isteyecektir! DC evreninde şuana kadar en çok hasılat yapan film olma özelliğini kazanmıştır. Aquaman görünüşe göre diğer dc filmlerinden çok fazla sevilmiştir.', 'fullhd-aquaman-full-hd-filmi-izlesene.jpg', 1, 2, 27, 1, 2018, 143, '7.2', '2019-03-31 10:42:38', NULL),
(9, '0', 'Ölümcül Makineler - Mortal Engines', 'olumcul-makineler-mortal-engines', 'Üç Oscar ödüllü Yönetmen Peter Jackson\'un yine efsane bir filmi Ölümcül Makineler - Mortal Engines karşınızda. Yüzüklerin Efendisi ile Hobbit\'i dünyaya kazandıran isim hem senaryosunu hem yönetmenliğini yapıyor. Aksiyon, Macera, Fantastik türünde olan film 2018 yılında vizyona girmiştir. Dünya üzerinde yaşayan tüm canlılar büyük bir felaket yaşamış sonrasında ise hayatta kalanlar bu yeni dünya\'ya uyum sağlamıştır. Artık eskisi gibi bir dünya olmadığı için insanlarda kendilerine hareket edebilen dünya üzerinde yer değiştirebilen ülkeler inşaa etmişlerdir. ', 'fullhd-olumcul-makineler-mortal-engines-filmi-hd-izle.jpg', 1, 2, 27, 1, 2018, 128, '6.4', '2019-03-31 10:44:09', NULL),
(10, '0', 'Ejderhanı Nasıl Eğitirsin: Gizli Dünya', 'ejderhani-nasil-egitirsin-gizli-dunya', 'Hicks, Vikinglerin ilk ejderha eğitmeni olmuş ve ejderhalar ile insanlar arasındaki barışı sağlama görevini başarıyla yerine getirmiştir. Ejderhası Dişsiz ile kazandıkları bu barış, Dişsiz\'in yeni keşfi ile önemini kaybeder. Dişsiz artık tükendiğini sandığı kendi soyuna mensup bir ejderhayı keşfeder. Bu dişi ejderha vahşi ve zorludur. Tehlike bir kez daha kapıya dayandığında ve Hicks\'in otoritesi sınandığında, ejderha da binici de kendi türünü korumak için önemli kararlar vermek zorunda kalacaktır...', 'ejderhani-nasil-egitirsin-gizli-dunya-831404.jpg', 1, 6, 23, 1, 2019, 104, '7.7', '2019-04-01 17:01:31', NULL),
(11, '0', 'Arabalar', 'arabalar', 'Piston Kupası için The King ve Chick Hicks’e karşı yarışmak üzere Kaliforniya’ya gitmekte olan meşhur yarış arabası Lightning McQueen, kaza ile Radiator Springs adındaki küçük bir kasabanın yollarına zarar verir. Üstelik kendisinin de tamir olması için çok çalışması gerekmektedir. Bu sırada bu olayla beraber o kasabada geçirdiği zamanlarda dostluklar edinir ve gerçek sevgiyi yaşar. Hatta aşkı bile katar yaşamına. Bu küçük kasabada kaldığı sürece değerleri değişmeye başlar. İşte ancak ondan sonra gerçek bir kazanan olmaya hazır hale gelecektir.', 'arabalar-918778.jpg', 1, 3, 23, 1, 2006, 117, '6.7', '2019-04-01 17:03:16', NULL),
(12, '0', 'Kara Şövalye', 'kara-sovalye', '\'Kara Şövalye\' de, Yarasa Adam suça karşı savaşını daha da ileriye götürüyor: Teğmen Jim Gordon ve Bölge Savcısı Harvey Dent’in yardımlarıyla, Yarasa Adam, şehir sokaklarını sarmış olan suç örgütlerinden geriye kalanları temizlemeye girişir. Bu ortaklığın etkili olduğu açıktır, ama ekip kısa süre sonra kendilerini, Joker olarak bilinen ve Gotham şehri sakinlerini daha önce de dehşete boğmuş olan suç dehasının yarattığı karmaşanın ortasında bulurlar.', 'kara-sovalye-500931.jpg', 1, 3, 28, 1, 2008, 152, '8.4', '2019-04-01 17:06:06', NULL),
(13, '0', 'Kamen Rider Sonsuz Nesil', 'kamen-rider-sonsuz-nesil', 'Kamen Rider Build ve Kamen Rider Zi-O\'nun yeni bir Kamen Rider Film Savaşı (genel olarak onuncu) çapraz filmi ve Heisei Generations Series\'in üçüncü bölümü.', 'kamen-rider-sonsuz-nesil-239551.jpg', 1, 12, 25, 1, 2018, 0, '4.8', '2019-04-01 17:09:25', NULL),
(14, '0', 'Thor', 'thor', '“Thor” yalnız bir adamın destansı yolculuğunun, tahtın veliahtı hırçın bir prensken, tahta geçme hakkını kazanan bir süper kahramanın öyküsünü epik bir kurguyla anlatıyor...Öykünün odak noktasında, düşüncesiz tavırları yüzünden antik bir savaşı tekrar alevlendiren güçlü ve kibirli savaşçı Thor var. Dünya’ya sürgün edilen Thor, dünyada insanlar arasında yaşamaya mecbur bırakılmıştır. Ait olduğu dünyanın en tehlikeli kötü adamı, karanlık istila güçlerini Dünya’yı ele geçirmek için yollayınca kahramanımız Thor, gerçek kimliğini ortaya koymak için ne yapması gerektiğini öğrenecektir...', 'thor-956080.jpg', 1, 3, 23, 1, 2011, 115, '6.7', '2019-04-01 17:24:33', NULL),
(15, '0', 'Biz', 'biz', 'Gabe ve Adelaide Wilson, çocukları Zora ve Jason ile birlikte deniz kenarındaki yazlıklarına tatile giderler. Niyetleri orada arkadaşları ile birlikte keyifli vakit geçirmektir. Ancak beklenmeyen misafirler yazlıklarına konuk olduklarında huzurlu hayatları cehenneme dönecektir.', 'biz-48328.jpg', 1, NULL, 32, 1, 2019, 116, '7.4', '2019-04-01 18:48:46', NULL),
(16, '0', 'Dumbo', 'dumbo', 'Sirkin sahibi Max Medici, eski yıldız Holt Farrier ve çocukları Milly ve Joe\'yu, çok büyük kulakları yüzünden sirkte alay konusu olan yavru bir filin bakımı için işe alır. Ancak, Dumbo\'nun uçabildiğini fark etmeleriyle, yeni ve büyük eğlence merkezi Dreamland için hayvanları toplayan girişimci V.A. Vandevere\'nin ilgisini çeken sirk muhteşem bir dönüşüm yaşar.', 'dumbo-188373.jpg', 1, 2, 27, 1, 2019, 112, '6.9', '2019-04-01 18:49:08', NULL),
(17, '0', 'Üçlü Tehdit', 'uclu-tehdit', 'Xian, Çinli bir milyonerin kızıdır ve tek amacı Maha Jaya denen bölgeyi suçtan arındırıp, buradaki halkın güven içinde yaşaması ve düzgün eğitim alıp topluma yararlı birer insan olabilmelerini sağlamaktır. Ancak bu bölgeyi avucunun içinde tutup, buradaki halkı sömüren kartel Xian\'ın planlarına engel olmaya kararlıdır. Xian\'ın ne olursa olsun geri çekilmeyeceğini anlayan kartel başına ödül koyar ve bu da Xian için neredeyse imkansız bir kovalamacanın başlaması demek olur. Ancak Xian tek başına değildir ve bir zamanlar kartelin kazık attığı bir grup paralı asker de Xian\'ın yanında bu savaşa katılır!', 'uclu-tehdit-556815.jpg', 1, 4, 24, 1, 2019, 96, '5.4', '2019-04-01 18:49:35', NULL),
(18, '0', 'Alita : Savaş Meleği', 'alita-savas-melegi', 'Sayborg olan genç Alita kim olduğunu veya nereden geldiğini bilmediği bir halde, tanımadığı bi gelecekte uyanır. Şefkatli bir doktor olan Ido onu yanına alır ve sayborg görüntüsünün altında olağanüstü bir geçmişe sahip genç bir kadının kalbi ve ruhu olduğunu fark eder. Alita yeni hayatına alışmaya çalışırken, Doktor Ido da onu gizemli geçmişinden korumaya çalışır. Yeni arkadaşı Hugo ise Alita’nın anılarını tetiklemesine yardımcı olmak ister. Bu sırada şehri yöneten tehlikeli ve yozlaşmış güçler Alita’nın peşine düşer. Eşi benzeri görülmemiş dövüş yeteneklerine sahip olduğunu fark eden Alita, geçmişine dair bir ipucu elde eder. Tehlikeli insanlarla karşı karşıya olan Alita, arkadaşlarının, ailesinin ve dünyasının kurtarılmasında kilit rol oynayacaktır.', 'alita-savas-melegi-161989.jpg', 1, NULL, 33, 1, 2019, 122, '6.6', '2019-04-01 18:49:54', NULL),
(19, '0', 'Ölüm Günün Kutlu Olsun 2', 'olum-gunun-kutlu-olsun-2', 'Katili tarafından korkunç bir şekilde öldürülen Tree adındaki genç bir kadının, öldürüldüğü günün sabahına uyanıp, korkunç günü tekrar tekrar yaşamasının konu edildiği filmin kahramanı Tree, devam halkasında tekrar tekrar ölmenin, gelecekteki tehlikelerden daha kolay olduğunu fark eder. Kendisi gibi aynı günü tekrar tekrar yaşamaya mahkum olan Ryan Phan’a yardımcı olmaya çalışan Tree, döngüden nasıl kurtulduğunu anlatarak genç adama çözüm bulmaya çalışır. Genç kadın, 11 kez ölüp dirilmesinin ardından, katilini pencereden dışarı atıp öldürerek döngüyü kırdığına inanmaktadır. Tree, şimdi hayatının daha iyi bir versiyonunu yaşadığını düşünse de, çok geçmeden döngüyü aslında kırmadığını fark eder. Kabusu geri dönmüştür ve Tree yeniden aynı güne uyanmaya başlar. Ancak bu sorun sadece onu etkilememektedir. Maskeli katil bu sefer birçok kişinin peşindedir ve onların hayatının kurtulması için Tree’nin tekrar tekrar ölmesi gerekmektedir.', 'olum-gunun-kutlu-olsun-2-475210.jpg', 1, 6, 29, 1, 2019, 100, '6.1', '2019-04-01 18:50:15', NULL),
(20, '0', 'Mary Poppins: Sihirli Dadı', 'mary-poppins-sihirli-dadi', 'Film, 1930\'larda Londra\'nın Büyük Buhran döneminde (Orijinal romanların yazıldığı dönemde) geçiyor ve PL Travers\'ın diğer yedi kitabındaki mal zenginliğinden çıkıyor. Hikâyede Michael (Whishaw) ve Jane (Mortimer) artık büyümüşlerdir, Michael, üç çocuğu ve kâhyaları Ellen\'la (Walters) birlikte Cherry Tree Lane\'de yaşamaktadırlar. Michael kişisel bir kayıp yaşadıktan sonra esrarengiz dadı Mary Poppins (Blunt) tekrar Banks\'lerin hayatına girer ve iyimser sokak lambası yakıcısı Jack\'le (Miranda) birlikte eşsiz sihir becerilerini kullanarak ailenin hayatlarında eksik olan mutluluk ve merak hissini yeniden keşfetmelerine yardımcı olur. Mary Poppins aynı zamanda çocukları eksantrik kuzeni Topsy (Streep) dahil olmak üzere renkli ve tuhaf karakterlerle tanıştırır.', 'mary-poppins-sihirli-dadi-474307.jpg', 1, 2, 29, 1, 2018, 131, '6.7', '2019-04-01 18:51:33', NULL),
(21, '0', 'Mucizeler Parkı', 'mucizeler-parki', 'İyimser ve hayalperest bir kız olan June, ormanda gezintiye çıkar. Bu gezi ona bilmediği sihirli bir dünyanın kapılarını aratacaktır. Bir kelebeğin peşine takılan küçük kız ormanın içerisinde gizemli bir eğlence parkı keşfeder. June tam anlamıyla büyülenmiştir. Wonderland adındaki inanılmaz büyüklükteki bu eğlence parkı oldukça fantastik bir yerdir. Onlarca oyuncağın yer aldığı parkın içerisinde birbirinden eğlenceli birçok hayvan vardır. Wonderland’in tam da hayallerindeki yer olduğunu düşünen June bir süre sonra buranın kendi hayal gücü sayesinde ortaya çıktığını fark eder. Tehlike altında olan eğlence parkını kurtarabilecek tek kişi olan June, bu büyülü yeri kurtarıp tekrar eski haline getirebilmek için sevimli dostları ile bir araya gelir...', 'mucizeler-parki-194659.jpg', 1, 7, 27, 1, 2019, 86, '5.7', '2019-04-01 18:51:47', NULL),
(55, '0', 'Logan', 'logan', 'Yakın gelecekte yaşlanmış ve yorgun olan Wolverine ve Professor X, Meksika sınırında saklanmaktadır. Fakat Logan\'ın dünyadan gizlenmesi ve mirası, karanlık güçler tarafından takip edilen genç bir mutant geldiğinde sona erer. Şimdi Wolverine\'de genç bir kadın klonunu Nathanial Essex\'in liderliğindeki kötü bir organizasyondan korumalıdır.', 'logan-41404.jpg', 1, 7, 25, 1, 2017, 137, '7.8', '2019-04-02 15:44:12', '2019-04-02 15:44:58'),
(56, '0', 'John Wick', 'john-wick', 'Yönetmenliğini David Leitch ve Chad Stahelski ikilisinin üstlendiği film; kendisini öldürmek için tutulan eski bir dostunun peşine düşen tetikçi John Wick\'in intikam öyküsünü anlatıyor.  Yapılan klasik bir araba hırsızlığı, Rus mafyasının önemli adamlarından birinin oğlunun başını belaya sokacaktır. John Wick, emekliye ayrılmış bir tetikçidir. Emekliliğinin tadını çıkarırken karısının yakalandığı amansız hastalıkla hayatı altüst olur. Karısından kendisine kalan en değerli varlığı ve can yoldaşı köpeğidir. Ancak evine dalan üç gangster onu da öldürür. Gansterlerden biri, mafya babası Viggo Tasarov\'un oğlu Josef Tasarov\'dur ve John\'un daha önce birlikte çalıştığı bir adamdır. Artık kaybedecek hiçbir şeyi de kalmayan John Wick\'in tek istediği intikamdır ve New York sokaklarında düşmanlarıyla nefes kesen bir kovalamacanın içine girer.', 'john-wick-742768.jpg', 1, 22, 28, 1, 2014, 101, '7.1', '2019-04-02 15:58:39', '2019-04-02 16:05:33'),
(58, '209112', 'Batman ve Superman: Adaletin Şafağı', 'batman-ve-superman-adaletin-safagi', 'Beraberinde getirdiği umut ile dünyada tanrılaşan Superman neden olduğu savaş ve yıkım ile birlikte insanlık için tehdit unsuru oluşturmaya başlar. Dünya gerçekte ne tür bir kahramana ihitiyaç duyduğuna karar vermek için çabalarken, kontrolsüz hareketleri süren Süper Kahraman’ın insanlığın yanında mı karşısında mı olacağı merak edilirken Gotham Şehrinin koruyucusu Batman\'e karşı giriştiği mücadele yeni bir savaşa davetiye çıkaracaktır.', 'batman-ve-superman-adaletin-safagi-758783.jpg', 1, 2, 27, 1, 2016, 151, '5.8', '2019-04-02 16:23:42', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `brkdndr_film_begeniler`
--

CREATE TABLE `brkdndr_film_begeniler` (
  `id` int(11) NOT NULL,
  `begeni_film_id` int(11) NOT NULL,
  `ip_adresi` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
--
-- Tablo için tablo yapısı `brkdndr_film_kaynak`
--

CREATE TABLE `brkdndr_film_kaynak` (
  `kaynak_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `kaynak_adi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kaynak_icerik` text COLLATE utf8_turkish_ci NOT NULL,
  `kaynak_durum` int(1) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `brkdndr_film_kaynak`
--

INSERT INTO `brkdndr_film_kaynak` (`kaynak_id`, `film_id`, `kaynak_adi`, `kaynak_icerik`, `kaynak_durum`, `createdAt`, `updatedAt`) VALUES
(1, 1, 'Fragman', 'https://www.youtube.com/embed/v0671zC2a3A', 1, '2019-03-31 10:15:18', '2019-03-31 10:17:29'),
(2, 2, 'Fragman', 'https://www.youtube.com/embed/v0671zC2a3A', 1, '2019-03-31 10:15:18', '2019-03-31 10:17:29'),
(3, 3, 'Fragman', 'https://www.youtube.com/embed/v0671zC2a3A', 1, '2019-03-31 10:15:18', '2019-03-31 10:17:29'),
(4, 4, 'Fragman', 'https://www.youtube.com/embed/v0671zC2a3A', 1, '2019-03-31 10:15:18', '2019-03-31 10:17:29'),
(5, 5, 'Fragman', 'https://www.youtube.com/embed/v0671zC2a3A', 1, '2019-03-31 10:15:18', '2019-03-31 10:17:29'),
(6, 6, 'Fragman', 'https://www.youtube.com/embed/v0671zC2a3A', 1, '2019-03-31 10:15:18', '2019-03-31 10:17:29'),
(7, 7, 'Fragman', 'https://www.youtube.com/embed/v0671zC2a3A', 1, '2019-03-31 10:15:18', '2019-03-31 10:17:29'),
(8, 8, 'Fragman', 'https://www.youtube.com/embed/v0671zC2a3A', 1, '2019-03-31 10:15:18', '2019-03-31 10:17:29'),
(9, 9, 'Fragman', 'https://www.youtube.com/embed/v0671zC2a3A', 1, '2019-03-31 10:15:18', '2019-03-31 10:17:29'),
(10, 10, 'Fragman', 'https://www.youtube.com/embed/v0671zC2a3A', 1, '2019-03-31 10:15:18', '2019-03-31 10:17:29'),
(11, 11, 'Fragman', 'https://www.youtube.com/embed/v0671zC2a3A', 1, '2019-03-31 10:15:18', '2019-03-31 10:17:29'),
(12, 12, 'Fragman', 'https://www.youtube.com/embed/v0671zC2a3A', 1, '2019-03-31 10:15:18', '2019-03-31 10:17:29'),
(13, 13, 'Fragman', 'https://www.youtube.com/embed/v0671zC2a3A', 1, '2019-03-31 10:15:18', '2019-03-31 10:17:29'),
(14, 14, 'Fragman', 'https://www.youtube.com/embed/v0671zC2a3A', 1, '2019-03-31 10:15:18', '2019-03-31 10:17:29'),
(15, 15, 'Fragman', 'https://www.youtube.com/embed/v0671zC2a3A', 1, '2019-03-31 10:15:18', '2019-03-31 10:17:29'),
(16, 16, 'Fragman', 'https://www.youtube.com/embed/v0671zC2a3A', 1, '2019-03-31 10:15:18', '2019-03-31 10:17:29'),
(17, 17, 'Fragman', 'https://www.youtube.com/embed/v0671zC2a3A', 1, '2019-03-31 10:15:18', '2019-03-31 10:17:29'),
(18, 18, 'Fragman', 'https://www.youtube.com/embed/v0671zC2a3A', 1, '2019-03-31 10:15:18', '2019-03-31 10:17:29'),
(19, 19, 'Fragman', 'https://www.youtube.com/embed/v0671zC2a3A', 1, '2019-03-31 10:15:18', '2019-03-31 10:17:29'),
(20, 20, 'Fragman', 'https://www.youtube.com/embed/v0671zC2a3A', 1, '2019-03-31 10:15:18', '2019-03-31 10:17:29'),
(21, 21, 'Fragman', 'https://www.youtube.com/embed/v0671zC2a3A', 1, '2019-03-31 10:15:18', '2019-03-31 10:17:29');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `brkdndr_film_yorumlar`
--

CREATE TABLE `brkdndr_film_yorumlar` (
  `id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `yorum_ad_soyad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `yorum_email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `yorum_icerik` longtext COLLATE utf8_turkish_ci NOT NULL,
  `yorum_durum` int(1) NOT NULL,
  `yorum_spoiler` int(1) NOT NULL DEFAULT '0',
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo için tablo yapısı `brkdndr_genel_ayarlar`
--

CREATE TABLE `brkdndr_genel_ayarlar` (
  `id` int(11) NOT NULL,
  `site_title` text COLLATE utf8_turkish_ci NOT NULL,
  `site_description` text COLLATE utf8_turkish_ci NOT NULL,
  `site_keywords` text COLLATE utf8_turkish_ci NOT NULL,
  `site_logo` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_facebook` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_twitter` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_instagram` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_youtube` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_google_plus` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_tmdb_api` text COLLATE utf8_turkish_ci NOT NULL,
  `anasayfa_film_sayisi` int(11) NOT NULL,
  `anasayfa_etiket_sayisi` int(11) NOT NULL,
  `arama_film_sayisi` int(11) NOT NULL,
  `enckizlenen_film_sayisi` int(11) NOT NULL,
  `anasayfa_kategori_sayisi` int(11) NOT NULL,
  `updatedAt` datetime NOT NULL,
  `guncelleyen_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `brkdndr_genel_ayarlar`
--

INSERT INTO `brkdndr_genel_ayarlar` (`id`, `site_title`, `site_description`, `site_keywords`, `site_logo`, `site_facebook`, `site_twitter`, `site_instagram`, `site_youtube`, `site_google_plus`, `site_tmdb_api`, `anasayfa_film_sayisi`, `anasayfa_etiket_sayisi`, `arama_film_sayisi`, `enckizlenen_film_sayisi`, `anasayfa_kategori_sayisi`, `updatedAt`, `guncelleyen_id`) VALUES
(1, 'BDNFilm', 'Full HD Film İzle', 'film izle, full hd film izle, türkçe dublaj, türkçe altyazı, seyret, sinema izle', '', 'https://www.facebook.com/#', 'https://www.twitter.com/#', 'https://www.instagram.com/#', 'https://www.youtube.com/#', 'https://plus.google.com/#', '', 12, 12, 12, 4, 12, '2019-04-02 16:25:35', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `brkdndr_iletisim`
--

CREATE TABLE `brkdndr_iletisim` (
  `id` int(11) NOT NULL,
  `gonderen_ad_soyad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `gonderen_email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `konu` text COLLATE utf8_turkish_ci NOT NULL,
  `mesaj` text COLLATE utf8_turkish_ci NOT NULL,
  `iletisim_durum` int(1) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo için tablo yapısı `brkdndr_kategoriler`
--

CREATE TABLE `brkdndr_kategoriler` (
  `id` int(11) NOT NULL,
  `kategori_adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `kategori_url` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `kategori_durum` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `yazar_id` int(11) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `brkdndr_kategoriler`
--

INSERT INTO `brkdndr_kategoriler` (`id`, `kategori_adi`, `kategori_url`, `kategori_durum`, `yazar_id`, `createdAt`, `updatedAt`) VALUES
(23, 'Animasyon Filmleri', 'animasyon-filmleri', '1', 1, '2019-02-27 15:27:24', '0000-00-00 00:00:00'),
(24, 'Aksiyon Filmleri', 'aksiyon-filmleri', '1', 1, '2019-02-27 15:27:30', '0000-00-00 00:00:00'),
(25, 'Bilim Kurgu Filmleri', 'bilim-kurgu-filmleri', '1', 1, '2019-02-27 15:27:44', '0000-00-00 00:00:00'),
(26, 'Dram Filmleri', 'dram-filmleri', '1', 1, '2019-02-27 15:27:51', '0000-00-00 00:00:00'),
(27, 'Fantastik Filmler', 'fantastik-filmler', '1', 1, '2019-02-27 15:27:55', '0000-00-00 00:00:00'),
(28, 'Gerilim Filmleri', 'gerilim-filmleri', '1', 1, '2019-02-27 15:28:03', '0000-00-00 00:00:00'),
(29, 'Komedi Filmleri', 'komedi-filmleri', '1', 1, '2019-02-27 15:28:07', '0000-00-00 00:00:00'),
(30, 'Belgesel Filmleri', 'belgesel-filmleri', '1', 1, '2019-03-31 10:27:24', '0000-00-00 00:00:00'),
(31, 'Polisiye Filmleri', 'polisiye-filmleri', '1', 1, '2019-03-31 10:27:57', '0000-00-00 00:00:00'),
(32, 'Korku Filmleri', 'korku-filmleri', '1', 1, '2019-03-31 10:28:05', '0000-00-00 00:00:00'),
(33, 'Macera Filmleri', 'macera-filmleri', '1', 1, '2019-03-31 10:28:14', '0000-00-00 00:00:00'),
(34, 'Psikolojik Filmler', 'psikolojik-filmler', '1', 1, '2019-03-31 10:28:22', '0000-00-00 00:00:00'),
(35, 'Hint Filmleri', 'hint-filmleri', '1', 1, '2019-03-31 10:28:31', '0000-00-00 00:00:00'),
(36, 'Müzikal Filmleri', 'muzikal-filmleri', '1', 1, '2019-03-31 10:28:46', '0000-00-00 00:00:00'),
(37, 'Yerli Filmler', 'yerli-filmler', '1', 1, '2019-03-31 10:28:57', '0000-00-00 00:00:00'),
(38, 'Romantik Filmler', 'romantik-filmler', '1', 1, '2019-03-31 10:29:14', '0000-00-00 00:00:00'),
(39, 'Savaş Filmleri', 'savas-filmleri', '1', 1, '2019-03-31 10:29:21', '0000-00-00 00:00:00'),
(40, '3D Filmler', '3d-filmler', '1', 1, '2019-03-31 10:29:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `brkdndr_reklamlar`
--

CREATE TABLE `brkdndr_reklamlar` (
  `reklam_tipi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `reklam_kodu` longtext COLLATE utf8_turkish_ci NOT NULL,
  `reklam_durum` int(1) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `brkdndr_reklamlar`
--

INSERT INTO `brkdndr_reklamlar` (`reklam_tipi`, `reklam_kodu`, `reklam_durum`, `createdAt`, `updatedAt`) VALUES
('alt_sabit_728_90', '<img src=\"http://localhost/bdnfilm/assets/images/reklam_728x90.png\">', 0, '2019-03-03 18:20:56', '0000-00-00 00:00:00'),
('sag_blok_423_250', '<img src=\"http://localhost/bdnfilm/assets/images/reklam_423x250.png\">', 1, '2019-03-03 16:13:06', '0000-00-00 00:00:00'),
('video_alt', '<img src=\"http://localhost/bdnfilm/assets/images/reklam_728x90.png\">', 0, '2019-03-03 14:22:51', '0000-00-00 00:00:00'),
('video_onu', '<img src=\"http://localhost/bdnfilm/assets/images/reklam_300x250.png\">', 0, '2019-03-03 14:17:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `brkdndr_sayfalar`
--

CREATE TABLE `brkdndr_sayfalar` (
  `id` int(11) NOT NULL,
  `sayfa_baslik` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `sayfa_url` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `sayfa_icerik` longtext COLLATE utf8_turkish_ci NOT NULL,
  `sayfa_durum` int(11) NOT NULL,
  `yazar_id` int(11) NOT NULL,
  `goruntulenme_sayisi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `brkdndr_sayfalar`
--

INSERT INTO `brkdndr_sayfalar` (`id`, `sayfa_baslik`, `sayfa_url`, `sayfa_icerik`, `sayfa_durum`, `yazar_id`, `goruntulenme_sayisi`, `createdAt`, `updatedAt`) VALUES
(4, 'Hakkımızda', 'hakkimizda', '<p>Hakkımızda buraya gelecek :)</p>\r\n', 1, 1, '', '2018-12-31 17:33:35', '0000-00-00 00:00:00'),
(5, 'Gizlilik Politikası', 'gizlilik-politikasi', '<p>Gizlilik :D</p>\r\n', 1, 1, '', '2019-03-30 15:16:15', '0000-00-00 00:00:00'),
(6, 'Hukuksal', 'hukuksal', '<p>Hukuksal :D</p>\r\n', 1, 1, '', '2019-03-30 15:16:52', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `brkdndr_uyeler`
--

CREATE TABLE `brkdndr_uyeler` (
  `id` int(11) NOT NULL,
  `ad_soyad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(15) COLLATE utf8_turkish_ci NOT NULL,
  `cinsiyet` int(1) NOT NULL,
  `sifre` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `isActive` int(1) NOT NULL,
  `user_role` int(1) NOT NULL,
  `ekleyen_id` int(11) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `brkdndr_uyeler`
--

INSERT INTO `brkdndr_uyeler` (`id`, `ad_soyad`, `email`, `telefon`, `cinsiyet`, `sifre`, `isActive`, `user_role`, `ekleyen_id`, `createdAt`, `updatedat`) VALUES
(1, 'Admin', 'admin@admin.com', '05555555555', 1, '25f9e794323b453885f5181f1b624d0b', 1, 4, 1, '2018-07-28 07:50:11', '0000-00-00 00:00:00');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `brkdndr_etiketler`
--
ALTER TABLE `brkdndr_etiketler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `brkdndr_filmler`
--
ALTER TABLE `brkdndr_filmler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `brkdndr_film_begeniler`
--
ALTER TABLE `brkdndr_film_begeniler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `brkdndr_film_kaynak`
--
ALTER TABLE `brkdndr_film_kaynak`
  ADD PRIMARY KEY (`kaynak_id`);

--
-- Tablo için indeksler `brkdndr_film_yorumlar`
--
ALTER TABLE `brkdndr_film_yorumlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `brkdndr_genel_ayarlar`
--
ALTER TABLE `brkdndr_genel_ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `brkdndr_iletisim`
--
ALTER TABLE `brkdndr_iletisim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `brkdndr_kategoriler`
--
ALTER TABLE `brkdndr_kategoriler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `brkdndr_reklamlar`
--
ALTER TABLE `brkdndr_reklamlar`
  ADD PRIMARY KEY (`reklam_tipi`);

--
-- Tablo için indeksler `brkdndr_sayfalar`
--
ALTER TABLE `brkdndr_sayfalar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `brkdndr_uyeler`
--
ALTER TABLE `brkdndr_uyeler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `brkdndr_etiketler`
--
ALTER TABLE `brkdndr_etiketler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=344;

--
-- Tablo için AUTO_INCREMENT değeri `brkdndr_filmler`
--
ALTER TABLE `brkdndr_filmler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Tablo için AUTO_INCREMENT değeri `brkdndr_film_begeniler`
--
ALTER TABLE `brkdndr_film_begeniler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- Tablo için AUTO_INCREMENT değeri `brkdndr_film_kaynak`
--
ALTER TABLE `brkdndr_film_kaynak`
  MODIFY `kaynak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `brkdndr_film_yorumlar`
--
ALTER TABLE `brkdndr_film_yorumlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `brkdndr_genel_ayarlar`
--
ALTER TABLE `brkdndr_genel_ayarlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `brkdndr_iletisim`
--
ALTER TABLE `brkdndr_iletisim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `brkdndr_kategoriler`
--
ALTER TABLE `brkdndr_kategoriler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Tablo için AUTO_INCREMENT değeri `brkdndr_sayfalar`
--
ALTER TABLE `brkdndr_sayfalar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `brkdndr_uyeler`
--
ALTER TABLE `brkdndr_uyeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
