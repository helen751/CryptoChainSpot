<?php
$title = "Referals";
 include("userheader.php");
?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper" style="padding-top: 0;">

    <div class="row py-3">
            <div class="col-sm-6" style="width: 50%;">
              <div class="">
                  <div class="badge badge-primary"><i class="fas fa-users"></i> My Referral History</div>
              </div>
            </div>
    <div class="col-sm-6 " style="width: 50%; padding-top: 0px; margin-top: -5px;">
                <div style="float: right;">
                <small class="text-muted text-capitalize">Available Balance</small><br>
                <b>USD </b><b id="conv"><?php echo  number_format(round($accbal,2)); ?></b><br>
        </div>
            </div>
          </div>
            
            <div class="row ">

    <div class="col-md-8 offset-md-2 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">My Referral History</h3>
                  <p><small class="card-description text-info">
                    Share your referral link to your friends and earn a percentage every time they invest
                      </small></p>
                      <div class="row">
                          <div class="col-md-12">
                          <div class="form-group">
                    <div class="input-group">
                        <input type="text" readonly id='ref_cop' class="form-control" value="<?php echo $ref; ?>">
                      <div class="input-group-append">
                          <button class="btn btn-sm btn-primary" id='ref_btn' type="button" onclick="copy_ref('ref_cop','#ref_btn');">Copy Referral Link</button>
                      </div>
                    </div>
                  </div>
                          </div>
                      </div>
                  <div class="row">
                      <div class="col-md-12">
          <div class="table-responsive">
            <table id="datatable2" class="table mg-b-0 tx-12" >
              <thead>
                <tr>
                    <th class="wd-15p">SN</th>
                  <th class="wd-15p">Referral</th>
                  <th class="wd-20p">Bonus</th>
                </tr>
              </thead>
              <tbody>
                 <?php
                 $num2 = 1;
                    $coinsql5 = "SELECT * from referals where user_id ='$id'";
                                    $coinresult5 = mysqli_query($link,$coinsql5);
                                    $countcoin5 = mysqli_num_rows($coinresult5);

                                        if($countcoin5 != 0){
                                         
                                          while($coinrow = $coinresult->fetch_assoc()) {                                         
                                            $amt = $coinrow["bonus_amount"];
                                            $rid = $coinrow["refered_id"];
                                            $date = $coinrow["date"];

                                            $plansql = "SELECT * from users where user_id ='$rid'";
                                    $planresult = mysqli_query($link,$plansql);
                                    $countplan = mysqli_num_rows($planresult);
                               $row = mysqli_fetch_array($planresult, MYSQLI_ASSOC); 
                               $rn = $coinrow["username"];
?>

<tr>
  <td><?php echo $num2; ?></td>
  <td><?php echo $rn; ?></td>
  <td><?php echo $amt; ?></td>
</tr>


                                          <?php
                                            $num2 = $num2+1;
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
    </div>
      </div><!-- slim-mainpanel -->

  <?php include("userfooter.php");
?>