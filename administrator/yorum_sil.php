<div class="content-wrapper py-3">

    <div style="margin: 15px; color: #00aced" class="breadcrumb"><h2>Yönetici Paneli</h2></div>

    <?php



    if (@$_POST["sil"]){

        $sil=$_POST["sil"];
        $y= implode(",",$sil);

        $toplu=$db->query("delete from yorumlar where yorum_id in($y)");

        if($toplu){
            echo "<div style=\"margin: 15px; \" class=\"breadcrumb\">Yorumlar başarıyla silindi</div>";
            header("refresh:2; url=../administrator/?do=yorumlar");
        }else{
            echo "<div style=\"margin: 15px; \" class=\"breadcrumb\">Yorumlar silinmedi lütfen tekrardan deneyin</div>";
            header("refresh:2; url=../administrator/?do=yorumlar");
        }
    }else{
        echo "<div style=\"margin: 15px; \" class=\"breadcrumb\">Yorum silmek için lütfen silmek istediğiniz yorumun kutucuğunu işaretleyin</div>";
        header("refresh:2; url=../administrator/?do=yorumlar");
    }
    ?>
</div>