<?php

$sayfa=intval(@$_GET["sayfa"]);

if(!$sayfa){
    $sayfa=1;
}

$v=$db->prepare("select * from konular inner join kategoriler on
kategoriler.kategori_id=konular.konu_kategori INNER  JOIN uyeler ON uyeler.uye_adi=konular.konu_ekleyen where konu_durum=?");
$v->execute(array(1));
$v->fetchAll(PDO::FETCH_ASSOC);
$toplam= $v->rowCount();
$limit=2;
$goster=$sayfa*$limit-$limit;
$sayfa_sayisi=ceil($toplam/$limit);
$forlimit=2;
$ilksayfa=1;

$konu=$db->prepare("select * from konular inner join kategoriler on
kategoriler.kategori_id=konular.konu_kategori INNER  JOIN uyeler ON uyeler.uye_adi=konular.konu_ekleyen where konu_durum=? order by konu_id desc limit $goster,$limit");
$konu->execute(array(1));
$x=$konu->fetchAll(PDO::FETCH_ASSOC);

foreach ($x as $m){

    $yorum=$db->prepare("select * from yorumlar where yorum_konu_id=? and yorum_onay=?");
    $yorum->execute(array($m["konu_id"],1));
    $yorum->fetchAll(PDO::FETCH_ASSOC);
    $x=$yorum->rowCount();

    ?>

    <h2><?php echo $m["konu_baslik"]; ?></h2>


    <p>Kategori: <a href="?do=kategori&id=<?php echo $m["kategori_id"];?>"><?php echo $m["kategori_adi"]; ?> </a> Yazar: <a href="?do=profil&uye=<?php echo $m["uye_adi"]; ?>"> <?php echo $m["uye_adi"]; ?></a>
        Okunma: <?php echo $m["konu_hit"]; ?> Yorum :<?php echo $x ;?> <span class="glyphicon glyphicon-time" style="float: right"> <?php echo $m["konu_tarih"]; ?></span> </p>
    <hr>
    <img class="img-responsive" style="width: 900px; height: 300px;" src="<?php echo $m["konu_resim"]; ?>" alt="">
    <hr>
    <p class="tasma_engelle"><?php echo strip_tags(mb_substr($m["konu_aciklama"],0,300)); ?>...</p>
    <a class="btn btn-primary" href="?do=devam&id=<?php echo $m["konu_id"]; ?>">Daha Fazla <span class="glyphicon glyphicon-chevron-right"></span></a>

    <hr>

    <?php


}



echo "<div class='well'>";

for ($i=$sayfa-$forlimit; $i<$sayfa+$forlimit+1;$i++){

    if($i>0 && $i<=$sayfa_sayisi){

        if($i==$sayfa){

            echo "<span >".$i."<span/>";

        }else{

            echo "<span ><a href='?sayfa=".$i."'>".$i."</a><span/>";


        }

    }
}


if($sayfa != $sayfa_sayisi){

    echo "<b  style=\"float:right;\"><a href='?sayfa=".$sayfa_sayisi."'>  &nbsp;Son&rarr;  </a></b>";
}

if($sayfa != 1 ){

    echo "<b  style=\"float:left;\"><a href='?sayfa=".$ilksayfa."'>  &larr;ilk&nbsp;  </a></b>";
}


?>







</div>


