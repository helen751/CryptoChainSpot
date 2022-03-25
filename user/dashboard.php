<?php include("userheader.php");
?>
      <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper" style="padding-top: 0;">
          
          

    <div class="row py-3">
            <div class="col-sm-6" style="width: 50%;">
              <div class="">
                  <div class="badge badge-primary"><i class="fas fa-home menu-icon"></i> Dashboard</div>
              </div>
            </div>
    <div class="col-sm-6 " style="width: 50%; padding-top: 0px; margin-top: -5px;">
                <div style="float: right;">
                <small class="text-muted text-capitalize">Available Balance</small><br>
                <b>USD </b><b id="conv"><?php echo number_format(round($accbal,2)); ?></b><br>
        </div>
            </div>
          </div>
          <div class="alert  alert-solid alert-success" id="msg" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button><span id="inmsg">
    Welcome, <?php echo $username; ?>   </span>       </div>
            <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body text-center">
                  <h4 class="card-title ">Account Balance</h4>
                  <div class="row">
                    <div class="col-md-6 text-center">
                      <h2 class="text-primary">USD
                      <span id="ta2" style="display:none;"><?php echo round($accbal,2); ?></span> <?php echo number_format(round($accbal,2)); ?></h2>
                       <p class="mb-0 text-warning" id="ta">0.0000</p>
                      <p class="text-primary">Available Balance</p>
                    </div>
                    <div class="col-md-6 text-center align-items-baseline">
   <h4 class="text-muted">USD
    <span id="ts2" style="display:none;"><?php echo round($sysbal,2); ?></span><?php echo number_format(round($sysbal,2)); ?></h4>
                       <p class="mb-0 text-warning" id="ts">0.0000</p>
                      <p class="text-muted">System Balance</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-6 offset-md-3 text-center py-3">
                      <small class="text-muted mb-3">Your Available balance is the real balance you can withdraw from while your system balance is your potential balance that will become available when your deposit plan is completed.</small>
                    </div>
                  </div>
                  <div class="col-md-12 text-center">
                      <a href="deposit" class="btn btn-success text-white btn-md rounded-0 mb-4"><i class="fas fa-upload"></i> Deposit</a>
                      <a href="withdraw" class="btn btn-warning text-white btn-md rounded-0 mb-4"><i class="fas fa-download"></i> Withdraw</a>
                  </div>
                 </div>
              </div>
            </div>
                
                <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body text-center">
                  <h4 class="card-title">Free Bitcoin</h4>
                  <div class="row">
                      <div class="col-md-12 text-center">
                      <small class="text-muted ">Get bitcoin when you refer your friends to invest with us. The reward on our referral program is dependent on the deposit plans.</small>
                    </div>
                    <div class="col-md-12 text-center mb-3">
                      <div class="template-demo">
                          
                        <?php 
                 $plansql = "SELECT * from plans";
                                    $planresult = mysqli_query($link,$plansql);
                                    $countplan = mysqli_num_rows($planresult);

                                        if($countplan != 0){
                                           while($planrow = $planresult->fetch_assoc()) {  
                                            $planname = $planrow["plan_name"];
                                            $planid = $planrow["plan_id"];
                                            $coin = $planrow["coin_id"];
                                            $ref3 = $planrow["referal_bonus"];

      ?>                           
                    <div class="d-flex justify-content-between mt-3">
                      <small><?php echo $planname; ?></small>
                      <small><?php echo $ref3; ?> %</small>
                    </div>
                    <div class="progress progress-sm mt-2">
                        <div class="progress-bar bg-danger" style="width:<?php echo $ref3; ?>%;" role="progressbar" aria-valuenow="<?php echo $ref3; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                   <?php } 
                   }
                   else{
                    ?> 
<div class="d-flex justify-content-between mt-3">
                      <small>No Plans Added Yet</small>
                     
                    </div>
                    <div class="progress progress-sm mt-2">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $ref3; ?>%;" aria-valuenow="<?php echo $ref3; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <?php } ?>                                
                                                                        
                    
                                              
                  </div>
                    </div>
                    
                  </div>
                  
                  <div class="form-group">
                    <div class="input-group">
                        <input type="text" readonly id='ref_cop' class="form-control" value="<?php echo $ref; ?>">
                      <div class="input-group-append">
                          <button class="btn btn-sm btn-primary" id='ref_btn' type="button" onclick="copy_ref('ref_cop','#ref_btn');">Copy Ref. Link</button>
                      </div>
                    </div>
                  </div>
                 </div>
              </div>
            </div>
                
          </div>
            <div class="row">
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-baseline">
                    <i class="fas fa-circle text-success mr-2 fa-sm"></i>
                    <p class="card-title mb-1">Total Deposits</p>
                  </div>

                  <h4 class="mb-2 mt-1">USD <span id="td2" style="display:none"><?php
                    $coinsql7 = "SELECT * from deposits where user_id ='$id' and approve = 1";
                                    $coinresult7 = mysqli_query($link,$coinsql7);
                                    $countcoin7 = mysqli_num_rows($coinresult7);

                                        if($countcoin7 != 0){
                                          $tot = 0;
                                          while($coinrow = $coinresult7->fetch_assoc()) {                                         
                                            $amt = $coinrow["deposit_amount"];
                                            $tot = $tot+$amt;
                                                }
                                                echo $tot;
                                        }
                                        else{
                                          echo "0.00";

}
                                          ?></span><?php
                    $coinsql7 = "SELECT * from deposits where user_id ='$id' and approve = 1";
                                    $coinresult7 = mysqli_query($link,$coinsql7);
                                    $countcoin7 = mysqli_num_rows($coinresult7);

                                        if($countcoin7 != 0){
                                          $tot = 0;
                                          while($coinrow = $coinresult7->fetch_assoc()) {                                         
                                            $amt = $coinrow["deposit_amount"];
                                            $tot = $tot+$amt;
                                                }
                                                echo number_format(round($tot,2));
                                        }
                                        else{
                                          echo "0.00";

}
                                          ?></h4>
                                        
                  <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <p class="mb-0 text-warning" id="td">0.0000</p>
                    <div class="d-flex align-items-center">
                      <p class="mb-0 mr-2">0</p>
                      <div class="badge badge-">NAN %</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-baseline">
                    <i class="fas fa-circle text-warning mr-2 fa-sm"></i>
                    <p class="card-title mb-1">Total Withdrawals</p>
                  </div>
                  <h4 class="mb-2 mt-1">USD <span id="tw2" style="display:none"><?php
                    $coinsql2 = "SELECT * from withdrawals where user_id ='$id' and transaction_status = 1";
                                    $coinresult2 = mysqli_query($link,$coinsql2);
                                    $countcoin2 = mysqli_num_rows($coinresult2);

                                        if($countcoin2 != 0){
                                          $tot = 0;
                                          while($coinrow = $coinresult2->fetch_assoc()) {                                         
                                            $amt = $coinrow["amount"];
                                            $tot = $tot+$amt;
                                                }
                                                echo $tot;
                                        }
                                        else{
                                          echo "0.00";

}
                                          ?></span><?php
                    $coinsql2 = "SELECT * from withdrawals where user_id ='$id' and transaction_status = 1";
                                    $coinresult2 = mysqli_query($link,$coinsql2);
                                    $countcoin2 = mysqli_num_rows($coinresult2);

                                        if($countcoin2 != 0){
                                          $tot = 0;
                                          while($coinrow = $coinresult2->fetch_assoc()) {                                         
                                            $amt = $coinrow["amount"];
                                            $tot = $tot+$amt;
                                                }
                                                echo number_format(round($tot,2));
                                        }
                                        else{
                                          echo "0.00";

}
                                          ?></h4>
                  <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <p class="mb-0 text-warning" id="tw">0.0000</p>
                    <div class="d-flex align-items-center">
                      <p class="mb-0 mr-2">0</p>
                      <div class="badge badge-">NAN %</div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-baseline">
                    <i class="fas fa-circle text-danger mr-2 fa-sm"></i>
                    <p class="card-title mb-1">Total Bonuses</p>
                  </div>
                  <h4 class="mb-2 mt-1">USD <span id="tb2" style="display:none"><?php
                    $coinsql3 = "SELECT * from bonus where user_id ='$id'";
                                    $coinresult3 = mysqli_query($link,$coinsql3);
                                    $countcoin3 = mysqli_num_rows($coinresult3);

                                        if($countcoin3 != 0){
                                          $tot = 0;
                                          while($coinrow = $coinresult3->fetch_assoc()) {                                         
                                            $amt = $coinrow["bonus_amount"];
                                            $tot = $tot+$amt;
                                                }
                                                echo $tot;
                                        }
                                        else{
                                          echo "0.00";

}
                                          ?></span><?php
                    $coinsql3 = "SELECT * from bonus where user_id ='$id'";
                                    $coinresult3 = mysqli_query($link,$coinsql3);
                                    $countcoin3 = mysqli_num_rows($coinresult3);

                                        if($countcoin3 != 0){
                                          $tot = 0;
                                          while($coinrow = $coinresult3->fetch_assoc()) {                                         
                                            $amt = $coinrow["bonus_amount"];
                                            $tot = $tot+$amt;
                                                }
                                                echo number_format(round($tot,2));
                                        }
                                        else{
                                          echo "0.00";

}
                                          ?></h4>
                  <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <p class="mb-0 text-warning" id="tb">0.0000</p>
                    <div class="d-flex align-items-center">
                      <p class="mb-0 mr-2">0</p>
                      <div class="badge badge-">NAN %</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-baseline">
                    <i class="fas fa-circle text-primary mr-2 fa-sm"></i>
                    <p class="card-title mb-1">Total Transactions</p>
                  </div>
                  <h4 class="mb-2 mt-1">USD <span id="tt2" style="display:none"><?php
                    $coinsql4 = "SELECT * from transactions where user_id ='$id' and transaction_status = 1";
                                    $coinresult4 = mysqli_query($link,$coinsql4);
                                    $countcoin4 = mysqli_num_rows($coinresult4);

                                        if($countcoin4 != 0){
                                          $tot = 0;
                                          while($coinrow = $coinresult4->fetch_assoc()) {                                         
                                            $amt = $coinrow["transaction_amount"];
                                            $tot = $tot+$amt;
                                                }
                                                echo $tot;
                                        }
                                        else{
                                          echo "0.00";

}
                                          ?></span><?php
                    $coinsql4 = "SELECT * from transactions where user_id ='$id' and transaction_status = 1";
                                    $coinresult4 = mysqli_query($link,$coinsql4);
                                    $countcoin4 = mysqli_num_rows($coinresult4);

                                        if($countcoin4 != 0){
                                          $tot = 0;
                                          while($coinrow = $coinresult4->fetch_assoc()) {                                         
                                            $amt = $coinrow["transaction_amount"];
                                            $tot = $tot+$amt;
                                                }
                                                echo  number_format(round($tot,2));
                                        }
                                        else{
                                          echo "0.00";

}
                                          ?></h4>
                  <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <p class="mb-0 text-warning" id="tt">0.0000</p>
                    <div class="d-flex align-items-center">
                      <p class="mb-0 mr-2">0</p>
                      <div class="badge badge-">NAN %</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
            
            <div class="row">
                <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Recent Transactions</h4>
                  <div class="table-responsive">
                    <table class="table table-hover table-striped">
                      <thead>
                        <tr>
                          <th>Type</th>
                          <th>Amount</th>
                          <th>Date</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                          
                        <?php
                    $coinsql55 = "SELECT * from transactions where user_id ='$id' ORDER BY date DESC LIMIT 5";
                                    $coinresult55 = mysqli_query($link,$coinsql55);
                                    $countcoin55 = mysqli_num_rows($coinresult55);

                                        if($countcoin55 != 0){
                                         
                                          while($coinrow = $coinresult55->fetch_assoc()) {                                         
                                            $ty = $coinrow["transaction_type"];
                                            $amt = $coinrow["transaction_amount"];
                                            $date = $coinrow["date"];
                                            $st = $coinrow["transaction_status"];

                                           ?>

<tr>
  <td><?php echo $ty; ?></td>
  <td><?php echo  number_format(round($amt,2)); ?></td>
  <td><?php echo date('Y:m:d', strtotime($date)); ?></td>
  <td><?php if($st == 1){
  ?>
<i class="fas fa-circle text-success mr-2 fa-sm"></i>
<?php
    echo "Approved"; } else{
    ?>
    <i class="fas fa-circle text-warning mr-2 fa-sm"></i>
    <?php
    echo "Pending"; } ?></td>
</tr>


                                          <?php
                                            
                                                }
                                                
                                        }
                                        else{
                                        ?>
                                          <tr>
                                         <td colspan="4">No Transaction History</td>
                                       </tr>
<?php
}  
?>                        
                      </tbody>
                    </table>
                      
                  </div>
                  <br>
                  <a href="transactions" class="btn btn-outline-primary btn-fw btn-sm">View All My Transaction History</a>
                </div>
              </div>
            </div>
                
                <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Referral History</h4>
                  <div class="table-responsive">
                    <table class="table table-hover table-striped">
                      <thead>
                        <tr>
                          <th>User</th>
                          <th>Bonus</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody>
                              
                        <?php
                    $coinsql5 = "SELECT * from referals where user_id ='$id' LIMIT 5";
                                    $coinresult5 = mysqli_query($link,$coinsql5);
                                    $countcoin5 = mysqli_num_rows($coinresult5);

                                        if($countcoin5 != 0){
                                         
                                          while($coinrow = $coinresult5->fetch_assoc()) {                                         
                                            $amt = $coinrow["bonus_amount"];
                                            $rid = $coinrow["refered_id"];
                                            $date = $coinrow["date"];

                                            $plansql = "SELECT * from users where user_id ='$rid'";
                                    $planresult = mysqli_query($link,$plansql);
                                    $countplan = mysqli_num_rows($planresult);
                               $row = mysqli_fetch_array($planresult, MYSQLI_ASSOC); 
                               $rn = $row["username"];
?>

<tr>
  <td><?php echo $rn; ?></td>
  <td><?php echo  number_format(round($amt,2)); ?></td>
  <td><?php echo date('Y:m:d', strtotime($date)); ?></td>
</tr>


                                          <?php
                                            
                                                }
                                                
                                        }
                                        else{
                                        ?>
                                          <tr>
                                         <td colspan="3">No Referal History</td>
                                       </tr>
<?php
}  
?>     
                                                  
                      </tbody>
                    </table>
                      
                  </div>
                  <br>
                  <a href="referals" class="btn btn-outline-primary btn-fw btn-sm">View All Referral History</a>
                </div>
              </div>
            </div>
                
            </div>

        
<div class="row">
    
    <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/cryptocurrencies/prices-all/" rel="noopener" target="_blank"><span class="blue-text">Cryptocurrency Markets</span></a> by TradingView</div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
  {
  "width": "100%",
  "height": "100%",
  "defaultColumn": "overview",
  "screener_type": "crypto_mkt",
  "displayCurrency": "USD",
  "colorTheme": "white",
  "locale": "en",
  "isTransparent": true
}
  </script>
</div>
                </div>
              </div>
            </div>

    <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Send Us A Message</h4>
                  <p><small class="card-description">
                    Basic form layout
                      </small></p>
                  <form class="forms-sample" action="" method="post" id="cform">
                    <div class="form-group">
                      <input type="text" required="required" placeholder="Enter Name *" class="form-control" name="name" id="name" value="<?php echo $name; ?>">
                    </div>
                    <div class="form-group">
                      <input type="email" required="required" placeholder="Enter Email *" class="form-control" name="email" id="email" value="<?php echo $email; ?>">
                    </div>
                    <div class="form-group">
                      <input type="text" required="required" placeholder="Enter Subject" class="form-control" name="subject" id="topic">
                    </div>
                    <div class="form-group">
                      <textarea required="required" placeholder="Message *" class="form-control" name="msg" rows="3" id="message"></textarea>
                    </div>
                    <button type="button" class="btn btn-primary btn-block csubmit" name="send" onclick="contact();">Send Message</button>
                  </form>
                </div>
              </div>
            </div>
    
    
        </div>
      </div>
      </div>
      </div><!-- container -->
    </div><!-- slim-mainpanel -->
<?php include("userfooter.php");
?>
  
