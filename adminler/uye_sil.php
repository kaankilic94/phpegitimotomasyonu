<div class="content-wrapper py-3">

    <div style="margin: 15px; color: #00aced" class="breadcrumb"><h2>Admin Paneli</h2></div>

    <?php



    if (@$_POST["sil"]){

        $sil=$_POST["sil"];
        $y= implode(",",$sil);

        $toplu=$db->query("delete from uyeler where uye_id in($y)");

        if($toplu){
            echo "<div style=\"margin: 15px; \" class=\"breadcrumb\">Üyeler başarıyla silindi</div>";
            header("refresh:2; url=../adminler/?do=uyeler");
        }else{
            echo "<div style=\"margin: 15px; \" class=\"breadcrumb\">Üyeleri silinmedi lütfen tekrardan deneyin</div>";
            header("refresh:2; url=../adminler/?do=uyeler");
        }
    }else{
        echo "<div style=\"margin: 15px; \" class=\"breadcrumb\">Üyeleri silmek için lütfen silmek istediğiniz yorumun kutucuğunu işaretleyin</div>";
        header("refresh:2; url=../adminler/?do=uyeler");
    }
    ?>
</div>