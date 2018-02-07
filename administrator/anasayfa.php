<?php

$k=$db->prepare("select * from konular");
$k->execute(array());
$k->fetchAll(PDO::FETCH_ASSOC);
$konu=$k->rowCount();

$konay=$db->prepare("select * from konular where konu_durum=?");
$konay->execute(array(0));
$konay->fetchAll(PDO::FETCH_ASSOC);
$konuonay=$konay->rowCount();

$u=$db->prepare("select * from uyeler");
$u->execute(array());
$u->fetchAll(PDO::FETCH_ASSOC);
$uye=$u->rowCount();

$uonay=$db->prepare("select * from uyeler where uye_onay=?");
$uonay->execute(array(0));
$uonay->fetchAll(PDO::FETCH_ASSOC);
$uyeonay=$uonay->rowCount();

$kat=$db->prepare("select * from kategoriler");
$kat->execute(array());
$kat->fetchAll(PDO::FETCH_ASSOC);
$kategori=$kat->rowCount();

$y=$db->prepare("select * from yorumlar");
$y->execute(array());
$y->fetchAll(PDO::FETCH_ASSOC);
$yorum=$y->rowCount();

$yonay=$db->prepare("select * from yorumlar where yorum_onay=?");
$yonay->execute(array(0));
$yonay->fetchAll(PDO::FETCH_ASSOC);
$yorumonay=$yonay->rowCount();




?>

<div class="content-wrapper py-3">
    <div style="margin: 15px; color: #00aced; " class="breadcrumb">


        <h3>&nbsp;&nbsp;&nbsp;Yönetici Paneli</h3>

    </div>
    <div style="margin: 15px; color: #00aced; " class="breadcrumb">


        <div style="float: left;" class="col-xl-3 col-sm-6 mb-3">
            <div class="card card-inverse card-success o-hidden h-100">
                <div class="card-block">
                    <div class="card-block-icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="mr-5">
                        Uyeler
                    </div>
                </div>
                <a href="../administrator/?do=uyeler" class="card-footer clearfix small z-1">
                    <span class="float-left">Toplam: <?php echo $uye ;?></span><br>
                    <span class="float-left">Onaylanmamış: <?php echo $uyeonay ;?></span>
                    <span class="float-right"><i class="fa fa-angle-right"></i></span>
                </a>
            </div>
        </div>


        <div style="float: left;" class="col-xl-3 col-sm-6 mb-3">
            <div class="card card-inverse card-success o-hidden h-100">
                <div class="card-block">
                    <div class="card-block-icon">
                        <i class="fa fa-folder"></i>
                    </div>
                    <div class="mr-5">
                        Kategoriler
                    </div>
                </div>
                <a href="../administrator/?do=kategoriler" class="card-footer clearfix small z-1">
                    <span class="float-left">Toplam: <?php echo $kategori ;?></span><br>

                    <span class="float-right"><i class="fa fa-angle-right"></i></span>
                </a>
            </div>
        </div>

        <div style="float: left;" class="col-xl-3 col-sm-6 mb-3">
            <div class="card card-inverse card-success o-hidden h-100">
                <div class="card-block">
                    <div class="card-block-icon">
                        <i class="fa fa-hashtag"></i>
                    </div>
                    <div class="mr-5">
                        Konular
                    </div>
                </div>
                <a href="../administrator/?do=konular" class="card-footer clearfix small z-1">
                    <span class="float-left">Toplam: <?php echo $konu ;?></span><br>
                    <span class="float-left">Onaylanmamış: <?php echo $konuonay ;?></span>
                    <span class="float-right"><i class="fa fa-angle-right"></i></span>
                </a>
            </div>
        </div>

        <div style="float: left;" class="col-xl-3 col-sm-6 mb-3">
            <div class="card card-inverse card-success o-hidden h-100">
                <div class="card-block">
                    <div class="card-block-icon">
                        <i class="fa fa-eye"></i>
                    </div>
                    <div class="mr-5">
                        Yorumlar
                    </div>
                </div>
                <a href="../administrator/?do=yorumlar" class="card-footer clearfix small z-1">
                    <span class="float-left">Toplam: <?php echo $yorum ;?></span><br>
                    <span class="float-left">Onaylanmamış: <?php echo $yorumonay ;?></span>
                    <span class="float-right"><i class="fa fa-angle-right"></i></span>
                </a>
            </div>
        </div>







    </div>
</div>