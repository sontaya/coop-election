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

  <div class="content-wrapper">
 
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ประมวลผลการจับรางวัล</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">ประมวลผลการจับรางวัล</li>
            </ol> 
          </div>
        </div>
      </div>
    </div>
   
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                   <h3 class="card-title">ประมวลผลการจับรางวัล 3</h3>
                   
                </div>
              <div class="card-body p-0">
                         
                <button id="button" type="button" class="btn btn-success">จับรางวัล</button>
           
                <div id="overlay">
                  <div class="cv-spinner">
                    <span class="spinner"></span>
                  </div>
                </div>
                <style>
                  #tbl_score {
                    display: flex;
                    /*justify-content: center;*/
                  }

                  #desktop5 {
                    align-self: center;
                  }
                  
                </style>
                
                <div id="lotto"></div>
              
             
              </div>
            </div>

            

           
          </div>
          
        </div>
      

      </div>
    </div>
  
  </div>
 

<script src="<?php echo base_url();?>assets/admin/slotmachine/js/slotmachine.min.js"></script>
 <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/sweetalert2/sweetalert2.min.css">
<script src="<?php echo base_url();?>assets/admin/plugins/sweetalert2/sweetalert2.all.min.js"></script>

<script>
 var baseurl='<?php echo base_url();?>';
  jQuery(function($){
    //var thChar = jQuery.parseJSON($('#allvote').val());

    $("#lotto").hide();
   
    
    $('#button').click(function(){
     
      Swal.fire({
        title: 'ยืนยันการประมวลผลรางวัล?',
        
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ยืนยัน'
      }).then((result) => {
        if (result.value) { //if (result.value)
           $(document).ajaxSend(function() {
              $("#overlay").fadeIn(1000);　
           });

          $.ajax({
            url: baseurl + 'admin/lotto/process_lotto3',
            type: 'GET',
            success: function(data){
              $("#lotto").show();
             //var obj = JSON.parse(data);
              console.log(data);
              document.getElementById("lotto").innerHTML=""; 
              
               setTimeout(function() {
                //$("#lotto").append(obj[0].refcode);
                document.getElementById("lotto").innerHTML=data; 
                
              }, 5000);                       

            }      
          }).done(function() {
            setTimeout(function(){
              $("#overlay").fadeOut(1000);
            },6000);
          });
        }
      });
     
    }); 

  });

  

</script>
