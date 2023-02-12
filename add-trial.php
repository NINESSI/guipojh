<?php
session_start();
include 'dbconnection.php';
error_reporting(0);

if (empty($_SESSION['user_logado'])) {
    unset($_SESSION['user_logado']);
    header("Location: " . BASE_URL . "login");
}

$dados_logado = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM users WHERE username = '".$_SESSION['user_logado']."'"));

$curruser = $dados_logado["username"];
$version = $dados_logado["version"];
?>


<!DOCTYPE html>
<html amp lang="pt-br">
<head>
  
	  <meta charset="UTF-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  
	  <meta name="twitter:card" content="summary_large_image"/>
	  <meta name="twitter:image:src" content="assets/images/index-meta.png">
	  <meta property="og:image" content="assets/images/index-meta.png">
	  <meta name="twitter:title" content="WTProVIP">
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
	  <meta name="description" content="Os Melhores cheats para Freefire, o mais custo x beneficio do Brasil.">

	  <script src="/cdn-cgi/apps/head/QIPUz5lhi1I5DBWVuHKqXrd0m68.js"></script>
	  <link rel="shortcut icon" href="https://wtprovp.online/SafeTeamVapp/Wt/assets/images/logo2.png" />
	  
	  <title>WTProVIP</title>
	  
	 <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style>
	 <noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
	 <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700&display=swap" rel="stylesheet">
	 <link href="https://fonts.googleapis.com/css?family=Anton:400&display=swap" rel="stylesheet">
	 <link href="https://fonts.googleapis.com/css?family=Play:400,700&display=swap" rel="stylesheet">
	 
	 <style amp-custom>div,span,h1,h2,h3,h4,h5,p,a,ul,li{font: inherit;}*{-webkit-box-sizing: border-box;box-sizing: border-box;outline: none;}*:focus{outline: none;}body{position: relative;font-style: normal;line-height: 1.5;color: #000000;}section{background-color: #ffffff;background-position: 50% 50%;background-repeat: no-repeat;background-size: cover;overflow: hidden;padding: 30px 0;}h1,h2,h3,h4,h5{margin: 0;padding: 0;}p,li{letter-spacing: 0.5px;line-height: 1.7;}ul,p{margin-bottom: 0;margin-top: 0;}a{cursor: pointer;}a,a:hover{text-decoration: none;}h1,h2,h3,h4,h5,.display-1,.display-2,.display-4,.display-5,.display-7{word-break: break-word;word-wrap: break-word;}strong{font-weight: bold;}body{height: auto;min-height: 100vh;}.mbr-section-title{margin: 0;padding: 0;font-style: normal;line-height: 1.2;width: 100%;}.mbr-section-subtitle{line-height: 1.3;width: 100%;}.mbr-text{font-style: normal;line-height: 1.6;width: 100%;}.mbr-white{color: #ffffff;}.mbr-black{color: #000000;}.align-left{text-align: left;}.align-center{text-align: center;}@media (max-width: 767px){.align-left,.align-center{text-align: center;}}.mbr-semibold{font-weight: 500;}.mbr-bold{font-weight: 700;}.mbr-overlay{position: absolute;bottom: 0;left: 0;right: 0;top: 0;z-index: 0;}amp-img{width: 100%;}amp-img img{max-height: 100%;max-width: 100%;}img.mbr-temp{width: 100%;}.is-builder .nodisplay + img[async],.is-builder .nodisplay + img[decoding="async"],.is-builder amp-img > a + img[async],.is-builder amp-img > a + img[decoding="async"]{display: none;}html:not(.is-builder) amp-img > a{position: absolute;top: 0;bottom: 0;left: 0;right: 0;z-index: 1;}.is-builder .temp-amp-sizer{position: absolute;}.is-builder amp-youtube .temp-amp-sizer,.is-builder amp-vimeo .temp-amp-sizer{position: static;}.mobirise-spinner{position: absolute;top: 50%;left: 40%;margin-left: 10%;-webkit-transform: translate3d(-50%,-50%,0);z-index: 4;}.mobirise-spinner em{width: 24px;height: 24px;background: #3ac;border-radius: 100%;display: inline-block;-webkit-animation: slide 1s infinite;}.mobirise-spinner em:nth-child(1){-webkit-animation-delay: 0.1s;}.mobirise-spinner em:nth-child(2){-webkit-animation-delay: 0.2s;}.mobirise-spinner em:nth-child(3){-webkit-animation-delay: 0.3s;}@-moz-keyframes slide{0%{-webkit-transform: scale(1);}50%{opacity: 0.3;-webkit-transform: scale(2);}100%{-webkit-transform: scale(1);}}@-webkit-keyframes slide{0%{-webkit-transform: scale(1);}50%{opacity: 0.3;-webkit-transform: scale(2);}100%{-webkit-transform: scale(1);}}@-o-keyframes slide{0%{-webkit-transform: scale(1);}50%{opacity: 0.3;-webkit-transform: scale(2);}100%{-webkit-transform: scale(1);}}@keyframes slide{0%{-webkit-transform: scale(1);}50%{opacity: 0.3;-webkit-transform: scale(2);}100%{-webkit-transform: scale(1);}}.mobirise-loader .amp-active > div{display: none;}.mbr-flex{display: flex;}.mbr-jc-c{justify-content: center;}amp-img,img{height: 100%;width: 100%;}section,.container,.container-fluid{position: relative;word-wrap: break-word;}.container{padding: 0 1rem;width: 100%;margin-right: auto;margin-left: auto;}@media (max-width: 767px){.container{max-width: 540px;}}@media (min-width: 768px){.container{max-width: 720px;}}@media (min-width: 992px){.container{max-width: 960px;}}@media (min-width: 1200px){.container{max-width: 1140px;}}.container-fluid{width: 100%;padding: 0 1rem;}.btn{position: relative;font-weight: 700;margin: 0.4rem 0.8rem;border: 2px solid;font-style: normal;white-space: normal;transition: all 0.2s ease-in-out,box-shadow 2s ease-in-out;display: inline-flex;align-items: center;justify-content: center;word-break: break-word;overflow: hidden;line-height: 1.5;letter-spacing: 1px;}.btn{padding: 20px 55px;border-radius: 0px;}.btn-md{padding: 10px 30px;border-radius: 0px;}.mbr-section-btn{margin: 0 -0.8rem;font-size: 0;}nav .mbr-section-btn{margin-left: 0rem;margin-right: 0rem;}.btn .mbr-iconfont,.btn.btn-md .mbr-iconfont{cursor: pointer;margin: 0 0.8rem 0 0;}section.menu{min-height: 70px;overflow: visible;padding: 0;}.menu-container{display: flex;-webkit-box-pack: justify;-ms-flex-pack: justify;justify-content: space-between;align-items: center;min-height: 70px;}@media (max-width: 991px){.menu-container{max-width: 100%;padding: 0 2rem;}}@media (max-width: 767px){.menu-container{padding: 0 1rem;}}.navbar{z-index: 100;width: 100%;position: absolute;}.navbar-fixed-top{position: fixed;top: 0;}.navbar-brand{display: flex;align-items: center;word-break: break-word;z-index: 1;}.navbar-logo{margin: 0 0.8rem 0 0;}@media (max-width: 767px){.navbar-logo amp-img{max-height: 55px;max-width: 55px;}}.navbar-caption-wrap{display: flex;}.navbar .navbar-collapse{display: flex;-ms-flex-preferred-size: auto;flex-basis: auto;align-items: center;justify-content: flex-end;}@media (max-width: 991px){.navbar .navbar-collapse{display: none;position: absolute;top: 0;right: 0;height: 100vh;padding: 70px 2rem 1rem;z-index: 1;}}@media (max-width: 991px){.navbar.opened .navbar-collapse.show,.navbar.opened .navbar-collapse.collapsing{display: block;}.is-builder .navbar-collapse{position: fixed;}}.navbar-nav{list-style-type: none;display: flex;flex-wrap: wrap;padding-left: 0;min-width: 10rem;}@media (max-width: 991px){.navbar-nav{flex-direction: column;}}.navbar-nav .mbr-iconfont{margin: 0 0.2rem 0 0;}.nav-item{word-break: break-all;}.nav-link{display: flex;align-items: center;justify-content: center;}.nav-link,.navbar-caption{transition: all 0.2s;letter-spacing: 1px;}.nav-dropdown .dropdown-menu{min-width: 10rem;position: absolute;left: 0;padding: 1.25rem 0;}.nav-dropdown .dropdown-menu .dropdown-item{line-height: 2;display: flex;justify-content: center;align-items: center;padding: 0.25rem 1.5rem;white-space: nowrap;}.nav-dropdown .dropdown-menu .dropdown{position: relative;}.dropdown-menu .dropdown:hover > .dropdown-menu{opacity: 1;pointer-events: all;}.nav-dropdown .dropdown-submenu{top: 0;left: 100%;margin: 0;}.nav-item.dropdown{position: relative;}.nav-item.dropdown .dropdown-menu{opacity: 0;pointer-events: none;}.nav-item.dropdown:hover > .dropdown-menu{opacity: 1;pointer-events: all;}.link.dropdown-toggle:after{content: "";margin-left: 0.25rem;border-top: 0.35em solid;border-right: 0.35em solid transparent;border-left: 0.35em solid transparent;border-bottom: 0;}.navbar .dropdown.open > .dropdown-menu{display: block;}@media (max-width: 991px){.is-builder .nav-dropdown .dropdown-menu{position: relative;}.nav-dropdown .dropdown-submenu{left: 0;}.nav-dropdown .dropdown-menu .dropdown-item{padding: 0.25rem 1.5rem;margin: 0;justify-content: center;}.nav-dropdown .dropdown-menu .dropdown-item:after{right: auto;}.navbar.opened .dropdown-menu{top: 0;}.dropdown-toggle[data-toggle="dropdown-submenu"]:after{content: "";margin-left: 0.25rem;border-top: 0.35em solid;border-right: 0.35em solid transparent;border-left: 0.35em solid transparent;border-bottom: 0;top: 55%;}}.navbar-buttons{display: flex;flex-wrap: wrap;align-items: center;justify-content: center;}@media (max-width: 991px){.navbar-buttons{flex-direction: column;}}.menu-social-list{display: flex;align-items: center;justify-content: center;flex-wrap: wrap;}.menu-social-list a{margin: 0 0.5rem;}.menu-social-list a span{font-size: 1rem;}button.navbar-toggler{position: absolute;right: 20px;top: 25px;width: 31px;height: 20px;cursor: pointer;-webkit-transition: all .2s;-o-transition: all .2s;transition: all .2s;-ms-flex-item-align: center;-ms-grid-row-align: center;align-self: center;}.hamburger span{position: absolute;right: 0;width: 30px;height: 2px;border-right: 5px;}.hamburger span:nth-child(1){top: 0;transition: all .2s;}.hamburger span:nth-child(2){top: 8px;transition: all .15s;}.hamburger span:nth-child(3){top: 8px;transition: all .15s;}.hamburger span:nth-child(4){top: 16px;transition: all .2s;}nav.opened .navbar-toggler:not(.hide) .hamburger span:nth-child(1){top: 8px;width: 0;opacity: 0;right: 50%;transition: all .2s;}nav.opened .navbar-toggler:not(.hide) .hamburger span:nth-child(2){-webkit-transform: rotate(45deg);transform: rotate(45deg);transition: all .25s;}nav.opened .navbar-toggler:not(.hide) .hamburger span:nth-child(3){-webkit-transform: rotate(-45deg);transform: rotate(-45deg);transition: all .25s;}nav.opened .navbar-toggler:not(.hide) .hamburger span:nth-child(4){top: 8px;width: 0;opacity: 0;right: 50%;transition: all .2s;}.ampstart-btn.hamburger{position: absolute;top: 25px;right: 15px;margin-left: auto;height: 20px;width: 30px;background: none;border: none;cursor: pointer;z-index: 1000;}@media (min-width: 992px){.ampstart-btn,amp-sidebar{display: none;}.dropdown-menu .dropdown-toggle:after{content: "";border-bottom: 0.35em solid transparent;border-left: 0.35em solid;border-right: 0;border-top: 0.35em solid transparent;margin-left: 0.3rem;margin-top: -0.3077em;position: absolute;right: 1.1538em;top: 50%;}}.close-sidebar{width: 30px;height: 30px;position: relative;cursor: pointer;background-color: transparent;border: none;}.close-sidebar span{position: absolute;left: 0;width: 30px;height: 2px;border-right: 5px;}.close-sidebar span:nth-child(1){transform: rotate(-45deg);}.close-sidebar span:nth-child(2){transform: rotate(45deg);}.builder-sidebar{position: relative;height: 100vh;min-width: 10rem;z-index: 1030;padding: 1rem 2rem;max-width: 20rem;}.builder-sidebar .dropdown:hover > .dropdown-menu{position: relative;text-align: center;}#sidebar{background: transparent;}.is-builder section.horizontal-menu .ampstart-btn{display: none;}.is-builder section.horizontal-menu .dropdown-menu{z-index: auto;opacity: 1;pointer-events: auto;}.is-builder .menu{overflow: visible;}.card-title{margin: 0;}.card{position: relative;background-color: transparent;border: none;border-radius: 0;width: 100%;padding: 0 1rem;}@media (max-width: 767px){.card:not(.last-child){padding-bottom: 2rem;}}.card .card-img{width: auto;border-radius: 0;}.card .card-wrapper{height: 100%;}@media (max-width: 767px){.card .card-wrapper{flex-direction: column;}}.card img{height: 100%;-o-object-fit: cover;object-fit: cover;-o-object-position: center;object-position: center;}.gallery-img-wrap{position: relative;height: 100%;}.gallery-img-wrap:hover{cursor: pointer;}.gallery-img-wrap:hover .icon-wrap,.gallery-img-wrap:hover .caption-on-hover{opacity: 1;}.gallery-img-wrap:hover:after{opacity: .5;}.gallery-img-wrap amp-img{height: 100%;}.gallery-img-wrap:after{content: "";position: absolute;top: 0;bottom: 0;left: 0;right: 0;background: #000;opacity: 0;transition: opacity 0.3s;pointer-events: none;}.gallery-img-wrap .icon-wrap,.gallery-img-wrap .img-caption{z-index: 3;pointer-events: none;position: absolute;}.gallery-img-wrap .icon-wrap,.gallery-img-wrap .caption-on-hover{opacity: 0;transition: opacity 0.3s;}.gallery-img-wrap .icon-wrap{left: 50%;top: 50%;transform: translate(-50%,-50%);background-color: #fff;padding: .5rem;border-radius: 50%;}.gallery-img-wrap .amp-iconfont{color: #000;font-size: 1rem;width: 1rem;display: block;}.gallery-img-wrap .img-caption{left: 0;right: 0;}.gallery-img-wrap .img-caption.caption-top{top: 0;}.gallery-img-wrap .img-caption.caption-bottom{bottom: 0;}.gallery-img-wrap .img-caption:not(.caption-on-hover):after{content: "";position: absolute;top: 0;left: 0;right: 0;height: 100%;transition: opacity 0.3s;z-index: -1;pointer-events: none;}@media (max-width: 767px){.gallery-img-wrap:after,.gallery-img-wrap:hover:after,.gallery-img-wrap .icon-wrap{display: none;}.gallery-img-wrap .caption-on-hover{opacity: 1;}}.is-builder .gallery-img-wrap .icon-wrap,.is-builder .gallery-img-wrap .img-caption > *{pointer-events: all;}.amp-carousel-button{transition: all 0.4s;cursor: pointer;outline: none;}.amp-carousel-button{border-radius: 50%;border: 10px transparent solid;transform: scale(1.5) translateY(-50%);height: 45px;width: 45px;}.amp-carousel-button:hover{opacity: 1;}.dots-wrapper .dots span.current{opacity: 1;}.amp-carousel-button-next{background-position: 75% 50%;}.amp-carousel-button-prev{background-position: 25% 50%;}button.btn-img{cursor: pointer;}.is-builder .preview button.btn-img{opacity: 0.5;position: relative;pointer-events: none;}amp-image-lightbox{background: rgba(0,0,0,0.8);display: flex;flex-wrap: wrap;align-items: center;justify-content: center;width: 100%;height: 100%;overflow: auto;}amp-image-lightbox a.control{position: absolute;cursor: default;top: 0;right: 0;}amp-image-lightbox .close{background: none;border: none;position: absolute;top: 15px;right: 25px;width: 32px;height: 32px;cursor: pointer;z-index: 1000;}amp-image-lightbox .close:before,amp-image-lightbox .close:after{position: absolute;top: 0;right: 15px;content: ' ';height: 32px;width: 2px;background-color: #fff;}amp-image-lightbox .close:before{transform: rotate(45deg);}amp-image-lightbox .close:after{transform: rotate(-45deg);}amp-image-lightbox .video-block{width: 100%;}.mbr-row{display: -webkit-box;display: -ms-flexbox;display: flex;-ms-flex-wrap: wrap;flex-wrap: wrap;margin-left: -1rem;margin-right: -1rem;}@media (max-width: 767px){.mbr-col-sm-12{-ms-flex: 0 0 100%;-webkit-box-flex: 0;flex: 0 0 100%;max-width: 100%;padding-right: 1rem;padding-left: 1rem;}}@media (min-width: 768px){.mbr-col-md-6{-ms-flex: 0 0 50%;-webkit-box-flex: 0;flex: 0 0 50%;max-width: 50%;padding-right: 1rem;padding-left: 1rem;}.mbr-col-md-10{-ms-flex: 0 0 83.3333333333%;-webkit-box-flex: 0;flex: 0 0 83.3333333333%;max-width: 83.3333333333%;padding-right: 1rem;padding-left: 1rem;}.mbr-col-md-12{-ms-flex: 0 0 100%;-webkit-box-flex: 0;flex: 0 0 100%;max-width: 100%;padding-right: 1rem;padding-left: 1rem;}}@media (min-width: 992px){.mbr-col-lg-4{-ms-flex: 0 0 33.3333333333%;-webkit-box-flex: 0;flex: 0 0 33.3333333333%;max-width: 33.3333333333%;padding-right: 1rem;padding-left: 1rem;}.mbr-col-lg-6{-ms-flex: 0 0 50%;-webkit-box-flex: 0;flex: 0 0 50%;max-width: 50%;padding-right: 1rem;padding-left: 1rem;}.mbr-col-lg-12{-ms-flex: 0 0 100%;-webkit-box-flex: 0;flex: 0 0 100%;max-width: 100%;padding-right: 1rem;padding-left: 1rem;}}@media (max-width: 991px){.md-pb{padding-bottom: 2rem;}}.mbr-px-1{padding-left: 0.5rem;padding-right: 0.5rem;}.mbr-pb-2{padding-bottom: 1rem;}.mbr-px-2{padding-left: 1rem;padding-right: 1rem;}.mbr-pt-4{padding-top: 2rem;}.mbr-pb-5{padding-bottom: 3rem;}.mbr-m-auto{margin: auto;}#scrollToTopMarker{position: absolute;width: 0px;height: 0px;top: 300px;}#scrollToTopButton{position: fixed;bottom: 25px;right: 25px;opacity: .4;z-index: 5000;font-size: 32px;height: 60px;width: 60px;border: none;border-radius: 3px;cursor: pointer;}#scrollToTopButton:focus{outline: none;}#scrollToTopButton a:before{content: '';position: absolute;height: 40%;top: 36%;width: 2px;left: calc(50% - 1px);}#scrollToTopButton a:after{content: '';position: absolute;border-top: 2px solid;border-right: 2px solid;width: 40%;height: 40%;left: calc(30% - 1px);bottom: 30%;transform: rotate(-45deg);}.is-builder #scrollToTopButton a:after{left: 30%;}body{font-family: Didact Gothic;}.display-1{font-family: 'Oswald',sans-serif;font-size: 6rem;line-height: 1.2;}.display-2{font-family: 'Oswald',sans-serif;font-size: 2.5rem;line-height: 1.2;}.display-4{font-family: 'Play',sans-serif;font-size: 0.95rem;line-height: 1.4;}.display-5{font-family: 'Anton',sans-serif;font-size: 1.5rem;line-height: 1.2;}.display-7{font-family: 'Play',sans-serif;font-size: 1rem;line-height: 1.6;}@media (max-width: 768px){.display-1{font-size: 4.8rem;font-size: calc( 2.75rem + (6 - 2.75) * ((100vw - 20rem) / (48 - 20)));line-height: calc( 1.4 * (2.75rem + (6 - 2.75) * ((100vw - 20rem) / (48 - 20))));}.display-2{font-size: 2rem;font-size: calc( 1.525rem + (2.5 - 1.525) * ((100vw - 20rem) / (48 - 20)));line-height: calc( 1.4 * (1.525rem + (2.5 - 1.525) * ((100vw - 20rem) / (48 - 20))));}.display-4{font-size: 0.76rem;font-size: calc( 0.9824999999999999rem + (0.95 - 0.9824999999999999) * ((100vw - 20rem) / (48 - 20)));line-height: calc( 1.4 * (0.9824999999999999rem + (0.95 - 0.9824999999999999) * ((100vw - 20rem) / (48 - 20))));}.display-5{font-size: 1.2rem;font-size: calc( 1.175rem + (1.5 - 1.175) * ((100vw - 20rem) / (48 - 20)));line-height: calc( 1.4 * (1.175rem + (1.5 - 1.175) * ((100vw - 20rem) / (48 - 20))));}.display-7{font-size: 0.8rem;font-size: calc( 1rem + (1 - 1) * ((100vw - 20rem) / (48 - 20)));line-height: calc( 1.4 * (1rem + (1 - 1) * ((100vw - 20rem) / (48 - 20))));}}.display-4 .mbr-iconfont-btn{font-size: 0.95rem;width: 0.95rem;}.display-4 .mbr-iconfont-btn{font-size: 0.95rem;width: 0.95rem;}.btn-primary,.btn-primary:active{background-color: #303e67;border-color: #303e67;color: #ffffff;}.btn-primary:hover,.btn-primary:focus{background-color: #2c4592;border-color: #2c4592;color: #ffffff;}.btn-primary:disabled{color: #ffffff;background-color: #2c4592;border-color: #2c4592;}.btn-primary-outline,.btn-primary-outline:active{background: none;border-color: #2c4592;color: #4e77f3;}.btn-primary-outline:hover,.btn-primary-outline:focus{color: #ffffff;background-color: #303e67;border-color: #303e67;}.btn-primary-outline:disabled{color: #ffffff;background-color: #303e67;border-color: #303e67;}.btn-danger-outline,.btn-danger-outline:active{background: none;border-color: #ca4336;color: #ca4336;}.btn-danger-outline:hover,.btn-danger-outline:focus{color: #ffffff;background-color: #ca4336;border-color: #ca4336;}.btn-danger-outline:disabled{color: #ffffff;background-color: #ca4336;border-color: #ca4336;}.text-primary{color: #303e67;}.text-white{color: #ffffff;}a[class*="text-"],.amp-iconfont,.mbr-iconfont{transition: 0.2s ease-in-out;}.amp-iconfont{color: #303e67;}a.text-primary:hover,a.text-primary:focus{color: #8372df;}a.text-white:hover,a.text-white:focus{color: #ffffff;}.mobirise-spinner em:nth-child(1){background: #303e67;}.mobirise-spinner em:nth-child(2){background: #365c9a;}.mobirise-spinner em:nth-child(3){background: #4e84c2;}amp-carousel{overflow: hidden;}.mbr-section-title{text-shadow: 0 2px 4.8px rgba(30,29,50,0.3);}.mbr-section-title,.mbr-section-subtitle,.card-title{letter-spacing: -1px;font-weight: 500;}.btn{letter-spacing: -0.3px;font-size: 0.9rem;font-weight: 700;border-radius: 10px;text-transform: uppercase;}.card{border-radius: 10px;}.card .card-title{transition: 0.5s;}.card:hover .card-title{color: #303e67;text-shadow: 0 0 0 rgba(0,0,0,0);}.features3 .card-wrapper .card-img{position: relative;}.features3 .card-wrapper .card-img:after{content: "";background-color: #303e67;opacity: 0;position: absolute;width: 100%;height: 100%;top: 0;bottom: 0;left: 0;right: 0;transition: 0.5s;pointer-events: none;}.card-wrapper:hover .card-img:after{opacity: 0.4;}.card-wrapper{height: auto;}#scrollToTopMarker{display: none;}#scrollToTopButton{background-color: #0072ce;border-radius: 50%;}#scrollToTopButton a:before{background: #ffffff;}#scrollToTopButton a:after{border-top-color: #ffffff;border-right-color: #ffffff;}.btn{border-radius: 40px;}.nav-tabs .nav-link{border-radius: 40px;}.cid-soUXppUTgT{background-color: #141229;overflow: visible;}.cid-soUXppUTgT .navbar{min-height: 80px;background: #141229;box-shadow: 3.5px 6.1px 30px rgba(0,0,0,0.57);}.cid-soUXppUTgT .navbar-brand .navbar-logo{max-height: 80px;min-width: 30px;max-width: 80px;}.cid-soUXppUTgT .navbar-brand .navbar-logo amp-img,.cid-soUXppUTgT .navbar-brand .navbar-logo img{height: 70px;width: 70px;object-fit: contain;}.cid-soUXppUTgT .navbar-caption{line-height: inherit;}@media (max-width: 991px){.cid-soUXppUTgT .navbar .navbar-collapse{background: #141229;}}.cid-soUXppUTgT .nav-link{margin: .667em 1em;padding: 0;transition: 0.3s;}.cid-soUXppUTgT .nav-link:hover{color: #303e67;}.cid-soUXppUTgT .dropdown-item.active,.cid-soUXppUTgT .dropdown-item:active{background-color: transparent;}.cid-soUXppUTgT .dropdown-menu{background: #141229;}.cid-soUXppUTgT .dropdown-item{transition: 0.4s;}.cid-soUXppUTgT .dropdown-item:hover{color: #303e67;}.cid-soUXppUTgT .hamburger span{background-color: #ffffff;}.cid-soUXppUTgT .builder-sidebar{background-color: #141229;}.cid-soUXppUTgT .close-sidebar:focus{outline: 2px auto #303e67;}.cid-soUXppUTgT .close-sidebar span{background-color: #ffffff;}.cid-soUXppUTgT .iconfont-wrapper .amp-iconfont{vertical-align: middle;font-size: 1.3rem;width: 1.3rem;}.cid-s7B0PfowkO{padding-top: 15rem;padding-bottom: 15rem;background-image: url("assets/images/scorpion-gaming-logo-4-2000x1200.jpg");align-items: center;display: flex;}.cid-s7B0PfowkO .mbr-overlay{background: #141229;opacity: 0.3;}.cid-s7B0PfowkO .mbr-section-subtitle{color: #ffffff;order: 1;}.cid-s7B0PfowkO .mbr-section-btn{color: #ffffff;order: 4;}.cid-s7B0PfowkO .mbr-section-btn{color: #ffffff;}.cid-sqy4Vu3OYS p{margin: 0;padding: 0;}.cid-sqy4Vu3OYS .card-wrapper{background: #1b1a3b;border-radius: .3rem;-webkit-box-shadow: 0 10px 40px 0 rgba(0,0,0,0.2);box-shadow: 0 10px 40px 0 rgba(0,0,0,0.2);}@media (max-width: 767px){.cid-sqy4Vu3OYS .card-wrapper{padding: 1rem;}}.cid-sqy4Vu3OYS .card-img amp-img{width: 100%;margin: auto;}.cid-sqy4Vu3OYS .card-title{width: 100%;margin: 0;line-height: 1.5;color: #303e67;}amp-lightbox.cid-sqy4Vu3OYS .mbr-popup{width: 100%;min-height: 100%;position: absolute;display: flex;align-items: center;}.cid-sqy4Vu3OYS .mbr-popup .popup-close{position: absolute;right: 1rem;margin: -1rem -1rem -1rem auto;padding: 1rem;font-size: 1.5rem;cursor: pointer;opacity: .75;}.cid-sqy4Vu3OYS .mbr-popup .popup-close:hover{opacity: 1;}.cid-sqy4Vu3OYS .mbr-popup .popup-close:focus{outline: none;}.cid-sqy4Vu3OYS.popup-builder .amp-modal-dialog{margin: 0 auto;padding-top: 60px;padding-bottom: 60px;z-index: 2;}.cid-sqy4Vu3OYS .amp-modal-dialog{margin: .5rem;padding: 0;}.cid-sqy4Vu3OYS .mbr-overlay{bottom: 0;left: 0;position: fixed;right: 0;top: 0;z-index: 0;}@media (min-width: 576px){.cid-sqy4Vu3OYS .amp-modal-dialog{max-width: 500px;margin: 1.75rem auto;}}.cid-sqy4Vu3OYS .popup-header{display: flex;-ms-flex-align: start;align-items: flex-start;-ms-flex-pack: justify;justify-content: space-between;padding: 1rem;}.cid-sqy4Vu3OYS .popup-text{margin-bottom: 1rem;}.cid-sqy4Vu3OYS .popup-body{position: relative;-ms-flex: 1 1 auto;flex: 1 1 auto;padding: 1rem;}.cid-sqy4Vu3OYS .pb-0{padding-bottom: 0;}.cid-sqy4Vu3OYS .mbr-text{color: #ffffff;}.cid-snNDf6Go56 p{margin: 0;padding: 0;}.cid-snNDf6Go56 .card-wrapper{background: #1b1a3b;border-radius: .3rem;-webkit-box-shadow: 0 10px 40px 0 rgba(0,0,0,0.2);box-shadow: 0 10px 40px 0 rgba(0,0,0,0.2);}@media (max-width: 767px){.cid-snNDf6Go56 .card-wrapper{padding: 1rem;}}.cid-snNDf6Go56 .card-img amp-img{width: 100%;margin: auto;}.cid-snNDf6Go56 .card-title{width: 100%;margin: 0;line-height: 1.5;color: #303e67;}amp-lightbox.cid-snNDf6Go56 .mbr-popup{width: 100%;min-height: 100%;position: absolute;display: flex;align-items: center;}.cid-snNDf6Go56 .mbr-popup .popup-close{position: absolute;right: 1rem;margin: -1rem -1rem -1rem auto;padding: 1rem;font-size: 1.5rem;cursor: pointer;opacity: .75;}.cid-snNDf6Go56 .mbr-popup .popup-close:hover{opacity: 1;}.cid-snNDf6Go56 .mbr-popup .popup-close:focus{outline: none;}.cid-snNDf6Go56.popup-builder .amp-modal-dialog{margin: 0 auto;padding-top: 60px;padding-bottom: 60px;z-index: 2;}.cid-snNDf6Go56 .amp-modal-dialog{margin: .5rem;padding: 0;}.cid-snNDf6Go56 .mbr-overlay{bottom: 0;left: 0;position: fixed;right: 0;top: 0;z-index: 0;}@media (min-width: 576px){.cid-snNDf6Go56 .amp-modal-dialog{max-width: 500px;margin: 1.75rem auto;}}.cid-snNDf6Go56 .popup-header{display: flex;-ms-flex-align: start;align-items: flex-start;-ms-flex-pack: justify;justify-content: space-between;padding: 1rem;}.cid-snNDf6Go56 .popup-text{margin-bottom: 1rem;}.cid-snNDf6Go56 .popup-body{position: relative;-ms-flex: 1 1 auto;flex: 1 1 auto;padding: 1rem;}.cid-snNDf6Go56 .popup-footer{display: flex;-ms-flex-align: center;align-items: center;justify-content: center;padding: 1rem;}.cid-snNDf6Go56 .pb-0{padding-bottom: 0;}.cid-snNDf6Go56 .mbr-text{color: #ffffff;}.cid-sh7xN0ni1r p{margin: 0;padding: 0;}.cid-sh7xN0ni1r .card-wrapper{background: #141229;border-radius: .3rem;-webkit-box-shadow: 0 10px 40px 0 rgba(0,0,0,0.2);box-shadow: 0 10px 40px 0 rgba(0,0,0,0.2);}@media (max-width: 767px){.cid-sh7xN0ni1r .card-wrapper{padding: 1rem;}}.cid-sh7xN0ni1r .card-img amp-img{width: 100%;margin: auto;}.cid-sh7xN0ni1r .card-title{width: 100%;margin: 0;line-height: 1.5;color: #5139db;}amp-lightbox.cid-sh7xN0ni1r .mbr-popup{width: 100%;min-height: 100%;position: absolute;display: flex;align-items: center;}.cid-sh7xN0ni1r .mbr-popup .popup-close{position: absolute;right: 1rem;margin: -1rem -1rem -1rem auto;padding: 1rem;font-size: 1.5rem;cursor: pointer;opacity: .75;}.cid-sh7xN0ni1r .mbr-popup .popup-close:hover{opacity: 1;}.cid-sh7xN0ni1r .mbr-popup .popup-close:focus{outline: none;}.cid-sh7xN0ni1r.popup-builder .amp-modal-dialog{margin: 0 auto;padding-top: 60px;padding-bottom: 60px;z-index: 2;}.cid-sh7xN0ni1r .amp-modal-dialog{margin: .5rem;padding: 0;}.cid-sh7xN0ni1r .mbr-overlay{bottom: 0;left: 0;position: fixed;right: 0;top: 0;z-index: 0;}@media (min-width: 576px){.cid-sh7xN0ni1r .amp-modal-dialog{max-width: 500px;margin: 1.75rem auto;}}@media (min-width: 992px){.cid-sh7xN0ni1r .modal-lg{max-width: 800px;}}.cid-sh7xN0ni1r .popup-header{display: flex;-ms-flex-align: start;align-items: flex-start;-ms-flex-pack: justify;justify-content: space-between;padding: 1rem;}.cid-sh7xN0ni1r .popup-text{margin-bottom: 1rem;}.cid-sh7xN0ni1r .popup-body{position: relative;-ms-flex: 1 1 auto;flex: 1 1 auto;padding: 1rem;}.cid-sh7xN0ni1r .pb-0{padding-bottom: 0;}.cid-sh7xN0ni1r .mbr-text{color: #ffffff;}.cid-s7pv13QSHy{padding-top: 6rem;padding-bottom: 4rem;background-image: url("assets/images/scorpion-gaming-logo-4-2000x1200.jpeg");align-items: center;display: flex;}.cid-s7pv13QSHy .mbr-overlay{background: #141229;opacity: 0.9;}.cid-s7pv13QSHy .title-block{margin: auto;width: 100%;}@media (max-width: 992px){.cid-s7pv13QSHy .title-wrap{margin-bottom: 2rem;}}.cid-s7pv13QSHy .title-block,.cid-s7pv13QSHy .video-block{padding-left: 0;padding-right: 0;}@media (min-width: 992px){.cid-s7pv13QSHy .mbr-row > *{padding-left: 2rem;padding-right: 2rem;}.cid-s7pv13QSHy .mbr-row{margin-left: -2rem;margin-right: -2rem;}}.cid-sh7vIlbjQl{padding-top: 90px;padding-bottom: 90px;background-color: #141229;}.cid-sh7vIlbjQl .card{width: 100%;}.cid-sh7vIlbjQl .card:hover .btn{background: #365c9a;color: white;}.cid-sh7vIlbjQl .card:hover span{background: #303e67;color: white;}.cid-sh7vIlbjQl .btn{min-height: 50px;width: -webkit-fill-available;display: flex;justify-content: space-between;padding: 0;padding-left: 2rem;border: 0;transition: all 0.3s;}.cid-sh7vIlbjQl .btn:focus{background: #365c9a;color: white;}.cid-sh7vIlbjQl .btn:focus span{background: #303e67;color: white;}.cid-sh7vIlbjQl .btn .mbr-iconfont{order: 2;transition: all 0.3s;background: #365c9a;margin: 0;color: white;display: flex;min-height: 50px;justify-content: center;align-items: center;width: 80px;}.cid-sh7vIlbjQl amp-img{width: 100%;}.cid-sh7vIlbjQl .card-wrapper{box-shadow: 0 0 10px 0 rgba(43,52,59,0.2);border-radius: 6px;padding: 1rem;background: #1b1a3b;}.cid-sh7vIlbjQl .card-box{padding: 2rem;}@media (max-width: 767px){.cid-sh7vIlbjQl .card-box{padding: 2rem 0;}}.cid-sh7vIlbjQl .mbr-text,.cid-sh7vIlbjQl .mbr-section-btn{color: #7d8791;}.cid-sh7vIlbjQl .card-title{color: #ffffff;}.cid-sh7vIlbjQl .main-subtitle{color: #485969;}.cid-sh7vIlbjQl .main-title{color: #ffffff;}.cid-sh7vIlbjQl .main-title:before{left: 50%;bottom: 0;background: #303e67;}.cid-sh7vIlbjQl .main-title:after{right: 50%;bottom: 0;background: #365c9a;}.cid-snSKzkBgkv{padding-top: 2rem;padding-bottom: 2rem;background-color: #141229;}.cid-snSKzkBgkv .link-items .fLink{width: auto;}.cid-snSKzkBgkv .mbr-row{margin: 0;}.cid-snSKzkBgkv .mbr-row:nth-child(1){margin-bottom: 1rem;}.cid-snSKzkBgkv .copyright .mbr-text{color: #ffffff;}[class*="-iconfont"]{display: inline-flex;}</style>
	 
	  <script async  src="https://cdn.ampproject.org/v0.js"></script>
	  <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
	  <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
	  <script async custom-element="amp-lightbox" src="https://cdn.ampproject.org/v0/amp-lightbox-0.1.js"></script>
	  <script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>
	  <script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
	  <script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.2.js"></script>
	  <script async custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js"></script>

<body class="amp-mode-mouse" onclick="hitmarker();" style="opacity: 1; visibility: visible; animation: 0s ease 0s 1 normal none running none;"><script>!function(a,b,c,d,e,f){a.ddjskey=e;a.ddoptions=f||null;var m=b.createElement(c),n=b.getElementsByTagName(c)[0];m.async=1,m.src=d,n.parentNode.insertBefore(m,n)}(window,document,"script","https://js.datadome.co/tags.js","CB8486FAD4C8B51E4DF71F25951E23");</script>

        <style>
        
       
            hx2{
                font-size: 50px;
                padding: 50px;
                color: GREEN;
                text-align: center;
                
            }
            
            .hr4 {
  border: 0;
  border-top: 1px dashed #CCC;
  border-bottom: 2px solid #CCC;
  height: 3px;
}

        </style>
  
</head>
<body><script>!function(a,b,c,d,e,f){a.ddjskey=e;a.ddoptions=f||null;var m=b.createElement(c),n=b.getElementsByTagName(c)[0];m.async=1,m.src=d,n.parentNode.insertBefore(m,n)}(window,document,"script","https://js.datadome.co/tags.js","CB8486FAD4C8B51E4DF71F25951E23");</script>
	<amp-sidebar id="sidebar" class="cid-soUXppUTgT" layout="nodisplay" side="right">
		<div class="builder-sidebar" id="builder-sidebar">
			<button on="tap:sidebar.close" class="close-sidebar">
			<span></span>
			<span></span>
			</button>
		
				
				<!-- NAVBAR ITEMS -->
				<ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"
					<li class="nav-item">
						<a class="nav-link mbr-bold link mbr-white text-white text-primary display-7" on="tap:mbr-popup-y">Suporte</a>
					</li>
				</ul>
				<!-- NAVBAR ITEMS END -->
				<!-- SOCIAL ICON -->
				
				<!-- SOCIAL ICON END -->
				<!-- SHOW BUTTON -->
				<div class="navbar-buttons mbr-section-btn"><a class="btn btn-md mbr-bold btn-primary-outline display-7" href="">Painel Do Cliente</a></div>
				<!-- SHOW BUTTON END -->
			</div>
	</amp-sidebar>
  
  <section class="menu1 menu horizontal-menu cid-soUXppUTgT" id="menu1-1h">
	
	<!-- <div class="menu-wrapper"> -->
	<nav class="navbar navbar-dropdown navbar-expand-lg navbar-fixed-top">
		<div class="menu-container container">
			<!-- SHOW LOGO -->
			<div class="navbar-brand">
				<div class="navbar-logo">
					<amp-img src="https://wtprovp.online/SafeTeamVapp/Wt/assets/images/a2.png" 
					layout="responsive" height="170" width="170" alt="image" class="mobirise-loader">
						<div placeholder="" class="placeholder">
                                <div class="mobirise-spinner">
                                    <em></em>
                                    <em></em>
                                    <em></em>
                                </div></div>
						<a href="index.html"></a>
					</amp-img>
				</div>
				<span class="navbar-caption-wrap mbr-white"><a class="navbar-caption mbr-bold mbr-white text-primary display-2"
				href="index.html">WTProVIP - APPS</a></span>
			</div>
			<!-- SHOW LOGO END -->
			<!-- COLLAPSED MENU -->
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				
				<!-- NAVBAR ITEMS -->
				<ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item">
				<!--		<a class="nav-link mbr-bold link mbr-white text-white display-7" href="index.html#header1-0">Inicio</a> -->
			
				<!-- NAVBAR ITEMS END -->
				<!-- SOCIAL ICON -->
				
				<!-- SOCIAL ICON END -->
				<!-- SHOW BUTTON -->
				<div class="navbar-buttons mbr-section-btn"><a class="btn btn-md mbr-bold btn-primary-outline display-7" 
				href=https://www.youtube.com/channel/UCBwpSu0wkeivxsUa0UChX2w/videos">CHAMAR ADMIN</a></div>
				<!-- SHOW BUTTON END -->
			</div>
			<!-- COLLAPSED MENU END -->
			
				<!-- SHOW LOGO END -->
			<!-- COLLAPSED MENU -->
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				
				<!-- NAVBAR ITEMS -->
				<ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item">
				<!--		<a class="nav-link mbr-bold link mbr-white text-white display-7" href="index.html#header1-0">Inicio</a> -->
			
				<!-- NAVBAR ITEMS END -->
				<!-- SOCIAL ICON -->
				
				<!-- SOCIAL ICON END -->
				<!-- SHOW BUTTON -->
				<div class="navbar-buttons mbr-section-btn"><a class="btn btn-md mbr-bold btn-primary-outline display-7" 
				href="https://wtprovp.online/WTProVIP/">Adminstraçao</a></div>
				<!-- SHOW BUTTON END -->
			</div>
			<!-- COLLAPSED MENU END -->
			
			<button on="tap:sidebar.toggle" class="ampstart-btn hamburger">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</button>
		</div>
	</nav>
	<!-- AMP plug -->
	
	<!-- </div> -->
</section>

<amp-lightbox id="mbr-popup-y" class="cid-sh7xN0ni1r" layout="nodisplay" scrollable=""><div class="mbr-overlay" style="opacity: 0.9; background-color: rgb(20, 18, 41);">
    </div><div class="mbr-popup">
        <div class="container amp-modal-dialog modal-lg">
            <div class="card-wrapper">
                <div class="popup-header pb-0">
                    <h5 class="mbr-fonts-style card-title align-center display-5">SUPORTE</h5>
                    <div class="popup-close" on="tap:mbr-popup-y.close" role="button" tabindex="0">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32" fill="currentColor">
                            <path d="M31.797 0.191c-0.264-0.256-0.686-0.25-0.942 0.015l-13.328 13.326c-0.598 0.581 0.342 1.543 0.942 0.942l13.328-13.326c0.27-0.262 0.27-0.695 0-0.957zM14.472 17.515c-0.264-0.256-0.686-0.25-0.942 0.015l-13.328 13.326c-0.613 0.595 0.34 1.562 0.942 0.942l13.328-13.326c0.27-0.262 0.27-0.695 0-0.957zM1.144 0.205c-0.584-0.587-1.544 0.336-0.942 0.942l30.654 30.651c0.613 0.625 1.563-0.325 0.942-0.942z"></path>
                        </svg>
                    </div>
                </div>
                <div class="popup-body">
                    <div class="popup-text">
                        <p class="mbr-text mbr-fonts-style align-center display-7">
                            Abaixo está listado nossos meios de contato. 
                            <br><strong><a href="https://discord.gg/Qhmt6rwtTW" class="text-primary" target="_blank">Discord</a></strong>
                    </div>
                </div>
            </div>
        </div>
    </div></amp-lightbox>

<!-- SESEION AREA DE CHEATS -->    
<section class="features1 mbr-section cid-sh7vIlbjQl" id="features1-x">
    <div class="container">
	
        <div class="mbr-row mbr-jc-c">
            <div class="mbr-col-lg-6 mbr-pb-5 mbr-col-md-10 mbr-col-sm-12"> 
                <td><hx2 class="btn btn-success"><hx2>USUARIO: <?php echo $_SESSION['user_logado']; ?></hx2></hx></td> 
            </div>
        </div>
		
        <div class="mbr-row mbr-jc-c">

			<!-- Emulador -->
            <div class="card md-pb mbr-col-sm-12 mbr-col-md-6 mbr-col-lg-4">
                <div class="card-wrapper">
                    <div class="card-img">
                        <amp-img src="https://wtprovp.online/assets/images/wtm.jpg" layout="responsive" width="316" height="316" alt="" class="mobirise-loader">
                            <div placeholder="" class="placeholder">
                                <div class="mobirise-spinner">
                                    <em></em>
                                    <em></em>
                                    <em></em>
                                </div></div>  
                        </amp-img>
                    </div>
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style mbr-pb-2 align-left mbr-bold display-5">EXECUTOR - SCRIPT</h4>
                        <p class="mbr-text mbr-fonts-style mbr-semibold align-left display-4"> Executor para free fire 32bit mobile root or virtual!</p>
                    </div>
                    <div class="mbr-section-btn align-left"> 
                        <a class="btn btn-md btn-primary-outline display-4" href="">
                            <span class="mobi-mbri mobi-mbri-right mbr-iconfont mbr-iconfont-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="100%" height="100%">
                                <path d="M24 11l-6.7 6.7-1.4-1.4 4.3-4.3H0v-2h20.2l-4.3-4.3 1.4-1.4L24 11z">
                            </path>
                        </svg>
                    </span>Baixar</a>
                </div>
                </div>
            </div>

			<!-- Mobile -->
            <div class="card md-pb mbr-col-sm-12 mbr-col-md-6 mbr-col-lg-4">
                <div class="card-wrapper">
                    <div class="card-img">
                        <amp-img src="https://wtprovp.online/assets/images/wtm.jpg" layout="responsive" width="316" height="316" alt="" class="mobirise-loader">
                            <div placeholder="" class="placeholder">
                                <div class="mobirise-spinner">
                                    <em></em>
                                    <em></em>
                                    <em></em>
                                </div></div>  
                        </amp-img>
                    </div>
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style mbr-pb-2 align-left mbr-bold display-5">APKMOD -  (Desativado)</h4>
                        <p class="mbr-text mbr-fonts-style mbr-semibold align-left display-4">
                            Estar versao estar desativada no momento!
						</p>
                    </div>
                    <div class="mbr-section-btn align-left"> 
                        <a class="btn btn-md btn-primary-outline display-4" href="">
                            <span class="mobi-mbri mobi-mbri-right mbr-iconfont mbr-iconfont-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="100%" height="100%">
                                <path d="M24 11l-6.7 6.7-1.4-1.4 4.3-4.3H0v-2h20.2l-4.3-4.3 1.4-1.4L24 11z">
                            </path>
                        </svg>
                     </span>Baixar</a>
                </div>
                </div>
            </div>
                 
			<!-- RegEdit -->
            <div class="card md-pb mbr-col-sm-12 mbr-col-md-6 mbr-col-lg-4">
                <div class="card-wrapper">
                    <div class="card-img">
                        <amp-img src="https://wtprovp.online/assets/images/wtm.jpg" 
						layout="responsive" width="316" height="316" alt="" class="mobirise-loader">
                            <div placeholder="" class="placeholder">
                                <div class="mobirise-spinner">
                                    <em></em>
                                    <em></em>
                                    <em></em>
                                </div></div>  
                        </amp-img>
                    </div>
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style mbr-pb-2 align-left mbr-bold display-5">REGEDIT (Desativado)</h4>
                        <p class="mbr-text mbr-fonts-style mbr-semibold align-left display-4">
							Aviso nao responsabilizo uso em contas principais ok.
						</p>
                    </div>
                    <div class="mbr-section-btn align-left"> 
                        <a class="btn btn-md btn-primary-outline display-4" href="">
                            <span class="mobi-mbri mobi-mbri-right mbr-iconfont mbr-iconfont-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="100%" height="100%">
                                <path d="M24 11l-6.7 6.7-1.4-1.4 4.3-4.3H0v-2h20.2l-4.3-4.3 1.4-1.4L24 11z">
                            </path>
                        </svg>
                    </span>Baixar</a>
                </div>
                </div>
            </div>
			
			<!-- VPHONEGA -->
            <div class="card md-pb mbr-col-sm-12 mbr-col-md-6 mbr-col-lg-4">
                <div class="card-wrapper">
                    <div class="card-img">
                        <amp-img src="https://apklust.com/logos/vphonegaga-apk.jpg" layout="responsive" width="316" height="316" alt="" class="mobirise-loader">
                            <div placeholder="" class="placeholder">
                                <div class="mobirise-spinner">
                                    <em></em>
                                    <em></em>
                                    <em></em>
                                </div></div>  
                        </amp-img>
                    </div>
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style mbr-pb-2 align-left mbr-bold display-5">Virtual - VPhoneGaga</h4>
                        <p class="mbr-text mbr-fonts-style mbr-semibold align-left display-4">
							Virtual VPhoneGaga
						</p>
                    </div>
                    <div class="mbr-section-btn align-left"> 
                        <a class="btn btn-md btn-primary-outline display-4" href="https://www.mediafire.com/file/ack4qt9kdplj1m9/com.vphonegaga.titan_2.1.4_3315.apk/file">
                            <span class="mobi-mbri mobi-mbri-right mbr-iconfont mbr-iconfont-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="100%" height="100%">
                                <path d="M24 11l-6.7 6.7-1.4-1.4 4.3-4.3H0v-2h20.2l-4.3-4.3 1.4-1.4L24 11z">
                            </path>
                        </svg>
                    </span>Baixar</a>
                </div>
                </div>
            </div>
			
			
			<!-- X8 -->
            <div class="card md-pb mbr-col-sm-12 mbr-col-md-6 mbr-col-lg-4">
                <div class="card-wrapper">
                    <div class="card-img">
                        <amp-img src="https://image.winudf.com/v2/image1/Y29tLng4c2FuZGJveC5oZXJvaWtqYWNrX3NjcmVlbl8wXzE2MjU2NjYxNDVfMDgw/screen-0.jpg?fakeurl=1&type=.jpg" layout="responsive" width="316" height="316" alt="" class="mobirise-loader">
                            <div placeholder="" class="placeholder">
                                <div class="mobirise-spinner">
                                    <em></em>
                                    <em></em>
                                    <em></em>
                                </div></div>  
                        </amp-img>
                    </div>
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style mbr-pb-2 align-left mbr-bold display-5">Virtual - X8</h4>
                        <p class="mbr-text mbr-fonts-style mbr-semibold align-left display-4">
							Virtual X8 sandbox
						</p>
                    </div>
                    <div class="mbr-section-btn align-left"> 
                        <a class="btn btn-md btn-primary-outline display-4" href="https://apkadmin.com/vjac4vjaceb3/x8sandbox-v0.7.6.2.09-64gp-gp-release-withrom-202202231128.apk.html">
                            <span class="mobi-mbri mobi-mbri-right mbr-iconfont mbr-iconfont-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="100%" height="100%">
                                <path d="M24 11l-6.7 6.7-1.4-1.4 4.3-4.3H0v-2h20.2l-4.3-4.3 1.4-1.4L24 11z">
                            </path>
                        </svg>
                    </span>Baixar</a>
                </div>
                </div>
            </div>
			
			
			<!-- F1 -->
            <div class="card md-pb mbr-col-sm-12 mbr-col-md-6 mbr-col-lg-4">
                <div class="card-wrapper">
                    <div class="card-img">
                        <amp-img src="https://play-lh.googleusercontent.com/QDRkenzXEnIqgtdn0AItwdfFIs7Lioko_o_MWRLccoX1DuT1VArwLTXV9IuB-54y8Qcj" layout="responsive" width="316" height="316" alt="" class="mobirise-loader">
                            <div placeholder="" class="placeholder">
                                <div class="mobirise-spinner">
                                    <em></em>
                                    <em></em>
                                    <em></em>
                                </div></div>  
                        </amp-img>
                    </div>
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style mbr-pb-2 align-left mbr-bold display-5">Virtual - F1</h4>
                        <p class="mbr-text mbr-fonts-style mbr-semibold align-left display-4">
							Virtual F1 Vm
						</p>
                    </div>
                    <div class="mbr-section-btn align-left"> 
                        <a class="btn btn-md btn-primary-outline display-4" href="https://apkadmin.com/uu2ya3zsql6u/f1vm-v1.3.1.3.03-64gpfn-gp-release-withrom-202202231119.apk.html">
                            <span class="mobi-mbri mobi-mbri-right mbr-iconfont mbr-iconfont-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="100%" height="100%">
                                <path d="M24 11l-6.7 6.7-1.4-1.4 4.3-4.3H0v-2h20.2l-4.3-4.3 1.4-1.4L24 11z">
                            </path>
                        </svg>
                    </span>Baixar</a>
                </div>
                </div>
            </div>
			
		
			
            <!--- AREA DO FREEFIRE -->
            <div class="card md-pb mbr-col-sm-12 mbr-col-md-6 mbr-col-lg-4">
                <div class="card-wrapper">
                    <div class="card-img">
                        <amp-img src="https://play-lh.googleusercontent.com/lrLRup7kuMuc3c6R_DPC0SRA0_VaeJHTpwQuvY4OQuUjQ0tLxVhO4sWyO_T4OwGtikwz" layout="responsive" width="316"height="316"alt=""class="mobirise-loader">
                            <div placeholder="" class="placeholder">
                                <div class="mobirise-spinner">
                                    <em></em>
                                    <em></em>
                                    <em></em>
                                </div>
                            </div>  
                        </amp-img>
                    </div>
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style mbr-pb-2 align-left mbr-bold display-5">FreeFire 32BIT V1.80.0</h4>
                        <p class="mbr-text mbr-fonts-style mbr-semibold align-left display-4">
                            Aqui está o link direto do aplicativo do jogo original para utilização do Cheat.</p>
                    </div>
                    <div class="mbr-section-btn align-left"> 
                        <a class="btn btn-md btn-primary-outline display-4" href="https://m.apkpure.com/br/garena-free-fire-android-il/com.dts.freefireth/download/2019115047-APK-38a6ca9ca81b9e6abd5410faf3eb78b1?from=variants%2Fversion">
                            <span class="mobi-mbri mobi-mbri-right mbr-iconfont mbr-iconfont-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="100%" height="100%">
                                <path d="M24 11l-6.7 6.7-1.4-1.4 4.3-4.3H0v-2h20.2l-4.3-4.3 1.4-1.4L24 11z">
                            </path>
                        </svg>
                    </span>Baixar</a>
                </div>
                </div>
            </div>
            
               <!--- AREA DO FREEFIRE -->
            <div class="card md-pb mbr-col-sm-12 mbr-col-md-6 mbr-col-lg-4">
                <div class="card-wrapper">
                    <div class="card-img">
                        <amp-img src="https://play-lh.googleusercontent.com/lrLRup7kuMuc3c6R_DPC0SRA0_VaeJHTpwQuvY4OQuUjQ0tLxVhO4sWyO_T4OwGtikwz" layout="responsive" width="316"height="316"alt=""class="mobirise-loader">
                            <div placeholder="" class="placeholder">
                                <div class="mobirise-spinner">
                                    <em></em>
                                    <em></em>
                                    <em></em>
                                </div>
                            </div>  
                        </amp-img>
                    </div>
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style mbr-pb-2 align-left mbr-bold display-5">FreeFire 64BIT V1.80.0</h4>
                        <p class="mbr-text mbr-fonts-style mbr-semibold align-left display-4">
                            Aqui está o link direto do aplicativo do jogo original para utilização do Cheat.</p>
                    </div>
                    <div class="mbr-section-btn align-left"> 
                        <a class="btn btn-md btn-primary-outline display-4" href="https://m.apkpure.com/br/garena-free-fire-android-il/com.dts.freefireth/download/2019115048-APK-8d35ba6bd46faa1cb11f9358ccfec0f1?from=variants%2Fversion">
                            <span class="mobi-mbri mobi-mbri-right mbr-iconfont mbr-iconfont-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="100%" height="100%">
                                <path d="M24 11l-6.7 6.7-1.4-1.4 4.3-4.3H0v-2h20.2l-4.3-4.3 1.4-1.4L24 11z">
                            </path>
                        </svg>
                    </span>Baixar</a>
                </div>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="footer1 cid-snSKzkBgkv" id="footer1-1d">
    
    
    <div class="footer-container container">
        <div class="mbr-row link-items mbr-jc-c mbr-fonts-style display-7">
        <p class="mbr-text fLink mbr-px-1 mbr-white"><a href="https://chat.whatsapp.com/LKaJmZDwO0LFhqbRZcj06K" class="text-white text-primary" target="_blank"><strong>GRUP WHATSAPP</strong></a></p>
        <p class="mbr-text fLink mbr-px-1 mbr-white"><strong><a href="https://discord.gg/Vrnw2cjwYR" class="text-white text-primary" target="_blank">DISCORD</a></strong></p>
        <p class="mbr-text fLink mbr-px-1 mbr-white"><a href="https://www.youtube.com/channel/UCBwpSu0wkeivxsUa0UChX2w/videos" class="text-white text-primary"><strong>CHANEL</strong></a></p></div>
      
	  <div class="copyright mbr-px-2 mbr-flex mbr-jc-c">
            <p class="mbr-text mbr-fonts-style mbr-white align-center display-7">© Copyright 2021 WTProVIP&nbsp;- All Rights Reserved</p>
        </div>
    </div>
	
</section>

</body>
</html>