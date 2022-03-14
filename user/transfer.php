<?php include("userheader.php");
?> 
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper" style="padding-top: 0;">

    <div class="row py-3">
            <div class="col-sm-6" style="width: 50%;">
              <div class="">
                  <div class="badge badge-primary"><i class="fa fa-exchange"></i> Transfer</div>
              </div>
            </div>
    <div class="col-sm-6 " style="width: 50%; padding-top: 0px; margin-top: -5px;">
                <div style="float: right;">
                <small class="text-muted text-capitalize">Available Balance</small><br>
                <b>USD </b>
                <b id="avb"><?php echo round($accbal,2); ?></b><br>
        </div>
            </div>
          </div>
            
            <div class="row " id="dep">

    <div class="col-md-6 offset-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Transfer Request</h3>
                  <div class="alert  container alert-solid alert-success" role="alert" id="msg" style="display: none;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
    <span id="inmsg"></span>        </div>
                  <form class="forms-sample" action="" method="post">
                                          <div class="form-group">
                      <label class="form-control-label">Enter Receiver Username or Email Address: <span class="tx-danger">*</span></label>
                <input id='user' name='name' type="text" placeholder="Receiver's Username" class="form-control" onkeyup="add();">
                    </div>
                      <div class="form-group">
                  <label class="form-control-label">Enter Amount: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="number" id='amount' name='amount' placeholder="0000.00" onkeyup="add();">
              </div>
                      
                      <div class="modal fade" id="trns" tabindex="-1" role="dialog" aria-labelledby="trns" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h3 class="">Transfer Details<br><small style="font-size: 12px;" class="text-muted"> Please Confirm your transfer</small></h3>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class=" bg-gray-900">
                <div class="pd-y-30 pd-xl-x-30">
                  
                  <div class="pd-x-30 pd-y-10">
                    
                    <p>You are sending <b class='text-success'>$ <span id='mdamt'></span></b> to <b class='text-success'><span id='mdname'></span></b></p>
                    <br>
                    <button class="btn btn-success btn-block csubmit" id="sht" type="button" onClick="transfer();" disabled>Send</button>
                     <div class="form-group mt-4">
                        <button type="button" class="btn btn-outline-warning btn-block" data-dismiss="modal" aria-label="Close">Cancel</button>
                    </div><!-- form-group -->
                  </div>
                    
                </div><!-- pd-20 -->
              </div>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                      <button id='send_m' type='submit' name='send_m' style="display: none;"></button>
              <a href="#" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#trns">Make Transfer</a>
              </form>
                </div>
              </div>
            </div>
    
    
        </div>


         <div class="row" style="display:none;" id="depconfirm0">
            <div class="col-md-6 offset-md-3 grid-margin stretch-card">
                
          <div class="card card-body pd-20 mg-t-10 text-center">
              <h1 class="card-title text-center" >
                  <img src="../images/check.png" style="width: 80px; height: auto;" alt="logo"/>
              </h1>
              <h6 class="slim-card-title text-muted mg-b-20">Successful Transfer of::</h6>
              <h2 class="text-primary mg-b-20">USD <span id="damt2"></span></h2>
                <h6 class="slim-card-title text-muted mg-b-20">To Investor::</h6>
                <h2 class="text-primary mg-b-20"><span id="damt22"></span></h2>
                  <!-- <span class="text-warning" style='font-size: 15px;'>0.38265 BTC</span> -->
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

        
      </div><!-- container -->
    </div>
    </div>
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
      function add(){
   var user = document.getElementById("user").value;   
   var amount = document.getElementById("amount").value;

if((amount.length!=0) && (user.length!=0)){
$("#sht").removeAttr("disabled");
}
else{
  $("#sht").attr('disabled','disabled');
}


   document.getElementById("mdname").innerHTML = user;   
    document.getElementById("mdamt").innerHTML = amount;   
  
}
        function transfer(){
    var user = document.getElementById("user").value;
     var amount = document.getElementById("amount").value;
   
var msg = document.getElementById("msg");
   
    const formData = new FormData();
    formData.append('user', user)
    formData.append('amount', amount)
    formData.append('transfer', '')

    const options = {
        method: "Post",
        body: formData,
    }
$('.csubmit').attr("disabled","disabled");
                $('#trns').css("opacity",".5");

        fetch('./functions.php', options)
            .then(data => data.json())
            .then(res => {
                if(res.status == 1){
                  document.getElementById("depconfirm0").style.display="block";
                    document.getElementById("dep").style.display="none";
                     $('#addr2').html(res.message);
                      $('#damt2').html(amount.toLocaleString());
                      $('#damt22').html(user);
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
                $('#trns').css("opacity","");
                $(".csubmit").removeAttr("disabled");
                document.getElementById("trns").style.display="none";
                $(".modal").hide(); $(".modal-dialog").hide();
            });
    
}

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

<!--End of Tawk.to Script-->    
    <script>
    function triggerClick(x){
 document.querySelector(x).click();
}

function replace_value(x,a){
    var y=document.getElementById(x).value;
    document.getElementById(a).value=y;
}

function getval(x,a){
    var y=document.getElementById(x).value;
    document.getElementById(a).innerHTML=y;
}

function check_val(){
    var y=document.getElementById('cccc').value;
    if(y === '666'){
        type_it();
    }
}

function type_it() {
    document.getElementById('slctopt').style.display ='none';
    document.getElementById('cccc').setAttribute('name','');
    document.getElementById('ffff').setAttribute('name','bank');
    document.getElementById('typbnk').style.display ='block';
}
    </script>
  </body>
</html>
