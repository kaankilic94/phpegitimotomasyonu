<?php include "ayar.php"; ?>
<?php session_start(); ob_start();?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
    <link rel="icon" href="../img/logo.png">

    <title>Koü Eğitim</title>
    <link href="css/styles.css" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-home.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Jquery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript">
        $(function(){


            $("#uyeler").hide();
            $("#input").keyup(function(){//inputa yazı yazılırsa

                var uyeadi=$(this).val();//yazılanı al

                $.post("ajax.php",{"uyeadi":uyeadi},function(al){ //ajax.php ye gönder

                    $(".uyeler").html(al);//yazdır

                });

            });

        });



        function tamamla(al){//tıklandığında veriyi al

            $("#input").val(al);//inputa yazdır

            $(".uyeler").text("");//divi temizle

        }

    </script>
    <!-- Jquery -->


</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Anasayfa</a>

        </div>



        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href='../index.php'>Kou Eğitim</a></li>
                <li><a href='?do=iletisim'>İletisim</a></li>

             <?php
             if(!$_SESSION){
                 echo " <li><a href='?do=kayit'>Kayıt Ol</a></li>";
             }
             ?>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                Koü Eğitim Forum
            </h1>

            <?php

            $do=@$_GET["do"];

            switch ($do){

                case "iletisim":
                    include "iletisim.php";
                    break;
                case "kategori":
                    include "kategori_liste.php";
                    break;
                case "ara":
                    include "ara.php";
                    break;
                case "uye":
                    include "uye_giris.php";
                    break;
                case "konu_ekle":
                    include "konu_ekle.php";
                    break;
                case "kayit":
                    include "kayit.php";
                    break;
                case "profil":
                    include "profil.php";
                    break;
                case "mesaj":
                    include "mesaj.php";
                    break;
                case "mesaj_oku":
                    include "mesaj_oku.php";
                    break;
                case "mesaj_gonder":
                    include "mesaj_gonder.php";
                    break;
                case "mesaj_sil":
                    include "mesaj_sil.php";
                    break;
                case  "profil_duzenle":
                    include "profil_duzenle.php";
                    break;
                case "profil_mgonder":
                    include "profil_mgonder.php";
                    break;
                case "cikis":
                    session_destroy();
                    header("refresh: 2; url=index.php");
                    echo"<div class='well'> Başarıyla çıkış yaptınız. Anasayfaya yönlendiriliyorsunuz.</div>";
                    break;
                case "devam":
                    include "devam.php";
                    break;


                default:
                    include "anasayfa.php";
                    break;

            }

            ?>




            <!-- Pager -->


        </div>

        <!-- Blog Sidebar Widgets Column -->

        <div class="col-md-4">

           <?php include "uye.php";?>
            <!-- Blog Search Well -->
            <div class="well">
                <h4>Site içi arama</h4>
                <form action="?do=ara" method="post">
                <div class="input-group">
                    <input style="height: 39px;" type="text" name="ara" class="form-control">
                    <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                </div></form>
                <!-- /.input-group -->
            </div>



            <!-- Blog Categories Well -->
           <?php  include "kategori.php";?>

            <?php include "populer_konular.php";?>

            <!-- Side Widget Well -->


        </div>

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Kocaeli Üniversitesi @ 2017</p>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </footer>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>

