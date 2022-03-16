
  <?php include("header.php"); ?>      
<!-- START SECTION BANNER -->
<div class="banner-area" id="banner-area" style="background-image:url(images/banner/banner1.jpg);">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col">
                  <div class="banner-heading">
                     <h1 class="banner-title">Get Support</h1>
                  </div>
               </div>
               <!-- Col end-->
            </div>
            <!-- Row end-->
         </div>
         <!-- Container end-->
      </div><section class="main-container" id="main-container" style="margin-bottom: 180px;">
         <div class="container">
            <div class="row text-center">
               <div class="col-md-12">
                  <h2 class="section-title"><span>Send Us Message</span>Contact Us</h2>
               </div>
            </div>
            <!-- Title row end-->
         </div>
         <!-- container end-->
         <div class="ts-form form-boxed" id="ts-form">
            <div class="container">
               
               <div class="row">
                  <div class="col-lg-12">
                     <div class="contact-wrapper">
                        <div class="contact-box form-box">
                            <form class="contact-form" action="" method="post" id="cform">
                              <?php 
                              $name = '';
                              $email = '';
                              if(isset($_SESSION["login"])){
                              $id=$_SESSION['user'];
                              $details = "SELECT * FROM users where user_id = $id";
      $detailsresult = mysqli_query($link, $details);
      $countdetails = mysqli_num_rows($detailsresult);

      if($countdetails > 0){
         
        $row = mysqli_fetch_array($detailsresult, MYSQLI_ASSOC);
        $email = $row['email_address'];
        $name = $row['fullname'];
     }
                           }


                              ?>
                              <div class="alert  alert-solid alert-success" id="msg" style="display: none;" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="close();">
              <span aria-hidden="true">×</span>
            </button><span id="inmsg"> </span>       </div>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <input class="form-control form-name" type="text" required="required" placeholder="Enter Full Name *" name="name" id="name" value="<?php echo $name; ?>">
                                    </div>
                                 </div>
                                 <!-- Col end-->
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <input class="form-control form-email" type="email" required="required" id="email" placeholder="Enter Email *" name="email" value="<?php echo $email; ?>">
                                    </div>
                                 </div>
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <input class="form-control form-name" type="text" required="required" id="topic" placeholder="Enter Subject" name="subject">
                                    </div>
                                 </div>
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <textarea class="form-control form-message required-field" id="message" required="required" placeholder="Message *" name="msg" rows="8"></textarea>
                                    </div>
                                 </div>
                                 <!-- Col 12 end-->
                              </div>
                              <!-- Form row end-->
                              <div class="text-right">
                                 <button class="btn btn-primary tw-mt-30 csubmit" name="send" type="button" onclick="contact();">Contact US</button>
                              </div>
                           </form>
                           <!-- Form end-->
                        </div>
                        <div class="contact-box info-box">
                           <div class="contact-info-right">
                              <h3>Contact Us</h3>
                              <div class="ts-contact-info"><span class="ts-contact-icon float-left"><i class="icon icon-map-marker2"></i></span>
                                 <div class="ts-contact-content">
                                    <h3 class="ts-contact-title">Visit Us</h3>
                                    <p>12 Throgmorton Avenue, 
London
EC2N 2DL</p>
                                 </div>
                                 <!-- Contact content end-->
                              </div>
                              <div class="ts-contact-info"><span class="ts-contact-icon float-left"><i class="icon icon-phone3"></i></span>
                                 <div class="ts-contact-content">
                                    <h3 class="ts-contact-title">Call Us</h3>
                                    <p>+16673549402</p>
                                 </div>
                                 <!-- Contact content end-->
                              </div>
                              <div class="ts-contact-info last"><span class="ts-contact-icon float-left"><i class="icon icon-envelope"></i></span>
                                 <div class="ts-contact-content">
                                    <h3 class="ts-contact-title">Mail Us</h3>
                                    <p>support@cryptochainspot.com</p>
                                 </div>
                                 <!-- Contact content end-->
                              </div>
                              <ul class="contact-info-social-links">
                                 <li><a href="https://t.me/MichealNorris"><i class="fa fa-telegram"></i></a></li>
                                 <li><a href="https://wa.me/17377583956"><i class="fa fa-whatsapp"></i></a></li>
                                 <li><a href="mailto:support@cryptochainspot.com"><i class="fa fa-envelope"></i></a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>        

<?php include("footer.php"); ?>