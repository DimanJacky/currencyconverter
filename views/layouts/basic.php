<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\controllers\LearningController;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Конвертер курса валюты</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Voguish Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!-- header -->
<div class="container">
    <div class="header">
        <div class="logo">
            <a href="/"><img src="web/images/logo.png" class="img-responsive" alt=""></a>
        </div>

        <div class="head-nav">
            <span class="menu"> </span>
            <ul class="cl-effect-1">
                <li><a href="/">Выгрузка курсов</a></li>
                <li><a href="/currency">Курсы по датам</a></li>
                <li><a href="/currency/convert">Конвертация</a></li>
                <li><a href="/currency/compare">Сравнение курса</a></li>
                <div class="clearfix"></div>
            </ul>
        </div>
       <div class="clearfix"> </div>
    </div>
</div>
<!-- header -->
<!-- Blog -->
<div class="container">
    <div class="blog">

        <div class="blog-content">
            <div class="blog-content-left">
                <?= $content; ?>
            </div>
            <div class="blog-content-right">
<!--                <div class="b-search">-->
<!--                    <form id="searcharticle" action="--><?//= \yii\helpers\Url::to(['search/index']) ?><!--">-->
<!--                        <input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" name="q">-->
<!--                        <input type="submit" value="">-->
<!--                    </form>-->
<!--                </div>-->
                <!--start-twitter-weight-->
                <div class="twitter-weights">
                    <h3>Курс на сегодня</h3>
                    <div class="twitter-weight-grid">

                        <p> </p>

                        <table>
                            <tr>
                                <td><h4 style="color: #333; margin: 10px;">Доллар</h4></td>
                                <td><h4 style="color: #333;"><strong><?php $this->getUSD() ?></strong></h4></td>
                                <td><h4 style="color: #333;"> руб.</h4></td>
                            </tr>
                            <tr>
                                <td><h4 style="color: #333; margin: 10px;">Евро</h4></td>
                                <td><h4 style="color: #333;"><strong><?php $this->getEUR() ?></strong></h4></td>
                                <td><h4 style="color: #333;"> руб.</h4></td>
                            </tr>
                        </table>

                    </div>
<!--                    <div class="twitter-weight-grid">-->
<!--                        <h4><span> </span>John Doe</h4>-->
<!--                        <p>Lorem ipsum dolor sit amet, consectetur elit,labore et dolore magna aliqua. <a href="#">http://t.co/h12k</a></p>-->
<!--                        <i><a href="#">2 days ago</a></i>-->
<!--                    </div>-->
<!--                    <a class="twittbtn" href="#">See all Tweets</a>-->
                </div>
                <!--//End-twitter-weight-->
                <!-- start-tag-weight-->
<!--                <div class="b-tag-weight">-->
<!--                    <h3>Tags Weight</h3>-->
<!--                    <ul>-->
<!--                        <li><a href="#">Lorem</a></li>-->
<!--                        <li><a href="#">consectetur</a></li>-->
<!--                        <li><a href="#">dolore</a></li>-->
<!--                        <li><a href="#">aliqua</a></li>-->
<!--                        <li><a href="#">sit amet</a></li>-->
<!--                        <li><a href="#">ipsum</a></li>-->
<!--                        <li><a href="#">Lorem</a></li>-->
<!--                        <li><a href="#">consectetur</a></li>-->
<!--                        <li><a href="#">dolore</a></li>-->
<!--                        <li><a href="#">aliqua</a></li>-->
<!--                        <li><a href="#">sit amet</a></li>-->
<!--                        <li><a href="#">ipsum</a></li>-->
<!--                    </ul>-->
<!--                </div>-->
                <!---- //End-tag-weight---->
            </div>
            <div class="clearfix"> </div>

        </div>
    </div>
    <!-- /Blog -->

    <div class="footer">
        <div class="col-md-3 foot-1">
<!--            <h4>Quick Links</h4>-->
<!--            <ul>-->
<!--                <li><a href="#">||   Lorem Ipsum passage</a></li>-->
<!--                <li><a href="#">||   Finibus Bonorum et</a></li>-->
<!--                <li><a href="#">||   Treatise on the theory</a></li>-->
<!--            </ul>-->
        </div>
        <div class="col-md-3 foot-1">
<!--            <h4>Favorite Resources</h4>-->
<!--            <ul>-->
<!--                <li><a href="#">||   Characteristic words</a></li>-->
<!--                <li><a href="#">||   combined with a handful</a></li>-->
<!--                <li><a href="#">||   which looks reasonable</a></li>-->
<!--            </ul>-->
        </div>
        <div class="col-md-3 foot-1">
<!--            <h4>About Us</h4>-->
<!--            <ul>-->
<!--                <li><a href="#">||  Even slightly believable</a></li>-->
<!--                <li><a href="#">||  Hidden in the middle</a></li>-->
<!--                <li><a href="#">||  Ipsum therefore always</a></li>-->
<!--            </ul>-->
        </div>
        <div class="col-md-3 foot-1">
<!--            <h4>Custom Menu</h4>-->
<!--            <ul>-->
<!--                <li><a href="#">||  Internet tend to repeat</a></li>-->
<!--                <li><a href="#">||  Alteration in some form</a></li>-->
<!--                <li><a href="#">||  This book is a treatise</a></li>-->
<!--            </ul>-->
        </div>

        <div class="clearfix"> </div>
        <div class="copyright">
<!--            <p>Copyrights © 2015 Voguish All rights reserved | Template by <a href="http://w3layouts.com/">W3layouts</a></p>-->
        </div>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>