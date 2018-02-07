
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<nav id="topnav" class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs_example_generic">
            <ul class="nav navbar-nav navbar-right" id="erymz">
                <li>
                    <a href="index.php"><i class="glyphicon glyphicon-home"></i> </a>
                </li>

                <li>
                    <a href="iletisim.php">İLETİŞİM</a>
                </li>

            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="brand">KOCAELİ</div>
<div class="brand">EĞİTİM</div>
<div class="brand"><a href="index.php"> <img src="img/kou-logo.jpg" class="img-circle" id="imgcrc"/> </a></div>



<nav class="navbar navbar-default" role="navigation" id="mynav">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
            <a class="navbar-brand" href="index.php">ANASAYFA</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-left" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav" id="myul">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">HAKKIMIZDA
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu navbar-left">
                        <li><a href="hakkinda.php">Hakkımızda</a> </li>
                        <li><a href="tarihce.php">Tarihçe</a></li>
                        <li><a href="misyon.php">Misyon</a> </li>
                        <li><a href="vizyon.php">Vizyon</a> </li>
                        <li><a href="iletisim.php">İletişim</a> </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Soru ÇÖZ!
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu navbar-left">
                        <li><a href="testyaz.php">Matematik</a> </li>
                        <li><a href="tarihyaz.php">Tarih</a></li>
                        <li><a href="sosyalyaz.php">Coğrafya</a> </li>
                        <li><a href="fenyaz.php">Fen Bilimleri</a> </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Videolar
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu navbar-left">
                        <li><a href="matvideoview.php">Matematik</a> </li>
                        <li><a href="tarihvideoview.php">Tarih</a></li>
                        <li><a href="sosyalvideoview.php">Coğrafya</a> </li>
                        <li><a href="fenvideoview.php">Fen Bilimleri</a> </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">PERSONEL
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu navbar-left">
                        <li><a href="ogretimuyeleri.php">Öğretim Üyeleri</a> </li>
                        <li><a href="idaripersonel.php">İdari Personel</a> </li>
                        <li><a href="sistemgiris.php">Sistem Giriş</a> </li>
                    </ul>
                </li>

                <li><a href="../kou/forum/index.php">FORUM</a> </li>
            </ul>

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-md-12">
                <div class="panel panel-default" id="dyurusayfasi">
                    <div class="panel-heading" id="panelheadayarla">
                        <h3> TÜM GENEL DUYURULAR</h3>
                    </div>
                    <?php


                    error_reporting(0);
                    session_start();



                    $baglan= @new mysqli("localhost","root","","kou");

                    mysqli_set_charset($baglan, "utf8");

                    $i=0;
                    $j=date('d')."-".date('m')."-".date('Y');


                    if($baglan->connect_error)
                    {
                        die ("Hata: ". $baglan->connect_error );
                    }
                    else
                    {
                        $query= $baglan->query("SELECT * FROM genelduyurular,admin WHERE idno=id ORDER BY tarih DESC");

                        while( $row = $query->fetch_object())
                        {
                            $x[$i]= $row->tarih;
                            $y[$i]= $row->duyurubaslik;
                            $z[$i]= $row->duyuruicerik;


                            if($row->yil > date('Y'))
                            {
                                ?>

                                <div class="panel-body" id="panelbodyayarla<?php  if($i%2==0)echo 2;  ?>">
                                    <div class="col-md-3">

                                        <i class="fa fa-calendar fa-3x"></i>
                                        <br><br>
                                        <p  class="tarihayarla"><?php echo $row->tarih; ?> </p>

                                    </div>
                                    <div class="col-md-9">
                                        <p id="pnltxt"><a href="#duyurubas<?php echo $i; ?>" data-toggle="modal"> <?php  echo $row->duyurubaslik;  ?></a></p>
                                        <br><br> <p><?php  echo $row->uzman,$row->ad;  ?></p>


                                        <div class="modal fade col-lg-4 col-md-4 col-sm-6 col-xs-10 col-lg-offset-4 col-md-offset-4 col-sm-offset-3 col-xs-offset-1" style="overflow: auto;" id="duyurubas<?php echo $i; ?>" role="dialog" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog" id="modalbas">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <?php  echo $row->duyurubaslik;  ?>
                                                    </div>
                                                </div>
                                                <div class="modal-body">
                                                    <?php echo $row->duyuruicerik; ?>
                                                    <?php touch("files/$row->duyurulink") ?>
                                                    <h4>EK:<a href="files/<?php echo $row->duyurulink; ?>"><p>İndir</p></a></h4>
                                                    <br><br><br><br><br><br>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" data-dismiss="modal">Kapat</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                $i++;
                            }
                            else if ($row->yil == date('Y'))
                            {
                                if($row->ay > date('m'))
                                {
                                    ?>

                                    <div class="panel-body" id="panelbodyayarla<?php  if($i%2==0)echo 2;  ?>">
                                        <div class="col-md-3">

                                            <i class="fa fa-calendar fa-3x"></i>
                                            <br><br>
                                            <p  class="tarihayarla"><?php echo $row->tarih; ?> </p>

                                        </div>
                                        <div class="col-md-9">
                                            <p id="pnltxt"><a href="#duyurubas<?php echo $i; ?>" data-toggle="modal"> <?php  echo $row->duyurubaslik;  ?></a></p>
                                            <br><br> <p><?php  echo $row->uzman,$row->ad;  ?></p>


                                            <div class="modal fade col-lg-4 col-md-4 col-sm-6 col-xs-10 col-lg-offset-4 col-md-offset-4 col-sm-offset-3 col-xs-offset-1" style="overflow: auto;" id="duyurubas<?php echo $i; ?>" role="dialog" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog" id="modalbas">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <?php  echo $row->duyurubaslik;  ?>
                                                        </div>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php echo $row->duyuruicerik; ?>
                                                        <?php touch("files/$row->duyurulink") ?>
                                                        <h4>EK:<a href="files/<?php echo $row->duyurulink; ?>"><p>İndir</p></a></h4>
                                                        <br><br><br><br><br><br>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-success" data-dismiss="modal">Kapat</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    $i++;
                                }
                                elseif ($row->ay == date('m'))
                                {
                                    if($row->gun >= date('d') )
                                    {
                                        ?>

                                        <div class="panel-body" id="panelbodyayarla<?php  if($i%2==0)echo 2;  ?>">
                                            <div class="col-md-3">

                                                <i class="fa fa-calendar fa-3x"></i>
                                                <br><br>
                                                <p  class="tarihayarla"><?php echo $row->tarih; ?> </p>

                                            </div>
                                            <div class="col-md-9">
                                                <p id="pnltxt"><a href="#duyurubas<?php echo $i; ?>" data-toggle="modal"> <?php  echo $row->duyurubaslik;  ?></a></p>
                                                <br><br> <p><?php  echo $row->uzman,$row->ad;  ?></p>


                                                <div class="modal fade col-lg-4 col-md-4 col-sm-6 col-xs-10 col-lg-offset-4 col-md-offset-4 col-sm-offset-3 col-xs-offset-1" style="overflow: auto;" id="duyurubas<?php echo $i; ?>" role="dialog" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog" id="modalbas">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <?php  echo $row->duyurubaslik;  ?>
                                                            </div>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?php echo $row->duyuruicerik; ?>
                                                            <?php touch("files/$row->duyurulink") ?>
                                                            <h4>EK:<a href="files/<?php echo $row->duyurulink; ?>"><p>İndir</p></a></h4>
                                                            <br><br><br><br><br><br>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-success" data-dismiss="modal">Kapat</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                        $i++;
                                    }
                                }

                            }

                        }
                    }


                    ?>


                </div>
            </div>
        </div>
    </div>
</div>


<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 text-center" id="">
                <p>
                    Adres: KOÜ Mühendislik Fakültesi (B Blok) Bilgisayar Mühendisliği Umuttepe Yerleşkesi 41380 Kocaeli
                    <br>E-Posta: kaan.kilic53@gmail.com/kubilaygorkemli@gmail.com
                    <br>Web istek görüş ve önerileriniz için : Kaan Kılıç/Kubilay Görkemli
                </p>
            </div>
            <div class="col-lg-4">

            </div>
            <div class="col-lg-4">

            </div>
        </div>
    </div>
</footer>
<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<script src="script.js"></script>

</body>

</html>

