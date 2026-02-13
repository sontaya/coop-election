
<footer>
  <div class="container">
    <div class="row">        
      <div class="col-md-12 ">
        <div>  
          Copyright &copy; 2021 Suan Dusit University
        </div>
      </div>
    </div>   
  </div>
</div>
</footer>


<script src="<?php echo base_url();?>assets/front/js/bootstrap.bundle.min.js"></script>
<script>
  $(document).ready(function(){
         function getdate(){
                var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
             if(s<10){
                 s = "0"+s;
             }
             if (m < 10) {
                m = "0" + m;
            }
            $("#t_time").text(h+" : "+m+" : "+s);
             setTimeout(function(){getdate()}, 500);
            }

            getdate();
    });   
</script>

</body>
</html>