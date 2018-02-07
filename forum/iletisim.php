<?php

if($_POST){

    $isim=   strip_tags($_POST["isim"]);
    $baslik= strip_tags($_POST["baslik"]) ;
    $kime=   strip_tags($_POST["kime"]) ;
    $mesaj=  strip_tags($_POST["mesaj"]) ;

    if(!$isim || !$baslik || !$mesaj){
        echo "<div class='well'>Lütfen tüm alanları doldurduğunuzdan emin olunuz.</div>";

    }else{

        $kayit=$db->prepare("insert into mesajlar set                                                
                                                    mesaj_baslik=?,
                                                    mesaj_aciklama=?,
                                                    mesaj_gonderen=?,
                                                    mesaj_kime=?
                                                                          ");

        $k=$kayit->execute(array($baslik,$mesaj,$isim,$kime));

        if ($k){
            echo "<div class='well'>Mesaj başarıyla gönderildi.</div>";
        }else{
            echo "<div class='well'>Mesaj gönderilirken bir hata oluştu lütfen tekrar deneyin.</div>";
        }

    }

}else{

    if($_SESSION){

        ?>
        <h2 style="color: lightblue">İletisim Formu</h2><hr>
        <form action="" method="post">
            <div class="form-group">


                <input type="hidden" value="<?php echo $_SESSION["uye"];?>" name="isim" class="form-control" rows="5" id="comment"><br/>

                <label for="comment">Başlık:</label>
                <input  name="baslik" type="text" class="form-control " placeholder="Mesaj başlığını girin."><br>

                <label for="comment">Kime:</label><br>
                <select style="margin-bottom: 10px; margin-top: 10px; width: 100px;" name="kime">
                    <?php
                    $v= $db->prepare("select * from uyeler where uye_rutbe=?");
                    $v->execute(array(1));
                    $c=$v->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($c as $m){
                        echo "<option value=".$m["uye_id"]." >".$m["uye_adi"]."</option>";
                    }

                    ?>
                </select><br>

                <label for="comment">Mesajınız:</label>
                <textarea name="mesaj" class="form-control" rows="5" id="comment"></textarea><br/>

                <button  type="submit" class="btn btn-info">Gönder</button>
            </div>
        </form>
        <?php

    }else{

        ?>
        <h2 style="color: lightblue">İletisim Formu</h2><hr>
        <form action="" method="post">
            <div class="form-group">

                <label for="comment">Adınız:</label>
                <input name="isim" class="form-control" rows="5" type="text" id="comment"><br/>

                <label for="comment">Başlık:</label>
                <input  name="baslik" type="text" class="form-control " placeholder="Mesaj başlığını girin."><br>

                <label for="comment">Kime:</label><br>
                <select style="margin-bottom: 10px; margin-top: 10px; width: 100px;" name="kime">
                    <?php
                    $v= $db->prepare("select * from uyeler where uye_rutbe=?");
                    $v->execute(array(1));
                    $c=$v->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($c as $m){
                        echo "<option value=".$m["uye_id"]." >".$m["uye_adi"]."</option>";
                    }

                    ?>
                </select><br>

                <label for="comment">Mesajınız:</label>
                <textarea name="mesaj" class="form-control" rows="5" id="comment"></textarea><br/>

                <button  type="submit" class="btn btn-info">Gönder</button>
            </div>
        </form>
        <?php

    }


}
?>