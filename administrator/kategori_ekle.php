<div class="content-wrapper py-3">

    <div style="margin: 15px; color: #00aced" class="breadcrumb"><h2>Kategori Ekle</h2></div>

    <?php
    if($_POST){

        $isim=$_POST["isim"];
        $aciklama=$_POST["aciklama"];

       if(!$isim || !$aciklama){
           echo "<div style=\"margin: 15px; \" class=\"breadcrumb\">Lütfen tüm alanları doldurunuz.</div>";

       }else{
          $r=$db->prepare("select * from kategoriler where kategori_adi=?");
           $r->execute(array($isim));
           $t=$r->fetchAll(PDO::FETCH_ASSOC);
           $k=$r->rowCount();

           if($k){

               echo "<div style=\"margin: 15px; \" class=\"breadcrumb\"><span style='color: green'>$isim</span> kategori adı zaten var, lütfen başkar bir kategori adı giriniz.</div>";



           }else{
               $x=$db->prepare("insert into kategoriler set
                                       kategori_adi=?,
                                       kategori_aciklama=?");
               $x->execute(array($isim,$aciklama));
               $y=$x->rowCount();
               if ($y){
                   echo "<div style=\"margin: 15px; \" class=\"breadcrumb\">Kategori başarıyla eklenmiştir.</div>";
                   header("refresh:1;url=/kou/administrator/?do=kategoriler");
               }else{
                   echo "<div style=\"margin: 15px; \" class=\"breadcrumb\">Kategori eklenirken bir hata oluştu. Lütfen tekrar deneyin.</div>";
               }



           }

       }


    }else{

        ?>

        <form action="" method="post">

            <div style="margin: 28px;" class="form-group">

                <label for="comment">Kategori Adı:</label>
                <input name="isim" type="text" class="form-control"><br>

                <label for="comment">Açıklama:</label>
                <textarea name="aciklama" class="form-control" rows="5" id="comment"></textarea><br/>



                <button  type="submit" class="btn btn-info">Gönder</button>
            </div>
        </form>

        <?php

    }
    ?>



</div>