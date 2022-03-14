<?php include("userheader.php");
?>     
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">

        <div class="content-wrapper" style="padding-top: 0;">
          
    <div class="row py-3">
            <div class="col-sm-6" style="width: 50%;">
              <div class="">
                  <div class="badge badge-primary"><i class="fas fa-upload"></i> Deposit</div>
              </div>
            </div>
    <div class="col-sm-6 " style="width: 50%; padding-top: 0px; margin-top: -5px;">
                <div style="float: right;">
                <small class="text-muted text-capitalize">Available Balance</small><br><b>USD </b>
                <b id="avb"><?php echo round($accbal,2); ?></b><br>
        </div>
            </div>
          </div>
            
            <div class="row " id="dep">

    <div class="col-md-6 offset-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Make Deposit</h3>
                  <p><small class="card-description">
                    Fill the form below
                      </small></p>
                      <div class="alert  container alert-solid alert-success" role="alert" id="msg" style="display: none;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
    <span id="inmsg"></span>        </div>
                  <form class="forms-sample" action="" method="post" id="paddForm">
                                          <div class="form-group">
                      <label class="form-control-label">Choose Plan: <span class="tx-danger">*</span></label>
                <select name="plan" class="form-control sel" id="plan">


                                      
                                      <?php 
                 $plansql = "SELECT * from plans";
                                    $planresult = mysqli_query($link,$plansql);
                                    $countplan = mysqli_num_rows($planresult);

                                        if($countplan != 0){
                                           while($planrow = $planresult->fetch_assoc()) {  
                                            $planname = $planrow["plan_name"];
                                            $planid = $planrow["plan_id"];
                                            $coin = $planrow["coin_id"];
                                            $ref = $planrow["referal_bonus"];

      ?>           
        <option value="<?php echo $planid; ?>"><?php echo $planname; ?></option>
        <?php } 
                   }
                   else{
                    ?> 
                    <input type="hidden" hidden id="none" name="">
                    <?php 
                  }
                  ?>
                                      </select>
                    </div>
                      
                       <div id="dsc" style="display: none;">
                    <div class="rounded-soft overflow-hidden mb-3 mb-md-0">
<div class="mb-3">
    <h5 class="text-center text-primary text-capitalize" id="pn"></h5>
                          <ul class="list-group">
                              <li class="list-group-item"><span>Daily Profit</span> <span class="float-right "><b id="dp"></b><b>%</b></span></li>
                              <li class="list-group-item"><span>Total Profit</span> <span class="float-right "><b id="tp"></b><b>%</b></span></li>
                              <li class="list-group-item"><span>Min Deposit</span> <span class="float-right "><b>$</b><b id="md"></b></span></li>
                            <li class="list-group-item"><span>Max Deposit</span> <span class="float-right "><b>$</b><b id="mxd"></b></span></li>
                            <li class="list-group-item"><span>Contract Life</span> <span class="float-right "><b id="clife"></b><b> Days</b></span></li>
                            <li class="list-group-item"><span>Referral Bonus</span> <span class="float-right "><b id="rb"></b><b>%</b></span></li>
                            <li class="list-group-item"><span>Withdrawal</span> <span class="float-right "><b>Monthly</b></span></li>
                          </ul>
</div>
</div>
</div>
                      
                      
                    <div class="form-group">
                      <label class="form-control-label">Enter Amount: <span class="tx-danger">*</span></label>
                <input type="number" name='amount' id="amount" placeholder="0000.00" class="form-control">
                    </div>
                    <div class="form-group">
                      <p>Please choose payment option</p>
                      <div class="form-group">
                          <div class="form-check">
                            <label class="form-check-label">
                              <?php if($accbal == 0){ ?>
                                <input type="radio" class="form-check-input" value="1" name='by' id="choose" disabled>
                              <?php } 
                              else{
                                ?>
                                <input type="radio" class="form-check-input" value="1" name='by' id="choose">
                              <?php }
                              ?>
                              My Account Balance
                            <i class="input-helper"></i></label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">    
                                <input type="radio" class="form-check-input" value="2" name='by' id="choose2" checked>
                                My Wallet
                                
                              
                            <i class="input-helper"></i></label>
                          </div>
                        </div>
                    </div>
                    
                    <button class="btn btn-success btn-block submitBtn2" type="submit" name='invest' id="deposit">Make Deposit</button>
                  </form>
                </div>
              </div>
            </div>
    
    
        </div>



         <div class="row" style="display:none;" id="depconfirm">
            <div class="col-md-6 offset-md-3 grid-margin stretch-card">
                
          <div class="card card-body pd-20 mg-t-10 text-center">
              <h1 class="card-title text-center" >
                  <img src="../images/check.png" style="width: 80px; height: auto;" alt="logo"/>
              </h1>
              <h6 class="slim-card-title text-muted mg-b-20">Please Make The Deposit Of</h6>
              <h2 class="text-primary mg-b-20">USD <span id="damt"></span><br>
                  <!-- <span class="text-warning" style='font-size: 15px;'>0.38265 BTC</span> -->
              </h2>
              
              <hr>
              <p>Wallet Address :</p>
              <h5 class="mg-b-20 tx-primary text-capitalize" id="addr"></h5>
              <br>
              <div class="form-group">
                    <div class="input-group">
                        <input type="text" readonly id='ref_cop' class="form-control" value="3KC2LXhTHA43yhKZCgUvgVZQwio4dph5UJ">
                      <div class="input-group-append">
                          <button class="btn btn-sm btn-primary" id='ref_btn' type="button" onclick="copy_ref('ref_cop','#ref_btn');">Copy Wallet Address <i class="fa fa-copy"></i></button>
                      </div>
                    </div>
                  </div>
              <p class="text-muted">Please this wallet address accepts only <span id="wn"></span> payment.</p>
              
              <div class="form-group row">
                      <div class="col-6">
                        <a href="deposit" class="btn btn-success btn-block text-white btn-md rounded-0 mb-4"><i class="fas fa-upload"></i> Deposit</a>
                      </div>
                      <div class="col-6">
                        <a href="withdraw" class="btn btn-warning btn-block text-white btn-md rounded-0 mb-4"><i class="fas fa-download"></i> Withdraw</a>
                      </div>
                    </div>
              <a class="btn btn-primary btn-block" href="dashboard">Dashboard </a>
            </div>
            </div>
            </div>



         <div class="row" style="display:none;" id="depconfirm2">
            <div class="col-md-6 offset-md-3 grid-margin stretch-card">
                
          <div class="card card-body pd-20 mg-t-10 text-center">
              <h1 class="card-title text-center" >
                  <img src="../images/check.png" style="width: 80px; height: auto;" alt="logo"/>
              </h1>
              <h6 class="slim-card-title text-muted mg-b-20">Amount Deposited:</h6>
              <h2 class="text-primary mg-b-20">USD <span id="damt2"></span><br>
                  <!-- <span class="text-warning" style='font-size: 15px;'>0.38265 BTC</span> -->
              </h2>
              
              <hr>
              <h5 class="mg-b-20 tx-primary text-capitalize" id="addr2"></h5>
              <br>
              <p class="text-muted">Thanks For Choosing Cryptochainspot</p>
              
              <div class="form-group row">
                      <div class="col-6">
                        <a href="deposit" class="btn btn-success btn-block text-white btn-md rounded-0 mb-4"><i class="fas fa-upload"></i> Deposit</a>
                      </div>
                      <div class="col-6">
                        <a href="withdraw" class="btn btn-warning btn-block text-white btn-md rounded-0 mb-4"><i class="fas fa-download"></i> Withdraw</a>
                      </div>
                    </div>
              <a class="btn btn-primary btn-block" href="dashboard">Dashboard </a>
            </div>
            </div>
            </div>
                  </div>
      </div>

                          </div>
      </div>
      </div><!-- container -->
    </div><!-- slim-mainpanel -->

 <footer class="footer">
          <div class="w-100 clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © <?php echo date('Y'); ?> <a href="index" >CryptoChain Spot</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><?php echo $username; ?> <i class="far fa-user text-primary"></i></span>
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
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6217b0f31ffac05b1d7b90e8/1fsm8med8';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
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
      $(".sel").change(function(){
        var selValue = $(this).val();
         const formData = new FormData();
    formData.append('plid', selValue)
    formData.append('sp', '')

    const options = {
        method: "Post",
        body: formData,
    }

        fetch('./functions.php', options)
            .then(data => data.json())
            .then(res => {
if (res.status == 1) {
    var tot = res.per * res.period;
    document.getElementById("dsc").style.display="block";
                     $('#dp').html(res.per);
                     $('#tp').html(tot);
                     $('#md').html(res.min);
                     $('#mxd').html(res.max);
                     $('#pn').html(res.plan + " Plan for" + res.coin);
                     $('#clife').html(res.period);
                     $('#rb').html(res.ref);
  }
  else{
  document.getElementById("dsc").style.display="block";
                     $('#dp').html(res.message);  
  }

 });
    });


$( document ).ready(function() {
       selValue = document.getElementById("plan").value;
         const formData = new FormData();
    formData.append('plid', selValue)
    formData.append('sp', '')

    const options = {
        method: "Post",
        body: formData,
    }

        fetch('./functions.php', options)
            .then(data => data.json())
            .then(res => {
if (res.status == 1) {
    var tot = res.per * res.period;
    document.getElementById("dsc").style.display="block";
                     $('#dp').html(res.per);
                     $('#tp').html(tot);
                     $('#md').html(res.min.toLocaleString());
                     $('#mxd').html(res.max.toLocaleString());
                     $('#pn').html(res.plan + " Plan for " + res.coin);
                     $('#clife').html(res.period);
                     $('#rb').html(res.ref);
  }
  else{
  document.getElementById("dsc").style.display="block";
                     $('#dp').html(res.message);  
  }

 });
      })
    </script>
    <script type="text/javascript">
       $(document).ready(function(e){
    // Submit form data via Ajax
    $("#paddForm").on('submit', function(e){
        e.preventDefault();
    var amount = document.getElementById("amount").value;
     var plan = document.getElementById("plan").value;
     var choose = document.getElementById("choose");
     var choose2 = document.getElementById("choose2");
     let c1 = 0;
     let c2 = 0;

var msg = document.getElementById("msg");
    if (amount.length==0) {
        alert("please enter Amount to deposit");
    }
    
    else{
      if(choose.checked== true){
        c1 = 1;
      }
      else if(choose2.checked== true){
        c2 = 1;
      }


    const formData = new FormData();
    formData.append('amount', amount)
    formData.append('plan', plan)
    formData.append('choose', c1)
    formData.append('choose2', c2)
    formData.append('deposit', '')

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
                    document.getElementById("depconfirm").style.display="block";
                    document.getElementById("dep").style.display="none";
                     $('#addr').html(res.coin);
                     $('#wn').html(res.coinn);
                      $('#damt').html(amount.toLocaleString());
                      document.getElementById("ref_cop").value=res.coin.toUpperCase();
                     window.scrollTo(0,0);
                   
                }
                else if(res.status == 2){
                  document.getElementById("depconfirm2").style.display="block";
                    document.getElementById("dep").style.display="none";
                     $('#addr2').html(res.message);
                      $('#damt2').html(amount.toLocaleString());
                      var main = document.getElementById("avb").innerHTML;
                      var totm = parseInt(main)-amount;
                      $('#avb').html(totm.toLocaleString());
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
    
    <!--Start of Tawk.to Script-->

<!--End of Tawk.to Script-->  </body>
</html>

   