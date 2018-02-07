

<?php


if($_SESSION){

    if($_POST){

        $kime=$_POST["kime"];
        $gonderen=$_POST["gonderen"];
        $baslik=$_POST["baslik"];
        $mesaj=$_POST["mesaj"];

        if(!$kime || !$baslik || !$mesaj){

            echo "<div class='well'>Lütfen tüm alanları doldurduğunuzdan emin olun.</div>";

        }else{

            $v=$db->prepare("select * from uyeler where uye_adi=?");
            $v->execute(array($kime));
            $m=$v->fetch(PDO::FETCH_ASSOC);
            $x=$v->rowCount();

            if($x){

                $kayit=$db->prepare("insert into mesajlar SET                                                 
                                                    mesaj_kime=?,
                                                    mesaj_gonderen=?,
                                                    mesaj_baslik=?,
                                                    mesaj_aciklama=?
                                                                          ");

                $k= $kayit->execute(array($m["uye_id"],$gonderen,$baslik,$mesaj));

                if($k){
                    echo "<div class='well'>Mesajınız başarıyla gönderildi.</div>";
                    header("refresh: 2 ;url=?do=mesaj");

                }else{
                    echo "<div class='well'>Mesaj gönderilemedi lütfen tekrar deneyin.</div>";

                }



            }
            else{

                echo "<div class='well'><span style='color: green'>".$kime."</span> kullanıcı adı kayıtlı değil. </div>";
            }


        }



    }else{



        ?>

        <h2 style="color: lightblue"> Mesaj Gönder</h2><hr>
        <form action="" method="post">
            <div class="form-group">

                <label for="comment">Kime:</label>
                <input name="kime" id="input" class="form-control" rows="5" type="text" >
                <div class="uyeler" style="background: lightgray;"></div><br>

                <input  name="gonderen" value="<?php echo $_SESSION["uye"];?>" type="hidden" class="form-control">

                <label for="comment">Başlık:</label>
                <input  name="baslik" type="text" class="form-control " placeholder="Mesaj başlığını girin."><br>

                <label for="comment">Mesajınız:</label>
                <textarea name="mesaj" class="ckeditor" rows="5" id="comment"></textarea><br/>

                <button  type="submit" class="btn btn-info">Gönder</button>
            </div>
        </form>


        <?php

    }


}else{


    echo "<div class='well'>Lütfen mesaj göndermek için üye olun.</div>";
}



?>