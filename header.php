<?php 
session_start();
error_reporting(0);
$ref = ' ';
require_once("user/config.php");
if(isset($_GET["ref"])){
$ref = $_GET["ref"];
$_SESSION['ref'] = $ref;
    }
 ?>

<!DOCTYPE html>
<html lang="en">

    
<!-- Mirrored from digitalstakers.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Feb 2022 08:29:05 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
   <!--
    Basic Page Needs
    ==================================================
    -->
   <meta charset="utf-8">
   <title>Welcome | CryptoChainSpot | Cryptocurrency Investment</title>
   <!--
    Mobile Specific Metas
    ==================================================
    -->
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=no">
   <!--
    CSS
    ==================================================
    -->
   <!-- Bootstrap-->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- Animation-->
   <link rel="stylesheet" href="css/animate.css">
   <!-- Template styles-->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/morris.css">
   <!-- Responsive styles-->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- FontAwesome-->
   <link rel="stylesheet" href="css/font-awesome.min.css">
   <!-- Icon font-->
   <link rel="stylesheet" href="css/icon-font.css">
   <!-- Owl Carousel-->
   <link rel="stylesheet" href="css/owl.carousel.min.css">
   <link rel="stylesheet" href="css/owl.theme.default.min.css">
   <!-- Colorbox-->
   <link rel="stylesheet" href="css/colorbox.css">
    
    <script src="../kit.fontawesome.com/a076d05399.js"></script>
  <link rel="stylesheet" href="../cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="../cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'><link rel="stylesheet" href="style.html">
        <style>

            .lead {
    font-size: 1rem;
    font-weight: 300;
}
            span{
                
            }
            .btn-custom {
  color: #bdc3c7;
  font-size: 18px;
  border: 1px solid #bdc3c7;
}
.btn-custom:hover {
  color: #ffffff;
  border: 1px solid #ffffff;
}
.rounded-lg {
  border-radius: 1rem !important;
}

.text-small {
  font-size: 0.9rem !important;
}

.custom-separator {
  width: 5rem;
  height: 6px;
  border-radius: 1rem;
}




.cah2 {
	color: #0998ec;
	font-size: 20px;
	font-weight: 800;
	text-align: center;
	text-transform: uppercase;
	position: relative;
}
.cah2::after {
	content: "";
	width: 100px;
	position: absolute;
	margin: 0 auto;
	height: 4px;
	border-radius: 1px;
	background: #0998ec;
	left: 0;
	right: 0;
	bottom: -20px;
}
.carousel_test {
	margin: 50px auto;
	padding: 0 10px;
}
.carousel_test .item {
	color: #ffffff;
	overflow: hidden;
    min-height: 120px;
	font-size: 13px;
}
.carousel_test .media img {
	width: 40px;
	height: 40px;
	display: block;
	border-radius: 50%;
}
.carousel_test .testimonial {
	padding: 0 10px 0 10px ;
	position: relative;
}
.carousel_test .overview b {
	text-transform: uppercase;
	color: #0998ec;
}

@media screen and (max-width: 992px) {
  .me_table::-webkit-scrollbar {
  display: none !important;
  overflow-x: scroll;
}

.rem-home{
        padding: 9rem 0 5rem 0;
    } 
    
@media screen and (max-width: 992px) {
    .rem-home{
        padding: 6rem 0 5rem 0;
    } 
}

/* Hide scrollbar for IE and Edge */
.me-table {
  -ms-overflow-style: none !important;
  overflow-x: scroll;
}
}

.me_icon {
    margin-top: 10px;
    color: #fff;
}

.token_rtinfo {
    color: #fff;
    border-radius: 10px;
    box-shadow: 0 1px 5px rgba(0, 0, 0, 0.2);
    margin-top: -80px;
    padding: 40px 15px;
    background-color: rgba(255,255,255,0.10);
    box-shadow: none !important;
}

.token_rt_value {
    padding: 0 25px;
}

.me_big{
    font-size:  !important;
    line-height: normal !important;
}

.tradingview-widget-copyright{
    display: none !important;
}

.badge {
    border-radius: 50px;
    padding: 0.2rem 1rem;
    color: #fff;
    text-align: center;
}

.pricing-rate sup {
  font-size: 24px;
  position: relative;
  left: -20px;
  top: -30px;
}

.pricing-rate span {
  font-size: 12px;
  color: #707070;
  text-transform: uppercase;
  right: -600px;
}

.pricing-rate {
  font-size: 70px;
  font-weight: 700;
  color: #1a2c79;
  position: relative;
  text-align: center;
}


        .thatwhat {
  z-index: 99999;
  position: fixed;
  bottom: 0;
  left: 0;
  padding-left: 20px;
  padding-bottom: 20px;
}

.thatwhat img {
    height: 60px;
    width: 60px;
}

            
        </style>
        
        <style>
            
            * {
  box-sizing: border-box;
}

#google_translate_element {
    z-index: 9999999;
  position: fixed;
  bottom: 25px;
  left: 15px;
}

.goog-te-gadget {
  font-family: Roboto, "Open Sans", sans-serif !important;
  text-transform: uppercase;
}

.goog-te-gadget-simple {
  background-color: rgba(0, 0, 0, 0.5) !important;
  border: 1px solid rgba(255, 255, 255, 0.5) !important;
  padding: 3px !important;
  border-radius: 4px !important;
  font-size: 0.8rem !important;
  line-height: 2rem !important;
  display: inline-block;
  cursor: pointer;
  zoom: 1;
  margin-bottom: 4px;
}

.goog-te-menu2 {
  max-width: 100%;
}

.goog-te-menu-value {
  color: #fff !important;
}
.goog-te-menu-value:before {
  font-family: 'Material Icons';
  content: "\E927";
  margin-right: 16px;
  font-size: 2rem;
  vertical-align: -10px;
}

.goog-te-menu-value span:nth-child(5) {
  display: none;
}

.goog-te-menu-value span:nth-child(3) {
  border: none !important;
  font-family: 'Material Icons';
}
.goog-te-menu-value span:nth-child(3):after {
  font-family: 'Material Icons';
  content: "\E5C5";
  font-size: 1.5rem;
  vertical-align: -6px;
}

.goog-te-gadget-icon {
  background-position: 0px 0px;
  height: 32px !important;
  width: 32px !important;
  margin-right: 8px !important;
  display: none;
}

.goog-te-banner-frame.skiptranslate {
  display: none !important;
}


body {
  top: 0px !important;
}

/* ================================== *\
    Mediaqueries
\* ================================== */
@media (max-width: 667px) {
  #google_translate_element {
  }
  #google_translate_element goog-te-gadget {
  }
  #google_translate_element .skiptranslate {
  }
  #google_translate_element .goog-te-gadget-simple {
    text-align: center;
  }
}
        </style>
        
        <style>
        .xp{
            top: 60%;
            width: 100%;
            vertical-align: middle;
            position: absolute;
        }
.xloader {
  position: absolute;
  top: 50%;
  left: 50%;
  bottom: 0;
  margin-top: -35px;
  margin-left: -35px;
  border: 5px solid #2154cf;
  border-radius: 50%;
  border-top: 5px solid #fec107;
  width: 70px;
  height: 70px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
<script type="text/javascript">
        function hide_loader() {
            document.getElementById("loader").style.display = "none";
        }
        
        window.onload = hide_loader;
        </script>
</head>
<body>
    
    <div class="body-inner">

<!--div class="preloader">
        <div class="wrapper">
            <div class="blobs">
                <div class="blob-center"></div>
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
            </div>
            <div>
                <div class="loader-canvas canvas-left"></div>
                <div class="loader-canvas canvas-right"></div>
            </div>
        </div>
    </div-->
<div id="loader" >
           
        </div>

<div class="site-top all">
         <header  class="header nav-down header-solid" id="header-2">
            <div class="container">
               <div class="row">
                  <div class="logo-area clearfix logo-wrapper logo-absolute">
                      <div class="logo col-lg-3 col-md-12" style="text-align: left;">
                         <a href="index" style="z-index: 999999999;">
                            <img src="img/logo.png" alt="" style="width: auto; height: 45px; margin-top: -10px;">
                        </a>
                     </div>
                     <!-- logo end-->
                     <div class="col-lg-9 col-md-12 pull-right">
                        <ul class="top-info top-info-wrraper">
                           <li><span class="info-icon"><i class="icon icon-phone3"></i></span>
                              <div class="info-wrapper">
                                 <p class="info-title">+447501586386</p>
                                 <p class="info-subtitle">Call us now</p>
                              </div>
                           </li>
                           <li><span class="info-icon"><i class="icon icon-envelope"></i></span>
                              <div class="info-wrapper">
                                 <p class="info-title">support@cryptochainspot.com</p>
                                 <p class="info-subtitle">Send us mail</p>
                              </div>
                           </li>
                           <?php 
                           if(isset($_SESSION["login"])){
                            ?>
                           <li class="header-get-a-quote"><a class="btn btn-warning" href="user/logout">Logout</a></li>
                       <?php } 
                       else{
                        ?>
<li class="header-get-a-quote"><a class="btn btn-warning" href="user/login">Login</a></li>
                        <?php
                       }
                       ?>
                        </ul>
                     </div>
                     <!-- Col End-->
                  </div>
                  <!-- Logo Area End-->
               </div>
            </div>
            <!-- Container end-->
            <div class="site-nav-inner site-navigation navdown nav-transparent">
               <div class="container">
                  <nav class="navbar navbar-expand-lg justify-content-end">
                    <?php 
                           if(isset($_SESSION["login"])){
                            ?>
                           <a class="btn btn-warning d-md-none" style='padding: 6px 10px; border-radius: 5px; margin-right: 3px;' href="user/logout"><i class='fa fa-sign-in'></i> Logout</a>

                       <?php } 
                       else{
                        ?>
                        <a class="btn btn-warning d-md-none" style='padding: 6px 10px; border-radius: 5px; margin-right: 3px;' href="user/login"><i class='fa fa-sign-in'></i> Login</a>
                        <?php
                       }
                       ?>
                       <?php if ($_SESSION['login']=="user") {
                                // code...


                                ?>
                                 <a class="btn btn-primary d-md-none" style='padding: 6px 10px; border-radius: 5px;' href="user/dashboard"><i class='fa fa-user'></i></a>
                                <?php
                            }
                            else if ($_SESSION['login']=="admin") {
                                // code...
                                ?>
                                 <a class="btn btn-primary d-md-none" style='padding: 6px 10px; border-radius: 5px;' href="user/admin?u"><i class='fa fa-user'></i></a>

                                <?php
                            }
                            
                             else{
                                ?>
                                <a class="btn btn-primary d-md-none" style='padding: 6px 10px; border-radius: 5px;' href="user/signup"><i class='fa fa-user-plus'></i></a>
                               <?php
                            }
                            ?>
                          
                     
                      
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                         <span class="navbar-toggler-icon"><i class="icon icon-menu"></i></span>
                     </button>
                     <!-- End of Navbar toggler-->
                     <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                               <a href="index">Home</a>
                           </li>
                           <li class="nav-item">
                               <a href="about">About Us</a>
                           </li>
                           
                           <li class="nav-item dropdown"><a class="nav-link" href="#" data-toggle="dropdown">Investments<i class="fa fa-angle-down"></i></a>
                                 <ul class="dropdown-menu" role="menu">
                                    <?php
                                    $coinsql = "SELECT * from coins";
                                    $coinresult = mysqli_query($link,$coinsql);
                                    $countcoin = mysqli_num_rows($coinresult);

                                        if($countcoin != 0){
                                            while($coinrow = $coinresult->fetch_assoc()) { 
                                            $coinname = $coinrow["coin_name"];
                                            $coinid = $coinrow["coin_id"];



                                     ?>
                                     <li><a href="plans?p=<?php echo $coinid; ?>"><?php echo $coinname; ?></a></li>
                                     <?php } 
                                 }
                                     else{
                                        ?>
                                        <li>No Coin Added yet!</li>


                                        <?php
                                     }

                                     ?>
                                    
                                 </ul>
                              </li>
                           
                           <li class="nav-item">
                               <a href="faq">FAQs</a>
                           </li>
                           
                           <li class="nav-item">
                               <a href="contact">Support</a>
                           </li>
                           
                           <!-- li end-->
                           <li class="nav-item">
                               <a href="privacy">Policy</a>
                           </li>
                           
                           <li class="nav-item">
                               <a href="legal">Legal</a>
                           </li>
                           
                           <li class="nav-item">
                               <a href="buy-btc">Buy Digital Currency</a>
                           </li>
                           
                           <li class="nav-item">
                            <?php if ($_SESSION['login']=="user") {
                                // code...


                                ?>
                                <a href="user/dashboard">Dashboard</a>
                                <?php
                            }
                            else if ($_SESSION['login']=="admin") {
                                // code...
                                ?>
                                <a href="user/admin?u">Dashboard</a>

                                <?php
                            }
                            
                             else{
                                ?>
                               <a href="user/signup">Sign Up</a>
                               <?php
                            }
                            ?>
                           </li>
                        </ul>
                        <!--Nav ul end-->
                     </div>
                  </nav>
               </div>
            </div>
            <!-- Site nav inner end-->
         </header>
         <!-- Header end-->
      </div>