<div class="well">
    <h4>Popüler Konular</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">
    <?php

     $v=$db->prepare("select * from konular where konu_durum=? order by konu_hit desc limit 4 ");
     $v->execute(array(1));
     $pop=$v->fetchAll(PDO::FETCH_ASSOC);
     $x=$v->rowCount();

    if($x){

        foreach ($pop as $m){

            echo " <li><a href='?do=devam&id=".$m["konu_id"]."'> ".$m["konu_baslik"]."</a> <li/>";
        }
    }

    ?>







            </ul>
        </div>
        <!-- /.col-lg-6 -->

        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>