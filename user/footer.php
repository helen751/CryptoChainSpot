 <footer class="footer">
          <div class="w-100 clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © <?php echo date('Y'); ?> <a href="index" >CryptoChain Spot</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Admin <i class="far fa-user text-primary"></i></span>
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
    
        <script src="lib/chartist/js/chartist.js"></script>
    <script src="lib/d3/js/d3.js"></script>
    <script src="lib/rickshaw/js/rickshaw.min.js"></script>
    <script src="lib/jquery.sparkline.bower/js/jquery.sparkline.min.js"></script>
    <script src="js/ResizeSensor.js"></script>
    <script src="js/dashboard.js"></script>
    <script src="js/slim.js"></script>
    <script type="text/javascript">
        var RegExp = new RegExp(/^\d*\.?\d*$/);
         var val = document.getElementById("profit").value;
         var val2 = document.getElementById("refp").value;
         var val3 = document.getElementById("min").value;
           var val4 = document.getElementById("max").value;
        

  
        function valid(elem) {
           
            if (RegExp.test(elem.value)) {
                val = elem.value;
            } else {
                elem.value = val;
            }
        }
        function validref(elem) {
            
            if (RegExp.test(elem.value)) {
                val2 = elem.value;
            } else {
                elem.value = val2;
            }
        }
        function validmin(elem) {
            
            if (RegExp.test(elem.value)) {
                val3 = elem.value;
            } else {
                elem.value = val3;
            }
        }
        function validmax(elem) {
          
            if (RegExp.test(elem.value)) {
                val4 = elem.value;
            } else {
                elem.value = val4;
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

<!--End of Tawk.to Script-->  
<script type="text/javascript">
  const countuser = document.querySelector('#countuser');
  const countpw = document.querySelector('#countpw');
  const countpd = document.querySelector('#countpd');
  const counttr = document.querySelector('#counttr');
  const counttc = document.querySelector('#counttc');
  let counter = 0;

  let initialCountuser = countuser.innerHTML;
  let initialCountpw = countpw.innerHTML;
  let initialCountpd = countpd.innerHTML;
  let initialCounttr = counttr.innerHTML;
  let initialCounttc = counttc.innerHTML;

  const counterUp = (initialCount, screen, counter = 0) => {
    const interval = setInterval(() => {
      if(counter == initialCount){
        clearInterval(interval)
      }
      screen.innerHTML = counter
      counter++
    } , 10)
  }

  counterUp(initialCountuser, countuser);
 counterUp(initialCountpw, countpw);
 counterUp(initialCountpd, countpd);
 counterUp(initialCounttr, counttr);
 counterUp(initialCounttc, counttc);

  
</script>

<script type="text/javascript">
 function showaddcoin(){
    document.getElementById("users").style.display="none";
    document.getElementById("sum").style.display="none";
    document.getElementById("addcoin").style.display="block";
    document.getElementById("addplan").style.display="none";
  }
  function showdash(){
    document.getElementById("users").style.display="block";
    document.getElementById("sum").style.display="flex";
    document.getElementById("addcoin").style.display="none";
    document.getElementById("addplan").style.display="none";
  }
  function showaddplan(){
    document.getElementById("users").style.display="none";
    document.getElementById("sum").style.display="none";
    document.getElementById("addcoin").style.display="none";
    document.getElementById("addplan").style.display="block";
  }
  function close(){
    document.getElementById("msg").style.display="none";
  }

</script>

<script type="text/javascript">

    // const postData = async (options) => {
    //     const request = await fetch('./functions.php', options);
    //     const response = await request.text()
    //     return response;
    // }

  $(document).ready(function(e){
    // Submit form data via Ajax
    $("#addForm").on('submit', function(e){
        e.preventDefault();
    var name1 = document.getElementById("name").value;
     var image = document.getElementById("img").value;

     const file = document.querySelector('#img');
    var abbr = document.getElementById("abbr").value;
    var wallet1 = document.getElementById("wallet").value;
    var msg = document.getElementById("msg");
    
    if (name1.length==0) {
        alert("please enter the Coin name")
    }
    else if(wallet1.length==0){
        alert("please enter the coin Wallet Address")
    }
    else if(abbr.length==0){
        alert("please enter the Coin Name Abbreviation")
    }
    else if(image==""){
        alert("please Upload the Coin Image")
    }
    
    else{
var filePath = image;
          
            // Allowing file type
            var allowedExtensions = 
                    /(\.jpg|\.jpeg|\.png|\.gif)$/i;
              
            if (!allowedExtensions.exec(filePath)) {
                alert('Please Upload a valid image file \n only .png, .jpg, .jpeg and .gif images allowed');
                image = '';
                
            } 
else{
    const formData = new FormData();
    formData.append('name', name1)
    formData.append('wallet', wallet1)
    formData.append('abbre', abbr)
    formData.append('addcoin', '')
    formData.append('file', file.files[0])

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
   }
  })
})


$(document).ready(function(e){
    // Submit form data via Ajax
    $("#paddForm").on('submit', function(e){
        e.preventDefault();
    var pname = document.getElementById("pname").value;
     var pcoin = document.getElementById("pcoin").value;
    var min = document.getElementById("min").value;
    var max = document.getElementById("max").value;
    var period = document.getElementById("period").value;
    var profit = document.getElementById("profit").value;
 var refp = document.getElementById("refp").value;

    var msg = document.getElementById("msg");
    
    if (pname.length==0) {
        alert("please enter the Plan name")
    }
    else if(profit.length==0){
        alert("please enter the Plan profit")
    }
    else if(refp.length==0){
        alert("please enter the Referal Bonus Profit")
    }
    else if(period.length==0){
        alert("please enter the Plan Duration in days")
    }
    else if(min.length==0){
        alert("please enter the Minimum Deposit Amount")
    }
    else if(max.length==0){
        alert("please enter the Maximum Deposit Amount")
    }
    
    else{
        period2 = period*7;

    const formData = new FormData();
    formData.append('pname', pname)
    formData.append('pcoin', pcoin)
    formData.append('min', min)
    formData.append('max', max)
    formData.append('period', period2)
    formData.append('refp', refp)
    formData.append('profit', profit)
    formData.append('addplan', '')

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
</body>
</html>
