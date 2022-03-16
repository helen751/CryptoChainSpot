<?php include("header.php");

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
                <small class="text-muted text-capitalize">Total Users</small><br>
                <b><?php $plansql = "SELECT * from users";
                                    $planresult = mysqli_query($link,$plansql);
                                    $countplan = mysqli_num_rows($planresult);
 echo $countplan ?></b><br>
        </div>
            </div>
          </div>
          <div class="alert  alert-solid alert-success" role="alert" id="msg" style="display: none;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="close();">
              <span aria-hidden="true">×</span>
            </button>
    <span id="inmsg"></span>        </div>
           
          <?php if(isset($_GET["u"])){
          ?>
          
            <div class="row" id="sum">
            <div class="col-md-2 grid-margin stretch-card p-0 ml-5">
              <div class="card">
                <div class="card-body  text-center">
                  <div class="d-flex align-items-baseline text-center">
                    <i class="fas fa-circle text-success mr-2 fa-sm"></i>
                    <p class="card-title mb-1 text-capitalize">Total Users</p>
                  </div>
                  <h4 class="mb-2 mt-1 text-center " id="countuser">
                    <?php echo $countplan ?></h4>
                  
                </div>
              </div>
            </div>
            <div class="col-md-2 grid-margin stretch-card p-0 ml-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-baseline">
                    <i class="fas fa-circle text-warning mr-2 fa-sm"></i>
                    <p class="card-title mb-1">Pending withdrawals</p>
                  </div>
                  <h4 class="mb-2 mt-1  text-center" id="countpw">
                    <?php $plansql2 = "SELECT * from withdrawals where transaction_status = 0";
                                    $planresult2 = mysqli_query($link,$plansql2);
                                    $countplan2 = mysqli_num_rows($planresult2);
 echo $countplan2 ?></h4>
                                  </div>
              </div>
            </div>
            <div class="col-md-2 grid-margin stretch-card p-0 ml-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-baseline">
                    <i class="fas fa-circle text-danger mr-2 fa-sm"></i>
                    <p class="card-title mb-1">Total Referals</p>
                  </div>
                  <h4 class="mb-2 mt-1  text-center" id="counttr">
                    <?php $plansql3 = "SELECT * from referals";
                                    $planresult3 = mysqli_query($link,$plansql3);
                                    $countplan3 = mysqli_num_rows($planresult3);
 echo $countplan3 ?></h4>
                                  </div>
              </div>
            </div>
             <div class="col-md-2 grid-margin stretch-card p-0 ml-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-baseline">
                    <i class="fas fa-circle text-danger mr-2 fa-sm"></i>
                    <p class="card-title mb-1">Pending Deposits</p>
                  </div>
                  <h4 class="mb-2 mt-1 text-center" id="countpd">
                  <?php $plansql4 = "SELECT * from deposits where approve = 0";
                                    $planresult4 = mysqli_query($link,$plansql4);
                                    $countplan4 = mysqli_num_rows($planresult4);
 echo $countplan4 ?>
   
 </h4>
                </div>
              </div>
            </div>
             <div class="col-md-2 grid-margin stretch-card p-0 ml-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-baseline">
                    <i class="fas fa-circle text-danger mr-2 fa-sm"></i>
                    <p class="card-title mb-1 ">Total Coins</p>
                  </div>
                  <h4 class="mb-2 mt-1 text-center" id="counttc">
                    <?php $plansql5 = "SELECT * from coins";
                                    $planresult5 = mysqli_query($link,$plansql5);
                                    $countplan5 = mysqli_num_rows($planresult5);
 echo $countplan5 ?>

                  </h4>
                                  </div>
              </div>
            </div>
            
          </div>
            
            <div class="row" id="users">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Registered Users</h4>
                  <div class="table-responsive">
                    <table id="order-listing" class="table table-hover table-striped">
                      <thead>
                        <tr>
                          <th>Full Name</th>
                          <th>User Name</th>
                          <th>Email Address</th>
                          <th>Phone Number</th>
                          <th>Last Active</th>
                          <th>Status</th>
                          <th>Account Balance</th>
                          <th>System Balance</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
                                    $plansql = "SELECT * from users ORDER BY date_registered DESC LIMIT 10";
                                    $planresult = mysqli_query($link,$plansql);
                                    $countplan = mysqli_num_rows($planresult);

                                        if($countplan != 0){
                                          while($planrow = $planresult->fetch_assoc()) {
                                     $acc_bal = 0;
                                     $sys_bal = 0; 
                                     $status2 = ' ';                                       
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
                       $acc_bal = round($rowplan["account_balance"],2);
                        $sys_bal = round($rowplan["system_balance"],2);
                      if($status2 == 1){
                        $status = "<i class='fa fa-circle text-success'></i>"."Active";


                      }
                      else{
                        $status = "<i class='fa fa-circle text-danger'></i>"."Blocked";
                      }
                                    }



                                     ?>
                                        <tr>
                      
          <td><?php echo $fullname; ?></td>
          <td><?php echo $uname; ?></td>
             <td><?php echo $email; ?></td>

             <td><?php echo $phone; ?></td>

            <td><?php echo $access; ?></td>
            <td><?php echo $status; ?></td>
            <td><?php echo $acc_bal; ?></td>
            <td><?php echo $sys_bal; ?></td>
                   

              <td>
               <form method="POST" action="edit.php">
                  <input type="hidden" hidden name="uid" value="<?php echo $userid; ?>">
                      <input type="hidden" hidden name="uv" value="admin">
                      <input type="hidden" hidden name="fullname" value="<?php echo $fullname; ?>">
                      <input type="hidden" hidden name="username" value="<?php echo $uname; ?>">
                      <input type="hidden" hidden name="email" value="<?php echo $email; ?>">
                      <input type="hidden" hidden name="phone" value="<?php echo $phone; ?>">
                      <input type="hidden" hidden name="acc" value="<?php echo $acc_bal; ?>">
      <button class="btn btn-success" type="submit" name="edituser"><i class="fa fa-edit"></i></button>

                <?php 
                if($status2 == 1){
                  ?>
               <button class="btn btn-warning text-light" type="submit" name="blockuser"><i class="fa fa-ban"></i></button>
<?php }
else{
  ?>
               <button class="btn btn-warning text-light" type="submit" name="unblockuser"><i class="fa fa-unlock"></i></button>
<?php } ?>
               <button class="btn btn-danger" type="submit" name="deleteuser"><i class="fa fa-trash"></i></button>
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
                  <br>
                  <a href="view?users" class="btn btn-outline-primary btn-fw btn-sm">View All Users</a>
                </div>
              </div>
            </div>
                
            </div>


 <?php
 }

else if(isset($_GET["c"])){

 ?> 
 
 

<div class="row " id="addcoin">

    <div class="col-md-6 offset-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Add New Coin</h3>
                  <p><small class="card-description">
                    Fill the form below
                      </small></p>
                  <form id="addForm" class="forms-sample" enctype="multipart/form-data" method="post">
                                    
                      
                      <div id='dsc'></div>
                      
                      <div class="form-group">
                      <label class="form-control-label">Enter Coin Name: <span class="tx-danger">*</span></label>
                <input type="text" name='name' id="name" placeholder="Bitcoin" class="form-control">
                    </div>
                    <div class="form-group">
                      <label class="form-control-label">Coin Wallet Address: <span class="tx-danger">*</span></label>
                <input type="text" name='wallet' id="wallet" placeholder="yghj234567ghjnbvf" class="form-control">
                    </div>
                    <div class="form-group">
                    <label class="form-control-label">Enter Coin Abbreviation: <span class="tx-danger">*</span></label>
                <input type="text" name='abbr' id="abbr" placeholder="BTC" class="form-control">
                    </div>

                    <div class="form-group">
                    <label class="form-control-label">Upload Coin Image: <span class="tx-danger">*</span></label>
                <input type="file" name='file' id="img" class="form-control">
                <p><strong>Note:</strong> Only .jpg, .jpeg, .gif, .png images allowed to a max size of 5 MB.</p>
                    </div>
                    
                    
                    <input type="submit" class="submitBtn btn btn-success btn-block" value="Add Coin>>>" name='addcoin'>
                  </form>
                </div>
              </div>
            </div>
    
    
        </div>

<?php
 }
 else if(isset($_GET["p"])){

 ?>

   
        <div class="row " id="addplan">

    <div class="col-md-6 offset-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Add New Plan</h3>
                  <p><small class="card-description">
                    Fill the form below
                      </small></p>
                  <form id="paddForm" class="forms-sample" method="post">
                                    
                      <input type="text" hidden name="" id="hidinput">
                      <div id='dsc'></div>
                       <div class="form-group">
                      <label class="form-control-label">Select Coin: <span class="tx-danger">*</span></label>
                <select id="pcoin" class="form-control">
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
                    </div>

                      <div class="form-group">
                      <label class="form-control-label">Enter Plan Name: <span class="tx-danger">*</span></label>
                <input type="text" name='pname' id="pname" placeholder="Beginner Plan" class="form-control">
                    </div>
                    <div class="form-group">
                      <label class="form-control-label">Enter Plan Daily Profit(%): <span class="tx-danger">*</span></label>
                <input type="number" name='profit' id="profit" placeholder="00.0" class="form-control">
                    </div>
                    <div class="form-group">
                      <label class="form-control-label">Enter Referral Bonus  Profit(%): <span class="tx-danger">*</span></label>
                <input type="number" name='refp' id="refp" placeholder="00.0" class="form-control">
                    </div>
                    <div class="form-group">
                    <label class="form-control-label">Enter Plan Period in Weeks: <span class="tx-danger">*</span></label>
                <input type="number" name='period' id="period" placeholder="30" class="form-control">
                    </div>

                    <div class="form-group">
                    <label class="form-control-label">Plan Minimum Deposit Amount: <span class="tx-danger">*</span></label>
                <input type="number" name='min' id="min" class="form-control" placeholder="0000.00">
                    </div>

                    <div class="form-group">
                    <label class="form-control-label">Plan Maximum Deposit Amount: <span class="tx-danger">*</span></label>
                <input type="number" name='max' id="max" placeholder="0000.00" class="form-control">
                    </div>
                    
                    
                    <input type="submit" class="submitBtn2 btn btn-success btn-block" value="Add Plan>>>" name='addplan'>
                  </form>
                </div>
              </div>
            </div>
    
    
        </div>
      <?php } ?>
        

      </div>
      </div>
      </div><!-- container -->
    </div><!-- slim-mainpanel -->

<?php include("footer.php"); ?>      