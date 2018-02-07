<div class="content-wrapper py-3">

    <div style="margin: 15px; color: #00aced" class="breadcrumb"><h2>Yönetici Paneli</h2></div>

    <?php



    if (@$_POST["sil"]){

        $sil=$_POST["sil"];
        $y= implode(",",$sil);

        $toplu=$db->query("delete from konular where konu_id in($y)");

        if($toplu){
            echo "<div style=\"margin: 15px; \" class=\"breadcrumb\">Konular başarıyla silindi</div>";
            header("refresh:2; url=../administrator/?do=konular");
        }else{
            echo "<div style=\"margin: 15px; \" class=\"breadcrumb\">Konular silinmedi lütfen tekrardan deneyin</div>";
            header("refresh:2; url=../administrator/?do=konular");
        }
    }else{
        echo "<div style=\"margin: 15px; \" class=\"breadcrumb\">Konu silmek için lütfen silmek istediğiniz konunun kutucuğunu işaretleyin</div>";
        header("refresh:2; url=../administrator/?do=konular");
    }
    ?>
</div>