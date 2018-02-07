<div class="content-wrapper py-3">

    <div style="margin: 15px; color: #00aced" class="breadcrumb"><h2>Yönetici Paneli</h2></div>

    <?php



    if (@$_POST["sil"]){

        $sil=$_POST["sil"];
        $y= implode(",",$sil);

        $toplu=$db->query("delete from kategoriler where kategori_id in($y)");

        if($toplu){
            echo "<div style=\"margin: 15px; \" class=\"breadcrumb\">Kategoriler başarıyla silindi</div>";
            header("refresh:2; url=../administrator/?do=kategoriler");
        }else{
            echo "<div style=\"margin: 15px; \" class=\"breadcrumb\">Kategoriler silinmedi lütfen tekrardan deneyin</div>";
            header("refresh:2; url=../administrator/?do=kategoriler");
        }
    }else{
        echo "<div style=\"margin: 15px; \" class=\"breadcrumb\">Kategorileri silmek için lütfen silmek istediğiniz kategorinin kutucuğunu işaretleyin</div>";
        header("refresh:2; url=../administrator/?do=kategoriler");
    }
    ?>
</div>