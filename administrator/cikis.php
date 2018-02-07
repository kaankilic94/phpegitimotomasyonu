<div class="content-wrapper py-3">
    <div style="margin: 15px; color: #00aced; " class="breadcrumb">


        <h5>Başarıyla çıkış yapıldı. Forum anasayfasına yönlendiriliyorsunuz.</h5>

        <?php

        session_destroy();
        header("refresh:2;url=../forum/");
        ?>





        </div>
    </div>