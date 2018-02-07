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



<div class="brand">KOCAELİ ÜNİVERSİTESİ</div>
<div class="brand">BİLGİSAYAR MÜHENDİSLİĞİ</div>
<div class="brand"><a href="index.php"> <img src="img/kou-logo.jpg" class="img-circle" id="imgcrc"/> </a></div>

<div class="container">
    <div class="row">
        <div class="col-md-18">
            <div class="box" id="bx">

                <br><br>

                <h2 class="intro-text text-center trhcep">COĞRAFYA SORUSU EKLE</h2>
                <hr>

                <br><br><br>

                <p class="text-success"><span class="glyphicon glyphicon-ok"></span> Coğrafya sorusu başarıyla eklendi.</p>

                <form action="sosyaleklevt.php" method="post">

                    Soru: <br/>
                    <input type="text" class="form-control" name="soru" /><br/>
                    A: <br/>
                    <input type="text" class="form-control" name="cevapa" /><br/>
                    B: <br/>
                    <input type="text" class="form-control" name="cevapb" /><br/>
                    C: <br/>
                    <input type="text" class="form-control" name="cevapc" /><br/>
                    D: <br/>
                    <input type="text" class="form-control" name="cevapd" /><br/>
                    <input type="radio" name="sonuc" value="a" /> A
                    <input type="radio" name="sonuc" value="b" /> B
                    <input type="radio" name="sonuc" value="c" /> C
                    <input type="radio" name="sonuc" value="d" /> D
                    <br/>


                    <button type="submit" class="btn btn-success">EKLE</button>
                    <a href="sistemcikis.php"><button type="button" class="btn btn-danger">ÇIKIŞ</button></a>
                </form>

                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

            </div>
        </div>
    </div>
</div>


<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-6" id="fotext">
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