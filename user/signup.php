


<?php session_start();
require_once("config.php");
if(isset($_SESSION['login'])){
 echo ("<script LANGUAGE='JavaScript'>
    window.location.href='logout';
    </script>");
}
 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=no">
  <title>Register New Account | CryptochainSpot </title>
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
</head>  <body>
          
      <div id="xxloader"  class="text-center xcon"  style="position: fixed; left: 0; right: 0; top: 0; bottom: 0; z-index: 9999; width: 100%; height: 100%; background-color: #fff; opacity: 1; overflow: hidden;">
            <div class="xloader"></div>
        </div>
      
      <div class="container-scroller">
    <div class="container-fluid page-body-wrapper ">
        <div class="main-panel" style="padding-top: 20px;">
            
             
        <div class="content-wrapper d-flex align-items-center auth px-0">
            
          <div class="row w-100 mx-0">
            <div class="col-md-6 mx-auto">
              <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo">
                    <a href="../index"><img src="../img/logo.png" alt="logo"></a>
                </div>
                <h4>Get Started!</h4>
                <h6 class="font-weight-light">It's free to signup and only takes a minute.</h6>
                <div class="alert  container alert-solid alert-success" role="alert" id="msg" style="display: none;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
    <span id="inmsg"></span>        </div>
                                <form class="pt-3" action='' method="post" id="paddForm">
                                    <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter your FullName" name="fullname" value="" id="fullname" >
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter your Username" name="username" value="" id="username" >
                  </div>
                    <div class="form-group">
                    <input type="email" class="form-control" placeholder="Enter your email address" name="email" value="" id="email">
                  </div>
                    <div class="form-group">
                    <input type="number" class="form-control" placeholder="Enter your phone number" name="phone" value="" id="phone">
                  </div>
                   <?php
                                    $coinsql = "SELECT * from coins LIMIT 1";
                                    $coinresult = mysqli_query($link,$coinsql);
                                    $countcoin = mysqli_num_rows($coinresult);

                         if($countcoin != 0){
                    $coinrow = mysqli_fetch_array($coinresult, MYSQLI_ASSOC);                                         
                           $coinname = $coinrow["coin_name"];
                        $coinid = $coinrow["coin_id"];



                                     ?>
                    <div class="form-group">
                        <input type="hidden" hidden name="" id="cid" value="<?php echo $coinid; ?>">
                    <input type="text" class="form-control" placeholder="Enter your <?php echo $coinname; ?> wallet" name="wallet" value="" id="wallet">
                  </div>
              <?php } ?>
                    <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Enter your password" id="pass1">
                  </div>
                    <div class="form-group">
                    <input type="password" name="password2" class="form-control" placeholder="Retype your password" id="pass2">
                  </div>
                  <div class="form-group">
                    <?php 
                    if(isset($_SESSION['ref'])){
                        ?>
                    <input type="text" class="form-control" placeholder="Enter referrer username" name="ref" value="<?php echo $_SESSION['ref']  ?>" id="ref">
                    <?php 
                }
                else{
                    ?>
                    <input type="text" class="form-control" placeholder="Enter referrer username" name="ref" value="" id="ref">
                    <?php
                }
                ?>
                  </div>
                    <div class="form-group">
                                    <div class="custom-checkbox" style='padding: 5px 28px;'>
                                        <input type="checkbox" class="custom-control-input" checked="" disabled="" id="customCheck1">
                                        <label class="custom-control-label text-color--400" for="customCheck1">I agree to the <a href="../rules">terms and conditions</a></label>
                                        
                                        </div>
                                </div>
                  <div class="mt-3">
                    <input class="submitBtn2 btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" name="create" value="Create Account" id="adduser">
                  </div>
                  <div class="text-center mt-4 font-weight-light">
                      Already have an account? <a href="login" class="text-primary">Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

        
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="js/dashboard.js"></script>
  <script src="js/todolist.js"></script>
  <script src="js/data-table.js"></script>
  <!-- End custom js for this page -->
  
  <script src="lib/jquery/js/jquery.js"></script>
    <script src="lib/popper.js/js/popper.js"></script>
    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script src="lib/jquery.cookie/js/jquery.cookie.js"></script>
    <script src="lib/select2/js/select2.min.js"></script>
    
        <script src="lib/chartist/js/chartist.js"></script>
    <script src="lib/d3/js/d3.js"></script>
    <script src="lib/rickshaw/js/rickshaw.min.js"></script>
    <script src="lib/jquery.sparkline.bower/js/jquery.sparkline.min.js"></script>
    <script src="js/ResizeSensor.js"></script>
    <script src="js/dashboard.js"></script>
    <script src="js/slim.js"></script>
    <script type="text/javascript">
        
$(document).ready(function(e){
    // Submit form data via Ajax
    $("#paddForm").on('submit', function(e){
        e.preventDefault();
    var username = document.getElementById("username").value;
     var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var pass1 = document.getElementById("pass1").value;
    var pass2 = document.getElementById("pass2").value;
    var wallet = document.getElementById("wallet").value;
    var fullname = document.getElementById("fullname").value;
    var cid = document.getElementById("cid").value;
 var ref = document.getElementById("ref").value;
 var accept = document.getElementById("customCheck1");
 var element = document.querySelectorAll(".form-group");

    var msg = document.getElementById("msg");
    if (fullname.length==0) {
        alert("please enter your Full name");
    }
    else if (username.length==0) {
        alert("please enter your Username");
    }
    else if(email.length==0){
        alert("Please enter your Email Address");
    }
    else if(phone.length==0){
        alert("Please enter your Phone Number");
    }
    
    else if(pass1.length==0){
       alert("Please enter your Password");
    }
    else if(pass1.length<6){
       alert("Password must be at least 6digits");
    }
    else if(pass2.length==0){
        alert("Please Confirm your Password");
    }
    
   
    else if(pass1 != pass2){
        alert("the two Passwords does not match \n ****please confirm your password");
    }
    else if(!(accept.checked)){
alert("You must accept the terms and condition");
    }
    
    else{

    const formData = new FormData();
    formData.append('username', username)
    formData.append('wallet', wallet)
    formData.append('email', email)
    formData.append('pass', pass1)
    formData.append('phone', phone)
     formData.append('fullname', fullname)
    formData.append('ref', ref)
    formData.append('cid', cid)
    formData.append('adduser', '')

    const options = {
        method: "Post",
        body: formData,
    }
$('.submitBtn2').attr("disabled","disabled");
                $('#paddForm').css("opacity",".5");

        fetch('./functions.php', options)
            .then(data => data.json())
            .then(res => {
                if(res.status == 1){
                   document.getElementById("msg").style.display="block";
                    $('#inmsg').html(res.message);
                    document.getElementById("paddForm").reset();
                    window.scrollTo(0,0);
                }
                else{
                    document.getElementById("msg").style.display="block";
                     $('#inmsg').html(res.message);
                     window.scrollTo(0,0);
                }
                $('#paddForm').css("opacity","");
                $(".submitBtn2").removeAttr("disabled");
                
            });
    
   }
  })
});
    </script>
        <script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
function hide_element(x) {
        document.querySelector(x).style.display='none';
}

function show_element(x) {
        document.querySelector(x).style.display='block';
}      
      function get_options(y,val,x) {
        show_element('#loader');
    $.ajax({
    type: "POST",
    url: 'includes/ajax.php',
    data: y+'='+val,
    success: function(data){
        $(x).html(data);
                hide_element('#loader');
    }
    });
}

function copy_ref(data,btn) {
  var copyText = document.getElementById(data);
  copyText.select();
  document.execCommand("copy");
  $(btn).addClass('btn-success');
  $(btn).html('Copied <i class="fa fa-check"></i>');
  
}
    </script>
    <script>
// WORK IN PROGRESS BELOW
        
$('document').ready(function () {


        // RESTYLE THE DROPDOWN MENU
    $('#google_translate_element').on("click", function () {

        // Change font family and color
        $("iframe").contents().find(".goog-te-menu2-item div, .goog-te-menu2-item:link div, .goog-te-menu2-item:visited div, .goog-te-menu2-item:active div, .goog-te-menu2 *")
            .css({
                'color': '#544F4B',
                'font-family': 'Roboto',
                                'width':'100%'
            });
        // Change menu's padding
        $("iframe").contents().find('.goog-te-menu2-item-selected').css ('display', 'none');
            
                // Change menu's padding
        $("iframe").contents().find('.goog-te-menu2').css ('padding', '0px');
      
        // Change the padding of the languages
        $("iframe").contents().find('.goog-te-menu2-item div').css('padding', '20px');
      
        // Change the width of the languages
        $("iframe").contents().find('.goog-te-menu2-item').css('width', '100%');
        $("iframe").contents().find('td').css('width', '100%');
      
        // Change hover effects
        $("iframe").contents().find(".goog-te-menu2-item div").hover(function () {
            $(this).css('background-color', '#4385F5').find('span.text').css('color', 'white');
        }, function () {
            $(this).css('background-color', 'white').find('span.text').css('color', '#544F4B');
        });

        // Change Google's default blue border
        $("iframe").contents().find('.goog-te-menu2').css('border', 'none');

        // Change the iframe's box shadow
        $(".goog-te-menu-frame").css('box-shadow', '0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.3)');
        
      
      
        // Change the iframe's size and position?
        $(".goog-te-menu-frame").css({
            'height': '100%',
            'width': '100%',
            'top': '0px'
        });
        // Change iframes's size
        $("iframe").contents().find('.goog-te-menu2').css({
            'height': '100%',
            'overflow': 'scroll',
            'width': '100%'
        });
    });
});
</script>
    
    <!--Start of Tawk.to Script-->

<!--End of Tawk.to Script-->  </body>
</html>

