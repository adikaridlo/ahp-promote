<?php 
use yii\helpers\Html;
use app\models\Users;
?>
<style type="text/css">
    #mainNav .navbar-nav>li.nav-item>a.nav-link:hover {
        color: #fff!important;
        border-color: #eee #eee #ddd;
        background-color: #f05f40;
        border-radius: 25px;
    }

    #mainNav .navbar-nav>li.nav-item>a.nav-link.active, #mainNav .navbar-nav>li.nav-item>a.nav-link:focus.active {
        color: #fff!important;
        border-color: #eee #eee #ddd;
        border-radius: 25px;
        background-color: #f05f40;
    }

    #mainNav .navbar-nav>li.nav-item>a.nav-link.active:hover, #mainNav .navbar-nav>li.nav-item>a.nav-link:focus.active:hover {
        background-color: #f05f40;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav" style="background-color: white;color:black">
    <div class="container-fluid">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
            <?=Html::img(Yii::getAlias('@web/theme/assets/mom_asset/Landing Pages/Logo.png'))?> 
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"> 
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#page-top">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#tentang-kami">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#services">Layanan & Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#footer">Hubungi Kami</a>
                </li>
                <?php if (!Yii::$app->user->isGuest) { ?>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="/dashboard">Dashboard</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="/site/login">Login</a>
                    </li>
                <?php }?>
            </ul>
        </div>
    </div>
</nav>