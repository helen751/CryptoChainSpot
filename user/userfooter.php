
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
s1.src='https://embed.tawk.to/62502da1c72df874911e2266/1g04j4ge8';
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
        var ta = document.getElementById("ta2").innerHTML;
        var tb = document.getElementById("tb2").innerHTML;
        var td = document.getElementById("td2").innerHTML;
        var tw = document.getElementById("tw2").innerHTML;
        var tt = document.getElementById("tt2").innerHTML;
        var ts = document.getElementById("ts2").innerHTML;
    fetch('https://coinlib.io/api/v1/coin?key=511d043a7ff82b14&pref=USD&symbol=BTC')
  .then(response => response.json())
  .then(response => {
document.getElementById("ta").innerHTML = (parseFloat(ta)/response.price).toFixed(4)+" BTC";
document.getElementById("tb").innerHTML = (parseFloat(tb)/response.price).toFixed(4)+" BTC";
document.getElementById("td").innerHTML = (parseFloat(td)/response.price).toFixed(4)+" BTC";
document.getElementById("tw").innerHTML = (parseFloat(tw)/response.price).toFixed(4)+" BTC";
document.getElementById("ts").innerHTML = (parseFloat(ts)/response.price).toFixed(4)+" BTC";
document.getElementById("tt").innerHTML = (parseFloat(tt)/response.price).toFixed(4)+" BTC";
  })
</script>
    <script type="text/javascript">
        function contact(){
    var name = document.getElementById("name").value;
     var topic = document.getElementById("topic").value;
      var email = document.getElementById("email").value;
     var message = document.getElementById("message").value;
     var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

var msg = document.getElementById("msg");
    if (name.length==0) {
        alert("Please enter your Name");
    }
    else if (email.length==0) {
        alert("Please enter your Email Address");
    }
    
    else if(!(email.match(mailformat)))
    {
        alert("Please enter a Recognized Email");
    }
    else if (topic.length==0) {
        alert("Please Specify a Topic");
    }
    else if (message.length==0) {
        alert("Please Enter a Message");
    }
    else{

    const formData = new FormData();
    formData.append('name', name)
    formData.append('email', email)
    formData.append('topic', topic)
    formData.append('message', message)
    formData.append('contact', '')

    const options = {
        method: "Post",
        body: formData,
    }
$('.csubmit').attr("disabled","disabled");
                $('#cform').css("opacity",".5");

        fetch('./functions.php', options)
            .then(data => data.json())
            .then(res => {
                if(res.status == 1){
                   document.getElementById("msg").style.display="block";
                     $('#inmsg').html(res.message);
                     window.scrollTo(0,0);
                }
                else{
                    document.getElementById("msg").style.display="block";
                     $('#inmsg').html(res.message);
                     window.scrollTo(0,0);
                }
                $('#cform').css("opacity","");
                $(".csubmit").removeAttr("disabled");
                
            });
    
}

 }
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
