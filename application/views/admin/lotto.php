<style>
#button{
  display:block;
  margin:20px auto;
  padding:30px 30px;
  background-color:#82b440;
  border:solid #ccc 1px;
  cursor: pointer;
}
#overlay{ 
  position: fixed;
  top: 0;
  z-index: 100;
  width: 100%;
  height:100%;
  display: none;
  background: rgba(0,0,0,0.6);
}
.cv-spinner {
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;  
}
.spinner {
  width: 40px;
  height: 40px;
  border: 4px #ddd solid;
  border-top: 4px #2e93e6 solid;
  border-radius: 50%;
  animation: sp-anime 0.8s infinite linear;
}
@keyframes sp-anime {
  100% { 
    transform: rotate(360deg); 
  }
}
.is-hide{
  display:none;
}
</style>
 <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/slotmachine/css/app.css">
 <script src="<?php echo base_url();?>assets/admin/jquery.easing.min.js"></script>


 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ผลการจับรางวัล</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">ผลการจับรางวัล</li>
            </ol> 
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
    
          <div class="row">
          <div class="col-lg-12 text-center">
              <div class="card">
                <div class="card-header">
                   <h3 class="card-title">จับรางวัล</h3>
                   
                </div>
              <div class="card-body p-0">

                <style>
                  #tbl_score {
                    display: flex;
                    justify-content: center;
                  }

                  #desktop {
                    align-self: center;
                  }
                  .text-lotto{
                    font-size: 100px;
                    font-weight: 700;
                    color: #fff;
                    border:3px; 
                    border-style:solid; 
                    border-color:#f1f5f9;
                    padding-top: 15px;
                    padding-bottom: 15px
                  }
            

                </style>
             
               
                      <div id="random_result" class="text-center text-lotto" style="background: #05CC47;">?</div>

<button id="button_lotto" type="button" class="btn btn-success text-center">เริ่มจับรางวัล</button>
                
               <?php 
             
               $vote = json_encode($otpcodes);  
    
               ?>
             
                <input type="hidden" name="all_vote" id="all_vote" value='<?php echo $vote;?>'>

             
              </div>
            </div>

          </div>
          
        </div>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script src="<?php echo base_url();?>assets/admin/slotmachine/js/slotmachine.min.js"></script>
 <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/sweetalert2/sweetalert2.min.css">
<script src="<?php echo base_url();?>assets/admin/plugins/sweetalert2/sweetalert2.all.min.js"></script>

<script>
  
  var obj = jQuery.parseJSON($('#all_vote').val());
  //console.log(obj);
   
   radomChar = obj;
   function animateValue(id, start, end, duration) {
  var startNum = 0;
  var endNum = radomChar.length;
  let startTimestamp = null;
  const step = (timestamp) => {
    if (!startTimestamp) startTimestamp = timestamp;
    const progress = Math.min((timestamp - startTimestamp) / duration, 1);
    var p_key = Math.floor(Math.random()*radomChar.length);
    $('#'+id).html(radomChar[p_key]);

    if (progress < 1) {
      window.requestAnimationFrame(step);
    }else{
      $('#'+id).addClass('animate__animated animate__shakeY');
      $('#button_lotto').attr('disabled',false);
    }
  };
  window.requestAnimationFrame(step);
}

/*$('#button_lotto').click(function(){
  $('#button_lotto').attr('disabled',true);
  
  $('#random_char_result').removeClass('animate__animated animate__shakeY');
  animateValue('random_result', 1, 300, 4000);
});*/

$('#button_lotto').click(function(){
     
      Swal.fire({
        title: 'ยืนยันการประมวลผลรางวัล?',
        
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ยืนยัน'
      }).then((result) => {
        if (result.value) { //if (result.value)
          
  $('#button_lotto').attr('disabled',true);
  
  $('#random_char_result').removeClass('animate__animated animate__shakeY');
  animateValue('random_result', 1, 300, 4000);

        }
      });
     
    }); 

  

</script>
