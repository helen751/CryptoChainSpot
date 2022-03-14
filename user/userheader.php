<?php
require_once("config.php");
session_start();
if(empty(isset($_SESSION['log']))){
  echo ("<script LANGUAGE='JavaScript'>
    window.location.href='logout';
    </script>");
}
else if(!empty(isset($_SESSION['login']))){
if ($_SESSION['login'] != "user") {
 echo ("<script LANGUAGE='JavaScript'>
    window.location.href='logout';
    </script>");
}
}
$id=$_SESSION['user'];
$dd = date('Y-m-d');
$sqlex = "SELECT * FROM deposits WHERE user_id = '$id'";
$resultex = mysqli_query($link,$sqlex);
$countex = mysqli_num_rows($resultex);
if($countex > 0){
while($rowex = $resultex->fetch_assoc()) {
  $e_date = $rowex['expiry_date'];
$dep_s = $rowex['status'];
$trans_id = $rowex['transaction_id'];
$d_amt = $rowex['deposit_amount'];
$d_id = $rowex['deposit_id'];
$pl_id = $rowex['plan_id'];
$income = 0;

$e_date = strtotime($e_date);
$d_date = strtotime($dd);

if($dep_s == 1){

if($d_date >= $e_date){
   echo "<script> alert('hi'); </script>";

   $coinsql5555 = "SELECT * from plans where plan_id ='$pl_id'";
                                    $coinresult5555 = mysqli_query($link,$coinsql5555);
                                    $countcoin5555 = mysqli_num_rows($coinresult5555);
                                     $row2 = mysqli_fetch_array($coinresult5555, MYSQLI_ASSOC);
        $prof = $row2['percentage_profit'];
        $per = $row2['period'];
        $totadd = $prof * $per;
        $bon = ($totadd/100) * $d_amt; 

        $sql = "INSERT INTO bonus(user_id,bonus_type,bonus_amount) values('$id','Plan Bonus','$bon')";

    if(mysqli_query($link,$sql)){
      $refacc = "UPDATE accounts SET account_balance = account_balance+$bon, system_balance = system_balance-$d_amt WHERE user_id='$id'";
    if(mysqli_query($link,$refacc)){
echo "<script> alert('account $id'); </script>";
       $sql4 = "UPDATE transactions SET transaction_status = 2 WHERE transaction_id = '$trans_id'";
if(mysqli_query($link,$sql4)){ 
echo "<script> alert('trans $trans_id'); </script>";
   $sql5 = "UPDATE deposits SET status = 2 WHERE deposit_id = '$d_id'";

if(mysqli_query($link,$sql5)){ 
  echo "<script> alert('deposit $d_id'); </script>";
    }

    }

    }
  }

}
}
else if ($dep_s == 0) {
  $sql3 = "DELETE FROM deposits WHERE deposit_id = '$d_id'";

    if(mysqli_query($link,$sql3)){
     $sql4 = "UPDATE transactions set transaction_status=3 WHERE transaction_id = '$trans_id'";
if(mysqli_query($link,$sql4)){ 

    }
}
}
}
}


$details = "SELECT * FROM users where user_id = $id";
      $detailsresult = mysqli_query($link, $details);
      $countdetails = mysqli_num_rows($detailsresult);
$username = ' ';
$name = ' ';
$email = ' ';
$rank = ' ';
$ref = ' ';
$last = ' ';
$phone = ' ';
$accbal = 0;
$sysbal = 0;
$status = '';
      if($countdetails > 0){
         
        $row = mysqli_fetch_array($detailsresult, MYSQLI_ASSOC);
        $username = $row['username'];
        $email = $row['email_address'];
        $rank = $row["rank"];
        $name = $row['fullname'];
        $phone = $row["phone_number"];
        $ref = $row['referal_link'];
        $last = $row["last_access"];
      }

      $account = "SELECT * FROM accounts where user_id = $id";
      $accountresult = mysqli_query($link, $account);
      $accountdetails = mysqli_num_rows($accountresult);

      if($accountdetails > 0){
$row = mysqli_fetch_array($accountresult, MYSQLI_ASSOC);
        $sysbal = $row['system_balance'];
        $accbal = $row['account_balance'];
        $status = $row['status'];

        if($status == 0){
 echo ("<script LANGUAGE='JavaScript'>
    window.alert('Sorry this account is disabled contact the support center!');
    window.location.href='logout';
    </script>");
        }
      }
      

 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=no">
  <title>Dashboard | <?php echo $_SESSION['name'] ?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <meta name="theme-color" content="#063372">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.html">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/horizontal-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../img/logo-icon-color.png" />
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'><link rel="stylesheet" href="./style.css">
  <style>
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
            document.getElementById("xxloader").style.display = "none";
        }
        
        window.onload = hide_loader;
        </script>
</head>  <body >
    
      
    <div class="container-scroller">
        
        <div id="xxloader">
            
        </div>

<div class="horizontal-menu">
      <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container">
          <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
              <a class="navbar-brand brand-logo" href="index.php"><img src="../img/logo.png" alt="logo"/></a>
              <a class="navbar-brand brand-logo-mini" href="index.php"><img style="width: 30px; height: auto;" src="../img/logo-icon.png" alt="logo"/></a>
          </div>
          <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            
            <ul class="navbar-nav navbar-nav-right">
              
              <li class="nav-item dropdown mr-4">
                <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
                  <i class="fas fa-bell mx-0"></i>
                  <span class="count bg-warning"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                  <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-warning">
                        <i class="fa fa-btc mx-0"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <h6 class="preview-subject font-weight-normal">BTC/USD</h6>
                      <p class="font-weight-light small-text mb-0 text-muted">
                        1 BTC = USD 38,601.44                      </p>
                    </div>
                  </a>
                  <div class="text-center">
                  <a href="deposit" class="btn btn-primary btn-icon-text">
                          <i class="fas fa-upload btn-icon-prepend"></i>                                                    
                          Deposit Now
                        </a>
                  </div>
                  
                </div>
              </li>
              <li class="nav-item nav-profile dropdown">
                <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
                    <i class="fas fa-user mx-0"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                  <a href="profile" class="dropdown-item">
                    <i class="fa fa-cog text-primary"></i>
                    Settings
                  </a>
                  <a href="logout" class="dropdown-item">
                    <i class="fas fa-sign-out-alt text-primary"></i>
                    Logout
                  </a>
                </div>
              </li>
              
              <li class="nav-item " style="margin-right: 0px;">
                <a class=" btn btn-sm btn-success" href="deposit" >
                    <i class="fas fa-upload mx-0"></i>
                </a>
              </li>
              <li class="nav-item ">
                <a class=" btn btn-sm btn-warning" href="withdraw" >
                    <i class="fas fa-download text-white mx-0"></i>
                </a>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
              <span class="fa fa-bars"></span>
            </button>
          </div>
        </div>
      </nav>
      <nav class="bottom-navbar">
        <div class="container">
          <ul class="nav page-navigation">
            <li class="nav-item">
              <a class="nav-link" href="dashboard">
                <i class="fas fa-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="deposit">
                <i class="fas fa-upload  menu-icon"></i>
                <span class="menu-title">Deposit</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="withdraw">
                <i class="fas fa-download  menu-icon"></i>
                <span class="menu-title">Withdraw</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="transfer">
                <i class="fa fa-exchange  menu-icon"></i>
                <span class="menu-title">Transfer</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fa fa-file-alt menu-icon"></i>
                <span class="menu-title">Transactions</span>
                <i class="menu-arrow"></i></a>
              <div class="submenu">
                <ul class="submenu-item">
                <li class="nav-item"><a class="nav-link" href="transactions">All Transaction</a></li>
                <li class="nav-item"><a class="nav-link" href="transactions?d">Deposits</a></li>
                <li class="nav-item"><a class="nav-link" href="transactions?w">Withdrawals</a></li>
                <li class="nav-item"><a class="nav-link" href="transactions?t">Transfer</a></li>
                <li class="nav-item"><a class="nav-link" href="transactions?b">Bonuses</a></li>
                </ul>
              </div>
            </li>
            
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fa fa-user menu-icon"></i>
                <span class="menu-title">Account</span>
                <i class="menu-arrow"></i></a>
              <div class="submenu">
                <ul class="submenu-item">
                <li class="nav-item"><a class="nav-link" href="profile">My Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="wallet">My Wallet</a></li>
                <li class="nav-item"><a class="nav-link" href="referals">My Referral</a></li>
                <li class="nav-item"><a class="nav-link" href="logout">Sign Out</a></li>
                </ul>
              </div>
            </li>
            
          </ul>
        </div>
      </nav>
    </div>        