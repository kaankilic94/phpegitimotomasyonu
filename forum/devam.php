

<?php
$id =$_GET["id"];
$konu=$db->prepare("select * from konular inner join kategoriler on kategoriler.kategori_id=konular.konu_kategori where konu_id=? and konu_durum=?");
$konu->execute(array($id,1));
$x=$konu->fetchAll(PDO::FETCH_ASSOC);

//Okunma sayısı
if(!@$_COOKIE["hit".$id]){
$hit= $db->prepare("update konular set konu_hit = konu_hit+1 where konu_id=?");
$hit->execute(array($id));

setcookie("hit".$id,"_",time()+31556926);}

foreach ($x as $m){

    $yorum=$db->prepare("select * from yorumlar  where yorum_konu_id=? and yorum_onay=?");
    $yorum->execute(array($m["konu_id"],1));
    $yorum->fetchAll(PDO::FETCH_ASSOC);
    $x=$yorum->rowCount();


    ?>

    <h2><?php echo $m["konu_baslik"]; ?></h2><hr>


    <p>Kategori: <?php echo $m["kategori_adi"]; ?> Yazar: <?php echo $m["konu_ekleyen"]; ?>
        Okunma:<?php echo $m["konu_hit"]; ?> Yorum : <?php echo $x;?> <span class="glyphicon glyphicon-time" style="float: right"> <?php echo $m["konu_tarih"]; ?></span> </p>
    <hr>
    <img class="img-responsive" style="width: 900px; height: 300px;" src="<?php echo $m["konu_resim"]; ?>" alt="">
    <hr>
    <p class="tasma_engelle"><?php echo nl2br($m["konu_aciklama"]); ?></p>


    <hr>


    <?php


}

$yorum=$db->prepare("select * from yorumlar INNER  JOIN uyeler on uyeler.uye_adi=yorumlar.yorum_ekleyen where yorum_konu_id=? and yorum_onay=? order by yorum_id ASC ");
$yorum->execute(array($id,1));
$b=$yorum->fetchAll(PDO::FETCH_ASSOC);
$x=$yorum->rowCount();

if($x){

    foreach ($b as $m){

        ?>

        <div  class="well">
            <img style=" width:40px; height:40px; -webkit-border-radius:10px; -moz-border-radius:10px; border-radius:100px;" src="<?php echo $m["uye_resim"] ;?>">
           <h4> <a href="?do=profil&uye=<?php echo $m["uye_adi"]; ?>"> <?php echo $m["uye_adi"]; ?></a> <span style="float: right"> Tarih: <?php echo $m["yorum_tarih"]; ?></span> </h4><hr>
            <p><?php echo $m["yorum_mesaj"]; ?></p>
        </div>

        <?php

    }

}else{
    echo "<div class='well'>Bu konuya henüz yorum eklenmemiş!</div>";
}

if($_POST){

    $isim= $_POST["isim"];
    $mail= $_POST["mail"];
    $mesaj=$_POST["mesaj"];

    if(!$mesaj || !$mail || !$isim){
        echo "<div class='well'>Lütfen boş alan bırakmayınız</div>";
    }else{

        $yorum=$db->prepare("insert into yorumlar set
                            yorum_ekleyen=?,
                            yorum_eposta=?,
                            yorum_mesaj=?,
                            yorum_konu_id=?
                            ");
        $ekle=$yorum->execute(array($isim,$mail,$mesaj,$id));

        if($ekle){
            echo "<div class='well'>Yorumunuz eklendi onay verildikten sonra gösterilicektir.</div>";
            $url=$_SERVER["HTTP_REFERER"];
            header("refresh: 2; url=$url");
        }else{
            echo "<div class='well'>Yorum eklenemedi!</div>";
        }
    }


}else{

    if($_SESSION){

        ?>
        <form action="" method="post">
            <div class="form-group">

                <input name="isim" value="<?php echo $_SESSION["uye"];?>" type="hidden" class="form-control">

                <input  name="mail" value="<?php echo $_SESSION["eposta"];?>" type="hidden" class="form-control">

                <label for="comment">Yorum:</label>
                <textarea name="mesaj" class="ckeditor" rows="5" id="comment"></textarea><br/>
                <button  type="submit" class="btn btn-info">Gönder</button>
            </div>
        </form>
        <?php

    }else{
        ?>
        <div class='well'>Yorum eklemek için lütfen üye olunuz.</div>
        <?php

    }


}
    ?>






