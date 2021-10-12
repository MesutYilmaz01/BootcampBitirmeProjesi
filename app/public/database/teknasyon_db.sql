-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: mysql
-- Üretim Zamanı: 12 Eki 2021, 12:26:38
-- Sunucu sürümü: 8.0.26
-- PHP Sürümü: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `teknasyon_db`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE DATABASE teknasyon_db;
USE teknasyon_db;

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `category` varchar(500) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(18, 'YEREL', '12-10-2021 11:37', '12-10-2021 11:59'),
(19, 'DÜNYA', '12-10-2021 11:40', '12-10-2021 11:59'),
(20, 'EKONOMİ', '12-10-2021 11:48', '12-10-2021 11:58'),
(21, 'MAGAZİN', '12-10-2021 11:49', '12-10-2021 11:58'),
(22, 'SPOR', '12-10-2021 11:49', '12-10-2021 11:58');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `new_id` int NOT NULL,
  `comment` varchar(500) NOT NULL,
  `approve` int NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `new_id`, `comment`, `approve`, `created_at`, `updated_at`) VALUES
(27, 0, 185, 'İngiltere de Türk Lirası mı kullanılıyor?', 1, '12-10-2021 12:03', '12-10-2021 12:04'),
(28, 0, 185, 'İnsan gıdası üzerinden insanlara zulüm etmenin tabii ki ahir dünyada bir karşılığı olacak, o yüzden gerçek faturayı ancak ahir dünyada kendisi görecek .. Dışarıda yemek zorunda kalırsam mutlaka fiyata ve yediğim yerin temizliğine dikkat ederim eğer beğenmediğim bir konu olursa, kısık sesle kimse duymadan o mekânın yetkilisine size yakışmadı diye söylerim, çoğunlukla teşekkür ederler uyarım için ..', 1, '12-10-2021 12:03', '12-10-2021 12:04'),
(29, 52, 189, 'SİZ KENDİ ÇOCUKLARINIZI TERBİYE ETTİNİZ DE MİLLETİN İNANCI VE TERBİYE ŞEKLİNİ Mİ ELEŞTİRİR OLDUNUZ . HERKEZİ KENDİ KAPISINI TEMİZLEMEYE DAVET EDİYORUM .', 1, '12-10-2021 12:11', '12-10-2021 12:11'),
(30, 52, 182, 'Şaka gibi olay :)', 1, '12-10-2021 12:12', '12-10-2021 12:12'),
(31, 0, 190, 'Aslan parçası maaşallah subhanellah nazar değmesin inşaallah', 0, '12-10-2021 12:18', '12-10-2021 12:18'),
(32, 53, 190, 'TURKİYENİN SUAN En İYİ KALECİSİ ALTAY BAYİNDİRDİR TRABzon SPOR HER MAC Gol YİYOR Fenerbahçe LİGİN En Az GOL YİYEN TAKİMİ DEGİL Mİ BU NE SAÇMA İSTATİSTİK FENER EN Az gölü yedi en az gol yiyen Altay bayındırdir Uğurcan 25 se Altay 100 milyon dolar eder en az 4 gömlek ondan üstündür', 0, '12-10-2021 12:18', '12-10-2021 12:18'),
(33, 0, 190, 'satis rekoru...?...satilmis bi sey varmi ortada...?!?', 0, '12-10-2021 12:19', '12-10-2021 12:19'),
(34, 53, 193, 'Bu işin sonu nereye varacak?', 1, '12-10-2021 12:25', '12-10-2021 12:25');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comment_history`
--

CREATE TABLE `comment_history` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `new_id` int NOT NULL,
  `created_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `editor_categories`
--

CREATE TABLE `editor_categories` (
  `id` int NOT NULL,
  `editor_id` int NOT NULL,
  `category_id` int NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `editor_categories`
--

INSERT INTO `editor_categories` (`id`, `editor_id`, `category_id`, `created_at`, `updated_at`) VALUES
(11, 38, 19, '12-10-2021 12:21', '12-10-2021 12:21');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `editor_update_time`
--

CREATE TABLE `editor_update_time` (
  `id` int NOT NULL,
  `time` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `editor_update_time`
--

INSERT INTO `editor_update_time` (`id`, `time`) VALUES
(1, 7);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `category` int NOT NULL,
  `img` varchar(500) NOT NULL,
  `published` int NOT NULL,
  `created_at` varchar(500) NOT NULL,
  `updated_at` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `news`
--

INSERT INTO `news` (`id`, `user_id`, `title`, `content`, `category`, `img`, `published`, `created_at`, `updated_at`) VALUES
(174, 41, 'Erdoğan\'ın Suriye\'ye operasyon sinyalini güvenlik uzmanı yorumladı: Bu geçmiştekilerden farklı olacak', 'Cumhurbaşkanı Erdoğan\'ın \"Son saldırılar bardağı taşırdı\" diyerek Suriye\'ye operasyon sinyali vermesini Güvenlik Politikaları Uzmanı Mete Yarar değerlendirdi. Operasyonun geçmiş harekatlardan farklı olacağını belirten Yarar, \"Bu sefer bir alanın temizliğinden çok terör örgütünün noktasal ikmal merkezlerine karşı bir saldırı olacağını düşünüyorum. Bu geçmişteki operasyonlardan farklı olacaktır.\" ifadelerini kullandı.\r\nGüvenlik Politikaları Uzmanı Mete Yarar, TVNET\'de Serhat İbrahimoğlu\'nun sunduğu Net Bakış programında Cumhurbaşkanı Erdoğan\'ın Suriye\'ye operasyon sinyali verdiği açıklamalarını değerlendirdi.CUMHURBAŞKANI ERDOĞAN: TERÖR SALDIRILARINA TAHAMMÜLÜMÜZ KALMADIProgramda Cumhurbaşkanı Recep Tayyip Erdoğan\'ın Kabine toplantısı sonrası Suriye konusunda yaptığı \"Suriye\'den ülkemize yönelik terör saldırılarıyla ilgili artık tahammülümüz kalmamıştır. Ya oralarda etkin olan güçlerle ya da kendimiz bertaraf etmekte kararlıyız. Polislerimize yönelik son saldırı ve topraklarımızı hedef alan tacizler artık bardağı taşırmıştır. En kısa sürede bu sorunun çözümü için gereken adımları atacağız.\" şeklindeki açıklaması masaya yatırıldı.\"TERÖR ÖRGÜTÜNÜN NOKTASAL İKMAL MERKEZLERİNE SALDIRI OLACAĞINI DÜŞÜNÜYORUM\"Konuyla ilgili değerlendirmede bulunan Güvenlik Politikaları Uzmanı Mete Yarar, \"İlk başlangıçta Cumhurbaşkanı\'nın dediği gibi \'bölgedeki güçler\' diyor. Kimi kastediyor; bir taraftan Rusya\'yı, bir taraftan ABD\'yi, bir taraftan da İran\'ı kastediyor. Başka bir yabancı bölgede bulunan, aktif olarak sahada bulunan yabancı yapı yok. Peki geçmiş örneklerinde bunları engellemekle ilgili bir niyetleri var mı? O da yok. O zaman sonuçta şöyle olacak; Bir süre biz bu görüşmeleri göreceğiz. Ardından bu süre zarfında bölgede yığınaklanmaları göreceğiz. Ardından hava şartları, konjonktürel şartlar da yapılırsa bir bölgede operasyon icra edilecektir. O bölgenin neresi olduğunu hep beraber göreceğiz. Ben bu sefer bir alanın temizliğinden çok terör örgütünün noktasal ikmal merkezlerine karşı bir saldırı olacağını düşünüyorum. Bu geçmişteki operasyonlardan farklı olacaktır çünkü bugün geldiğimiz noktada hemen yarın sabahleyin bir operasyon başlayacak demek çok da akılcı değil.\"', 18, '/assets/img/4918516755.jpg', 1, '12-10-2021 11:38', '12-10-2021 11:38'),
(175, 41, 'Mehmet Ceyhan\'dan önemli çağrı: Artık devletin ek önlemler alma zamanı geldi', 'Aşı ile korunan kişi sayısının yani toplumsal bağışıklığın artmadığını ifade eden Prof. Dr. Mehmet Ceyhan, \"Aşı kararsızlığı bu kadar fazla, aşı karşıtları da yalanlarıyla toplumu bu denli ve rahat zehirlerken, toplumsal bağışıklık sağlamanın mümkün olmadığını görüp, devletin ek önlemler alma zamanı geldi, umarım geçmez\" sözlerini söyledi.\r\nHacettepe Üniversitesi (HÜ) Tıp Fakültesi Çocuk Enfeksiyon Hastalıkları Bilim Dalı Başkanı Prof. Dr. Mehmet Ceyhan, sosyal medya hesabından aşılama ve toplumsal bağışıklık sağlamayla ilgili açıklamalarda bulundu.\"YÜZDE 80 AŞIYLA KORUNAN HEDEFİNDEN GİDEREK UZAKLAŞIYORUZ\"Aşılama oranıyla ilgili bir grafik paylaşan Prof. Dr. Ceyhan, açıklamasında şu ifadelere yer verdi:\"Aşı ile korunan kişi sayısı yani toplumsal bağışıklık artmıyor. Her gün giderek azalıyor. 1. doz sayısı 100 binin altında. Önce inaktif aşıyla aşılanıp, şimdi bağışıklığını kaybedenlerin günlük sayısı daha fazla. Yüzde 80 aşıyla korunan hedefinden giderek uzaklaşıyoruz.\"TOPLUMSAL BAĞIŞIKLIK SAĞLAMA ARTIK MÜMKÜN DEĞİL\"Aşı kararsızlığı bu kadar fazla, aşı karşıtları da yalanlarıyla toplumu bu denli ve rahat zehirlerken, toplumsal bağışıklık sağlamanın mümkün olmadığını görüp, devletin ek önlemler alma zamanı geldi, umarım geçmez.\"\r\n', 18, '/assets/img/4965740077.jpg', 1, '12-10-2021 11:40', '12-10-2021 11:40'),
(176, 41, ' Uçak yerleşim yerine düştü, savaş alanına dönen bölgede: 2 ölü', 'ABD\'nin California eyaletinin güneybatısındaki San Diego County\'de yerleşim yerine uçak düştü. Kazada en az iki kişi yaşamını yitirdi.\r\nABD\'nin Meksika sınırında yer alan San Diego County\'de bir uçak evlerin bulunduğu bölgeye düştü. San Diego İtfaiyesinin olaya müdahale ettiği belirtilirken, sosyal medyada yer alan görüntülerde uçağın düştüğü bölgedeki evlerde büyük hasar meydana geldiği görüldü.2 KİŞİ ÖLDÜPolis, bölge sakinine olay yerinden uzak durmaları yönünde uyarıda bulundu. Kazada en az iki kişinin hayatını kaybettiği aktarıldı. Uçağın tipi ve içerisinde kaç kişinin bulunduğu ise henüz bilinmiyor.', 19, '/assets/img/4456717260.jpg', 1, '12-10-2021 11:41', '12-10-2021 11:41'),
(177, 41, ' Pilav yapma makinesiyle evlenen adamın mutluluğu 4 gün sürdü', 'Endonezya\'da yaşayan Khoirul Anam isimli adam, hayatını bir pilav makinesiyle birleştirdi. Çocukluğundan beri en sevdiği yemeğin pilav olduğunu belirten Anam, aradığı aşkı bir pilav yapma makinesinde buldu. Ancak Anam\'ın mutluluğu sadece 4 gün sürdü ve sosyal medyanın gündemine oturan düğün boşanma ile sonuçlandı.\r\nKhoirul Anam isimli Endonezyalı adam pilav yapma makinesiyle evlenecek kadar kadar pilavlara karşı özel bir bağ hissediyordu.\r\nUzun bir süre boyunca pilav yapma makineleriyle ilgili güzel şeyler duyduğunu ifade eden Anam, bir makineye aşık oldu ve üzerine duvağa benzeyen bir örtü örterek sonsuz bağlılığını ilan etti.\r\nFacebook\'ta düğün fotoğraflarını paylaşan Anam, gerekli belgeleri imzaladığı ve yeni gelini kapağından öperken çekilen fotoğraflarını yayınladı.\r\nPilav yapma makinesiyle evliliğini sosyal medya hesabından paylaşan Anam\'ın mutluluğu kısa sürdü.\r\nMakinenin düğünden 4 gün sonra bozulması çiftin boşanmasına neden oldu. Anam yeni bir makine arayışı için kolları sıvadığını ifade etti.', 19, '/assets/img/4351226533.jpg', 0, '12-10-2021 11:43', '12-10-2021 11:43'),
(178, 41, 'Son Dakika: 9 lira eşiğini geçen dolar, 9,04 ile rekorunu güncelledi', 'Son dakika: Merkez Bankası\'nın faiz indirimi sonrası hızlı bir yükselişe geçen dolar, rekor üstüne rekor kırıyor. 9 lira eşiğini aşan kur, 9,04 ile tüm zamanların en yüksek seviyesine çıktı.\r\nTürkiye Cumhuriyet Merkez Bankası\'nın (TCMB) geçen ay 100 baz puan faiz indirimine gitmesiyle yükselişe geçen dolar, TCMB Başkanı Şahap Kavcıoğlu\'nun dün TBMM Pilan Bütçe Komisyonu\'ndaki sunumuyla birlikte yükselişini hızlandırdı. Dün piyasaların kapanmasıyla 9 lira sınırını aşan dolar, rekor tazeledi ve 9,0185\'i gördü. Bu sabah ise yeni bir rekor kıran kur, 9,04 ile tüm zamanların en yüksek seviyesini gördü.KURLARDA SON DURUMDolar saat 11.05 itibarıyla 9,02\'den işlem görüyor. Aynı dakikalarda euro 10,44\'ten, sterlin ise 12,27\'den alıcı buluyor. Dolardaki yükselişe paralel olarak hareket eden gram altın ise 510 lira seviyesinden işlem görüyor.KAVCIOĞLU: SÜRPRİZ BİR İNDİRİM YAPMADIKMerkez Bankası Başkanı Kavcıoğlu\'nun TBMM Plan ve Bütçe Komisyonu\'nda sunum yaptı. Sunum sonrası milletvekillerinin sorularını yanıtlayan Merkez Bankası Başkanı Şahap Kavcıoğlu, faiz indirimi sürecinde TL\'nin değer kaybını sadece faiz indirimi ile ilişkilendirmenin doğru olmadığını dile getirerek \"Sürpriz bir indirim yapmadığımızı çok net söyleyebiliriz. Ağustos-eylül gibi faiz indirme yol haritamızı belirtmiştik. Merkez Bankası\'nın görevlerini ihmal etmesi ya da bunun dışında karar alması söz konusu değil\" diye konuştu.', 20, '/assets/img/2318137651.jpg', 1, '12-10-2021 11:46', '12-10-2021 11:48'),
(179, 41, '24 metre yükseklikten halatlı serbest uçuş yapmak isteyen kadın, hayatını kaybetti', 'Kazakistan\'da 33 yaşındaki üç çocuk annesi Yevgenia Leontyeva, 24 metre yükseklikten halatlı serbest uçuş yapmak istedi. Genç kadın atladıktan sonra bağlandığı halat koptu. Korkunç şekilde yaşamını yitiren kadının, görüntüleri kameralara yansıdı.\r\nKazakistan\'da izleyenlerin kanını donduran bir kaza yaşandı. 33 yaşındaki Yevgenia Leontyeva, halatla serbest uçuş yapmak için bir otelin çatısına çıktı.HALAT HAVADAYKEN KOPTU3 çocuk annesi kadın, 24 metre yükseklikten atlamak için hazırlanırken bir yandan o anlar kamera ile kayıt altına alındı. Leontyeva\'nın kendisine bağlanan güvenlik halatı uygun bir şekilde bağlanmadığı için havadayken koptu.YAŞAMINI YİTİRDİYevgenia\'dan sonra atlayacak olan kadın halatın açıldığını görünce \"Halat açıldı\'\' diye çığlık attı. O sırada çarpmanın etkisi ile yere düşen Yevgenia, daha sonra binanın yanında bulunan duvara çarparak durabildi. Yere çakılan Yevgenia, kafasından ağır yaralanırken vücudunda da kırıklar oluştu. Hastaneye kaldırılan talihsiz kadın kurtarılamadı.Trajik olaydan kısa bir süre önce Yevgenia ve arkadaşının sosyal medya hesaplarından \"Uçacağız\" diye paylaşım yaptığı ortaya çıktı.', 19, '/assets/img/1054632346.jpg', 1, '12-10-2021 11:47', '12-10-2021 11:47'),
(180, 41, 'Burak Elmas\'tan \"Fenerbahçe ile dost mu oldunuz?\" sorusuna cevap: Dostluk tarifiniz nedir bilmiyorum ama hiçbirimiz düşman değiliz', 'Galatasara Başkanı Burak Elmas, Fenerbahçe ile son zamanlarda yapılan ortak çalışmalar üzerine \"Dostluk içerisinde misiniz?\" sorusuna çarpıcı cevap verdi. Elmas, \"Dostluk tarifiniz nedir bilmiyorum ama hiçbirimiz düşman değiliz. Saha içinde birbirimizi yenmeye çalışıyoruz ama saha dışında ortak çalışmak istiyoruz. Pandemiden çıktık. Yayın gelirleri, sponsorlar, çöküşte. Anlaşamadığımız noktada konuyu anlaşamadan kapatırız. Ortamı germeye kimsenin katkıda bulunmaması gerekir\" dedi.\r\nGalatasaray ile NEF sponsorluk anlaşması için düzenlenen imza töreninde Galatasaray Başkanı Burak Elmas, birbirinden çarpıcı açıklamalar yaptı. Son zamanlarda \"Galatasaray ile Fenerbahçe dost oldu\" söylentileriyle ilgili yöneltilen soruya Başkan Burak Elmas\'tan dikkat çeken bir cevap geldi. Elmas, \"Dostluk tarifiniz nedir?\" diye soruyu soran muhabire cevabını verdi.\r\n\r\n\"BİRBİRİMİZİ YENMEYE ÇALIŞIYORUZ\"\r\n\r\nBurak Elmas o soruya, \"Birbirimizi yenmeye çalışıyoruz ama naklen yayın gelirleri, sponsorları sektöre nasıl getirebiliriz konusunda ortak çalışmak istiyoruz. Dostluk tarifiniz nedir ama hiçbirimiz düşman değil. Bazı konularda anlaşamayız ama anlaşmadığımız konularda da kavga etmek yerine birlikte çalışma irademiz var\" yanıtını verdi.', 22, '/assets/img/4938221950.jpg', 1, '12-10-2021 11:50', '12-10-2021 11:50'),
(181, 41, 'Klibi için 6 saat suda kalan Ceylan, hastanelik oldu', 'Yaptırdığı estetik operasyonla gündemde yer alan Ceylan, bu seferde , yeni klibi için 6 saat suda kalınca kalınca hastanelik olmasıyla konuşuldu.\r\nSürekli değiştirdiği imajıyla dikkatleri üzerine çeken ünlü sanatçı Ceylan, Müslüm Gürses\'in en sevilen eserlerinden olan \'Senin Kadar Hiç Kimseyi Sevmedim\'i yeniden söyledi.ÇEKİMLERİN SONUNDA HASTANELİK OLDU\r\nCeylan için Maslak\'ta bir stüdyoda kurulan dekor evi su altında bırakıldı. Çekimler 12 saat sürdü. Klipte 1.5 ton su ve 2 ton silis kumu kullanıldı. Ünlü şarkıcı, çekimlerin sonunda hastanelik oldu.', 21, '/assets/img/4531320141.jpg', 1, '12-10-2021 11:51', '12-10-2021 11:51'),
(182, 41, 'Letonya maçı öncesi Yusuf, Rıdvan\'ın boğazına yapıştı! Gerçek saniyeler sonra anlaşıldı', 'Dünya Kupası Elemeleri G Grubu 8. maçında Türkiye, deplasmanda Letonya\'yla karşılaşıyor. Mücadele öncesinde Daugava Stadı\'nda ısınmaya çıkan A Milli Takım\'da Yusuf Yazıcı, Rıdvan Yılmaz\'ın boğazına yapışarak bir şeyler anlattı. TRT\'de ekrana gelen görüntüde Yusuf\'un genç Rıdvan\'ı motive etmek için bu hareketi yaptığı şeklinde yorumlar yapıldı.\r\nNorveç\'le berabere kalarak büyük bir fırsatı tepen A Milli Takım\'ın Letonya deplasmanında galibiyetten başka şansı yok. Grupta son 5 maçta sadece 1 galibiyet alan Ay-Yıldızlılar, Letonya\'yı devirerek hem kötü gidişe son vermek hem de Dünya Kupası\'na katılma umutlarını sürdürmek istiyor. Kritik maç öncesinde ısınmak için sahaya çıkan A Milli Takım\'da Yusuf Yazıcı\'nın Rıdvan Yılmaz\'ı motive etme şekli gündeme oturdu.\r\n\r\n\"20 YAŞ DİŞİNE BAKIYOR\"\r\nYusuf Yazıcı\'nın Beşiktaşlı Rıdvan\'ın boğazını sertçe tutması sosyal medyada büyük yankı uyandırdı. Letonya-Türkiye maçının yayıncısı TRT\'de ekrana gelen görüntü için maçın anlatıcıları \"20 yaş dişine bakıyor işte\" şeklinde yorumlar yaparken Yusuf\'un Rıdvan\'ı motive etmek için böyle bir hareket yaptığı belirtildi.', 22, '/assets/img/4078137663.jpg', 1, '12-10-2021 11:55', '12-10-2021 11:55'),
(183, 41, 'Türkiye\'nin ABD\'den almayı planladığı F-16\'ların maliyetinin yaklaşık 6 milyar dolar olduğu ortaya çıktı', 'Türkiye\'nin ABD\'den talep ettiği 40 adet yeni F-16 Blok 70 alımının ve 80 adet F-16 modernizasyonunun maliyetinin 6 milyar dolara yakın olduğu öğrenildi. Türk diplomatik kaynakları, ABD basınına yaptıkları açıklamada, Başkan Joe Biden\'ın F-16 satışına ve modernizasyonuna sıcak baktığını ancak onay alınması gereken Kongre\'de sıkıntı yaşanabileceğinden endişe duyduklarını ifade etti.\r\nGeçtiğimiz hafta İngiltere merkezli haber ajansı Reuters, kaynaklarına dayandırdığı haberinde; Türkiye\'nin 80 adet F-16 savaş uçağı modernizasyonu ve 40 tane yeni F-16 alımı için Abd\'ye talepte bulunduğunu açıklamıştı.\r\n\r\n\"MALİYETİ YAKLAŞIK 6 MİLYAR DOLAR\"\r\nAmerikan Bloomberg ve İngiliz Middle East Eye\'a (MEE) konuşan Türk yetkililer ise, olası F-16 alımı ve modernizasyonu hakkında yeni açıklamalarda bulundu.\r\n\r\nTürk diplomatik kaynakları, Türkiye\'nin ABD\'den talep ettiği 40 adet F-16 Blok 70 savaş uçağı ve 80 adet F-16 modernizasyon kitinin toplam maliyetinin 6 milyar dolara yakın olduğunu söyledi.\r\n\r\n\"BIDEN YÖNETİMİ SICAK BAKIYOR\"\r\nTürk yetkililere göre Biden yönetimi; F-16 savaş uçaklarının satışını destekliyor. Ancak Kongre\'den onay konusunda sıkıntı yaşanabileceğini belirtiyor.\r\n\r\nKaynaklar; Cumhurbaşkanı Recep Tayyip Erdoğan ile ABD Başkanı Joe Biden\'ın bu konuyu, Roma\'da düzenlenecek olan G20 Zirvesi\'nde tartışacağını aktardı. Olası ters bir kararın hem Türkiye\'yi hem de NATO\'nun güney kanadını riske atacağını söyleyen Türk kaynaklar; \"ABD\'li yetkililer bize F-16\'nın modernizasyonunun ulaşılmaz bir şey olduğunu asla söylemediler. Washington\'ın Türk ve Yunan dengesine de dikkat edeceğine inanıyoruz\" dedi.\r\n\r\nTürk yetkililer, ABD Kongre\'sinin satışı bloke etmesi durumunda; Ankara-Washington arasındaki ilişkilerin daha da istikrarsız hale geleceğini kaydetti.', 20, '/assets/img/4161835193.jpg', 1, '12-10-2021 11:56', '12-10-2021 11:56'),
(184, 41, 'Son Dakika: Yunanistan\'ın Girit Adası\'nda 6.2 büyüklüğünde deprem! Türkiye\'den de hissedildi', 'Son dakika: Yunanistan\'ın en büyük adası olarak bilinen Girit\'te 6.2 büyüklüğünde deprem meydana geldi. Depremle ilgili ölü veya yaralılara ilişkin herhangi bir sayı bildirilmezken, depremi Türkiye\'den hisseden vatandaşlar da kendilerini sokağa attı.\r\nAvrupa- Akdeniz Sismoloji Merkezi, Yunanistan\'ın en büyük adası olarak bilinen Girit\'te deprem meydana geldiğini açıkladı. Merkez tarafından yapılan açıklamada, \"Yunanistan\'ın Girit Adası\'nda 6.2 büyüklüğünde deprem meydana gelmiştir\" ifadeleri kullanıldı.\r\n\r\nÖLÜ VEYA YARALIYA İLİŞKİN BİLGİ YOK\r\nDeprem nedeniyle hayatını kaybeden veya yaralanan kişilere ilişkin bilgi henüz yok. Kurumlardan konuya ilişkin resmi açıklama yapılmadı. Deprem nedeniyle Türkiye tarafında da sallantı yaşandığı kaydedilirken, vatandaşlar tedbir amacıyla kısa süreliğine dışarı çıktı.\r\n\r\nEKİPLER TEYAKKUZDA\r\nYunanistan\'da her ihtimale karşı bölgeye sevk edilen ekipler, depremde hasar alan ve çökme tehlikesi bulunan binaların çevresinde önlem aldı.\r\n\r\nAFAD: DEPREMİN ŞİDDETİ 6.3\r\nYunanistan\'daki depremle ilgili AFAD\'dan da açıklama geldi. AFAD, 6.62 km derinlikteki depremin 6.3 şiddetinde olduğunu ifade etti. Ayrıca depremin Türkiye tarafında İzmir başta olmak üzere Ege kıyı şeridinde hissedildiğini belirtti.\r\n\r\n1 KİŞİ HAYATINI KAYBETMİŞTİ\r\nAda, geçmişte de benzer depremler yaşadı. 27 Eylül\'de meydana gelen 6 büyüklüğündeki depremde 1 kişi hayatını kaybederken, 9 kişi de yaralanmıştı.', 19, '/assets/img/3583622850.jpg', 1, '12-10-2021 11:57', '12-10-2021 11:57'),
(185, 41, 'Ailecek yemek 15 bin TL! Nusret\'in yeni restoranındaki fiyatlar gündemden düşmek bilmiyor', 'Nusret\'in Londra\'da açtığı restoranın pahalı fiyatları gündemden düşmek bilmiyor. Daha önce 3 burgerin 3.600 TL ve bir bifteğin 7.500 TL olmasıyla gündem olan Nusret, bu seferde ailecek yenen yemek için ödenen 15 bin TL\'lik hesapla gündemde.\r\nGeçtiğimiz ay Londra\'nın merkezinde restoran açan dünyaca ünlü işletmeci Nusret Gökçe İngiliz basınının hedefinde. Nusret\'in tuz serpme ve biftek dilimleme hareketleriyle 2017\'de bir internet fenomeni haline geldiğini belirten The Sun gazetesi, Nusret\'in fiyatlarının inanılmaz olduğunu aktardı.\r\n\r\nAİLECEK YEMEK 15 BİN TL\'YE MAL OLDU\r\nDaha önce üç burgerin 3.600 TL ve bir bifteğin 7.500 TL olmasıyla gündeme gelen Nusret\'in Londra\'daki restoranın fiyatları bir müşterinin aktarmasıyla yine gündem oldu. The Sun\'un aktardığına göre Nusret\'in yeni restoranına giden müşterilerden biri, ailecek yedikleri yemeğin onlara 1.182 sterline (Yaklaşık 15 bin TL) mal olduğunu söyledi.', 20, '/assets/img/1866143637.jpg', 1, '12-10-2021 12:03', '12-10-2021 12:03'),
(186, 41, 'Apple, Türkiye\'deki üçüncü mağazasını Bağdat Caddesi\'nde açıyor', 'ABD merkezli teknoloji devi Apple, Türkiye\'deki üçüncü mağazasını Bağdat Caddesi\'nde açacak. Markanın web sitesinde yeni şube haberi, \"Yakında sizlerleyiz\" notuyla yayınlandı.\r\nZorlu Center ve Akasya AVM\'deki şubelerinin ardından Apple Store mağazasının üçüncüsü için kolları sıvayan amrka, hazırlıklara başladı.\r\n\r\nBAĞDAT CADDESİ\'NDE AÇILACAK\r\nApple, internet sitesinden yaptığı açıklamada Bağdat Caddesi\'nde yeni bir mağaza açacağını resmen duyurdu. Açıklamada \"İstanbul\'un kalbi Bağdat Caddesi\'nde çok yakında yeni bir mağaza açıyoruz.\" ifadeleri kullanıldı.\r\n\r\n\"BULUŞMAK İÇİN SABIRSIZLANIYORUZ\"\r\nApple söz konusu açıklamasında \"Her konuda size yardımcı olacak uzmanlarla buluşacağınız, yeni bilgilerle becerilerinizi geliştireceğiniz, bahçesinde vakit geçirirken ilham alacağınız ve yaratıcılığınızı ortaya çıkaracağınız bu üçüncü mağazamızda sizinle ve büyük küçük, uçuk kaçık tüm fikirlerinizle buluşmak için sabırsızlanıyoruz.\" ifadelerini kullandı.', 20, '/assets/img/3245734506.jpg', 1, '12-10-2021 12:06', '12-10-2021 12:06'),
(187, 41, 'Hacı Sabancı ile nikah masasına oturan Nazlı Kayı\'nın gelinliğinin fiyatı belli oldu', '3 yıldır aşk yaşayan Hacı Sabancı ile Nazlı Kayı çifti, önceki akşam nikah masasına oturdu. Önümüzdeki günlerde düğün yapacak olan çiftten Kayı\'nın gelinliği sosyal medyayı ikiye böldü. Kayı\'nın dünyaca ünlü bir markaya ait olan gelinliğinin 107 bin TL olduğu ileri sürüldü.\r\nGeçtiğimiz sene aralık ayında nişanlanan Nazlı Kayı ve Hacı Sabancı çift, önceki akşam İstanbul\'da Arzu ve Ömer Sabancı\'nın yalısında nikah töreni yaptı. Törene yakın çevresini davet eden çiftin, gelinlik ve damatlığı da en çok konuşulan konuların başında geldi.\r\n\r\nGELİNLİĞİN DEĞERİ DUDAK UÇUKLATTI\r\nNazlı Kayı, nikah töreni için straplez tüy detaylı bir gelinlik tercih etti. Nazlı Kayı\'nın nikah töreninde giydiği Oscar de la Renta imzalı gelinliğin yaklaşık fiyatı 12.000 dolar yani 107.720 TL olduğu söyleniyor.\r\n\r\nPEŞ PEŞE PAYLAŞIMLAR YAPTILAR\r\nAşklarını göz önünde yaşayan Nazlı Kayı ve Hacı Sabancı çifti, nikah töreninin ardından sosyal medya hesaplarından paylaşımlar yaptı. Hacı Sabancı, nikah töreninde çekilen fotoğrafa \"Karımla tanışın\" notunu eklerken Kayı da \"Kocamla\" ifadesini kullandı. Aylardır evlilik hazırlığı yapan çift, önümüzdeki günlerde bir düğün de yapacak.', 21, '/assets/img/1647325795.jpg', 1, '12-10-2021 12:08', '12-10-2021 12:08'),
(188, 41, 'Taş düşürdüğü için hastaneye kaldırılan güzel oyuncu Birce Akalay, operasyon geçirdi', 'Şimdilerde Son Yaz dizisinde başrol oynayan Birce Akalay, böbreğinden taş düşürdüğü için hastanelik oldu. Operasyon geçiren oyuncu, iki gün hastanede tedavi gördü.\r\nSon dönemin en çok konuşulan isimlerden Birce Akalay, geçtiğimiz günlerde rahatsızlanarak hastaneye kaldırıldı. Böbreğinden taş düşüren oyuncu, küçük bir operasyon geçirdi.\r\n\r\nPANDEMİDEN DOLAYI ZİYARETÇİ KABUL EDİLMEDİ\r\nHafif ağrıyla atlatan Akalay, iki gün hastanede kaldıktan sonra taburcu oldu. Akalay, daha öncede böbreklerinden dolayı sık sık hastaneye gidiyordu. Koronavirüs nedeniyle ziyaretçi kabul edilmediği için Akalay, tek başına tedavi gördü.\r\n\r\nÖzel hayatıyla da gündemden düşmeyen oyuncu, mimar Erdem Hamza\'yla yaz aylarında yeni bir aşka yelken açmıştı.', 21, '/assets/img/2991542428.jpg', 1, '12-10-2021 12:09', '12-10-2021 12:09'),
(189, 41, 'Alkol içerken yakalanan genç kıza okulda kırbaç cezası! Babası talep etti, görüntüler infial yarattı', 'Nijerya\'da bir okuldaki doğum günü partisinde alkol içerken yakalanan genç kızın ailesinin talebiyle babasının gözleri önünde kırbaçlandığı görüntüler gündeme bomba gibi düştü. Görüntülerin sosyal medyaya düşmesi sonrası binlerce kullanıcı \"Bu vahşeti durdurun\" çağrısında bulundu.\r\nNijerya\'da bir doğum günü partisinde alkol alırken yakalanan 5 öğrenciden biri olan genç kızın babası, kızının görüntülerini izleyince çok sinirlendi ve okulundan kırbaç cezası talep etti.\r\n\r\n\"GEREKLİ CEZAYI VERMELERİNİ TALEP ETTİM\"\r\nBBC Pidgen\'e konuşan baba, \"Olayı okula bildirdim ve gerekli cezayı vermelerini bizzat talep ettim ve olay sırasında orada bulunmam için ısrar ettim\" dedi.\r\n\r\n4 KİŞİ BABASININ GÖZLERİ ÖNÜNDE KIRBAÇLADI\r\nİnternete düşen görüntüler geniş çapta tepki çekti ve sosyal medyanın en çok konuşulan konuları arasına girdi. Söz konusu görüntülerde yerde diz çöken genç kız çevresinde ellerinde sopaya benzer kırbaçlar olan 4 adam ile çevrili görülüyor. Adamlar daha sonra, babasının aralarında olduğu kalabalık önünde genç kızı acımasızca kırbaçlıyor. Acı içinde kıvranan gencin defalarca kez elini kaldırarak kendini korumaya çalıştığı görülüyor.\r\n\r\nSOSYAL MEDYADA İNFİAL YARATTI\r\nAynı olayla bağlantılı olarak genç bir çocuğun da dövüldüğünü gösteren ikinci bir video daha internete düştü. Peş peşe gelen videolar öfkeye neden olurken binlerce kişiden vahşetin durdurulması ve okula karşı önlem alınması çağrısı geldi.\r\n\r\nCEZANIN İSLAM HUKUKUNA UYGUN OLDUĞUNU SAVUNDULAR\r\nGelen tepkiler sonrası okul, velilerinin onayını aldıklarını belirterek verdikleri cezaları savundu. Okul ayrıca cezanın İslam hukukuna uygun olduğunu söyledi.\r\n\r\nYerel hükümet yaptığı açıklamada, bir soruşturma başlatıldığı ve cezaların Müslüman alimler, liderler ve hükümet yetkililerinden oluşan bir panel tarafından denetleneceği belirtildi.', 19, '/assets/img/4633649703.jpg', 1, '12-10-2021 12:11', '12-10-2021 12:11'),
(190, 41, 'Uğurcan Çakır\'ı almaya geldiler! Türk futbol tarihinin satış rekoru kırılacak', 'Trabzonspor\'un yetenekli kalecisi Uğurcan Çakır, A Milli Takımımız\'ın Norveç ile oynadığı maçta Lyon tarafından takip edildi. Bir süredir gözlem altında olan Uğurcan için devre arasında pazarlık yapılacak. Bu sezon şampiyonluk iddiası olan Trabzonspor, Uğurcan\'ı 25 milyon eurodan aşağıya satmayacak. Uğurcan\'ın devler tarafından takip edildiğinin farkında olan Lyon, Milli kaleci için bu paralara çıkmayı düşünüyor. Cenk Tosun\'a ait 23 milyon euroluk satış rekor Uğurcan\'la tarih olabilir.\r\nUğurcan Çakır\'ın devre arasında takımdan ayrılma ihtimali kuvvetli. 25 yaşındaki kaleciye ilgi halen yüksek. Milli Takım\'da Altay ile rekabet halinde olan Uğurcan, bu sezon Süper Lig\'de kurtarış yüzdesi en yüksek kaleci. Fransız devi Lyon\'un gözlemcileri Uğurcan\'ı yakın markaja aldı.\r\nDEVRE ARASI GİDEBİLİR\r\nBu sezon iddialı bir kadro kuran Trabzonspor\'un Uğurcan\'ı satmaya niyeti yok. Ancak 25 milyon euroluk teklif her şeyi değiştirebilir. Elini çabuk tutmak isteyen Lyon, kalesini uzun yıllar koruyabilecek bir kaleci arayışı içinde.\r\nREKOR CENK\'TE\r\nSüper Lig\'den en yüksek bedelle ayrılan futbolcu Cenk Tosun. Beşiktaş, golcü futbolcuyu 23 milyon euroya Everton\'a satılmıştı. Uğurcan\'ın devre arasında bu rekoru kırma ihtimali bir hayli yüksek.', 22, '/assets/img/3455726124.jpg', 1, '12-10-2021 12:16', '12-10-2021 12:16'),
(191, 39, 'Arka Sokaklar\'ın Hüsnü\'sü Özgür Ozan\'ın eşini görenler şaşkınlık yaşadı', 'Arka Sokaklar\'ın Hüsnü Çoban\'ı Özgür Ozan\'ın eşi ortaya çıktı, görenler şaşkınlık yaşadı. Özel hayatı oldukça merak edilen Özgür Ozan, eşi Neslihan Uğur\'la sade ve gözden uzak bir hayat yaşıyor.\r\nÇocuklar Duymasın ve Arka Sokaklar gibi uzun soluklu dizilerden tanıdığımız oyuncu Özgür Ozan\'ın evli ve iki çocuk sahibi olduğu ortaya çıktı.\r\n\r\nİKİ ÇOCUKLARI VAR\r\nÖzel hayatını çok fazla göz önünde yaşamayan Özgür Ozan, Neslihan Uğur ile evli. Çiftin bu evlilikten Ali Demir ve Derin Deniz adını verdikleri iki çocuğu bulunuyor.\r\n\r\nEŞİYLE ÇOK FOTOĞRAF PAYLAŞMIYOR\r\nKariyerini ön planda tutan Özgür Ozan, eşiyle çok fazla fotoğraf paylaşmıyor.\r\nÖZGÜR OZAN KİMDİR?\r\nÖzgür Ozan, 14 Kasım 1966 tarihinde Bolu\'da doğdu. İzmir Dokuz Eylül Üniversitesi Güzel Sanatlar Fakültesi Oyunculuk Bölümü\'nden mezun olan Özgür Ozan, İzmir Devlet Tiyatrosu, İzmir Çocuk Tiyatrosu ve Uluslararası Tiyatro Topluluğu\'nda görev aldı. 1984 yılından beri oyunculuk kariyerini devam ettiren Özgür Ozan, 2002 yılında Selami karakterini canlandırdığı Çocuklar Duymasın dizisi ile tanındı. İşler Güçler, Sonsuz, Umut Yolcuları, Kavak Yelleri, Arka Sokaklar, Acemi Cadı, Çocuklar Ne Olacak, Kadın Terzisi, Çocuklar Duymasın, Reyting Hamdi, En Son Babalar Duyar, Zülküf ile Zarife, Dikkat bebek Var, Hırsızın Oğlu, Örümcek, Sibel, Sırılsıklam, Kaç Para Kaç, Ruhsar, Yanlış Saksının Çiçeği, Kolsuz Bebek, Gurbetçiler, Tatlı Kaçıklar, Çiçek Taksi, Keriz, Git Başımdan gibi yapımlarda rol alan Özgür Ozan, şimdilerde Kanal D ekranlarında yayınlanan Arka Sokaklar dizisinde Hüsnü karakterine hayat veriyor.', 21, '/assets/img/3209818337.jpg', 1, '12-10-2021 12:20', '12-10-2021 12:20'),
(192, 38, 'Tablonun içine çıplak kadın figürü saklamış! Picasso\'nun 118 yıllık sırrı resmen ifşa oldu', 'Picasso\'nun The Blind Man\'s Meal adlı eserinin içerisinde yer alan ve görünmeyen çıplak kadın resmi, yapay zekâ sayesinde ortaya çıkarıldı. Picasso\'nun 118 yıl saklı kalan sırrı da çözülmüş oldu.\r\nDünyanın en önemli sanatçıları arasında yer alan ve yaptığı eserler günümüzde bile konuşulmaya devam eden Picasso\'nun 118 yıllık eserindeki resim, yapay zekayla ortaya çıkarıldı.\r\n\r\nÖLÜMÜNÜN ÜZERİNDEN 48 YIL GEÇTİ\r\nPablo Picasso, ölümünün üzerinden 48 yıl geçmesine rağmen sanatseverlere sürprizler yapmaya devam ediyor. Yakın zamanda sanatçının 1903 tarihli The Blind Man\'s Meal adlı eserinin altına gizlenmiş çıplak bir resim bulundu. Uzmanlar, yapay zekâ teknolojisinden yararlanarak orijinal parçanın nasıl görünebileceğini ortaya çıkardı.\r\n\r\n118 YIL BOYUNCA SAKLI KALDI\r\nŞu anda The Lonesome Crouching Nude olarak bilinen gizli tablo, ilk olarak 2010 yılında X-ışını floresan (XRF) görüntüleme kullanılarak keşfedilmişti. Londra merkezli bir sanat teknolojisi firması olan Oxia Palus, daha sonra tabloyu yeniden oluşturmak için AI teknolojisini kullandı. Ve 118 yıl boyunca saklı kalan sanat eseri ortaya çıktı.', 19, '/assets/img/2205827020.jpg', 1, '12-10-2021 12:22', '12-10-2021 12:22'),
(193, 38, 'Son Dakika! G-20 zirvesine video konferansla katılan Erdoğan: Afganistan\'daki gelişmeler göç akını riskini artırıyor', 'Son dakika! G-20 zirvesine video konferansla katılan Cumhurbaşkanı Erdoğan, \"Afganistan\'daki gelişmeler göç akını riskini artırıyor. Türkiye Afganistan kaynaklı yeni bir göç yükünü kaldıramaz. G-20 bünyesinde bir çalışma grubu oluşturulmasını öneriyorum. Türkiye olarak bu grubun başkanlığına da talibiz.\" ifadelerini kullandı.\r\nCumhurbaşkanı Recep Tayyip Erdoğan, Afganistan konulu \"G-20 Olağanüstü Liderler Zirvesi\"ne Vahdettin Köşkü\'nden video konferans ile katıldı.\r\n\r\n\"YENİ BİR ÇALIŞMA GRUBU OLUŞTURULMASINI ÖNERİYORUM\"\r\nTaliban\'ın yönetimi ele geçirdiği Afganistan hakkında konuşan Erdoğan, \"Afganistan\'daki gelişmeler göç akını riskini artırdığı da malumunuzdur. Türkiye Afganistan kaynaklı yeni bir göç yükünü kaldıramaz. G20 bünyesinde bir çalışma grubu oluşturulmasını öneriyorum. Türkiye olarak bu grubun başkanlığına da talibiz.\" ifadelerini kullandı.\r\n\r\nCumhurbaşkanı Erdoğan\'ın konuşmasından satır başları:\r\n\r\n\"Afganistan\'da yaşanan gelişmelerin siyasi ve insani boyutu yanında ekonomik yansımaları da oluyor. Konunun G20\'nin çalışma alanı içerisinde değerlendirilmesini memnuniyetle karşılıyoruz. Afganistan\'da yeni bir siyasi ve jeopolitik hakikatle karşı karşıyayız. Ülkede istikrarın bir an önce sağlanması uluslararası ölçekte kritik önemdedir. Taliban\'ı kapsayıcı bir yönetim kurma yönünde yönlendirmeliyiz.\r\n\r\n\"AFGAN HALKINA SIRTIMIZI DÖNME LÜKSÜMÜZ YOK\"\r\nUluslararası toplumun Afgan halkına sırtını dönme lüksü yoktur. Ülkede giderek derinleşen insani kriz nedeniyle Afgan halkı ile güçlü bir dayanışma sergilememiz gerekiyor. Türk Kızılay son olarak 33 ton gıda yardımı sağladı. Bu zor günlerinde Afgan halkına karşı kardeşlik görevimizi yerine getirmeyi sürdüreceğiz.\r\n\r\nHalihazırda Türkiye\'de burslu olarak okuyan Afgan öğrenci sayısı 1100\'dür. Geçmişten bugüne kadar burs verdiğimiz Afgan öğrenci sayısı 10 bini aşmıştır. Bu desteğimiz devam etmektedir.\r\n\r\n\"GEÇİCİ HÜKÜMET BEKLENİLENİ VEREMEDİ\"\r\nGeçici hükümet henüz bekleneni veremedi. Aşırıcılığı engellemede henüz gereken kucaklayıcılığı göremedik. Kız çocuklarının okula gönderilmesi, azınlık hakları, bu konuların çözülmesi gerekiyor.\"', 19, '/assets/img/3563940059.jpg', 1, '12-10-2021 12:23', '12-10-2021 12:23');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `news_history`
--

CREATE TABLE `news_history` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `new_id` int NOT NULL,
  `created_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `news_history`
--

INSERT INTO `news_history` (`id`, `user_id`, `new_id`, `created_at`) VALUES
(22, 52, 189, '12-10-2021 12:11'),
(23, 52, 189, '12-10-2021 12:12'),
(24, 52, 182, '12-10-2021 12:12'),
(25, 52, 182, '12-10-2021 12:12'),
(26, 53, 190, '12-10-2021 12:18'),
(27, 53, 190, '12-10-2021 12:18'),
(28, 53, 190, '12-10-2021 12:19'),
(29, 53, 193, '12-10-2021 12:25'),
(30, 53, 193, '12-10-2021 12:25');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `type`, `token`, `created_at`, `updated_at`) VALUES
(0, 'Anonim', 'Kullanıcı', '', '', '', '', '', ''),
(38, 'Editör', 'Hesabı', 'e@gmail.com', '11223344', '3', '5561516', '05-10-2021-11:15', '05-10-2021-01:11'),
(39, 'Moderatör', 'Hesabı', 'm@gmail.com', '11223344', '2', '56654651', '05-10-2021-11:15', '05-10-2021-11:15'),
(40, 'Kullanıcı', 'Hesabı', 'k@gmail.com', '11223344', '4', '464651564', '05-10-2021-11:16', '05-10-2021-11:16'),
(41, 'Admin', 'Hesabı', 'a@gmail.com', '11223344', '1', '51561651', '05-10-2021-11:16', '05-10-2021-11:16'),
(52, 'Metin', 'Akyol', 'metinakyol@gmail.com', '11223344', '4', '1634040318', '12-10-2021 12:05', '12-10-2021 12:05'),
(53, 'Havva', 'Ayçiçek', 'havvaaycicek@gmail.com', '11223344', '4', '1634041065', '12-10-2021 12:17', '12-10-2021 12:17');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_related_categories`
--

CREATE TABLE `user_related_categories` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `waitings_deletion`
--

CREATE TABLE `waitings_deletion` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `who_delete` int DEFAULT NULL,
  `is_deleted` int NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `waitings_deletion`
--

INSERT INTO `waitings_deletion` (`id`, `user_id`, `who_delete`, `is_deleted`, `created_at`, `updated_at`) VALUES
(27, 53, NULL, 0, '12-10-2021 12:26', '12-10-2021 12:26');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `comment_history`
--
ALTER TABLE `comment_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comment_new_history` (`new_id`),
  ADD KEY `fk_comment_user_history` (`user_id`);

--
-- Tablo için indeksler `editor_categories`
--
ALTER TABLE `editor_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_CategoryID` (`category_id`),
  ADD KEY `FK_UserID` (`editor_id`);

--
-- Tablo için indeksler `editor_update_time`
--
ALTER TABLE `editor_update_time`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category_news` (`category`),
  ADD KEY `fk_user_news` (`user_id`);

--
-- Tablo için indeksler `news_history`
--
ALTER TABLE `news_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_new_history` (`new_id`),
  ADD KEY `fk_user_history` (`user_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Tablo için indeksler `user_related_categories`
--
ALTER TABLE `user_related_categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `waitings_deletion`
--
ALTER TABLE `waitings_deletion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Tablo için AUTO_INCREMENT değeri `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Tablo için AUTO_INCREMENT değeri `comment_history`
--
ALTER TABLE `comment_history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `editor_categories`
--
ALTER TABLE `editor_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `editor_update_time`
--
ALTER TABLE `editor_update_time`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- Tablo için AUTO_INCREMENT değeri `news_history`
--
ALTER TABLE `news_history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Tablo için AUTO_INCREMENT değeri `user_related_categories`
--
ALTER TABLE `user_related_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Tablo için AUTO_INCREMENT değeri `waitings_deletion`
--
ALTER TABLE `waitings_deletion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `comment_history`
--
ALTER TABLE `comment_history`
  ADD CONSTRAINT `fk_comment_new_history` FOREIGN KEY (`new_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_comment_user_history` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `editor_categories`
--
ALTER TABLE `editor_categories`
  ADD CONSTRAINT `FK_CategoryID` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_UserID` FOREIGN KEY (`editor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_category_news` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_news` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `news_history`
--
ALTER TABLE `news_history`
  ADD CONSTRAINT `fk_new_history` FOREIGN KEY (`new_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_history` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `waitings_deletion`
--
ALTER TABLE `waitings_deletion`
  ADD CONSTRAINT `fk_delete_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
