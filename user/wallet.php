<?php include("userheader.php");
?> 
    <div id="#tr<?php echo $tid; ?>" class="modal fade">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content bd-0 rounded overflow-hidden">
          <div class="modal-body pd-0">
              <!-- col-6 -->
              
            </div><!-- row -->
          </div><!-- modal-body -->
        </div><!-- modal-content -->
      </div><!-- modal-dialog -->
    </div>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper" style="padding-top: 0;">

    <div class="row py-3">
            <div class="col-sm-6" style="width: 50%;">
              <div class="">
                  <div class="badge badge-primary"><i class="fas fa-wallet"></i> My Wallet</div>
              </div>
            </div>
    <div class="col-sm-6 " style="width: 50%; padding-top: 0px; margin-top: -5px;">
                <div style="float: right;">
                <small class="text-muted text-capitalize">Available Balance</small><br>
                <b>USD </b><b id="conv"><?php echo  number_format(round($accbal,2)); ?></b><br>
        </div>
            </div>
          </div>
          <div class="alert  container alert-solid alert-success" role="alert" id="msg" style="display: none;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
    <span id="inmsg"></span>        </div>
            
            <div class="row ">

    <div class="col-md-8 offset-md-2 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">My Wallet History</h3>
                  <p><small class="card-description">
                    Click on + Add Wallet to add a withdrawal wallet address
                      </small></p>
                  <div class="modal fade" id="modaldemo6" tabindex="-1" role="dialog" aria-labelledby="tlabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="">Add Your Wallet<br><small style="font-size: 12px;" class="text-muted"> Add your wallet address to receive your withdrawal.</small></h3>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="">
                    
                    <form action="" method="post" id="paddForm">
                      <input type="text" hidden name="" id="hidinput">
                    <div class="form-group">
                      <label class="form-control-label">Choose Wallet Type <span class="tx-danger">*</span></label>
                <select name="category" id="coin" class="form-control select2">
                  <?php
                                    $coinsql = "SELECT * from coins";
                                    $coinresult = mysqli_query($link,$coinsql);
                                    $countcoin = mysqli_num_rows($coinresult);

                                        if($countcoin != 0){
                                          while($coinrow = $coinresult->fetch_assoc()) {                                         
                                            $coinname = $coinrow["coin_name"];
                                            $coinid = $coinrow["coin_id"];



                                     ?>
                    <option value="<?php echo $coinid; ?>"><?php echo $coinname; ?></option>
                    <?php
                                     } 
                                   ?>
                                     <script type="text/javascript">
                                         document.getElementById("hidinput").value="1";
                                       </script>
                                       <?php
                                     } 
                                     else{
                                        ?>
                                       <option value="">No coin yet you cannot add a plan</option>
                                       <script type="text/javascript">
                                         document.getElementById("hidinput").value="0";
                                       </script>


                                        <?php
                                     }

                                     ?>
               
                    
                  </select>
                    </div><!-- form-group -->
                    <input type="hidden" value="302" name="id">
                    <div class="form-group mg-b-20">
                        <label class="form-control-label">Enter Your Wallet Address <span class="tx-danger">*</span></label>
                      <input type="text" placeholder="Wallet Address" id="wallet" name="name" class="form-control" >
                    </div><!-- form-group -->

                    <button class="btn btn-success btn-block .submitBtn2" type="submit" name="add_wallet">Add Wallet</button>
                    </form><!-- form-group -->
                  </div>
                    
                        </div>
                        <div class="modal-footer">
                          <div class="form-group">
                        <button type="button" class="btn btn-outline-warning btn-block" data-dismiss="modal" aria-label="Close">Go Back</button>
                    </div>
                        </div>
                      </div>
                    </div>
                  </div>
                      <div class="form-group">
                  <a href="#" class="btn btn-outline-success btn-block mg-b-10 " data-toggle="modal" data-target="#modaldemo6"><i class="fa fa-plus mg-r-5"></i> Add Wallet</a>
              </div>
                      <div class="row">
          <div class="table-responsive">
            <table id="datatable2" class="table mg-b-0 tx-12" >
              <thead>
                <tr>
                    <th class="wd-15p">Coin</th>
                  <th class="wd-15p">Wallet Address</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $num = 1;
                               $walletsql = "SELECT * from wallets where user_id = $id";
                                    $walletresult = mysqli_query($link,$walletsql);
                                    $countwallet = mysqli_num_rows($walletresult);

                                        if($countwallet != 0){ 
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
                                  <tr>
                   <td><?php echo $num; ?></td>
                  <td >
                      <div class="tx-inverse tx-14 tx-medium text-success d-block"><?php echo $coinname; ?></div>
                        <span class="tx-11 d-block tx-info"><?php echo $wad; ?></span>
                  </td>
                  
                  <div id="w<?php echo $wid ?>" class="modal fade">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content bd-0 rounded overflow-hidden">
          <div class="modal-body pd-0">
            <div class="">
              <!-- col-6 -->
              <div class=" bg-gray-900">
                <div class="pd-y-30 pd-xl-x-30">
                  
                  <div class="pd-x-30 pd-y-10">
                    <h3 class="tx-gray-300 tx-normal mg-b-5">Delete?</h3>
                    <p>Are you sure to delete <b class="tx-danger"><?php echo $coinname ?> - <?php echo $wad ?></b> Wallet?</p>
                    <br>
                    <form action="functions.php" method="post">
                    <input type="hidden" value="<?php echo $wid ?>" name="walid">
                    <button class="btn btn-danger btn-block" type="submit" name="delwal">Delete</button>
                    </form>
                     <div class="form-group mt-4">
                        <button type="button" class="btn btn-outline-warning btn-block" data-dismiss="modal" aria-label="Close">Cancel</button>
                    </div><!-- form-group -->
                  </div>
                    
                </div><!-- pd-20 -->
              </div><!-- col-6 -->
            </div><!-- row -->
          </div><!-- modal-body -->
        </div><!-- modal-content -->
      </div><!-- modal-dialog -->
    </div>
                  
                  <td><button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#w<?php echo $wid ?>">Delete</button></td>
                </tr>

<?php
$num = $num+1;
                                }
                              }

                                ?>



                              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div>
                </div>
              </div>
            </div>
    
    
        </div>

        
      </div>
      </div><!-- container -->
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
    
        <script src="lib/datatables/js/jquery.dataTables.js"></script>
    <script src="lib/datatables-responsive/js/dataTables.responsive.js"></script>
    <script type="text/javascript">
      $(document).ready(function(e){
    // Submit form data via Ajax
    $("#paddForm").on('submit', function(e){
        e.preventDefault();
    var wallet = document.getElementById("wallet").value;
    var coin = document.getElementById("coin").value;
 
    var msg = document.getElementById("msg");
    if (wallet.length==0) {
        alert("please enter your Wallet Address");
    }
   
    else{

    const formData = new FormData();
    formData.append('wallet', wallet)
     formData.append('coin', coin)
    formData.append('addwallet', '')

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
                    alert(res.message);
                    window.location.href="wallet";
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
