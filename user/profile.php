 <?php include("userheader.php");
?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper" style="padding-top: 0;">

    <div class="row py-3">
            <div class="col-sm-6" style="width: 50%;">
              <div class="">
                  <div class="badge badge-primary"><i class="fa fa-user menu-icon"></i> My Profile</div>
              </div>
            </div>
    <div class="col-sm-6 " style="width: 50%; padding-top: 0px; margin-top: -5px;">
                <div style="float: right;">
                <small class="text-muted text-capitalize">Available Balance</small><br>
                <b>USD </b><b id="conv"><?php echo round($accbal,2); ?></b><br>
        </div>
            </div>
          </div>
          <div class="alert  container alert-solid alert-success" role="alert" id="msg" style="display: none;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="close();">
              <span aria-hidden="true">×</span>
            </button>
    <span id="inmsg"></span>        </div>
                  <div class="row mb-3">
          <div class="col-md-8">
          <div class="card card-body pd-20 mg-t-10">
              <h3 class="card-title">Update Contact Information</h3>
              <p><small class="card-description">
                    Basic form layout
                      </small></p>
              <form action="" method="post" name="form" id="paddForm">
                  
              <div class="form-group">
                  <label class="form-control-label">Username(Not editable): <span class="tx-danger"></span></label>
                  <input type="text" class="form-control" disabled value="<?php echo $username; ?>">
              </div><!-- form-group -->
              <div class="form-group">
                  <label class="form-control-label">Email(Not editable): <span class="tx-danger">*</span></label>
                <input type="email" value="<?php echo $email; ?>" name='email' class="form-control" disabled>
              </div><!-- form-group -->

              <div class="form-group">
                  <label class="form-control-label">Full Name: <span class="tx-danger">*</span></label>
                <input type="text" value="<?php echo $name; ?>" name='name' class="form-control" id="name">
              </div><!-- form-group -->

              <div class="form-group">
                  <label class="form-control-label">Phone Number: <span class="tx-danger">*</span></label>
                <input type="text" value="<?php echo $phone; ?>" name='phone' class="form-control" id="phone">
              </div><!-- form-group -->
              
              <button class="btn btn-primary btn-block submitBtn2" name='update_info' type="submit">Update</button>
          </form>
            </div>
          </div>
              
              
              <div class=" col-md-4">
          <div class="card card-body pd-20 mg-t-10">
              <h3 class="card-title">Change Password</h3>
              <p><small class="card-description">
                    Basic form layout
                      </small></p>
              <form action="" method="post" id="addForm">
              <div class="form-group">
                  <label class="form-control-label">Old Password: <span class="tx-danger">*</span></label>
                <input type="password" name='password' id="oldp" class="form-control" placeholder="Enter Old Password">
              </div><!-- form-group -->
              <div class="form-group">
                  <label class="form-control-label">New Password: <span class="tx-danger">*</span></label>
                <input type="password" name='new_password' id="newp" class="form-control" placeholder="Enter New Password">
              </div><!-- form-group -->
              <div class="form-group">
                  <label class="form-control-label">Repeat New Password: <span class="tx-danger">*</span></label>
                <input type="password" name='new_password_retype' id="newp2" class="form-control" placeholder="Repeat New Password">
              </div><!-- form-group -->
              <button class="btn btn-success btn-block submitBtn" name='update_password' type="submit">Update</button>
              </form>
            </div>
          </div>
          </div>

        
      </div><!-- container -->
    </div>
      </div>
      </div><!-- slim-mainpanel -->

   <footer class="footer">
          <div class="w-100 clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019<?php //echo date('Y'); ?> <a href="index" >CryptoChain Spot</a>. All rights reserved.</span>
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
    
        <script src="lib/chartist/js/chartist.js"></script>
    <script src="lib/d3/js/d3.js"></script>
    <script src="lib/rickshaw/js/rickshaw.min.js"></script>
    <script src="lib/jquery.sparkline.bower/js/jquery.sparkline.min.js"></script>
    <script src="js/ResizeSensor.js"></script>
    <script src="js/dashboard.js"></script>
    <script src="js/slim.js"></script>
    <script type="text/javascript">
      $(document).ready(function(e){
    // Submit form data via Ajax
    $("#paddForm").on('submit', function(e){
        e.preventDefault();
    var phone = document.getElementById("phone").value;
    var name = document.getElementById("name").value;
 
    var msg = document.getElementById("msg");
    if (name.length==0) {
        alert("please enter your Full name");
    }
    else if(phone.length==0){
        alert("Please enter your Phone Number");
    }
    
    else{

    const formData = new FormData();
    formData.append('phone', phone)
     formData.append('name', name)
    formData.append('editp', '')

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
                    $('#inmsg').html(res.message);
                    document.getElementById("phone").value = phone;
                    document.getElementById("name").value = name;
                    document.getElementById("paddForm").reset();
                    window.scrollTo(0,0);
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

    <script type="text/javascript">
         function close(){
    document.getElementById("msg").style.display="none";
  }

      $(document).ready(function(e){
    // Submit form data via Ajax
    $("#addForm").on('submit', function(e){
        e.preventDefault();
    var oldp = document.getElementById("oldp").value;
    var newp = document.getElementById("newp").value;
    var newp2 = document.getElementById("newp2").value;
 
    var msg = document.getElementById("msg");
    if (oldp.length==0) {
        alert("please enter your Old Password");
    }
    else if(newp.length==0){
        alert("Please enter your New Password");
    }
    else if(newp.length < 6){
      alert("Invalid Password! Password should not be less than 6 characters");  
    }
    else if(newp2.length==0){
        alert("Please Confirm your New Password");
    }
    else if(newp != newp2){
      alert("The two Passwords does not match. Please Confirm your New Password");  
    }
    
    else{

    const formData = new FormData();
    formData.append('oldp', oldp)
     formData.append('newp', newp)
    formData.append('addp', '')

    const options = {
        method: "Post",
        body: formData,
    }
$('.submitBtn').attr("disabled","disabled");
                $('#addForm').css("opacity",".5");

        fetch('./functions.php', options)
            .then(data => data.json())
            .then(res => {
                if(res.status == 1){
                   document.getElementById("msg").style.display="block";
                    $('#inmsg').html(res.message);
                    document.getElementById("addForm").reset();
                    window.scrollTo(0,0);
                }
                else{
                    document.getElementById("msg").style.display="block";
                     $('#inmsg').html(res.message);
                     window.scrollTo(0,0);
                }
                $('#addForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
                
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
