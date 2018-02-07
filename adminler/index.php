<?php session_start(); ?>
<?php include "../forum/ayar.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../img/logo.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>Moderatör Paneli</title>



    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

<?php

if($_SESSION){

    if($_SESSION["rutbe"]==1){

        ?>
        <!-- Navigation -->
        <nav id="mainNav" class="navbar static-top navbar-toggleable-md navbar-inverse bg-inverse">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="../forum">Forum</a>
            <div class="collapse navbar-collapse" id="navbarExample">
                <ul class="sidebar-nav navbar-nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="?do=anasayfa"><i class="fa fa-home"></i> Anasayfa</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="?do=uyeler"><i class="fa fa-user"></i> Üyeler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?do=kategoriler"><i class="fa fa-folder"></i> Kategoriler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?do=konular"><i class="fa fa-hashtag"></i> Konular</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?do=yorumlar"><i class="fa fa-eye"></i> Yorumlar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?do=cikis"><i class="fa fa-sign-out"></i> Çıkış</a>
                    </li>


                </ul>
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="../forum/?do=profil&uye=<?php echo $_SESSION["uye"];?>"><i class="fa fa-fw fa-sign-out"></i> <?php echo $_SESSION["uye"];?></a>
                    </li>
                </ul>
            </div>
        </nav>

         <?php

         $do=@$_GET["do"];

         if(file_exists("{$do}.php")){
             include  "{$do}.php" ;
         }else{
             include "anasayfa.php";
         }


         ?>


        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>

        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/tether/tether.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="vendor/chart.js/Chart.min.js"></script>
        <script src="vendor/datatables/jquery.dataTables.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

        <!-- Custom scripts for this template -->
        <script src="js/sb-admin.min.js"></script>
        <?php

    }else{
        echo " <div style=\"margin: 15px;\" class=\"breadcrumb\">Admin yetkiniz olmadan bu sayfaya ulaşamazsınız.</div>";
    }

}else{

    echo " <div style=\"margin: 15px;\" class=\"breadcrumb\">Lütfen üyeliğinizle giriş yapın. </div>";
}
?>

</body>

</html>
