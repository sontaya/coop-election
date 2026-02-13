<style>
#button{
  display:block;
  margin:20px auto;
  padding:30px 30px;
  background-color:#ff0000;
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
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ประมวลผลคะแนนการเลือกตั้ง</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">ประมวลผลผลคะแนนการเลือกตั้ง</li>
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
          <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                   <h3 class="card-title">ประมวลผลผลคะแนนการเลือกตั้ง</h3>
                   
                </div>
              <div class="card-body p-0">
                        
                <button id="button" type="button" class="btn btn-danger">ประกาศผลคะแนน</button>
           
                <div id="overlay">
                  <div class="cv-spinner">
                    <span class="spinner"></span>
                  </div>
                </div>
                <style>
                  #tbl_score {
                    display: flex;
                    justify-content: center;
                  }

                  #desktop {
                    align-self: center;
                  }
                </style>
                <input type="hidden" name="pcode" id="pcode" value="<?php echo $this->session->userdata['pcode']; ?>">
         
       
             
              </div>
            </div>

           
          </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 
    
 
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
  /*  google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
     function drawChart() { 
      var jsonData = $.ajax({ 
          url: baseurl + 'admin/report/fetch_chart', 
          dataType: "json", 
          async: false 
          }).responseText; 
           
      // Create our data table out of JSON data loaded from server. 
      var data = new google.visualization.DataTable(jsonData); 
 
      // Instantiate and draw our chart, passing in some options. 
      var chart = new google.visualization.PieChart(document.getElementById('chart_div')); 
      chart.draw(data, {width: 800, height: 300}); 
    } 
*/
  </script> 
 <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/sweetalert2/sweetalert2.min.css">
<script src="<?php echo base_url();?>assets/admin/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script>
  var baseurl='<?php echo base_url();?>';

  jQuery(function($){
    //$("#tbl_score").hide();
   
    
    $('#button').click(function(){
       var pcode=$('#pcode').val();

        Swal.fire({
              title: 'ยืนยันการประมวลผลคะแนน?',
              //input: 'text',
              html: `<input type="password" id="cardid" class="swal2-input" placeholder="รหัสยืนยัน">`,
              confirmButtonText: 'ยืนยัน',
              //showCancelButton: true,
              showLoaderOnConfirm: true,
              focusConfirm: false,
              preConfirm: () => {
               const cardid = Swal.getPopup().querySelector('#cardid').value
                //var myurl=baseurl+`council/card_exists/`;
               return new Promise(function (resolve,reject) {
                  $.ajax({
                    url: baseurl+`admin/home/card_exists/` + cardid,
                    type: "POST",                
                    data: {cardid:cardid,pcode:pcode},               
                    dataType: 'json', 
                  }).done(function (response) {
                      console.log(response);
                      if(response.status=='error'){
                         Swal.showValidationMessage(`รหัสยืนยันไม่ถูกต้อง`);                    
                      }
                      resolve();
                     
                    }).fail(function (erordata) {
                      console.log(erordata);
                      swal.fire('Error!', 'Call error.', 'error');
                    })

                })
              },
               allowOutsideClick: () => !Swal.isLoading()
              }).then((result) => {
                
                if(result.value){
                   window.location = baseurl +'admin/report/view';

                  $(document).ajaxSend(function() {
                    $("#overlay").fadeIn(1000);　
                  });
                   
                       
             
                 
                }else{
                  /*Swal.fire(
                    'No data',
                    'No data has been deleted.',
                    'success'
                  )*/
                }

              }).catch(swal.noop);
              
     /* Swal.fire({
        title: 'ยืนยันการประมวลผลคะแนน?',
        
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ยืนยัน'
      }).then((result) => {
        if (result.value) { //if (result.value)
          $.ajax({
            url: baseurl + 'admin/report/process_score',
            type: 'GET',
            success: function(data){
              $("#tbl_score").show();
              var obj = JSON.parse(data);
              console.log(obj);
               var html = '';
              for (var i = 0; i < obj.length; i++) {          
             
               html += '<tr><td align="right" style="vertical-align:middle;text-align:center;"><strong>'+obj[i].c_number+'</strong></td><td>';
               html += '<img src="'+baseurl+'uploads/candidate/'+obj[i].pid+'.jpg" width="64" height="64" class="my-n1" alt="">'+obj[i].candidate_name+'</td><td>'+obj[i].total+'</td></tr>';
               }
               setTimeout(function() {
                $("#desktop tbody").html(html);
                
              }, 5000);                

            }      
          }).done(function() {
            setTimeout(function(){
              $("#overlay").fadeOut(1000);
            },5000);
          });
        }
      });*/
     
    }); 

  });
</script>
