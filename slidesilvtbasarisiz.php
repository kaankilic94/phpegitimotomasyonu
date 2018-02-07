<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="img/logo.png">

    <title>Kocaeli Eğitim</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="font-awesome-4.6.3/less/variables.less" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

</head>
<body>



<div class="brand">KOCAELİ</div>
<div class="brand">EĞİTİM</div>
<div class="brand"><a href="index.php"> <img src="img/kou-logo.jpg" class="img-circle" id="imgcrc"/> </a></div>

<div class="container">
    <div class="row">
        <div class="col-md-18">
            <div class="box" id="bx">

                <br><br>

                <h2 class="intro-text text-center trhcep">SLİDE SİL</h2>
                <hr>

                <br><br><br>

                <p class="text-danger"><span class="glyphicon glyphicon-remove"></span> Slide silinmedi.</p>

                <?php

                session_start();

                error_reporting(0);

                $baglanma=@new mysqli("localhost","root","","kou");

                mysqli_set_charset($baglanma,"utf8");

                $numara=$_SESSION['no'];

                if($baglanma->connect_error)
                {
                    die ("Hata: ". $baglanma->connect_error );
                }
                else
                {
                    $sorg = $baglanma->query("SELECT * FROM slider WHERE idn=$numara ORDER BY bastarih DESC ");

                    while($row = $sorg->fetch_object())
                    {
                        ?>


                        <form action="slidesilvt.php" method="post">
                            <div class="form-group">
                                <label>Bitiş Tarihi</label><br>
                                Gün: <input type="text" class="form-group" id="sbitgungir" value="<?php echo $row->sgun; ?>" placeholder="Gün" name="sbitgun">
                                &nbsp;&nbsp;&nbsp;&nbsp; Ay:  <input type="text" class="form-group" id="sbitaygir" value="<?php echo $row->say;  ?>" placeholder="Ay" name="sbitay">
                                &nbsp;&nbsp;&nbsp;&nbsp; Yıl:  <input type="text" class="form-group" id="sbityilgir" value="<?php echo $row->syil;  ?>" placeholder="Yıl" name="sbityil">
                            </div>
                            <div class="form-group">
                                <label for="duyurbasgir">Slide Başlığı</label>
                                <input type="text" class="form-control" id="slidebasgir" value="<?php echo $row->sbaslik;  ?>" placeholder="Slide Başlığı" name="slidebas">
                            </div>
                            <div class="form-group">
                                <label for="duyuruicgir">Slide İçeriği</label>
                                <textarea class="form-control" rows="10"  name="slideicerik"id="slideicgir"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="duyurlinkgir">Dosya Ekle</label>
                                <input type="file" id="slidelinkgir" value="<?php echo $row->slink; ?>" name="slidelink">
                                <p class="help-block">Maksimum 128 MB</p>
                            </div>
                            <div class="form-group">
                                <label><input type="checkbox" value="<?php echo $row->slideid; ?>" name="slid">Slide'ın silinmesi icin kutucuğu işaretleyiniz.</label>
                            </div>
                            <button type="submit" class="btn btn-danger">SİL</button>
                        </form>



                        <?php

                    }
                }




                ?>

                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

                <a href="sistemcikis.php"><button type="button" class="btn btn-success">ÇIKIŞ</button></a>

            </div>
        </div>
    </div>
</div>


<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-6" id="">
                <p>
                    Adres: KOÜ Mühendislik Fakültesi (B Blok) Bilgisayar Mühendisliği Umuttepe Yerleşkesi 41380 Kocaeli
                    <br>E-Posta: kaan.kilic53@gmail.com/kubilaygorkemli@gmail.com
                    <br>Web istek görüş ve önerileriniz için : Kaan Kılıç/Kubilay Görkemli
                </p>
            </div>
        </div>
    </div>
</footer>

<script src="js/bootstrap.min.js"></script>

<script src="js/jquery.js"></script>

<script src="script.js"></script>

</body>
</html>