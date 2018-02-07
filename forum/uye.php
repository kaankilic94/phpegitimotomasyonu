<?php

if($_SESSION){

    ?>

    <div class="well">
        <h4>Uye: <?php echo $_SESSION["uye"]; ?></h4><hr>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                   <?php

                   if($_SESSION["rutbe"]==1){

                       echo " <li><a href='../adminler'>Moderatör Paneli</a><hr></li>";
                   }elseif($_SESSION["rutbe"]==2){
                       echo " <li><a href='../administrator'>Yönetici Paneli</a><hr></li>";
                   }

                   ?>
                    <li><a href="?do=profil&uye=<?php echo $_SESSION["uye"];?>">Profil</a>
                    </li>
                    <hr>
                    <li><a href="?do=konu_ekle">Konu Ekle</a>
                    </li>
                    <hr>
                    <li><a href="?do=mesaj">Mesajlar</a>
                        <?php
                        $v=$db->prepare("select * from mesajlar where mesaj_kime=? and mesaj_okunma=?");
                        $v->execute(array($_SESSION["id"],0));
                        $v->fetchAll(PDO::FETCH_ASSOC);
                        $x=$v->rowCount();
                        echo $x;
                        ?>
                    </li>
                    <hr>
                    <li><a href="?do=cikis">Çıkış</a>
                    </li>
                </ul>
            </div>
            <!-- /.col-lg-6 -->

            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>


    <?php


}else{

    ?>

    <div class="well">

        <form action="?do=uye" method="post">
            Kullanıcı adı:
            <input type="text" name="name" class="form-control">
            Parola:
            <input type="password" name="sifre" class="form-control"><br/>
            <button type="submit" class="btn btn-success">Giriş</button>
        </form>

    </div>

     <?php
}

?>

