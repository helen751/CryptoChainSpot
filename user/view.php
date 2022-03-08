<?php include("header.php");  ?> 
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">

        <?php
if(isset($_GET["coins"])){

        ?>
        <div class="content-wrapper" style="padding-top: 0;">

    <div class="row py-3">
            <div class="col-sm-6" style="width: 50%;">
              <div class="">
                  <div class="badge badge-primary"><i class="fa fa-file-alt menu-icon"></i> All Coins</div>
              </div>
            </div>
    <div class="col-sm-6 " style="width: 50%; padding-top: 0px; margin-top: -5px;">
                <div style="float: right;">
                <small class="text-muted text-capitalize">Total Coins</small><br>
                <b><?php $coinsql = "SELECT * from coins";
                                    $coinresult = mysqli_query($link,$coinsql);
                                    $countcoin = mysqli_num_rows($coinresult);
echo $countcoin;  ?></b><br>
        </div>
            </div>
          </div>
            
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Coins Available</h4>
                  <p class=" text-info">All Coins</p>
                  <div class="table-responsive">
                    <table id="order-listing" class="table table-hover table-striped">
                      <thead>
                        <tr>
                          <th>Coin Name</th>
                          <th>Abbrev</th>
                          <th>Image</th>
                          <th>Date Added</th>
                          <th>Plans Available</th>
                          <th>Wallet Address</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                                    $coinsql = "SELECT * from coins";
                                    $coinresult = mysqli_query($link,$coinsql);
                                    $countcoin = mysqli_num_rows($coinresult);

                                        if($countcoin != 0){
                                          while($coinrow = $coinresult->fetch_assoc()) {                                         
                                            $coinname = $coinrow["coin_name"];
                                            $coinid = $coinrow["coin_id"];
                                            $wallet = $coinrow["coin_wallet"];
                                            $image = $coinrow["image"];
                                            $abbrev = $coinrow["abbrev"];
                                            $coindate = $coinrow["date_added"];
                            $coinsql2 = "SELECT * from plans where coin_id='$coinid'";
                                    $coinresult2 = mysqli_query($link,$coinsql2);
                                    $countcoin2 = mysqli_num_rows($coinresult2);



                                     ?>
                                        <tr>
                      
          <td><?php echo $coinname; ?></td>
          <td><?php echo $abbrev; ?></td>
             <td><img src="../uploads/<?php echo $image; ?>" width="25" height="20"></td>

             <td><?php echo date('Y:m:d', strtotime($coindate)); ?></td>
             <td><?php echo $countcoin2; ?></td>

            <td><?php echo $wallet; ?></td>
              <td>
                <form name="form" method="POST" id="coinform">
           <input type="hidden" hidden name="coinid" value="<?php echo $coinid; ?>">
           <input type="hidden" hidden name="coinimg" value="<?php echo $image; ?>">
           <input type="hidden" hidden name="coinname" value="<?php echo $coinname; ?>">
           <input type="hidden" hidden name="abbrev" value="<?php echo $abbrev; ?>">
           <input type="hidden" hidden name="coindate" value="<?php echo $coindate; ?>">
           <input type="hidden" hidden name="wallet" value="<?php echo $wallet; ?>">

                <button class="btn btn-primary" type="submit" name="edit"><i class="fa fa-edit"></i></button>
               <button class="btn btn-primary" type="submit" name="delete"><i class="fa fa-trash"></i></button>
                                          </form>
                   </td>                       
                                        </tr>
                                        
                                     
                                     <?php
                                     } 
                                   }
                                   ?>
                                                  
                      </tbody>
                    </table>
                      
                  </div>
                  
                </div>
              </div>
            </div>
                
            </div>
            
        

        
      </div><!-- container -->

<?php 
}
if(isset($_GET["plans"])){

?>

<div class="content-wrapper" style="padding-top: 0;">

    <div class="row py-3">
            <div class="col-sm-6" style="width: 50%;">
              <div class="">
                  <div class="badge badge-primary"><i class="fa fa-file-alt menu-icon"></i> All Plans</div>
              </div>
            </div>
    <div class="col-sm-6 " style="width: 50%; padding-top: 0px; margin-top: -5px;">
                <div style="float: right;">
                <small class="text-muted text-capitalize">Total Plans</small><br>
                <b><?php $coinsql2 = "SELECT * from plans";
                                    $coinresult2 = mysqli_query($link,$coinsql2);
                                    $countcoin2 = mysqli_num_rows($coinresult2);
echo $countcoin2; 
?></b><br>
        </div>
            </div>
          </div>
            
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Plans Available</h4>
                  <p class=" text-info">All Plans</p>
                  <div class="table-responsive">
                    <table id="order-listing2" class="table table-hover table-striped">
                      <thead>
                        <tr>
                          <th>Coin</th>
                          <th>Plan Name</th>
                          <th>Plan Period</th>
                          <th>Min Deposit</th>
                          <th>Max Deposit</th>
                          <th>Referal Bonus</th>
                          <th>Plan Percent</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
                                    $plansql = "SELECT * from plans";
                                    $planresult = mysqli_query($link,$plansql);
                                    $countplan = mysqli_num_rows($planresult);

                                        if($countplan != 0){
                                          while($planrow = $planresult->fetch_assoc()) {                                         
                                            $planname = $planrow["plan_name"];
                                            $planid = $planrow["plan_id"];
                                            $coin = $planrow["coin_id"];
                                            $min = $planrow["min_deposit"];
                                            $max = $planrow["max_deposit"];
                                            $ref = $planrow["referal_bonus"];
                                            $period = $planrow["period"];
                                       $profit = $planrow["percentage_profit"];
                                       $coinname=' ';

                        $plansql2 = "SELECT * from coins where coin_id='$coin'";
                          $planresult2 = mysqli_query($link,$plansql2);
                             $countplan2 = mysqli_num_rows($planresult2);
                  if($countplan2 != 0){
                      $rowplan = mysqli_fetch_array($planresult2, MYSQLI_ASSOC);
                      $coinname = $rowplan["coin_name"];
                                    }



                                     ?>
                                        <tr>
                      
          <td><?php echo $coinname; ?></td>
          <td><?php echo $planname; ?></td>
             <td><?php echo $period; ?></td>

             <td><?php echo $min; ?></td>
             <td><?php echo $max; ?></td>

            <td><?php echo $ref; ?></td>
            <td><?php echo $profit; ?></td>
              <td>
                <form name="form2" method="POST" id="coinform2">
           <input type="hidden" hidden name="coin" value="<?php echo $coin; ?>">
           <input type="hidden" hidden name="planname" value="<?php echo $planname; ?>">
           <input type="hidden" hidden name="min" value="<?php echo $min; ?>">
           <input type="hidden" hidden name="max" value="<?php echo $max; ?>">
           <input type="hidden" hidden name="period" value="<?php echo $period; ?>">
           <input type="hidden" hidden name="profit" value="<?php echo $profit; ?>">
            <input type="hidden" hidden name="ref" value="<?php echo $ref; ?>">

                <button class="btn btn-primary" type="submit" name="editplan"><i class="fa fa-edit"></i></button>
               <button class="btn btn-primary" type="submit" name="deleteplan"><i class="fa fa-trash"></i></button>
                                          </form>
                   </td>                       
                                        </tr>
                                        
                                     
                                     <?php
                                     } 
                                   }
                                   ?>    
                                                  
                      </tbody>
                    </table>
                      
                  </div>
                  
                </div>
              </div>
            </div>
                
            </div>
            
        

        
      </div><!-- container -->

<?php 

}

if(isset($_GET["users"])){
?>

<div class="content-wrapper" style="padding-top: 0;">

    <div class="row py-3">
            <div class="col-sm-6" style="width: 50%;">
              <div class="">
                  <div class="badge badge-primary"><i class="fa fa-file-alt menu-icon"></i> All Users</div>
              </div>
            </div>
    <div class="col-sm-6 " style="width: 50%; padding-top: 0px; margin-top: -5px;">
                <div style="float: right;">
                <small class="text-muted text-capitalize">Total Users</small><br>
                <b><?php $coinsql2 = "SELECT * from users";
                                    $coinresult2 = mysqli_query($link,$coinsql2);
                                    $countcoin2 = mysqli_num_rows($coinresult2);
echo $countcoin2; 
?></b><br>
        </div>
            </div>
          </div>
            
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Registered Users</h4>
                  <p class=" text-info">All Users</p>
                  <div class="table-responsive">
                    <table id="order-listing3" class="table table-hover table-striped">
                      <thead>
                        <tr>
                          <th>Full Name</th>
                          <th>User Name</th>
                          <th>Email Address</th>
                          <th>Phone Number</th>
                          <th>Date Registered</th>
                          <th>Last Active</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
                                    $plansql = "SELECT * from users";
                                    $planresult = mysqli_query($link,$plansql);
                                    $countplan = mysqli_num_rows($planresult);

                                        if($countplan != 0){
                                          while($planrow = $planresult->fetch_assoc()) {                                         
                                            $fullname = $planrow["fullname"];
                                            $userid = $planrow["user_id"];
                                            $email = $planrow["email_address"];
                                            $uname = $planrow["username"];
                                        $phone = $planrow["phone_number"];
                                            $access = $planrow["last_access"];
                                            $datereg = $planrow["date_registered"];

                                       $status=' ';

                        $plansql2 = "SELECT * from accounts where user_id='$userid'";
                          $planresult2 = mysqli_query($link,$plansql2);
                             $countplan2 = mysqli_num_rows($planresult2);
                  if($countplan2 != 0){
                      $rowplan = mysqli_fetch_array($planresult2, MYSQLI_ASSOC);
                      $status2 = $rowplan["status"];
                      if($status2 == 1){
                        $status = "<i class='fa fa-circle text-success'></i>"."Active";


                      }
                      else{
                        $status = "<i class='fa fa-circle text-danger'></i>"."Inactive";
                      }
                                    }



                                     ?>
                                        <tr>
                      
          <td><?php echo $fullname; ?></td>
          <td><?php echo $uname; ?></td>
             <td><?php echo $email; ?></td>

             <td><?php echo $phone; ?></td>
             <td><?php echo $datereg; ?></td>

            <td><?php echo $access; ?></td>
            <td><?php echo $status; ?></td>
              <td>
                <form name="form2" method="POST" id="coinform2">
           <input type="hidden" hidden name="fullname" value="<?php echo $fullname; ?>">
           <input type="hidden" hidden name="access" value="<?php echo $access; ?>">
           <input type="hidden" hidden name="userid" value="<?php echo $userid; ?>">
           <input type="hidden" hidden name="phone" value="<?php echo $phone; ?>">
           <input type="hidden" hidden name="email" value="<?php echo $email; ?>">
            <input type="hidden" hidden name="uname" value="<?php echo $uname; ?>">

                <button class="btn btn-primary" type="submit" name="edituser"><i class="fa fa-check-circle"></i></button>
               <button class="btn btn-primary" type="submit" name="deleteuser"><i class="fa fa-ban"></i></button>
                                          </form>
                   </td>                       
                                        </tr>
                                        
                                     
                                     <?php
                                     } 
                                   }
                                   ?>    
                                                  
                      </tbody>
                    </table>
                      
                  </div>
                  
                </div>
              </div>
            </div>
                
            </div>
            
        

        
      </div><!-- container -->


<?php 
} 

 if(isset($_GET["pd"])){
 ?>

<div class="content-wrapper" style="padding-top: 0;">

    <div class="row py-3">
            <div class="col-sm-6" style="width: 50%;">
              <div class="">
                  <div class="badge badge-primary"><i class="fa fa-file-alt menu-icon"></i> All Pending Deposits</div>
              </div>
            </div>
    <div class="col-sm-6 " style="width: 50%; padding-top: 0px; margin-top: -5px;">
                <div style="float: right;">
                <small class="text-muted text-capitalize">Total Pending Deposits</small><br>
                <b><?php $coinsql2 = "SELECT * from transactions where transaction_type='deposit' and transaction_status=0";
                                    $coinresult2 = mysqli_query($link,$coinsql2);
                                    $countcoin2 = mysqli_num_rows($coinresult2);
echo $countcoin2; 
?></b><br>
        </div>
            </div>
          </div>
            
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Pending Deposits</h4>
                  <p class=" text-info">Deposits</p>
                  <div class="table-responsive">
                    <table id="order-listing3" class="table table-hover table-striped">
                      <thead>
                        <tr>
                          <th>User Name</th>

                          <th>Coin</th>
                          <th>Plan</th>
                          <th>Amount</th>
                          <th>Date</th>
                          <th>Status</th>
                          
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
                                    $plansql = "SELECT * from transactions where transaction_type='deposit' and transaction_status=0";
                                    $planresult = mysqli_query($link,$plansql);
                                    $countplan = mysqli_num_rows($planresult);

                                        if($countplan != 0){
                                          while($planrow = $planresult->fetch_assoc()) {                                         
                                            $tid = $planrow["transaction_id"];
                                            $pid = $planrow["plan"];
                                            $userid = $planrow["user_id"];
                                        $ttype = $planrow["transaction_type"];
                                        $amt = $planrow["transaction_amount"];
                                        $date = $planrow["date"];
                                      $status = $planrow["transaction_status"];
                                      $uname=' ';
                                      $coin = '';
                                            
                                       $status="<i class='fa fa-circle text-success'></i>"."Active";

                        $plansql2 = "SELECT * from users where user_id='$userid'";
                          $planresult2 = mysqli_query($link,$plansql2);
                             $countplan2 = mysqli_num_rows($planresult2);
                  if($countplan2 != 0){
                      $rowplan = mysqli_fetch_array($planresult2, MYSQLI_ASSOC);
                      $uname = $rowplan["username"];
                     
                                    }

                                    $plansql3 = "SELECT * from plans where plan_id='$pid'";
                          $planresult3 = mysqli_query($link,$plansql3);
                             $countplan3 = mysqli_num_rows($planresult3);
                  if($countplan3 != 0){
                      $rowplan = mysqli_fetch_array($planresult2, MYSQLI_ASSOC);
                      $coinid = $rowplan["coin_id"];

                      $plansql4 = "SELECT * from coins where coin_id='$coinid'";
                          $planresult4 = mysqli_query($link,$plansql4);
                             $countplan4 = mysqli_num_rows($planresult4);
                  if($countplan4 != 0){
                      $rowplan = mysqli_fetch_array($planresult2, MYSQLI_ASSOC);
                      $coin = $rowplan["coin_name"];
                     
                                    }
                     
                                    }



                                     ?>
                                        <tr>
                      
          <td><?php echo $uname; ?></td>
          <td><?php echo $coin; ?></td>
             <td><?php echo $plan; ?></td>

             <td><?php echo $date; ?></td>
             <td><?php echo $status; ?></td>
              <td>
                <form name="form2" method="POST" id="coinform2">
           <input type="hidden" hidden name="tid" value="<?php echo $tid; ?>">
           

                <button class="btn btn-primary" type="submit" name="editpd"><i class="fa fa-check-circle"></i></button>
               <button class="btn btn-primary" type="submit" name="deletepd"><i class="fa fa-trash"></i></button>
                                          </form>
                   </td>                       
                                        </tr>
                                        
                                     
                                     <?php
                                     } 
                                   }
                                   ?>    
                                                  
                      </tbody>
                    </table>
                      
                  </div>
                  
                </div>
              </div>
            </div>
                
            </div>
            
        

        
      </div><!-- container -->


 <?php 
 }
?>
    </div>
    </div>
      </div><!-- slim-mainpanel -->

    <footer class="footer">
          <div class="w-100 clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © <?php date('Y'); ?><a href="index.php" >Digital Stakers</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">hihelen <i class="far fa-user text-primary"></i></span>
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
    
        <script src="lib/datatables/js/jquery.dataTables.js"></script>
    <script src="lib/datatables-responsive/js/dataTables.responsive.js"></script>
    <script type="text/javascript">
      $(document).ready( function () {
    $('#order-listing2').DataTable();
} );

       $(document).ready( function () {
    $('#order-listing3').DataTable();
} );
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
