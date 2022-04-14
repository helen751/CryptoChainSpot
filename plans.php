<?php
$title = "Plans | CryptoChainSpot | Cryptocurrency Investment";
 include("header.php"); 
$coin=' ';
$coinname=' ';
if (isset($_GET["p"])) {
   
    $coin = $_GET['p'];
     

    // code...

     $coinsql = "SELECT * from coins where coin_id='$coin'";
                                    $coinresult = mysqli_query($link,$coinsql);
                                    $countcoin = mysqli_num_rows($coinresult);

                                        if($countcoin != 0){
                      $coinrow = mysqli_fetch_array($coinresult, MYSQLI_ASSOC);
                                            $coinname = $coinrow["coin_name"];

                                            $coinid = $coinrow["coin_id"];
                                        }

}

?>
<!-- START SECTION BANNER -->
<div class="banner-area" id="banner-area" style="background-image:url(images/slider/bg4.jpg);">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col">
                  <div class="banner-heading">
                     <h1 class="banner-title"><?php echo $coinname; ?> Plans</h1>
                  </div>
               </div>
               <!-- Col end-->
            </div>
            <!-- Row end-->
         </div>
         <!-- Container end-->
      </div>
<section class="main-container" id="main-container" style="padding-top: 0px;">

    <div class="ts-price-box solid-bg" style="margin-top: 0px;">
            <div class="container">
               <div class="row text-center">
                  <div class="col-md-12">
                     <h2 class="section-title"><span>Investment</span>Plans</h2>
                  </div>
                  <!-- Col End -->
               </div>
                
                <br>
                
                                
               <div class="row" style='margin-bottom: 40px;'>
                   
                  <div class="col-lg-12">
                     <div class="pricing-boxed">
                         
                 <?php 
                 $plansql = "SELECT * from plans where coin_id='$coin'";
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


                 ?>                                
                         <div class="single-price-box ">
             <div class="pricing-plan">
              <div class="pricing-header border-left" style='background-color: #ff9900;'>
                  <h2 class="plan-name"><?php echo $planname; ?></h2>
                          <h3 class="plan-price">
                                    <strong>$<?php echo  number_format(round($min,2)); ?></strong>
                                 </h3>
                              </div>
                               <ul class="list-unstyled">
<li><h6 class='text-muted'><b>$<?php echo  number_format(round($min,2)); ?> - $<?php echo  number_format(round($max,2)); ?></b></h6></li>
 <li><span style="color: #ff9900;">Daily Profit: </span><b><?php echo $profit; ?> %</b></li>
    <li><span style="color: #ff9900;">Total Profit: </span><b><?php echo $profit*$period; ?> %</b></li>
<li><span style="color: #ff9900;">Contract Life: </span><b><?php echo $period/7; ?> week(s)</b></li>
<li><span style="color: #ff9900;">Referral Bonus: </span><b><?php echo $ref; ?> %</b></li>
<li><span style="color: #ff9900;">Business Day: </span><b>Mon - Friday</b></li>
<li><span style="color: #ff9900;">Withdrawal: </span><b>Weekly</b></li>
                        </ul>
             <div>
                <a href="user/dashboard" class="btn btn-primary" style='background-color: #ff9900;'>Invest</a>
                        </div>
                               
                           </div>
                        </div>
                                        
                         
               <?php 
               }
           }
               else{
               ?> 
<div class="single-price-box col-12">
             <div class="pricing-plan">
              <div class="pricing-header border-left" style='background-color: #ff9900;'>
                  <h2 class="plan-name">No Plans Added Yet For this Coin</h2>
              </div>
          </div>
      </div>

               <?php 
               }
               ?>                         
                     </div>
                  </div>
               </div>
                                         
                
                
                
            </div>
         </div>
      </section>

<!--section class="team-two-section ptb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-8">
                    <div class="section-heading text-center mb-5">
                        <h2>Meet our lovely team</h2>
                        <p class="lead">Distinctively grow go forward manufactured products and optimal networks. Globally administrate 24/7 interfaces and end-to-end platforms.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="staff-member">
                        <div class="card gray-light-bg text-center border-0">
                            <img src="img/team-1.jpg" alt="team image" class="card-img-top">
                            <div class="card-body">
                                <h5 class="teacher mb-0">Richard Ford</h5>
                                <span>Instructor of Mathematics</span>
                                <ul class="list-inline pt-2 social">
                                    <li class="list-inline-item"><a href="#" target="_blank"><span
                                            class="ti-facebook"></span></a></li>
                                    <li class="list-inline-item"><a href="#" target="_blank"><span
                                            class="ti-linkedin"></span></a></li>
                                    <li class="list-inline-item"><a href="#" target="_blank"><span
                                            class="ti-dribbble"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="overlay d-flex align-items-center justify-content-center">
                            <div class="overlay-inner">
                                <p class="teacher-quote">"Dramatically leverage existing fully researched platforms vis-a-vis viral." </p><a
                                    href="#" class="teacher-name">
                                <h5 class="mb-0 teacher text-white">Richard Ford</h5></a>
                                <span class="teacher-field text-white">Instructor of Mathematics</span>
                                <ul class="list-inline py-4 social">
                                    <li class="list-inline-item"><a href="#" target="_blank"><span
                                            class="ti-facebook"></span></a></li>
                                    <li class="list-inline-item"><a href="#" target="_blank"><span
                                            class="ti-linkedin"></span></a></li>
                                    <li class="list-inline-item"><a href="#" target="_blank"><span
                                            class="ti-dribbble"></span></a></li>
                                </ul>
                                <p class="teacher-see-profile">
                                    <a href="#" class="btn outline-white-btn">View my profile</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="staff-member">
                        <div class="card gray-light-bg text-center border-0">
                            <img src="img/team-3.jpg" alt="team image" class="card-img-top">
                            <div class="card-body">
                                <h5 class="teacher mb-0">Kely Roy</h5>
                                <span>Lead Designer</span>
                                <ul class="list-inline pt-2 social">
                                    <li class="list-inline-item"><a href="#" target="_blank"><span
                                            class="ti-facebook"></span></a></li>
                                    <li class="list-inline-item"><a href="#" target="_blank"><span
                                            class="ti-linkedin"></span></a></li>
                                    <li class="list-inline-item"><a href="#" target="_blank"><span
                                            class="ti-dribbble"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="overlay d-flex align-items-center justify-content-center">
                            <div class="overlay-inner">
                                <p class="teacher-quote">"Credibly extend high-payoff web-readiness via top-line relationships." </p><a
                                    href="#" class="teacher-name">
                                <h5 class="mb-0 teacher text-white">Kely Roy</h5></a><span class="teacher-field text-white">Lead Designer</span>
                                <ul class="list-inline py-4 social">
                                    <li class="list-inline-item"><a href="#" target="_blank"><span
                                            class="ti-facebook"></span></a></li>
                                    <li class="list-inline-item"><a href="#" target="_blank"><span
                                            class="ti-linkedin"></span></a></li>
                                    <li class="list-inline-item"><a href="#" target="_blank"><span
                                            class="ti-dribbble"></span></a></li>
                                </ul>
                                <p class="teacher-see-profile">
                                    <a href="#" class="btn outline-white-btn">View my profile</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="staff-member">
                        <div class="card gray-light-bg text-center border-0">
                            <img src="img/team-2.jpg" alt="team image" class="img-fluid">
                            <div class="card-body">
                                <h5 class="teacher mb-0">Gerald Nichols</h5>
                                <span>Managing Director</span>
                                <ul class="list-inline pt-2 social">
                                    <li class="list-inline-item"><a href="#" target="_blank"><span
                                            class="ti-facebook"></span></a></li>
                                    <li class="list-inline-item"><a href="#" target="_blank"><span
                                            class="ti-linkedin"></span></a></li>
                                    <li class="list-inline-item"><a href="#" target="_blank"><span
                                            class="ti-dribbble"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="overlay d-flex align-items-center justify-content-center">
                            <div class="overlay-inner">
                                <p class="teacher-quote">"Authoritatively evolve stand-alone e-tailers whereas prospective partnerships." </p><a
                                    href="#" class="teacher-name">
                                <h5 class="mb-0 teacher text-white">Gerald Nichols</h5></a>
                                <span class="teacher-field text-white">Managing Director</span>
                                <ul class="list-inline py-4 social">
                                    <li class="list-inline-item"><a href="#" target="_blank"><span
                                            class="ti-facebook"></span></a></li>
                                    <li class="list-inline-item"><a href="#" target="_blank"><span
                                            class="ti-linkedin"></span></a></li>
                                    <li class="list-inline-item"><a href="#" target="_blank"><span
                                            class="ti-dribbble"></span></a></li>
                                </ul>
                                <p class="teacher-see-profile">
                                    <a href="#" class="btn app-store-btn">View my profile</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> END SECTION FAQ -->
<!--section id="Blog" class="news">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="title title-center">
					<span>News</span>
					<h2>Latest News About Us</h2>
				</div>
			</div>
			<div class="col-xl-6 offset-xl-3 col-md-8 offset-md-2">
				<span class="description-content">Onward and upward, productize the deliverables and focus on the bottom line drop-dead date translating our vision of having a market leading platfrom drop-dead date.</span>
			</div>
			<div class="col-xl-12 col-md-12">
				<article class="blog-card wow fadeInUp" data-wow-delay="0.2s">
					<a href="single-post.html" class="image"><img src="img/blog/article-1.jpg" alt="" /></a>
					<div class="article-content">
						<a href="#" class="category"><i class="far fa-folder"></i> Finance</a>
						<a href="#" class="date"><i class="far fa-clock"></i> 25.09.2018</a>
						<a href="#" class="title"><h3>Lower supply is generating high price growth</h3></a>
					</div>
				</article>
				<article class="blog-card wow fadeInUp" data-wow-delay="0.4s">
					<a href="single-post.html" class="image"><img src="img/blog/article-2.jpg" alt="" /></a>
					<div class="article-content">
						<a href="#" class="category"><i class="far fa-folder"></i> Events</a>
						<a href="#" class="date"><i class="far fa-clock"></i> 22.09.2018</a>
						<a href="#" class="title"><h3>Introduction cryptocurrency bills to Congress</h3></a>
					</div>
				</article>
				<article class="blog-card wow fadeInUp" data-wow-delay="0.6s">
					<a href="single-post.html" class="image"><img src="img/blog/article-3.jpg" alt="" /></a>
					<div class="article-content">
						<a href="#" class="category"><i class="far fa-folder"></i> Markets</a>
						<a href="#" class="date"><i class="far fa-clock"></i> 28.08.2018</a>
						<a href="#" class="title"><h3>Is relative value investing time finally here?</h3></a>
					</div>
				</article>
			</div>
			<div class="col-xl-12">
				<a href="blog.html" class="btn mt-3 mt-md-4 light_button">More News</a>
			</div>
		</div>
	</div>
</section--><!-- END SECTION BLOG -->
<?php include("footer.php"); ?>