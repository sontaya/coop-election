
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SDU eVote | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/adminlte.min.css">
  <script src="<?php echo base_url()?>assets/plugins/jquery/jquery.min.js"></script>
  <style>
   
    .login-head {
      margin-top: 0;
      margin-bottom: 20px;
      padding-bottom: 20px;
      border-bottom: 1px solid #ddd;
      text-align: center;
  }
  .form-control {
    display: block;
    width: 100%;
    padding: 0.375rem 0.75rem;
    font-size: 0.875rem;
    line-height: 1.5;
    color: #495057;
    background-color: #FFF;
    background-clip: padding-box;
    border: 2px solid #ced4da;
    border-radius: 4px;
    -webkit-transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    -o-transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
}
.add_bottom_15{
  padding-bottom: 15px;
  }
  .add_top_15{
  padding-top: 15px;
  }
  .header-wrapper{
    background-color: #151D30;/*151D30,0062b3*/
  border-bottom: solid 3px #007549;
}
.header-wrapper .header-middle {    
    padding: 10px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
}

.header-wrapper .header-middle .logo {
    float: left;
    max-width: 400px;/*230*/
    width: 100%;
}

.bg-bma-green {
    background-color: #007F5F!important;/*#007549*/
}

.bg-gray {
    background: #086AD8;
}
  </style>

</head>
<body class="hold-transition " >
<div class="header-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
           <div class="header-middle">
           
            <a href="<?php echo site_url()?>" title="logo BMA">
              <div class="logo">
             <!-- <img src="<?php echo base_url()?>uploads/images/bkk_web_logo.jpg" alt="logo BMA" title="logo BMA">-->
             <img src="<?php echo base_url()?>uploads/new_head20162.png" height="50" alt="BMA" title="BMA">
              </div>
            </a>
          </div>
          <div class="clearfix"></div>
        </div>
        </div>
      </div>
    </div>

 <div class="container">
  <!--
 <div class="row">
        <div class="col-12 text-center">
            <div class="section-title mb-4 pb-2">
                <h4 class="title mb-4">ลงคะแนนเลือกตั้ง</h4>
                <p class="text-muted para-desc mx-auto mb-0">การเลือกตั้งกรรมการสหกรณ์ออมทรัพย์ มหาวิทยาลัยสวนดุสิต</p>
            </div>
        </div>
</div>-->

   <div class="row">
         <div class="col-lg-12 col-sm-12">
           <!-- <div class="card">
              <div class="card-body">
               <div class="row">
                 <div class="col-md-6">
                  <p><h5 class="text-primary text-center">เวลาเลือกตั้ง: 9.00 - 15.00 น.</h5></p>
                   <p id="demotime" class="text-center" style="font-size:20px;font-weight:500;  "></p>
                   
                 </div>
                 <div class="col-md-6">
                   <p id="downtime" class="text-center" style="font-size:20px;font-weight:500;  "></p>
                 </div>
               </div>             
              
              </div>
            </div> -->

            <div class="card card-primary card-outline" id="formvote">
              <div class="card-body">
                <h5 class="card-title">ลงคะแนนเลือกตั้ง</h5>

                <p class="card-text text-danger">
                  (เลือกผู้สมัครได้ 7 คน)
                </p>
                <style type="text/css">
                  th {
                    text-align:center;
                  }
                </style>
                <form action="" method="POST">
               <!-- <input type="hidden" name="pcode" id="pcode" value="<?php echo $this->session->userdata['pcode']; ?>">
                <input type="hidden" name="pcode" id="hrcode" value="<?php echo $this->session->userdata['hrcode']; ?>"> -->
                <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th class="text-center">ทำเครื่องหมาย <br><i class="fas fa-check"></i></th>
                      <th valign="center" class="text-center">หมายเลข</th>
                      <th class="text-center">รูปผู้สมัคร</th>
                      <th class="text-center">ชื่อ - นามสกุล</th>
                      <th class="text-center">หน่วยงาน</th>                      
                    </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($candidates as $key => $r){ ?>
                      <tr>
                         <td style="vertical-align:middle;text-align:center;">
                          <input class="candidate" type="checkbox" name="candidate_id[]" value="<?php echo $r->id; ?>" id="chk<?php echo $r->id; ?>">                          
                        </td>
                        <td style="vertical-align:middle;text-align:center;"><div class="cnumber"><?php echo $r->c_number;?></div></td>
                        <td>
                          <img src="<?php echo base_url(); ?>uploads/candidate/<?php echo $r->picture;?>" class="img-fluid img<?php echo $r->id; ?>" width="90px">
                        </td>
                        <td><?php echo $r->candidate_name;?></td>
                        <td></td>
                       
                      </tr>
                <?php } ?>
                  </tbody>
                </table>
              </div>
                <br>
                <div class="row">
                  <div class="col-md-9 text-center">
                    <span class="text-danger">*กรณีไม่ประสงค์จะลงคะแนนกรุณาทำเครื่องหมาย <i class="fas fa-check"></i> ในช่องที่กำหนด</span>
                    <span class="text-success" id="test"></span>
                  </div>
                  <div class="col-md-3">
                     <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">ไม่ประสงค์ลงคะแนน</h3>
              </div>
              <div class="card-body">
                <div class="text-center">
                <input class="no_candidate" type="checkbox" name="no_candidate" value="0" id="no_candidate">
              </div>
              </div>
              <!-- /.card-body -->
            </div>
            <button type="button" class="btn btn-block btn-success" id="submit2"><i class="fas fa-check"></i> บันทึกการลงคะแนน</button>
                  </div>
                </div>
               </form>
                
             
              </div>
            </div><!-- /.card -->


          </div>
         
        </div> 

 </div>

<footer></footer>
<!-- /.login-box -->


  <style>
   .anumber{
    color:#002EAD;
    font-weight:800;
    font-size:20px;
  }

  .cnumber{
    color:#002EAD;
    font-weight:800;
    font-size:40px;
  }
  .removeRow{
    background-color: #FF0000;
    color:#FFFFFF;
  }
</style>
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/sweetalert2/sweetalert2.min.css">
<script src="<?php echo base_url();?>assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>

  <script>
  var baseurl='<?php echo base_url();?>';
  
  $(document).ready(function() { 

    $('.candidate').click(function(){
      if($(this).is(':checked'))
      {
        $(this).closest('tr').addClass('removeRow');
      }
      else
      {
        $(this).closest('tr').removeClass('removeRow');
      }
    });

    $("input:checkbox.candidate").click(function() {
	    $('#no_candidate').attr('disabled', true);
      //$('#no_candidate').prop('checked',false);
      var cnklen = $('input[name="candidate_id[]"]:checked').length;
      
      if(cnklen > 7 ){
        //alert("เลือกได้ 2 คนเท่านั้น");
        //toastr.error("เลือกได้ 1 คนเท่านั้น");
        //Swal.fire('เลือกได้ 1 คนเท่านั้น');
        Swal.fire({
          icon: 'error',
          title: 'เลือกได้ 7 คนเท่านั้น!',         
        });
       
        $(this).closest('tr').removeClass('removeRow');
        return false
      }else if (cnklen == 0) {
        $('#no_candidate').attr('disabled', false);
      }
 
    }); 

    $("input:checkbox.no_candidate").click(function() {
   
        if(!$(this).is(":checked")){
          $('input:checkbox[name="candidate_id[]"]').attr('disabled', false);
           
          console.log("no_candidate unchecked");
        }else{
         $('input:checkbox[name="candidate_id[]"]').attr('disabled', true);                
         
          console.log("candidate checked");
        }
        //alert('you are unchecked ' + $(this).val());
    }); 
    
    $("#submit2").click(function() {

      $.get( baseurl+"council/check_session", function( data ) {
        console.log(data);
          if(data==="1")
           {

            var pcode=$('#pcode').val();
      var hrcode=$('#hrcode').val();
      var checkbox =$('.candidate:checked');
      var checkbox2 =$('.no_candidate:checked');
      if(checkbox.length > 0 || checkbox2.length > 0){

        Swal.fire({
          title: 'ยืนยันการลงคะแนน?',
          text: "โปรดตรวจสอบและยืนยันการเลือกของท่าน เมื่อท่านยืนยันแล้วระบบจะไม่สามารถเปลี่ยนแปลงแก้ไขได้!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'ยืนยัน',
          cancelButtonText: 'ยกเลิก',
        }).then((result) => {
          
          if (result.value) { //isConfirmed
            Swal.fire({
              title: 'ยืนยันบัตรประจำตัวประชาชน',
              //input: 'text',
              html: `<input type="text" id="cardid" class="swal2-input" placeholder="รหัสประจำตัวประชาชน">`,
              confirmButtonText: 'ตรวจสอบ',
              //showCancelButton: true,
              showLoaderOnConfirm: true,
              focusConfirm: false,
              preConfirm: () => {
               const cardid = Swal.getPopup().querySelector('#cardid').value
                //var myurl=baseurl+`council/card_exists/`;
                console.log('cardid'+cardid);
               return new Promise(function (resolve,reject) {
                  $.ajax({
                    url: baseurl+`council/card_exists/` + cardid,
                    type: "POST",                
                    data: {cardid:cardid,hrcode:hrcode},               
                    dataType: 'json', 
                  }).done(function (response) {
                      console.log(response);
                      if(response.status=='error'){
                         Swal.showValidationMessage(`รหัสประจำตัวประชาชนไม่ถูกต้อง`);                    
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
                   console.log('pcode'+pcode);
                  console.log('hrcode'+hrcode);
                  var checkbox_value = [];
                      $(checkbox).each(function(){
                        checkbox_value.push($(this).val());
                      });
                      $(checkbox2).each(function(){
                        checkbox_value.push($(this).val());
                      });
                      
                       $.ajax({
                          url: baseurl +"council/add_vote",
                          method:"POST",
                          data:{checkbox_value:checkbox_value,pcode:pcode,hrcode:hrcode},
                          success:function(data)
                          {  
                            console.log(data);
                            if(data==true){ 

                              $('#no_candidate').attr('disabled', false);
                           
                              swal.fire({
                                icon: 'success',
                                title: 'Your vote has been saved',
                                showConfirmButton: false,
                                timer: 2000                             
                              }).then(function() {
                                window.location = baseurl +'council/success';
                              });   
                            } else{
                              Swal.fire('You already vote.')
                            }                    
                                                                    
                          }
                        });
                 
                }else{
                  /*Swal.fire(
                    'No data',
                    'No data has been deleted.',
                    'success'
                  )*/
                }

              }).catch(swal.noop);

          }
        });


      }else{
        //toastr.error("กรุณาเลือกผู้สมัคร");
        //Swal.fire('กรุณาเลือกผู้สมัคร');
        Swal.fire({icon: 'info', title: 'กรุณาเลือกผู้สมัคร', });
      }

    
            //end 
           }  else{
              window.location = baseurl +'login/signout';
          }

        });
    });
  //setInterval(fetchdata,5000); //300000 (5*60*1000 = 5 minute)
});
 
//uncomment when online
//$('#formvote').hide();
//election_countdown_to();
//election_vote_time();
//election_vote_down();

function election_countdown_to(){
  // Set the date we're counting down to
  var countDownDate1 = new Date("JAN 25, 2021 09:00:00").getTime();

  // Update the count down every 1 second
  var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance1 = countDownDate1 - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance1 / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance1 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance1 % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance1 % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
    document.getElementById("demotime").innerHTML ='<span class="text-primary">การเลือกตั้งจะเริ่มในอีก </span><br> '+ days + " วัน " + hours + " ชั่วโมง "
    + minutes + " นาที " + seconds + " วินาที ";

    // If the count down is finished, write some text
    if (distance1 < 0) {
      clearInterval(x);
      //document.getElementById("demotime").innerHTML = '<span class="text-success">เริ่มการเลือกตั้งแล้ว</span>';
      document.getElementById("demotime").innerHTML = '';
      duration_vote_time();
      //election_vote_down();
      //$('#formvote').hide();
      $('#formvote').show();
    }
  }, 1000);
}

function duration_vote_time(){
  //five_minute_countdown();

  // Set the date we're counting down to
  var countDownDate2 = new Date("JAN 25, 2021 15:00:00").getTime();
  var countDownDate3 = new Date().getTime() + (5*60000);

  // Update the count down every 1 second
  var y = setInterval(function() {

    // Get today's date and time
    var now2 = new Date().getTime();

    // Find the distance between now and the count down date
    var distance2 = countDownDate2 - now2;
  
    // If the count down is finished, write some text
    if (distance2 < 0) {
      clearInterval(y);
      clearInterval(z);
      document.getElementById("demotime").innerHTML = '<span class="text-danger">หมดเวลาการเลือกตั้งแล้ว</span>';
      document.getElementById("downtime").innerHTML ='';
      $('#formvote').hide();
     
    }
  }, 1000);

  var z = setInterval(function() {

    // Get today's date and time
    var now3 = new Date().getTime();

    // Find the distance between now and the count down date
    var distance3 = countDownDate3 - now3;

    // Time calculations for days, hours, minutes and seconds
    //var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance3 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance3 % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance3 % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
   document.getElementById("downtime").innerHTML = '<span class="text-success">ต้องเลือกตั้งภายในเวลา 5 นาที </span><br> ' + minutes + " : " + seconds;
 
    if (distance3 < 0) {
      clearInterval(z);
      //document.getElementById("downtime").innerHTML = '<span class="text-danger">หมดเวลาการเลือกตั้งแล้ว</span>';
      
      $.ajax({
        url: baseurl +"login/signout",
        type: 'post',
        success: function(response){
          location.reload();
         // Perform operation on the return value
         //alert(response);
        }
       });
     
    }
  }, 1000);
}
 
 function five_minute_countdown(){
  var ttext;
  // Set the date we're counting down to
  var countDownDate3 = new Date().getTime() + (5*60000);

  // Update the count down every 1 second
  var z = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance3 = countDownDate3 - now;

    // Time calculations for days, hours, minutes and seconds
    //var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance3 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance3 % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance3 % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
   document.getElementById("downtime").innerHTML = '<span class="text-success">ต้องเลือกตั้งภายในเวลา 5 นาที </span><br> ' + minutes + " : " + seconds;
   /*if(hours == 0 && minutes !== 0){
    ttext = '<span class="text-warning">ต้องเลือกตั้งภายในเวลา 5 นาที </span><br> '+  minutes + " นาที " + seconds + " วินาที ";
   }else if(hours == 0 && minutes == 0){
    ttext = '<span class="text-warning">ต้องเลือกตั้งภายในเวลา 5 นาที </span><br>'+   seconds + " วินาที ";
   }else{
    ttext ='<span class="text-warning">ต้องเลือกตั้งภายในเวลา 5 นาที </span><br>'+ hours + " ชั่วโมง " + minutes + " นาที " + seconds + " วินาที ";
   }
  document.getElementById("downtime").innerHTML = ttext;*/
    // If the count down is finished, write some text
    if (distance3 < 0) {
      clearInterval(z);
      //document.getElementById("downtime").innerHTML = '<span class="text-danger">หมดเวลาการเลือกตั้งแล้ว</span>';
      
      $.ajax({
        url: baseurl +"login/signout",
        type: 'post',
        success: function(response){
          location.reload();
         // Perform operation on the return value
         //alert(response);
        }
       });
     
    }
  }, 1000);
}
 
 function fetchdata(){
   $.ajax({
    url: baseurl +"login/signout",
    type: 'post',
    success: function(response){
      location.reload();
     // Perform operation on the return value
     //alert(response);
    }
   });
  }
  
  </script>


<!-- jQuery -->
<script src="<?php //echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
<script type="text/javascript">
  toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-center",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
<?php       
        if($this->session->flashdata('error_message')) { ?>
        toastr.error("<?php echo $this->session->flashdata('error_message'); ?>");
          <?php  }  ?>
</script>
</body>
</html>