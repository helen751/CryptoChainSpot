<?php 
$title = "Transactions History";
include("userheader.php");
?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <?php 
        if(isset($_GET["d"])){

?>
<div class="content-wrapper" style="padding-top: 0;">

    <div class="row py-3">
            <div class="col-sm-6" style="width: 50%;">
              <div class="">
                  <div class="badge badge-primary"><i class="fa fa-file-alt menu-icon"></i> Deposits</div>
              </div>
            </div>
    <div class="col-sm-6 " style="width: 50%; padding-top: 0px; margin-top: -5px;">
                <div style="float: right;">
                <small class="text-muted text-capitalize">Available Balance</small><br>
                 <b>USD </b><b id="conv"><?php echo  number_format(round($accbal,2)); ?></b><br>
        </div>
            </div>
          </div>
            
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Deposits History</h4>
                  <p class=" text-info">All Deposits</p>
                  <div class="table-responsive">
                    <table id="order-listing" class="table table-hover table-striped">
                      <thead>
                        <tr>
                          <th>Type</th>
                          <th>Amount</th>
                          <th>Date</th>
                          <th>View</th>
                        </tr>
                      </thead>
                      <tbody>
                           <?php
                    $coinsql55 = "SELECT * from deposits where user_id ='$id' ORDER BY date DESC";
                                    $coinresult55 = mysqli_query($link,$coinsql55);
                                    $countcoin55 = mysqli_num_rows($coinresult55);

                                        if($countcoin55 != 0){
                                         
                                          while($coinrow = $coinresult55->fetch_assoc()) {                                         
                                            $ty = $coinrow["deposit_type"];
                                            $did = $coinrow["deposit_id"];
                                            $amt = $coinrow["deposit_amount"];
                                            $date = $coinrow["date"];
                                            $stat = $coinrow["status"];
                                            $st = $coinrow["approve"];

                                           ?>

<tr>
  <td><?php echo $ty; ?></td>
  <td>$<?php echo round($amt, 2); ?></td>
  <td><?php echo date('Y-m-d', strtotime($date)); ?></td>
  

   <div id="d<?php echo $did; ?>" class="modal fade">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content bd-0 rounded overflow-hidden">
          <div class="modal-body pd-0">
              <!-- col-6 -->
              <div class=" bg-gray-900">
                <div class="pd-y-30 pd-xl-x-30">
                  
                  <div class="pd-x-30 pd-y-10">
                    <h4 class="tx-gray-300 tx-normal mg-b-5">Status: <b class="tx-info ml-1" style="font-size:15px"><?php if($st == 1){
  ?>
<i class="fas fa-circle text-success mr-2 fa-sm"></i>
<?php
    echo "Approved"; } else{
    ?>
    <i class="fas fa-circle text-warning mr-2 fa-sm"></i>
    <?php
    echo "Pending"; } ?></b></h4>
                    <h4 class="tx-gray-300 tx-normal mg-b-5">Date: <b class="tx-info ml-1" style="font-size:15px"><?php echo date('Y:m:d', strtotime($date)); ?></b></h4>
                    <br>
                    <?php
                      $coinsql555 = "SELECT * from deposits where deposit_id ='$did'";
                                    $coinresult555 = mysqli_query($link,$coinsql555);
                                    $countcoin555 = mysqli_num_rows($coinresult555);

                                        if($countcoin555 != 0){
                                          $row = mysqli_fetch_array($coinresult555, MYSQLI_ASSOC);
        $ed = $row['expiry_date'];
        $pid = $row['plan_id'];
        $stat = $row['status'];

        $coinsql5555 = "SELECT * from plans where plan_id ='$pid'";
                                    $coinresult5555 = mysqli_query($link,$coinsql5555);
                                    $countcoin5555 = mysqli_num_rows($coinresult5555);
                                     $row2 = mysqli_fetch_array($coinresult5555, MYSQLI_ASSOC);
        $pn = $row2['plan_name'];
                      ?>
                      <h4 class="tx-gray-300 tx-normal mg-b-5">Deposit Plan: <b class="tx-info ml-1" style="font-size:15px"><?php echo $pn ?></b></h3><br>
                       <h4 class="tx-gray-300 tx-normal mg-b-5">Deposit Status: <b class="tx-info ml-1" style="font-size:15px"><?php if($stat == 1){
  ?>
<i class="fas fa-circle text-success mr-2 fa-sm"></i>
<?php
    echo "Active"; } else if($stat == 2){
    ?>
    <i class="fas fa-circle text-danger mr-2 fa-sm"></i>
    <?php
    echo "Expired"; }
     else{
      ?>
      <i class="fas fa-circle text-warning mr-2 fa-sm"></i>
    <?php
    echo "Pending"; }
    ?>
    </b></h4> 
    <br>
    <h4 class="tx-gray-300 tx-normal mg-b-5">Expiry Date: <b class="tx-info ml-1" style="font-size:15px"><?php echo date('Y:m:d', strtotime($ed)); ?></b></h4>

                    <?php } ?>
                   



                    
                     <div class="form-group mt-4">
                        <button type="button" class="btn btn-outline-warning btn-block" data-dismiss="modal" aria-label="Close">Close</button>
                    </div><!-- form-group -->
                  </div>
                    
                </div><!-- pd-20 -->
              </div><!-- col-6 -->
            </div><!-- row -->
          </div><!-- modal-body -->
        </div><!-- modal-content -->
      </div><!-- modal-dialog -->
    </div>
                  

    <td><button type="button" class="btn btn-success text-light btn-sm" data-toggle="modal" data-target="#d<?php echo $did ?>">View</button></td>

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

      else if(isset($_GET["w"])){
        ?>
<div class="content-wrapper" style="padding-top: 0;">

    <div class="row py-3">
            <div class="col-sm-6" style="width: 50%;">
              <div class="">
                  <div class="badge badge-primary"><i class="fa fa-file-alt menu-icon"></i> Withdrawals</div>
              </div>
            </div>
    <div class="col-sm-6 " style="width: 50%; padding-top: 0px; margin-top: -5px;">
                <div style="float: right;">
                <small class="text-muted text-capitalize">Available Balance</small><br>
                 <b>USD </b><b id="conv"><?php echo round($accbal,2); ?></b><br>
        </div>
            </div>
          </div>
            
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Withdrawal History</h4>
                  <p class=" text-info">All Withdrawals</p>
                  <div class="table-responsive">
                    <table id="order-listing" class="table table-hover table-striped">
                      <thead>
                        <tr>
                          <th>S/N</th>
                          <th>Amount</th>
                          <th>Date</th>
                          <th>View</th>
                        </tr>
                      </thead>
                      <tbody>
                           <?php
                           $n = 1;
                    $coinsql55 = "SELECT * from withdrawals where user_id ='$id' ORDER BY date DESC";
                                    $coinresult55 = mysqli_query($link,$coinsql55);
                                    $countcoin55 = mysqli_num_rows($coinresult55);

                                        if($countcoin55 != 0){
                                         
                                          while($coinrow = $coinresult55->fetch_assoc()) {      $wid = $coinrow["withdrawal_id"];                        
                                            $walid = $coinrow["wallet_id"];
                                            $amt = $coinrow["amount"];
                                            $date = $coinrow["date"];
                                            $st = $coinrow["transaction_status"];

                                           ?>

<tr>
  <td><?php echo $n; ?></td>
  <td>$<?php echo round($amt, 2); ?></td>
  <td><?php echo date('Y-m-d', strtotime($date)); ?></td>
  

   <div id="w<?php echo $wid; ?>" class="modal fade">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content bd-0 rounded overflow-hidden">
          <div class="modal-body pd-0">
              <!-- col-6 -->
              <div class=" bg-gray-900">
                <div class="pd-y-30 pd-xl-x-30">
                  
                  <div class="pd-x-30 pd-y-10">
                    <h4 class="tx-gray-300 tx-normal mg-b-5">Status: <b class="tx-info ml-1" style="font-size:15px"><?php if($st == 1){
  ?>
<i class="fas fa-circle text-success mr-2 fa-sm"></i>
<?php
    echo "Approved"; } else{
    ?>
    <i class="fas fa-circle text-warning mr-2 fa-sm"></i>
    <?php
    echo "Pending"; } ?></b></h4>
                    <h4 class="tx-gray-300 tx-normal mg-b-5">Date: <b class="tx-info ml-1" style="font-size:15px"><?php echo date('Y:m:d', strtotime($date)); ?></b></h4>
                    <br>
                    <?php
                      $coinsql555 = "SELECT * from wallets where wallet_id ='$walid'";
                                    $coinresult555 = mysqli_query($link,$coinsql555);
                                    $countcoin555 = mysqli_num_rows($coinresult555);

                                        if($countcoin555 != 0){
                                          $row = mysqli_fetch_array($coinresult555, MYSQLI_ASSOC);
        $wad = $row['wallet_address'];
        $cid = $row['coin_id'];

        $coinsql5555 = "SELECT * from coins where coin_id ='$cid'";
                                    $coinresult5555 = mysqli_query($link,$coinsql5555);
                                    $countcoin5555 = mysqli_num_rows($coinresult5555);
                                     $row2 = mysqli_fetch_array($coinresult5555, MYSQLI_ASSOC);
        $pn = $row2['coin_name'];
                      ?>
                      <h4 class="tx-gray-300 tx-normal mg-b-5">Wallet Address: <b class="tx-info ml-1" style="font-size:15px"><?php echo $wad ?></b></h4><br>
      
    <h4 class="tx-gray-300 tx-normal mg-b-5">Coin: <b class="tx-info ml-1" style="font-size:15px"><?php echo $pn; ?></b></h4>

                    <?php } ?>
                   



                    
                     <div class="form-group mt-4">
                        <button type="button" class="btn btn-outline-warning btn-block" data-dismiss="modal" aria-label="Close">Close</button>
                    </div><!-- form-group -->
                  </div>
                    
                </div><!-- pd-20 -->
              </div><!-- col-6 -->
            </div><!-- row -->
          </div><!-- modal-body -->
        </div><!-- modal-content -->
      </div><!-- modal-dialog -->
    </div>
                  

    <td><button type="button" class="btn btn-success text-light btn-sm" data-toggle="modal" data-target="#w<?php echo $wid ?>">View</button></td>

</tr>


                                          <?php
                                            $n = $n+1;
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
else if(isset($_GET["b"])){

?>
<div class="content-wrapper" style="padding-top: 0;">

    <div class="row py-3">
            <div class="col-sm-6" style="width: 50%;">
              <div class="">
                  <div class="badge badge-primary"><i class="fa fa-file-alt menu-icon"></i> Bonus</div>
              </div>
            </div>
    <div class="col-sm-6 " style="width: 50%; padding-top: 0px; margin-top: -5px;">
                <div style="float: right;">
                <small class="text-muted text-capitalize">Available Balance</small><br>
                 <b>USD </b><b id="conv"><?php echo round($accbal,2); ?></b><br>
        </div>
            </div>
          </div>
            
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Bonus History</h4>
                  <p class=" text-info">All Bonus</p>
                  <div class="table-responsive">
                    <table id="order-listing" class="table table-hover table-striped">
                      <thead>
                        <tr>
                          <th>S/N</th>
                          <th>Amount</th>
                          <th>Date</th>
                          <th>View</th>
                        </tr>
                      </thead>
                      <tbody>
                           <?php
                           $n = 1;
                    $coinsql55 = "SELECT * from bonus where user_id ='$id' ORDER BY date DESC";
                                    $coinresult55 = mysqli_query($link,$coinsql55);
                                    $countcoin55 = mysqli_num_rows($coinresult55);

                                        if($countcoin55 != 0){
                                         
                                          while($coinrow = $coinresult55->fetch_assoc()) {
                                            $bonid = $coinrow["bonus_id"];
                                            $amt = $coinrow["bonus_amount"];
                                            $date = $coinrow["date"];
                                            $bt = $coinrow["bonus_type"];
                                           
                                           ?>

<tr>
  <td><?php echo $n; ?></td>
  <td>$<?php echo round($amt, 2); ?></td>
  <td><?php echo date('Y:m:d', strtotime($date)); ?></td>
  

   <div id="b<?php echo $bonid; ?>" class="modal fade">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content bd-0 rounded overflow-hidden">
          <div class="modal-body pd-0">
              <!-- col-6 -->
              <div class=" bg-gray-900">
                <div class="pd-y-30 pd-xl-x-30">
                  
                  <div class="pd-x-30 pd-y-10">
                   
                      <h4 class="tx-gray-300 tx-normal mg-b-5">Bonus Source: <b class="tx-info ml-1" style="font-size:15px"><?php echo $bt ?></b></h4><br>
      
    <h4 class="tx-gray-300 tx-normal mg-b-5">Amount Earned: <b class="tx-info ml-1" style="font-size:15px">USD <?php echo round($amt,2); ?></b></h4>

                    
                     <div class="form-group mt-4">
                        <button type="button" class="btn btn-outline-warning btn-block" data-dismiss="modal" aria-label="Close">Close</button>
                    </div><!-- form-group -->
                  </div>
                    
                </div><!-- pd-20 -->
              </div><!-- col-6 -->
            </div><!-- row -->
          </div><!-- modal-body -->
        </div><!-- modal-content -->
      </div><!-- modal-dialog -->
    </div>
      <td><button type="button" class="btn btn-success text-light btn-sm" data-toggle="modal" data-target="#b<?php echo $bonid; ?>">View</button></td>

</tr>


                                          <?php

                                            $n = $n+1;
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
else if(isset($_GET["t"])){

  ?>

<div class="content-wrapper" style="padding-top: 0;">

    <div class="row py-3">
            <div class="col-sm-6" style="width: 50%;">
              <div class="">
                  <div class="badge badge-primary"><i class="fa fa-file-alt menu-icon"></i> Transfers</div>
              </div>
            </div>
    <div class="col-sm-6 " style="width: 50%; padding-top: 0px; margin-top: -5px;">
                <div style="float: right;">
                <small class="text-muted text-capitalize">Available Balance</small><br>
                 <b>USD </b><b id="conv"><?php echo round($accbal,2); ?></b><br>
        </div>
            </div>
          </div>
            
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Transfers History</h4>
                  <p class=" text-info">All Transfers</p>
                  <div class="table-responsive">
                    <table id="order-listing" class="table table-hover table-striped">
                      <thead>
                        <tr>
                          <th>S/N</th>
                          <th>Amount</th>
                          <th>Date</th>
                          <th>View</th>
                        </tr>
                      </thead>
                      <tbody>
                           <?php
                           $n = 1;
                    $coinsql55 = "SELECT * from tranfers where user_id ='$id' ORDER BY date DESC";
                                    $coinresult55 = mysqli_query($link,$coinsql55);
                                    $countcoin55 = mysqli_num_rows($coinresult55);

                                        if($countcoin55 != 0){
                                         
                                          while($coinrow = $coinresult55->fetch_assoc()) {                       
                                            $bid = $coinrow["beneficiary_id"];
                                            $trid = $coinrow["transfer_id"];
                                            $amt = $coinrow["transaction_amount"];
                                            $date = $coinrow["date"];
                                            $st = $coinrow["description"];

                                           ?>

<tr>
  <td><?php echo $n; ?></td>
  <td>$<?php echo round($amt, 2); ?></td>
  <td><?php echo date('Y:m:d', strtotime($date)); ?></td>
  

   <div id="t<?php echo $trid; ?>" class="modal fade">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content bd-0 rounded overflow-hidden">
          <div class="modal-body pd-0">
              <!-- col-6 -->
              <div class=" bg-gray-900">
                <div class="pd-y-30 pd-xl-x-30">
                  
                  <div class="pd-x-30 pd-y-10">
                    <h4 class="tx-gray-300 tx-normal mg-b-5">Status: <b class="tx-info ml-1" style="font-size:15px">
<i class="fas fa-circle text-success mr-2 fa-sm"></i>Approved
</b></h4>
                    <h4 class="tx-gray-300 tx-normal mg-b-5">Date: <b class="tx-info ml-1" style="font-size:15px"><?php echo date('Y:m:d', strtotime($date)); ?></b></h4>
                    <br>
                    <?php
                      $coinsql555 = "SELECT * from users where user_id ='$bid'";
                                    $coinresult555 = mysqli_query($link,$coinsql555);
                                    $countcoin555 = mysqli_num_rows($coinresult555);

                                        if($countcoin555 != 0){
                                          $row = mysqli_fetch_array($coinresult555, MYSQLI_ASSOC);
        $uname = $row['username'];

                      ?>
                      <h4 class="tx-gray-300 tx-normal mg-b-5">Beneficiary: <b class="tx-info ml-1" style="font-size:15px"><?php echo $uname ?></b></h4><br>
      
    <h4 class="tx-gray-300 tx-normal mg-b-5">Amount: <b class="tx-info ml-1" style="font-size:15px">USD <?php echo round($amt,2); ?></b></h4>

                    <?php } ?>
                   



                    
                     <div class="form-group mt-4">
                        <button type="button" class="btn btn-outline-warning btn-block" data-dismiss="modal" aria-label="Close">Close</button>
                    </div><!-- form-group -->
                  </div>
                    
                </div><!-- pd-20 -->
              </div><!-- col-6 -->
            </div><!-- row -->
          </div><!-- modal-body -->
        </div><!-- modal-content -->
      </div><!-- modal-dialog -->
    </div>
                  

    <td><button type="button" class="btn btn-success text-light btn-sm" data-toggle="modal" data-target="#t<?php echo $trid ?>">View</button></td>

</tr>


                                          <?php
                                            $n = $n+1;
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
        else{
 ?>
        <div class="content-wrapper" style="padding-top: 0;">

    <div class="row py-3">
            <div class="col-sm-6" style="width: 50%;">
              <div class="">
                  <div class="badge badge-primary"><i class="fa fa-file-alt menu-icon"></i> Transactions</div>
              </div>
            </div>
    <div class="col-sm-6 " style="width: 50%; padding-top: 0px; margin-top: -5px;">
                <div style="float: right;">
                <small class="text-muted text-capitalize">Available Balance</small><br>
                 <b>USD </b><b id="conv"><?php echo round($accbal,2); ?></b><br>
        </div>
            </div>
          </div>
            
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Transactions History</h4>
                  <p class=" text-info">All Transactions</p>
                  <div class="table-responsive">
                    <table id="order-listing" class="table table-hover table-striped">
                      <thead>
                        <tr>
                          <th>Type</th>
                          <th>Amount</th>
                          <th>Date</th>
                          <th>View</th>
                        </tr>
                      </thead>
                      <tbody>
                           <?php
                    $coinsql55 = "SELECT * from transactions where user_id ='$id' ORDER BY date DESC";
                                    $coinresult55 = mysqli_query($link,$coinsql55);
                                    $countcoin55 = mysqli_num_rows($coinresult55);

                                        if($countcoin55 != 0){
                                         
                                          while($coinrow = $coinresult55->fetch_assoc()) {                                         
                                            $ty = $coinrow["transaction_type"];
                                            $tid = $coinrow["transaction_id"];
                                            $amt = $coinrow["transaction_amount"];
                                            $date = $coinrow["date"];
                                            $st = $coinrow["transaction_status"];

                                           ?>

<tr>
  <td><?php echo $ty; ?></td>
  <td>$<?php echo round($amt, 2); ?></td>
  <td><?php echo date('Y:m:d', strtotime($date)); ?></td>
  

     <div id="tr<?php echo $tid; ?>" class="modal fade">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content bd-0 rounded overflow-hidden">
          <div class="modal-body pd-0">
              <!-- col-6 -->
              <div class=" bg-gray-900">
                <div class="pd-y-30 pd-xl-x-30">
                  
                  <div class="pd-x-30 pd-y-10">
                    <h4 class="tx-gray-300 tx-normal mg-b-5">Status: <b class="tx-info ml-1" style="font-size:15px"><?php if($st == 1){
  ?>
<i class="fas fa-circle text-success mr-2 fa-sm"></i>
<?php
    echo "Approved"; } else{
    ?>
    <i class="fas fa-circle text-warning mr-2 fa-sm"></i>
    <?php
    echo "Pending"; } ?></b></h4>
                    <h4 class="tx-gray-300 tx-normal mg-b-5">Date: <b class="tx-info ml-1" style="font-size:15px"><?php echo date('Y:m:d', strtotime($date)); ?></b></h4>
                    <br>
                    <?php if($ty == "deposit"){
                      $coinsql555 = "SELECT * from deposits where transaction_id ='$tid'";
                                    $coinresult555 = mysqli_query($link,$coinsql555);
                                    $countcoin555 = mysqli_num_rows($coinresult555);

                                        if($countcoin555 != 0){
                                          $row = mysqli_fetch_array($coinresult555, MYSQLI_ASSOC);
        $ed = $row['expiry_date'];
        $pid = $row['plan_id'];
        $stat = $row['status'];

        $coinsql5555 = "SELECT * from plans where plan_id ='$pid'";
                                    $coinresult5555 = mysqli_query($link,$coinsql5555);
                                    $countcoin5555 = mysqli_num_rows($coinresult5555);
                                     $row2 = mysqli_fetch_array($coinresult5555, MYSQLI_ASSOC);
        $pn = $row2['plan_name'];
                      ?>
                      <h4 class="tx-gray-300 tx-normal mg-b-5">Deposit Plan: <b class="tx-info ml-1" style="font-size:15px"><?php echo $pn ?></b></h3><br>
                       <h4 class="tx-gray-300 tx-normal mg-b-5">Deposit Status: <b class="tx-info ml-1" style="font-size:15px"><?php if($stat == 1){
  ?>
<i class="fas fa-circle text-success mr-2 fa-sm"></i>
<?php
    echo "Active"; } else if($stat == 2){
    ?>
    <i class="fas fa-circle text-danger mr-2 fa-sm"></i>
    <?php
    echo "Expired"; }
     else{
      ?>
      <i class="fas fa-circle text-warning mr-2 fa-sm"></i>
    <?php
    echo "Pending"; }
    ?>
    </b></h4> 
    <br>
    <h4 class="tx-gray-300 tx-normal mg-b-5">Expiry Date: <b class="tx-info ml-1" style="font-size:15px"><?php echo date('Y:m:d', strtotime($ed)); ?></b></h4>

                    <?php } } 

else if($ty == "withdrawal"){
   $coinsql556 = "SELECT * from withdrawals where transaction_id ='$tid'";
                                    $coinresult556 = mysqli_query($link,$coinsql556);
                                    $countcoin556 = mysqli_num_rows($coinresult556);

                                        if($countcoin556 != 0){
                                          $coinrow = mysqli_fetch_array($coinresult556, MYSQLI_ASSOC);
                                          $wallid= $coinrow["wallet_id"];

  $coinsql555 = "SELECT * from wallets where wallet_id ='$wallid'";
                                    $coinresult555 = mysqli_query($link,$coinsql555);
                                    $countcoin555 = mysqli_num_rows($coinresult555);

                                        if($countcoin555 != 0){
                                          $row = mysqli_fetch_array($coinresult555, MYSQLI_ASSOC);
        $wad = $row['wallet_address'];
        $cid = $row['coin_id'];

        $coinsql5555 = "SELECT * from coins where coin_id ='$cid'";
                                    $coinresult5555 = mysqli_query($link,$coinsql5555);
                                    $countcoin5555 = mysqli_num_rows($coinresult5555);
                                     $row2 = mysqli_fetch_array($coinresult5555, MYSQLI_ASSOC);
        $pn = $row2['coin_name'];
                      ?>
                      <h4 class="tx-gray-300 tx-normal mg-b-5">Wallet Address: <b class="tx-info ml-1" style="font-size:15px"><?php echo $wad ?></b></h4><br>
      
    <h4 class="tx-gray-300 tx-normal mg-b-5">Coin: <b class="tx-info ml-1" style="font-size:15px"><?php echo $pn; ?></b></h4>

                    <?php }  } }

                    else if($ty == "Transfer"){
                    $coinsql556 = "SELECT * from tranfers where transaction_id ='$tid'";
                                    $coinresult556 = mysqli_query($link,$coinsql556);
                                    $countcoin556 = mysqli_num_rows($coinresult556);

                                        if($countcoin556 != 0){
                                          $coinrow = mysqli_fetch_array($coinresult556, MYSQLI_ASSOC);
                                          $bid = $coinrow["beneficiary_id"];

                   $coinsql555 = "SELECT * from users where user_id ='$bid'";
                                    $coinresult555 = mysqli_query($link,$coinsql555);
                                    $countcoin555 = mysqli_num_rows($coinresult555);

                                        if($countcoin555 != 0){
                                          $row = mysqli_fetch_array($coinresult555, MYSQLI_ASSOC);
        $uname = $row['username'];

                      ?>
                      <h4 class="tx-gray-300 tx-normal mg-b-5">Beneficiary: <b class="tx-info ml-1" style="font-size:15px"><?php echo $uname ?></b></h4><br>
      
    <h4 class="tx-gray-300 tx-normal mg-b-5">Amount: <b class="tx-info ml-1" style="font-size:15px">USD <?php echo round($amt,2); ?></b></h4>

                    <?php } } } ?>
 


                    
                     <div class="form-group mt-4">
                        <button type="button" class="btn btn-outline-warning btn-block" data-dismiss="modal" aria-label="Close">Close</button>
                    </div><!-- form-group -->
                  </div>
                    
                </div><!-- pd-20 -->
              </div><!-- col-6 -->
            </div><!-- row -->
          </div><!-- modal-body -->
        </div><!-- modal-content -->
      </div><!-- modal-dialog -->
    </div>
                  

    <td><button type="button" class="btn btn-success text-light btn-sm" data-toggle="modal" data-target="#tr<?php echo $tid; ?>">View </button></td>

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
    <?php } ?>
    </div>
    </div>
      </div><!-- slim-mainpanel -->

    <footer class="footer">
          <div class="w-100 clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019 <a href="index.php" >CryptochainSpot</a>. All rights reserved.</span>
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
