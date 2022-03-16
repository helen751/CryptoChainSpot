<?php include("header.php");
trim(extract($_POST));
if (isset($_POST['blockuser'])) {
    $sql = "UPDATE accounts SET status = 0 where user_id = '$uid'";

    if(mysqli_query($link,$sql)){
      if($uv == "admin"){
      echo ("<script LANGUAGE='JavaScript'>
        alert('User Blocked');
    window.location.href='admin?u';
    </script>");
    }
    else{
echo ("<script LANGUAGE='JavaScript'>
        alert('User Blocked');
    window.location.href='view?users';
    </script>");
    }
    }
    else{
      if($uv == "admin"){
      echo ("<script LANGUAGE='JavaScript'>
        alert('Failed to Block account');
    window.location.href='admin?u';
    </script>");
    }
    else{
echo ("<script LANGUAGE='JavaScript'>
        alert('Failed to Block account');
    window.location.href='view?users';
    </script>");
    }
  
}
}

else if (isset($_POST['deleteuser'])) {
    $sql = "DELETE FROM users where user_id = '$uid'";

    if(mysqli_query($link,$sql)){
      if($uv == "admin"){
      echo ("<script LANGUAGE='JavaScript'>
        alert('User Deleted Successfully');
    window.location.href='admin?u';
    </script>");
    }
    else{
echo ("<script LANGUAGE='JavaScript'>
        alert('User Deleted Successfully');
    window.location.href='view?users';
    </script>");
    }
    }
    else{
      if($uv == "admin"){
      echo ("<script LANGUAGE='JavaScript'>
        alert('Failed Deleting User');
    window.location.href='admin?u';
    </script>");
    }
    else{
echo ("<script LANGUAGE='JavaScript'>
        alert('Failed Deleting User');
    window.location.href='view?users';
    </script>");
    }
  
}
}


// else if (isset($_POST['deletecoin'])) {
//     $sql = "DELETE FROM coins where coin_id = '$coinid'";

//     if(mysqli_query($link,$sql)){
     
// echo ("<script LANGUAGE='JavaScript'>
//         alert('Coin Deleted Successfully');
//     window.location.href='view?coins';
//     </script>");
//     }
//     else{
     
//       echo ("<script LANGUAGE='JavaScript'>
//         alert('Failed Deleting Coin');
//     window.location.href='view?coins';
//     </script>");
    
// }
// }

// else if (isset($_POST['deleteplan'])) {
//     $sql = "DELETE FROM plans where plan_id = '$coinid'";

//     if(mysqli_query($link,$sql)){
     
// echo ("<script LANGUAGE='JavaScript'>
//         alert('Plan Deleted Successfully');
//     window.location.href='view?coins';
//     </script>");
//     }
//     else{
     
//       echo ("<script LANGUAGE='JavaScript'>
//         alert('Failed Deleting Plan');
//     window.location.href='view?coins';
//     </script>");
    
// }
// }


else if (isset($_POST['unblockuser'])) {
    $sql = "UPDATE accounts SET status = 1 where user_id = '$uid'";

    if(mysqli_query($link,$sql)){
      if($uv == "admin"){
      echo ("<script LANGUAGE='JavaScript'>
        alert('User Unblocked');
    window.location.href='admin?u';
    </script>");
    }
    else{
echo ("<script LANGUAGE='JavaScript'>
        alert('User Unblocked');
    window.location.href='view?users';
    </script>");
    }
    }
    else{
      if($uv == "admin"){
      echo ("<script LANGUAGE='JavaScript'>
        alert('Failed to Unblock');
    window.location.href='admin?u';
    </script>");
    }
    else{
echo ("<script LANGUAGE='JavaScript'>
        alert('Failed to Unblock');
    window.location.href='view?users';
    </script>");
    }
  
}
}


if (isset($_POST['delwal'])) {
$accsql = "SELECT * from withdrawals where wallet_id='$walid'";
     $accresult = mysqli_query($link,$accsql);
     $countacc = mysqli_num_rows($accresult);

   if($countacc == 0){
$sql = "DELETE FROM wallets where wallet_id = '$walid'";

        if(mysqli_query($link,$sql)){
            echo ("<script LANGUAGE='JavaScript'>
                alert('Wallet Deleted Successfully');
    window.location.href='wallet';
    </script>");
        }
        else{
            echo ("<script LANGUAGE='JavaScript'>
                alert('Error Deleting Wallet Please try again');
    window.location.href='wallet';
    </script>");
    
}
}
else{
    
    $accrow = mysqli_fetch_array($accresult, MYSQLI_ASSOC); 
      $ts = $accrow["transaction_status"];
      if($ts == 0){
        echo ("<script LANGUAGE='JavaScript'>
                alert('A Pending Withdrawal is depending on this wallet. please contact the support team for Help');
    window.location.href='wallet';
    </script>");

      }
      else{
$sql = "UPDATE withdrawals set wallet_id = null where wallet_id = '$walid'";

        if(mysqli_query($link,$sql)){
            $sql2 = "DELETE FROM wallets where wallet_id = '$walid'";

        if(mysqli_query($link,$sql2)){
            echo ("<script LANGUAGE='JavaScript'>
                alert('Wallet Deleted Successfully');
    window.location.href='wallet';
    </script>");
        }
        else{
            echo ("<script LANGUAGE='JavaScript'>
                alert('Error Deleting Wallet Please try again');
    window.location.href='wallet';
    </script>");
    
}
        }
        else{
            echo ("<script LANGUAGE='JavaScript'>
                alert('Error Deleting Wallet Please try again');
    window.location.href='wallet';
    </script>");
    
}
      }

}
}


 ?>  
      <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper" style="padding-top: 0;">
          
          

   
<?php if(isset($_POST["edituser"])){
          ?>
           <div class="row py-3">
            <div class="col-sm-6" style="width: 50%;">
              <div class="">
                  <div class="badge badge-primary"><i class="fas fa-home menu-icon"></i> Edit User</div>
              </div>
            </div>
    <div class="col-sm-6 " style="width: 50%; padding-top: 0px; margin-top: -5px;">
                <div style="float: right;">
                <small class="text-muted text-capitalize">User Name</small><br>
                <b><?php echo $username ?></b><br>
        </div>
            </div>
          </div>
          <div class="alert  alert-solid alert-success" role="alert" id="msg" style="display: none;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="close();">
              <span aria-hidden="true">×</span>
            </button>
    <span id="inmsg"></span>        </div>
     <div class="row mb-3">
          <div class="col-md-8">
          <div class="card card-body pd-20 mg-t-10">
              <h3 class="card-title">Update User Details</h3>
              <p><small class="card-description">
                      </small></p>
              <form action="functions.php" method="post" id="uForm">
                   <input type="text" hidden id="uid" name="uid" value="<?php echo $uid; ?>">
                      <input type="text" hidden id="uv" name="uv" value="<?php echo $uv ?>">
              <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter FullName" name="fullname" value="<?php echo $fullname  ?>" id="fullname" required>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter Username" name="username" value="<?php echo $username; ?>" id="username" required>
                  </div>
                    <div class="form-group">
                    <input type="email" class="form-control" placeholder="Enter email address" name="email" value="<?php echo $email; ?>" id="email" required>
                  </div>
                    <div class="form-group">
                    <input type="number" class="form-control" placeholder="Enter your phone number" name="phone" value="<?php echo $phone; ?>" id="phone" required>
                  </div>
                   <div class="form-group">
                    <input type="number" class="form-control" placeholder="Enter New Account Balance" name="acc" value="<?php echo $acc; ?>" id="acc" required>
                  </div>
              
              <button class="btn btn-primary btn-block submitBtn2" name='edituser' type="submit">Edit User</button>
          </form>
            </div>
          </div>
        </div>

 <?php } 
 else if(isset($_POST["editcoin"])){
          ?>
           <div class="row py-3">
            <div class="col-sm-6" style="width: 50%;">
              <div class="">
                  <div class="badge badge-primary"><i class="fas fa-home menu-icon"></i> Edit Coin</div>
              </div>
            </div>
    <div class="col-sm-6 " style="width: 50%; padding-top: 0px; margin-top: -5px;">
                <div style="float: right;">
                <small class="text-muted text-capitalize">Coin Name</small><br>
                <b><?php echo $coinname ?></b><br>
        </div>
            </div>
          </div>
          <div class="alert  alert-solid alert-success" role="alert" id="msg" style="display: none;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="close();">
              <span aria-hidden="true">×</span>
            </button>
    <span id="inmsg"></span>        </div>
     <div class="row mb-3">
          <div class="col-md-8">
          <div class="card card-body pd-20 mg-t-10">
              <h3 class="card-title">Update Coin Details</h3>
              <p><small class="card-description">
                      </small></p>
              <form method="post" id="caddForm">
                   <input type="text" hidden id="coinid" name="coinid" value="<?php echo $coinid; ?>">
                     
              <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter New Coin Name" name="coinname" value="<?php echo $coinname  ?>" id="coinname" required>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter New Coin Wallet" name="wallet" value="<?php echo $wallet; ?>" id="wallet" required>
                  </div>
                    <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter email address" name="abbrev" value="<?php echo $abbrev; ?>" id="abbrev" required>
                  </div>
                  
              
              <button class="btn btn-primary btn-block submitBtnc" name='editcoin' type="submit">Edit Coin</button>
          </form>
            </div>
          </div>
        </div>

 <?php }

 else if(isset($_POST["editplan"])){
          ?>
           <div class="row py-3">
            <div class="col-sm-6" style="width: 50%;">
              <div class="">
                  <div class="badge badge-primary"><i class="fas fa-home menu-icon"></i> Edit Plan</div>
              </div>
            </div>
    <div class="col-sm-6 " style="width: 50%; padding-top: 0px; margin-top: -5px;">
                <div style="float: right;">
                <small class="text-muted text-capitalize">Coin Name</small><br>
                <b><?php echo $planname ?></b><br>
        </div>
            </div>
          </div>
          <div class="alert  alert-solid alert-success" role="alert" id="msg" style="display: none;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="close();">
              <span aria-hidden="true">×</span>
            </button>
    <span id="inmsg"></span>        </div>
     <div class="row mb-3">
          <div class="col-md-8">
          <div class="card card-body pd-20 mg-t-10">
              <h3 class="card-title">Update Plan Details</h3>
              <p><small class="card-description">
                      </small></p>
              <form action="functions.php" method="post" id="paddForm">
                   <input type="text" hidden id="planid" name="planid" value="<?php echo $planid; ?>">
                     
            

                      <div class="form-group">
                      <label class="form-control-label">Enter Plan Name: <span class="tx-danger">*</span></label>
                <input type="text" name='pname' value="<?php echo $planname; ?>" id="pname" placeholder="Beginner Plan" class="form-control">
                    </div>
                    <div class="form-group">
                      <label class="form-control-label">Enter Plan Daily Profit(%): <span class="tx-danger">*</span></label>
                <input type="text" name='profit' value="<?php echo $profit; ?>" id="profit" placeholder="12" class="form-control" oninput="valid(this)">
                    </div>
                    <div class="form-group">
                      <label class="form-control-label">Enter Referral Bonus  Profit(%): <span class="tx-danger">*</span></label>
                <input type="text" name='ref' value="<?php echo $ref; ?>" id="refp" placeholder="5" class="form-control" oninput="validref(this)">
                    </div>
                    <div class="form-group">
                    <label class="form-control-label">Enter Plan Period in Weeks: <span class="tx-danger">*</span></label>
                <input type="number" value="<?php echo $period/7; ?>" name='period' id="period" placeholder="30" class="form-control">
                    </div>

                    <div class="form-group">
                    <label class="form-control-label">Plan Minimum Deposit Amount: <span class="tx-danger">*</span></label>
                <input type="text" name='min' value="<?php echo round($min,2); ?>" id="min" placeholder="100" class="form-control" oninput="validmin(this)">
                    </div>

                    <div class="form-group">
                    <label class="form-control-label">Plan Maximum Deposit Amount: <span class="tx-danger">*</span></label>
                <input type="text" name='max' value="<?php echo round($max,2); ?>" id="max" placeholder="1000" class="form-control" oninput="validmax(this)">
                    </div>
                    
                    
                    <input type="submit" class="submitBtn btn btn-success btn-block" value="Update Plan>>>" name='editplan'>
          </form>
            </div>
          </div>
        </div>

 <?php }
 else if(isset($_POST["editwal"])){
          ?>
           <div class="row py-3">
            <div class="col-sm-6" style="width: 50%;">
              <div class="">
                  <div class="badge badge-primary"><i class="fas fa-home menu-icon"></i> Edit Wallet</div>
              </div>
            </div>
    <div class="col-sm-6 " style="width: 50%; padding-top: 0px; margin-top: -5px;">
                <div style="float: right;">
                <small class="text-muted text-capitalize">Wallet ID</small><br>
                <b><?php echo $walid ?></b><br>
        </div>
            </div>
          </div>
          <div class="alert  alert-solid alert-success" role="alert" id="msg" style="display: none;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="close();">
              <span aria-hidden="true">×</span>
            </button>
    <span id="inmsg"></span>        </div>
     <div class="row mb-3">
          <div class="col-md-8">
          <div class="card card-body pd-20 mg-t-10">
              <h3 class="card-title">Update Wallet Details</h3>
              <p><small class="card-description">
                      </small></p>
              <form action="functions.php" method="post" id="waddForm">
                   <input type="text" hidden id="walid" name="walid" value="<?php echo $waliid; ?>">

                   <div class="form-group">
                      <label class="form-control-label">Choose Wallet Type <span class="tx-danger">*</span></label>
                <select name="coin" id="coin" class="form-control select2">
                    <option value="<?php echo $cid  ?>"><?php echo $coinname; ?></option>
                  <?php
                                    $coinsql = "SELECT * from coins";
                                    $coinresult = mysqli_query($link,$coinsql);
                                    $countcoin = mysqli_num_rows($coinresult);

                                          while($coinrow = $coinresult->fetch_assoc()) {                                         
                                            $coinname = $coinrow["coin_name"];
                                            $coinid = $coinrow["coin_id"];



                                     ?>
                    <option value="<?php echo $coinid; ?>"><?php echo $coinname; ?></option>
                    <?php
                                     } 
                                   ?>
                                    
               
                    
                  </select>
                    </div>
                     
               <div class="form-group mg-b-20">
                        <label class="form-control-label">Enter Your Wallet Address <span class="tx-danger">*</span></label>
                      <input type="text" placeholder="Wallet Address" value="<?php echo $wad; ?>" id="wallet" name="wallet" class="form-control" >
                    </div><!-- form-group -->

                  
              
              <button class="btn btn-primary btn-block submitBtnl" name='editwal' type="submit">Edit Wallet</button>
          </form>
            </div>
          </div>
        </div>

 <?php }
 ?>
      </div>
      </div>
      </div><!-- container -->
    


 <footer class="footer">
          <div class="w-100 clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © <?php echo date('Y'); ?> <a href="index" >CryptoChain Spot</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Admin <i class="far fa-user text-primary"></i></span>
            <p  class="text-success"></p>
          </div>
        </footer>

<div id="google_translate_element"></div>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    
   <!--Start of Tawk.to Script-->

<!--End of Tawk.to Script-->    
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
        var RegExp = new RegExp(/^\d*\.?\d*$/);
         var val = document.getElementById("profit").value;
         var val2 = document.getElementById("refp").value;
         var val3 = document.getElementById("min").value;
           var val4 = document.getElementById("max").value;
        

  
        function valid(elem) {
           
            if (RegExp.test(elem.value)) {
                val = elem.value;
            } else {
                elem.value = val;
            }
        }
        function validref(elem) {
            
            if (RegExp.test(elem.value)) {
                val2 = elem.value;
            } else {
                elem.value = val2;
            }
        }
        function validmin(elem) {
            
            if (RegExp.test(elem.value)) {
                val3 = elem.value;
            } else {
                elem.value = val3;
            }
        }
        function validmax(elem) {
          
            if (RegExp.test(elem.value)) {
                val4 = elem.value;
            } else {
                elem.value = val4;
            }
        }
    </script>
    <script type="text/javascript">
      $(document).ready(function(e){
    // Submit form data via Ajax
    $("#caddForm").on('submit', function(e){
        e.preventDefault();
    var abbrev = document.getElementById("abbrev").value;
     var wallet = document.getElementById("wallet").value;
    var coinname = document.getElementById("coinname").value;
    var coinid = document.getElementById("coinid").value;
    var msg = document.getElementById("msg");
    
    if (coinname.length==0) {
        alert("please enter the Coin name")
    }
    else if(wallet.length==0){
        alert("please enter the coin Wallet Address")
    }
    else if(abbrev.length==0){
        alert("please enter the Coin Name Abbreviation")
    }
    
    else{
const formData = new FormData();
    formData.append('coinname', coinname)
    formData.append('wallet', wallet)
    formData.append('abbrev', abbrev)
    formData.append('editcoin', ' ')
    
    const options = {
        method: "Post",
        body: formData,
    }
$('.submitBtnc').attr("disabled","disabled");
                $('#caddForm').css("opacity",".5");

        fetch('./functions.php', options)
            .then(data => data.json())
            .then(res => {
                if(res.status == 1){
                   document.getElementById("msg").style.display="block";
                    $('#inmsg').html(res.message);
                    window.scrollTo(0,0);
                }
                else{
                    document.getElementById("msg").style.display="block";
                     $('#inmsg').html(res.message);
                     window.scrollTo(0,0);
                }
                $('#caddForm').css("opacity","");
                $(".submitBtnc").removeAttr("disabled");
                
            });
}

  })
})

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
<script type="text/javascript">
$(document).ready(function(e){
    // Submit form data via Ajax
    $("#uForm").on('submit', function(e){
        e.preventDefault();
    var fullname = document.getElementById("fullname").value;
     var uid = document.getElementById("uid").value;
    var username = document.getElementById("username").value;
    var uv = document.getElementById("uv").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
 var acc = document.getElementById("acc").value;

    var msg = document.getElementById("msg");
    
    if (acc.length==0) {
        alert("please enter new Account balance")
    }
    else if(fullname.length==0){
        alert("please enter new fullname")
    }
    else if(username.length==0){
        alert("please enter new username")
    }
    else if(email.length==0){
        alert("please enter the new Email Address")
    }
    else if(phone.length==0){
        alert("please enter the Phone Number")
    }
  else{

    const formData = new FormData();
    formData.append('fullname', fullname)
    formData.append('username', username)
    formData.append('uv', uv)
    formData.append('uid', uid)
    formData.append('email', email)
    formData.append('phone', phone)
    formData.append('acc', acc)
    formData.append('edituser', '')

    const options = {
        method: "Post",
        body: formData,
    }
$('.submitBtn2').attr("disabled","disabled");
                $('#uForm').css("opacity",".5");

        fetch('./functions.php', options)
            .then(data => data.json())
            .then(res => {
                if(res.status == 1){
                   if(res.uv == "a"){
                    window.location.href="admin?u";
                   }
                   else{
                    window.location.href="view?users";
                   }
                }
                else{
                    document.getElementById("msg").style.display="block";
                     $('#inmsg').html(res.message);
                     window.scrollTo(0,0);
                }
                $('#uForm').css("opacity","");
                $(".submitBtn2").removeAttr("disabled");
                
            });
    
   }
  })
});

</script>
<script type="text/javascript">
    $(document).ready(function(e){
    // Submit form data via Ajax
    $("#paddForm").on('submit', function(e){
        e.preventDefault();
    var pname = document.getElementById("pname").value;
    var min = document.getElementById("min").value;
    var max = document.getElementById("max").value;
    var period = document.getElementById("period").value;
    var profit = document.getElementById("profit").value;
 var refp = document.getElementById("refp").value;

    var msg = document.getElementById("msg");
    
    if (pname.length==0) {
        alert("please enter the Plan name")
    }
    else if(profit.length==0){
        alert("please enter the Plan profit")
    }
    else if(refp.length==0){
        alert("please enter the Referal Bonus Profit")
    }
    else if(period.length==0){
        alert("please enter the Plan Duration in days")
    }
    else if(min.length==0){
        alert("please enter the Minimum Deposit Amount")
    }
    else if(max.length==0){
        alert("please enter the Maximum Deposit Amount")
    }
    
    else{
        period2 = period*7;

    const formData = new FormData();
    formData.append('pname', pname)
    formData.append('min', min)
    formData.append('max', max)
    formData.append('period', period2)
    formData.append('refp', refp)
    formData.append('profit', profit)
    formData.append('editplan', '')

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
</body>
</html>




           