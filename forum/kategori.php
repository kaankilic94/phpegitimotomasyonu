<div class="well">
    <h4>Kategoriler</h4>
    <div class="row">
        <div class="col-lg-6">
            <ul class="list-unstyled">
<?php

$kategori=$db->prepare("select * from kategoriler");
$kategori->execute(array());
$v=$kategori->fetchAll(PDO::FETCH_ASSOC);
$x=$kategori->rowCount();

if($x){
        foreach ($v as $m){

            echo '<li><a href="?do=kategori&id='.$m["kategori_id"].'">'.$m["kategori_adi"].'</a></li>';

        }
}else{



}

?>







            </ul>
        </div>
        <!-- /.col-lg-6 -->

        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>