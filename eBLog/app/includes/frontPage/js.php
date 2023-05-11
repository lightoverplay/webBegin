<!-- Javascript files--> 
      <script src="asserts/js/jquery.min.js"></script> 
      <script src="asserts/js/popper.min.js"></script> 
      <script src="asserts/js/bootstrap.bundle.min.js"></script> 
      <script src="asserts/js/jquery-3.0.0.min.js"></script> 
      <script src="asserts/js/plugin.js"></script> 
      <!-- sidebar --> 
      <script src="asserts/js/jquery.mCustomScrollbar.concat.min.js"></script> 
      <script src="asserts/js/custom.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script>
         $(document).ready(function(){
         $(".fancybox").fancybox({
         openEffect: "none",
         closeEffect: "none"
         });
         
         $(".zoom").hover(function(){
         
         $(this).addClass('transition');
         }, function(){
         
         $(this).removeClass('transition');
         });
         });
         
      </script> 