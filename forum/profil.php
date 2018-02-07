<?php

if($_SESSION){

    $uye=@$_GET["uye"];
    $v=$db->prepare("select * from uyeler where uye_adi=?");
    $v->execute(array($uye));
    $m=$v->fetch(PDO::FETCH_ASSOC);
    $x=$v->rowCount();

    if($x){

        ?>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="well well-sm">
                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                                <img src="<?php echo $m["uye_resim"];?>" alt="" class="img-rounded img-responsive" />
                            </div>
                            <div class="col-sm-6 col-md-8">
                                <h4>
                                    <?php echo $m["uye_adi"]; ?>
                                <?php
                                    if ($_SESSION["uye"]==$uye){
                                        echo "<span style='float: right; font-size: 14px; '><a href='?do=profil_duzenle&uye=".$_SESSION["uye"]."'>Düzenle</a></span>";
                                    }else{
                                        echo "<span style='float: right; font-size: 14px; '><a href='?do=profil_mgonder&uye=".$uye."'>Mesaj Gönder</a></span>";
                                    }

                                    ?>

                                </h4>
                                <small><cite title="San Francisco, USA"><?php echo $m["uye_sehir"]; ?> <i class="glyphicon glyphicon-map-marker">
                                        </i></cite></small>
                                <p>
                                    <i class="glyphicon glyphicon-envelope"></i><?php echo $m["uye_eposta"]; ?>
                                    <br />

                                    <i class="glyphicon glyphicon-gift"></i><?php echo $m["uye_dgunu"]; ?></p>
                                <!-- Split button -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary">
                                        Sosyal Medya</button>
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                        <span class="caret"></span><span class="sr-only">Social</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?php echo $m["uye_twitter"]; ?>">Twitter</a></li>
                                        <li><a href="<?php echo $m["uye_facebook"]; ?>">Facebook</a></li>

                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                    <h3>Paylaşılan Konular</h3>
                    <?php

                    $asd=$_GET["uye"];

                    $konu=$db->prepare("select * from konular inner join uyeler on uyeler.uye_adi=konular.konu_ekleyen where konu_ekleyen=? and konu_durum=? order by konu_id desc ");
                    $konu->execute(array($asd,1));
                    $x=$konu->fetchAll(PDO::FETCH_ASSOC);
                    $v=$konu->rowCount();
                    if ($v){
                        foreach ($x as $r){
                            ?>
                            <div style="width: 555px;" class='well'>Başlık: <a href="?do=devam&id=<?php echo $r["konu_id"]; ?>"><?php echo $r["konu_baslik"]; ?></a>

                                <span style="float: right">Tarih: <?php echo $r["konu_tarih"]; ?> </span>
                            </div>
                            <?php
                        }
                    }else{
                        echo "<div class='well'>Hiç konunuz bulunmuyor.</div>";
                    }

                    ?>

                </div>
            </div>
        </div>


        <?php


    }
    else{

        echo "<div class='well'>Bu üye sistemde kayıtlı değil.</div>";
    }



}else{
    echo "<div class='well'>Üye olmadan profil sayfasını göremezsiniz.</div>";

}



?>




