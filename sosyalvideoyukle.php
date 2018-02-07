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



<div class="brand">KOCAELİ </div>
<div class="brand">EĞİTİM</div>
<div class="brand"><a href="index.php"> <img src="img/kou-logo.jpg" class="img-circle" id="imgcrc"/> </a></div>

<?php
include 'connect.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-18">
            <div class="box">
                <form method="post" enctype="multipart/form-data">
                    <?php
                    $o=1;
                    $sorgu=$veritabani->query("SELECT * FROM sosyalvideos");

                    while($row = $sorgu->fetch_object())
                    {
                        if($row->id)
                        {
                            $o= $o + $row->id;
                        }
                    }
                    if(isset($_FILES['video'])){
                        $name=$_FILES['video']['name'];
                        $type= explode('.',$name);
                        $type=end($type);
                        $size= $_FILES['video']['size'];
                        $random_name=rand();
                        $tmp=$_FILES['video']['tmp_name'];

                        if ($type !='mp4' && $type != 'MP4' && $type !='avi'){
                            $message ="Video formatı desteklenmiyor!";
                        }else{
                            move_uploaded_file($tmp, 'videos/'.$random_name.'.'.$type);
                            //mysqli_query("INSERT INTO videos VALUES ('', '$name','videos/$random_name.$type')");
                            // $veritabani->query("INSERT INTO videos(id,namee,url) VALUES ('', '$name','videos/$random_name.$type')");
                            $query = "INSERT INTO sosyalvideos(id,namee,url) VALUES ('$o', '$name','$random_name.$type')";
                            $veritabani->query($query);
                            // mysqli_query($con,"SELECT * FROM videos");
                            //mysqli_query($con,"INSERT INTO videos (id,namee,url) VALUES ('', '$name','videos/$random_name.$type')") ;

                            $message="Video başarıyla upload edildi!";
                        }
                        echo "$message <br/><br/>";

                    }

                    ?>
                    Video Seçiniz:<br/>
                    <input  type="file" name="video">
                    <br/><br/>

                    <button type="submit" class="btn btn-success" value="Upload" >YÜKLE</button>
                    <a href="sistemcikis.php"><button type="button" class="btn btn-danger">ÇIKIŞ</button></a>
                </form>


                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            </div>
        </div>
    </div>
</div>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-center" id="" >
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