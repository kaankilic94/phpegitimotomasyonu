<?php ob_start();?>
<nav id="topnav" class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right" id="bs_example_navbar-collapse">
            <ul class="nav navbar-nav navbar-right" id="erymz">
                <li class>
                    <a href="index.php"><i class="glyphicon glyphicon-home"></i> </a>
                </li>

                <li>
                    <a href="iletisim.php">İLETİŞİM</a>
                </li>

                <?php

                if (!$_SESSION){

                    echo "<li><a href='?do=kayit'>KAYIT OL</a></li>" ;
                }


                ?>

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
                <li class="dropdown">


                        <li><a href="indexforum.php">FORUM</a> </li>

                </li>
            </ul>


        </div>
        <form action="?do=ara" method="post" style="padding: 32px;">
            <span><input type="text" name="ara" style="width:175px; height: 25px; " />
                <button type="submit" style="height: 25px; padding: 2px;">ara</button></span>
        </form>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
