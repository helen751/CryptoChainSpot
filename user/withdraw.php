<?php
$title = "withdrawal";
 include("userheader.php");
?>    
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper" style="padding-top: 0;">

    <div class="row py-3">
            <div class="col-sm-6" style="width: 50%;">
              <div class="">
                  <div class="badge badge-primary"><i class="fas fa-download"></i> Withdraw</div>
              </div>
            </div>
    <div class="col-sm-6 " style="width: 50%; padding-top: 0px; margin-top: -5px;">
                <div style="float: right;">
                <small class="text-muted text-capitalize">Available Balance</small><br>
                <b><?php echo  number_format(round($accbal,2)); ?></b><br>
        </div>
            </div>
          </div>
                        
            <div class="row " id="dep">

    <div class="col-md-6 offset-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Withdrawal Request</h3>
                  <p><small class="card-description">
                    Basic form layout
                      </small></p>
                      <div class="alert  container alert-solid alert-success" role="alert" id="msg" style="display: none;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
    <span id="inmsg"></span>        </div>
                  <form class="forms-sample" action="" method="post" id="wform">
                   <div class="form-group">
                      <label class="form-control-label">Enter Amount: <span class="tx-danger">*</span></label>
                <input type="number" name='amount' id="amount" placeholder="0000.00" class="form-control">
                    </div>
                      
                                            <div class="form-group">
                  
                  <?php
                               $walletsql = "SELECT * from wallets where user_id = $id";
                                    $walletresult = mysqli_query($link,$walletsql);
                                    $countwallet = mysqli_num_rows($walletresult);

                                        if($countwallet != 0){ 

      ?>        
      <label class="form-control-label">Select Wallet: <span class="text-danger">*</span></label>
                <select class="form-control" name="name" data-placeholder="Choose Wallet" tabindex="-1" aria-hidden="true" id="wallet">
                                
                               
                                <?php 
                                while($coinrow = $walletresult->fetch_assoc()) {
$wid = $coinrow["wallet_id"];
$cid = $coinrow["coin_id"];
$wad = $coinrow["wallet_address"];

$depsql3 = "SELECT * from coins where coin_id='$cid'";
     $depresult3 = mysqli_query($link,$depsql3);
     $countdep3 = mysqli_num_rows($depresult3);
    $deprow = mysqli_fetch_array($depresult3, MYSQLI_ASSOC); 
      $coinname = $deprow["coin_name"];
                                  ?>
<option value='<?php echo $wid; ?>'> <?php echo $coinname; ?> - <?php echo $wad; ?></option>

<?php
                                }
                                ?>

 </select>
                                <?php
                              }
                              else{
                                ?>
                                <div>
                                No wallet added yet please visit the <a href="wallet">wallet</a> page and add one</div>

                                <?php
                              }
                              ?>
                                                                       
                                                                     
              </div>
     
              <button class="btn btn-warning btn-block wsubmit" name="withdraw_m" type="submit">Make Withdraw</button>
              </form>
                              </div>
              </div>
            </div>
    
    
        </div>


        <div class="row" style="display:none;" id="depconfirm2">
            <div class="col-md-6 offset-md-3 grid-margin stretch-card">
                
          <div class="card card-body pd-20 mg-t-10 text-center">
              <h1 class="card-title text-center" >
                  <img src="../images/check.png" style="width: 80px; height: auto;" alt="logo"/>
              </h1>
              <h6 class="slim-card-title text-muted mg-b-20">Requested Withdrawal of::</h6>
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
      </div><!-- container -->
    </div><!-- slim-mainpanel -->
      </div>

    <footer class="footer">
        <div class="w-100 clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019<?php //echo date('Y'); ?> <a href="index" >CryptoChain Spot</a>. All rights reserved.</span>
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
s1.src='https://embed.tawk.to/6251788b7b967b11798992b0/1g073tru9';
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
      $(document).ready(function(e){
    // Submit form data via Ajax
    $("#wform").on('submit', function(e){
        e.preventDefault();
    var amount = document.getElementById("amount").value;
     var wallet = document.getElementById("wallet").value;

     var msg = document.getElementById("msg");
    if (amount.length==0) {
        alert("please enter Amount to Withdraw");
    }
    
    else{
      const formData = new FormData();
    formData.append('amount', amount)
    formData.append('wallet', wallet)
    formData.append('withdraw', '')

    const options = {
        method: "Post",
        body: formData,
    }
$('.wsubmit').attr("disabled","disabled");
                $('#wform').css("opacity",".5");

        fetch('./functions.php', options)
            .then(data => data.json())
            .then(res => {
                if(res.status == 1){
                    document.getElementById("depconfirm2").style.display="block";
                    document.getElementById("dep").style.display="none";
                     $('#addr2').html(res.message);
                      $('#damt2').html(amount.toLocaleString());
                      window.scrollTo(0,0);
                   
                }
                else{
                  document.getElementById("depconfirm2").style.display="block";
                    document.getElementById("dep").style.display="none";
                     $('#addr2').html(res.message);
                      $('#damt2').html(amount.toLocaleString());
                     window.scrollTo(0,0);
                }
             $('#wform').css("opacity","");
                $(".wsubmit").removeAttr("disabled");
                
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
