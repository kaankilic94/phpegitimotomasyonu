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
                <hr>
                <h1 class="intro-text text-center">
                    Sistemde Kayıtlı Öğrenciler
                </h1>
                <hr>

                <table width="1000" border="1" cellpadding="0" cellspacing="0" align="center" id="tablo4">

                    <tr>
                        <td width="50"  valign="center" bgcolor="#255625" class="style3"><p><strong>&nbsp;id</p></td>
                        <td  width="350" valign="center" bgcolor="#255625" class="style3"><p><strong>&nbsp;E-mail </p></td>
                        <td  width="200" valign="center" bgcolor="#255625" class="style3"><p><strong>&nbsp; Şifre</p></td>
                        <td  width="200" valign="center" bgcolor="#255625" class="style3"><p><strong>&nbsp; İsim  </p></td>
                        <td  width="200" valign="center" bgcolor="#255625" class="style3"><p><strong>&nbsp; Soyisim </p></td>
                    </tr>




                </table>


                <?php



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
                    $sorg = $baglanma->query("SELECT * FROM ogrenci WHERE id");

                    while($row = $sorg->fetch_object())
                    {
                        ?>

                        <table width="1000" border="1" cellpadding="0" cellspacing="0" align="center" id="tablo4">

                            <tr>
                                <td  width="50" valign="center" bgcolor="#255625" class="style3"><p><strong>&nbsp;<?php echo $row->id?></p></td>
                                <td width="350" valign="center" bgcolor="#255625" class="style3"><p><strong>&nbsp;<?php  echo $row->username?> </p></td>
                                <td  width="200" valign="center" bgcolor="#255625" class="style3"><p><strong>&nbsp;<?php echo $row->passw?></p></td>
                                <td width="200" valign="center" bgcolor="#255625" class="style3"><p><strong>&nbsp; <?php echo $row->ad?> </p></td>
                                <td width="200" valign="center" bgcolor="#255625" class="style3"><p><strong>&nbsp; <?php echo $row->soyad?> </p></td>
                            </tr>




                        </table>



                        <?php

                    }
                }




                ?>

                <br>

                <center>     <a href="sistemcikis.php"><button type="button" class="btn btn-danger">ÇIKIŞ</button></a> </center>


                <br><br>



                <br><br><br><br>

            </div>
        </div>
    </div>
</div>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-6" id="">
                <p>Adres: KOÜ Mühendislik Fakültesi (B Blok) Bilgisayar Mühendisliği Umuttepe Yerleşkesi 41380 Kocaeli
                    <br>Tel: +90 (262) 303 35 60
                    <br>E-Posta: bilgisayar@kocaeli.edu.tr
                    <br>Web: http://bilgisayar.kocaeli.edu.tr
                    <br>Web istek görüş ve önerileriniz için : A. Burak İNNER / Hikmetcan ÖZCAN
                </p>
            </div>
        </div>
    </div>
</footer>

<script src="js/bootstrap.min.js"></script>

<script src="js/jquery.js"></script>

<script src="talate.js"></script>

</body>
</html>