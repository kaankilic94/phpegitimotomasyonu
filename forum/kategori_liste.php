<?php
$id=$_GET["id"];
$konu=$db->prepare("select * from konular inner join kategoriler on
kategoriler.kategori_id=konular.konu_kategori inner join uyeler on uyeler.uye_adi=konular.konu_ekleyen where konu_kategori=? and konu_durum=? ");
$konu->execute(array($id,1));
$x=$konu->fetchAll(PDO::FETCH_ASSOC);

$v=$konu->rowCount();
if($v){
    foreach ($x as $m){

        $yorum=$db->prepare("select * from yorumlar where yorum_konu_id=? and yorum_onay=?");
        $yorum->execute(array($m["konu_id"],1));
        $yorum->fetchAll(PDO::FETCH_ASSOC);
        $x=$yorum->rowCount();


        ?>

        <h2><?php echo $m["konu_baslik"]; ?></h2>


        <p>Kategori: <a href="?do=kategori&id=<?php echo $m["kategori_id"];?>"><?php echo $m["kategori_adi"];?></a> Yazar: <a href="?do=profil&uye=<?php echo $m["uye_adi"];?>"><?php echo $m["uye_adi"];?></a>
            Okunma: <?php echo $m["konu_hit"]; ?> Yorum : <?php echo $x ;?> <span class="glyphicon glyphicon-time" style="float: right"> <?php echo $m["konu_tarih"]; ?></span> </p>
        <hr>
        <img class="img-responsive" style="width: 900px; height: 300px;" src="<?php echo $m["konu_resim"]; ?>" alt="">
        <hr>
        <p class="tasma_engelle"><?php echo strip_tags(mb_substr($m["konu_aciklama"],0,300)) ; ?>...</p>
        <a class="btn btn-primary" href="?do=devam&id=<?php echo $m["konu_id"]; ?>">Daha Fazla <span class="glyphicon glyphicon-chevron-right"></span></a>

        <hr>

        <?php


    }

}else{

    echo "<div class='well'>Bu kategoriye henüz bir konu eklenmemiş.</div>";
}




?>




