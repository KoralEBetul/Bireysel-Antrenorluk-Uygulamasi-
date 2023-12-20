<?php
require_once("Ayarlar/ayar.php"); //veri tabanı burada açılacak
require_once("ayarlar/fonksiyonlar.php");
?>


<!DOCTYPE html>
<html lang="tr-TR">
<head>
    <meta http-equiv="content-type" content="text-html"; charset="utf-8">
    <meta charset="UTF-8">
    <meta http-equiv="content-language" content="tr">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Branşlar</title>
    <link type="image/png" rel="icon" href="images/logo_transparent.png">
    <meta name="description" content="<?php echo DonusumleriGeriDondur($SiteDescription);  ?>">
    <meta name="keywords" content="<?php echo DonusumleriGeriDondur($SiteKeywords); ?>">
    <script type="text/javascript" src="frameworks/JQuery/jquery-3.6.0.min" language="javascript"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <script type="text/javascript" src="Ayarlar/fonksiyonlar.js" language="javascript"></script>
</head>
<body>
    <!--! header section start -->
    <header class="header">
        <a href="user_page.php" class="logo">
            <img src="images/logo_transparent.png" alt="logo" />
        </a>
        <nav class="navbar"> <!--! menu-bar -->
            <a href="user_page.php">Ana Sayfa</a>
            <a href="menu.php" class="active">Branşlar</a>
            <a href="about.php" >Program</a>
            <a href="antrenor.php" >Eğitmenler</a>
            <a href="bookings.php">Randevularım</a>
            <a href="logout.php" class="bi bi-box-arrow-right"> Çıkış</a>
        </nav>
        
        <div class="buttons">
            <button id="search-btn">
                <i class="fas fa-search"></i>
            </button>
        </div>

        <div class="search-form">
            <input 
            type="text" 
            class="search-input" 
            id="search-box" 
            placeholder="ara" 
            />
            <i class="fas fa-search"></i>
        </div>
        <div class="cart-items-container">
            <div class="cart-item">
                <i class="fas fa-times"></i>
                <img src="images/about-11.png" alt="menu" />
                <div class="content">
                    <h3>Standart Plan</h3>
                    <div class="price">555</div>
                </div>
            </div>

            <a href="#" class="btn">kontrol</a>
        </div>
    </header>
    <!--! header section end -->

    

    <!--! menu section start -->
    <section class="menu" id="menu"> 
        <h1 class="heading">Tüm <span>Branşlar</span></h1>
        <h3>Kişisel Gelişim</h3>
        <div class="box-container">
            <div class="box">
                <div class="box-head">
                    <img src="images/menu-4.jpg" alt="menu" />
                    <span class="menu-category"></span>
                    <h3>STRECHING</h3>
                    <div class="price">Sıkı çalıştığınız bir antrenman sonrası vücudunuza ve 
                        size iyi gelecek, sporun yarattığı yorgunluktan kurtulacağınız ve kaslarınızı
                         esneterek gevşemenizi sağlayan Streching sağlıklı kalmanızın en güzel yolu. .</div>

                </div>
            </div>
            <div class="box">
                <div class="box-head">
                    <img src="images/menu-5.jpg" alt="menu" />
                    <span class="menu-category"></span>
                    <h3>CRUCH BURN</h3>
                    <div class="price"> Karın ve bel bölgesini güçlendirmek, karın bölgesindeki yağları hızlı  ve sağlıklı
                         bir şekilde yok etmek isteyenlerin birinci tercihi olan Crunch Burn, core bölgenizi hedef alarak
                          kendi vücut ağırlığınız ile hızlı ve kolay bir biçimde güçlenmenizi sağlıyor. 
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="box-head">
                    <img src="images/menu-3.jpg" alt="menu" />
                    <span class="menu-category"></span>
                    <h3>CYCLING</h3>
                    <div class="price"> Cycling antrenmanı sporun bir insana sunabileceği bütün enerjiyi içinde barındırıyor. 
                        45 dakika süren egzersiz boyunca 500-900 kalori yakma imkanını yakalıyorsunuz.
                         Orjinal bisiklet sürüş tekniklerini, hareketli müziklerle birleştiren yüksek nabızlı kardiyovasküler 
                         bir egzersiz olan Cycling ile formunuza hızlıca kavuşabilirsiniz.
                    </div>
                </div>
            </div>
        </div>

        <div class="box-container">
            <div class="box">
                <div class="box-head">
                    <img src="images/menu-2222.jpg" alt="menu" />
                    <span class="menu-category"></span>
                    <h3>BODY WEIGHT TRAINING</h3>
                    <div class="price">Nabzın yüksek tutulduğu Body Weight Training antrenmanlarında 
                        vücudunuzun dayanıklılığının artması hedefleniyor. Verdiğiniz emeğin karşılığını 
                        kısa sürede alabileceğiniz hem bedeninizi hemde zihninizi güçlendiren Body Weight 
                        Training antrenmanlarını kaçırmayın.</div>
                </div>
            </div>
            <div class="box">
                <div class="box-head">
                    <img src="images/menu-222.jpg" alt="menu" />
                    <span class="menu-category"></span>
                    <h3>GYMLIFE STRONG</h3>
                    <div class="price">Kuvvetin ve dayanıklılığın ön planda olduğu, gücünüzü fark etmenizi ve ortaya çıkarmanızı sağlayan
                         bu antrenman farklı bir egzersiz disiplinine sahiptir. Antrenman süresi boyunca hem zamanla 
                         hemde kendinizle yarıştığınız Gym Life Strong egzersizleri 20 saniyelik çalışma süresi ve 40 saniyelik dinlenme 
                         süresi şeklinde ilerler. </div>
                </div>
            </div>
            <div class="box">
                <div class="box-head">
                    <img src="images/menuu.jpg" alt="menu" />
                    <span class="menu-category"></span>
                    <h3>GYMLIFE FUNCTIONAL</h3>
                    <div class="price"> Adını sık sık duymaya başlayacağınız Fonksiyonel Antrenman vücudunuzun günlük hayattaki hareket
                         potansiyelini farklı ekipmanlar kullanarak arttırabileceğiniz, sadece vücudunuzu geliştirmeye yönelik değil
                        aynı zamanda vücudunuzu korumaya yarayan egzersizler bütünüdür.
                    </div>
                </div>
            </div>
        </div>

        <div class="box-container">
            <div class="box">
                <div class="box-head">
                    <img src="images/menu-9.jpg" alt="menu" />
                    <span class="menu-category"></span>
                    <h3>FITNESS</h3>
                    <div class="price">Fitness antrenmanınız hem sağlığınız hemde bedeniniz için oldukça önem taşımaktadır.
                        Doğru yönlendirmelerle oluşturulmuş bir fitness programı vücudunuzun sağlıklı bir şekilde formda kalmasını sağlar. 
                        Yanlış veya eksik oluşturulan fitness antrenmanları ise vücudunuzda sakatlanmalara sebep olabilir.
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="box-head">
                    <img src="images/menu-7.jpg" alt="menu" />
                    <span class="menu-category"></span>
                    <h3>BODY PUMP</h3>
                    <div class="price">
                        Gaza getiren müziklerin ve sıkı motivasyon cümlelerinin havada uçuştuğu motive edici, eğlenme garantili
                         spor antrenmanlarının bütünüdür. Sık tekrar eşliğinde farklı ağırlıklar kullanılarak yapılan egzersizlerle
                          hızlı ve etkili sonuçlar alırsınız. 
                         </div>
                </div>
            </div>
            <div class="box">
                <div class="box-head">
                    <img src="images/menu-8.jpg" alt="menu" />
                    <span class="menu-category"></span>
                    <h3>TRX SÜSPANSİYON</h3>
                    <div class="price"> TRX Suspansiyon Trainer ile tüm vücudunuzu aktif bir biçimde kullanarak hızlı ve pratik
                         bir biçimde fayda sağlarsınız. Antrenmanların geri dönüşümü hızlı olurken aynı zamanda oldukça eğlenirsiniz. 
                         Kısa aralıklarla uygulanan hareketler değişir. Böylece güç kullanmanıza yardımcı olur.
                    </div>
                </div>
            </div>
        </div>
        <h3>Pilates</h3>
        <div class="box-container">
            <div class="box">
                <div class="box-head">
                    <img src="images/menu-6.jpg" alt="menu" />
                    <span class="menu-category"></span>
                    <h3>MAT PILATES</h3>
                    <div class="price">Sıkı bir vücuda kısa sürede kavuşmanızı sağlayan Pilates size yalnızca fit bir vücut vaad etmekle kalmıyor aynı zamanda güçlendirilmesi
                         son derece önemli olan dengeleyici kaslarınızı baz alarak vücudunuz üzerindeki farkındalığınızı arttırıyor ve vücut dengenizi sağlamanıza yardımcı oluyor.
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="box-head">
                    <img src="images/pilates-3.jpg" alt="menu" />
                    <span class="menu-category"></span>
                    <h3>REFORMER PILATES</h3>
                    <div class="price">
                        Reformer pilates, diğer egzersiz ve sporlara göre birçok avantaja sahiptir ve çok daha sağlıklıdır. Farklı sporlarda ve egzersizlerde eklemlere yük binmesi,
                         kas ağrılarının oluşması, sakatlanmalar, bel ve sırt ağrılarının meydana gelmesi söz konusu iken reformerpilates esnasında bu durumlar ortadan kalkar.. 
                         </div>
                </div>
            </div>
            <div class="box">
                <div class="box-head">
                    <img src="images/pilates-4.jpg" alt="menu" />
                    <span class="menu-category"></span>
                    <h3>CADILLAC PILATES</h3>
                    <div class="price">Cadillac Pilates, pilates egzersizleri için özel olarak tasarlanmış bir alettir. Özellikle bireysel pilates dersleri için kullanılır. 
                        Kısaca söyleyecek olursak, egzersizlere çeşitlilik katarak vücudun farklı kas gruplarını hedefler. Yatak benzeri bir platform üzerine yerleştirilmiş 
                        bir çerçeve, yaylar, barlar ve diğer aksesuarlar içerir. Bu alet, pilates egzersizlerini daha çeşitli hale getirir ve vücudun farklı kas gruplarını hedefler.
                    </div>
                </div>
            </div>
        </div>

        <h3>Yoga</h3>
        <div class="box-container">
            <div class="box">
                <div class="box-head">
                    <img src="images/yoga-1.jpg" alt="menu" />
                    <span class="menu-category"></span>
                    <h3>HATHA YOGA</h3>
                    <div class="price">Hatha Yoga'nın Amacı, bedensel, zihinsel ve ruhsal yaşantımıza bir denge
                         getirmek, rahatlama ve dinginlik sağlamaktır.

                        Temel fiziksel duruşlara (asanalar) ve nefes egzersizlerine ağırlık verilen bu seanslar, 
                        bedenimiz ve zihnimiz üzerinde kontrol sağlamamıza, gevşemeye ve stres azaltımına yardımcı oluyor.
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="box-head">
                    <img src="images/yoga-2.jpg" alt="menu" />
                    <span class="menu-category"></span>
                    <h3>YIN Yoga</h3>
                    <div class="price">
                        Çıkış düşüncesi Taoizme dayanan yin yogada Çin Tıbbına göre vücudumuzda Yin su elementidir, Yang ateş elementidir sağlık için vücutta bu ikisi arasında
                         bir denge sağlanması şarttır bunu da yin yoga ile yapmak mümkündür. Vücutta sağlanan denge mutlaka yaşamın dengesini de yerine getirir bu da yaşam kalitemizi artırır.
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="box-head">
                    <img src="images/yoga-3.jpg" alt="menu" />
                    <span class="menu-category"></span>
                    <h3>VINYASA YOGA</h3>
                    <div class="price">
                        Klasik yogada bir pozda uzun süre kalıp poz aralarında dinlenirken vinyasa yogada pozları birleştirir ve bir sekans oluşturursunuz. Sabit bir akış yoktur,
                         her ders eğitmenin doğaçlamasına bağlı olarak farklı bir akışta olabilir. Böylece sıkılmaz aksine ders sonunda daha canlı ve özgür hissedersiniz.
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    <!--! menu section end -->

    <!--! footer section start -->
    <section class="footer" id="footer">
        <div class="search">
            <input type="text"
            class="search-input" placeholder="Ara" />
            <button class="btn btn-primary">Ara</button>
        </div>
        <div class="share">
            <a href="<?php echo DonusumleriGeriDondur($SosyalLinkInstagram); ?>" class="fab fa-facebook" target="_blank"></a>
            <a href="<?php echo DonusumleriGeriDondur($SosyalLinkInstagram); ?>" class="fab fa-twitter" target="_blank"></a>
            <a href="<?php echo DonusumleriGeriDondur($SosyalLinkInstagram); ?>" class="fab fa-instagram" target="_blank"></a>
            <a href="<?php echo DonusumleriGeriDondur($SosyalLinkInstagram); ?>" class="fab fa-linkedin" target="_blank"></a>
            <a href="<?php echo DonusumleriGeriDondur($SosyalLinkInstagram); ?>" class="fab fa-pinterest" target="_blank"></a>
        </div>
        <div class="links">
            <a href="user_page.php">Ana Sayfa</a>
            <a href="menu.php" class="active">Branşlar</a>
            <a href="about.php" >Program</a>
            <a href="antrenor.php" >Eğitmenler</a>
            <a href="bookings.php">Randevularım</a>
            <a href="logout.php" class="bi bi-box-arrow-right"> Çıkış</a>
        </div>
        <div class="credit">
            created by <span>Emine Betül Koral</span> | Tüm Hakları Saklıdır. 
        </div>
    </section>
    <!--! footer section end -->

    <script src="js/script.js"></script>


</body>
</html>

<?php
$VeritabaniBaglantisi = null;  //veri tabanı burada kapanacak
?>