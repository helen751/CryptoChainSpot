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
                <b>100</b><br>
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
                  <h4 class="mb-2 mt-1 text-center " id="countuser">100</h4>
                  
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
                  <h4 class="mb-2 mt-1  text-center" id="countpw">100</h4>
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
                  <h4 class="mb-2 mt-1  text-center" id="counttr">100</h4>
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
                  <h4 class="mb-2 mt-1 text-center" id="countpd">100</h4>
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
                  <h4 class="mb-2 mt-1 text-center" id="counttc">100</h4>
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
                          <th>Date Registered</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                          
                                                  
                      </tbody>
                    </table>
                      
                  </div>
                  <br>
                  <a href="ref" class="btn btn-outline-primary btn-fw btn-sm">View All Users</a>
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
                <input type="text" name='profit' id="profit" placeholder="12" class="form-control" oninput="valid(this)">
                    </div>
                    <div class="form-group">
                      <label class="form-control-label">Enter Referral Bonus  Profit(%): <span class="tx-danger">*</span></label>
                <input type="text" name='refp' id="refp" placeholder="5" class="form-control" oninput="validref(this)">
                    </div>
                    <div class="form-group">
                    <label class="form-control-label">Enter Plan Period in days: <span class="tx-danger">*</span></label>
                <input type="number" name='period' id="period" placeholder="30" class="form-control">
                    </div>

                    <div class="form-group">
                    <label class="form-control-label">Plan Minimum Deposit Amount: <span class="tx-danger">*</span></label>
                <input type="text" name='min' id="min" placeholder="100" class="form-control" oninput="validmin(this)">
                    </div>

                    <div class="form-group">
                    <label class="form-control-label">Plan Maximum Deposit Amount: <span class="tx-danger">*</span></label>
                <input type="text" name='max' id="max" placeholder="1000" class="form-control" oninput="validmax(this)">
                    </div>
                    
                    
                    <input type="submit" class="submitBtn2 btn btn-success btn-block" value="Add Plan>>>" name='addplan'>
                  </form>
                </div>
              </div>
            </div>
    
    
        </div>
        

      </div>
      </div>
      </div><!-- container -->
    </div><!-- slim-mainpanel -->

<?php include("footer.php"); ?>      