<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8" dir="rtl">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
</head>
<body>
<header>
    <div class="top-header">
        <ul class="social-media header-social">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
            <li><a href="#"><i class="fa fa-rss"></i></a></li>
        </ul>
        <p class="text-left white-font md-font half-padding table-left">
            <a href="" class="md-font white-link"> إتصل بنا</a>
            -
            <a href="" class="md-font white-link"> من نحن</a>
        </p>
        <p class="text-right white-font md-font half-padding table-right">
            <a href="" class="md-font white-link text-right right"><i class="lock-cust"></i>تسجيل الدخول</a>
        </p>
    </div>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand main-logo" href="#"></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav alg-left">
                    <li class="active"><a href="#">الرئيسية <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">مشروعات  </a></li>
                    <li><a href="#"> تصفيات </a></li>
                    <li><a href="#">عروض وفرص </a></li>
                    <li><a href="#">لمقالات</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<?php $this->beginBody() ?>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 grey-border round-corner internal-sub-header btm-mrg-sm">
            <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12 def-padding-sm">
                <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                    <img src="/images/logged-user.jpg" class="round-corner justified-img">
                </div>
                <div class="col-md-8 col-lg-8 col-xs-12 col-sm-12 ">
                    <p class="orange-font md-lg-font text-right">طارق عبدالغني المليجي</p>
                    <p class="grey-font md-font text-right">مبرمج جافا أول ومحرر تقني</p>
                </div>
            </div>
            <div class="col-md-8 col-lg-8 col-xs-12 col-sm-12 def-padding-sm justified-div">
                <a href="#" class="header-btn md-font grey-font"><i class="btn-ico cash"></i>الرصيد  </a>
                <a href="#" class="header-btn md-font grey-font"><i class="btn-ico light"><span class="notification green">2</span></i> الفرص</a>
                <a href="#" class="header-btn md-font grey-font"><i class="btn-ico case"><span class="notification green">7</span></i> المشروعات</a>
                <a href="#" class="header-btn md-font grey-font"><i class="btn-ico message"><span class="notification red">20</span></i>  الرسائل</a>
                <a href="#" class="header-btn md-font grey-font"><i class="btn-ico settings"></i>  إعدادات الحساب</a>
            </div>
        </div>
        <?= $content ?>
<div class="container">
    <div class="row footer-dark round-corner">
        <div class="col-xs-12 col-sm-6 col-lg-6 col-md-6 def-padding">
            <p class="md-font white-font">
                2016 -  كامل الحقوق محفوظة  لشركةموجة
                <br>
                <a href="" class="md-font white-link">سياسة الخصوصية</a>
                -
                <a href="" class="md-font white-link"> بنود الإستخدام</a>
            </p>
            <ul class="social-media">
                <li><a href="#"><i class="fa fa-facebook round-corner"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter round-corner"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin round-corner"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube round-corner"></i></a></li>
                <li><a href="#"><i class="fa fa-rss round-corner"></i></a></li>
            </ul>
        </div>
        <div class="col-xs-12 col-sm-6 col-lg-6 col-md-6 def-padding">
            <ul class="footer-nav">
                <li><a class="md-font white-link" href=""> ريادة أعـمال  </a></li>
                <li><a class="md-font white-link" href=""> تســويق     </a></li>
                <li><a class="md-font white-link" href=""> مبيــعات       </a></li>
                <li><a class="md-font white-link" href=""> إدارة أعــمال  </a></li>
                <li><a class="md-font white-link" href=""> قـصص النجـاح</a></li>
            </ul>
            <ul class="footer-nav">
                <li><a class="md-font white-link" href=""> الصفحة الرئيسة</a></li>
                <li><a class="md-font white-link" href="">من نحن</a></li>
                <li><a class="md-font white-link" href="">إتصل بنا</a></li>
            </ul>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
