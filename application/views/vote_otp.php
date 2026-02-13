
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SDU election | Vote</title>

  <!-- Google Font: Source Sans Pro -->
  <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/style.css">
  <script src="<?php echo base_url()?>assets/plugins/jquery/jquery.min.js"></script>
  <style>

  </style>

</head>
<body class="hold-transition " >
 <nav class="navbar navbar-expand-md  bg-dark1 mb-4">
   <div class="container">

    <a class="navbar-brand" href="<?php echo site_url()?>" title="logo SDU">
      <div class="logo">
       <!-- <img src="<?php echo base_url()?>uploads/images/bkk_web_logo.jpg" alt="logo BMA" title="logo BMA">-->
       <img src="<?php echo base_url()?>uploads/new_head20162.png" height="50" alt="SDU" title="SDU">
     </div>
   </a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
     <!--   <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
        </ul> -->

      </div>
    </div>
  </nav>

  <div class="container">

   <div class="row">
    <div class="col-12 text-center">
      <div class="section-title mb-4 pb-2">
        <h4 class="mb-1">ลงคะแนนเลือกตั้งคณะกรรมการดำเนินการสหกรณ์ออมทรัพย์</h4>
        <p class="para-desc mx-auto mb-0 mt-0">มหาวิทยาลัยสวนดุสิต จำกัด ประจำปี 2564</p>

      </div>
    </div>

  </div>
  <form action="" method="POST" id="frmvote">
   <!-- <input type="hidden" name="pcode" id="pcode" value="<?php echo $this->session->userdata['pcode']; ?>">
    <input type="hidden" name="cardid" id="cardid" value="<?php echo $this->session->userdata['cardid']; ?>"> -->
    <!--<input type="hidden" name="pcode" id="pcode" value="2010002945">
      <input type="hidden" name="cardid" id="cardid" value="3170300182744"> -->
      <div class="row add_bottom_15">

        <?php foreach ($candidates as $key => $r){ ?>

          <div class="col-4 col-sm-3 col-md-2 nopad text-center">
            <label class="image-checkbox" id="image-checkbox">
              <img class="img-fluid" src="<?php echo base_url();?>uploads/cd/img0<?php echo $r->id;?>.jpg" />
              <input class="candidate" type="checkbox" name="candidate_id[]" value="<?php echo $r->id; ?>" id="chk<?php echo $r->id; ?>">   
              <i class="fas fa-times hidden"></i>
            </label>
          </div>

        <?php } ?>
      </div>
      <div class="row add_bottom_15">    
        <div class="col-md-9 text-center">
          <div style="border:3px; border-style:solid; border-color:#f1f5f9;padding-top: 15px;padding-bottom: 15px">
            <h5 class="card-text text-danger">
              เลือกผู้สมัครได้ 7 คน &nbsp;&nbsp;<span class="text-primary" id="vcount"></span>
            </h5>
            <!--<span class="text-danger">*กรณีไม่ประสงค์จะลงคะแนนกรุณาทำเครื่องหมาย <i class="fas fa-check"></i> ในช่องที่กำหนด</span> -->

            <span class="text-success cnumber" id="vdata"></span>
          </div>
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
          <button type="button" class="btn btn-block btn-success" id="submit2"> บันทึกการลงคะแนน</button>
          <!-- <button type="button" class="btn btn-block btn-success" id="submit3"> test</button> -->
        </div>
      </div>
    </form>

  </div>

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


<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/sweetalert2/sweetalert2.min.css">
<script src="<?php echo base_url();?>assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>

<script>
  var baseurl='<?php echo base_url();?>';
  
  $(document).ready(function() { 

    $("input:checkbox.candidate").click(function() {
     $('#no_candidate').attr('disabled', true);
      //$('#no_candidate').prop('checked',false);
      var markedCheckbox = document.querySelectorAll('input[type="checkbox"]:checked');
      var cnklen = $('input[name="candidate_id[]"]:checked').length;
      //console.log(cnklen);
      if(cnklen > 7 ){

        Swal.fire({
          icon: 'error',
          title: 'เลือกได้ 7 คนเท่านั้น!',         
        });

        //$(this).closest('tr').removeClass('removeRow');
        return false
      }else if (cnklen == 0) {
        document.getElementById('vcount').innerHTML = ""
        document.getElementById('vdata').innerHTML = "";
        $('#no_candidate').attr('disabled', false);
      }else{

        document.getElementById('vdata').innerHTML = "";
        for (var checkbox of markedCheckbox) {
          console.log(checkbox.value);
          document.getElementById('vcount').innerHTML = '(' + cnklen + ')';
          document.getElementById('vdata').innerHTML += checkbox.value + ' ';
        //document.body.append(checkbox.value + ' ');
      }
    }

  }); 

    $("input:checkbox.no_candidate").click(function() {

      if(!$(this).is(":checked")){
        $('input:checkbox[name="candidate_id[]"]').attr('disabled', false);
        $("#image-checkbox").attr("disabled", false);
          //$(this).find('img').attr('disabled', false);

          console.log("no_candidate unchecked");
        }else{
         $('input:checkbox[name="candidate_id[]"]').attr('disabled', true); 
         $("#image-checkbox").attr("disabled", true);
         //$(this).find('img').attr('disabled', true);              
         
         console.log("candidate checked");
       }
        //alert('you are unchecked ' + $(this).val());
      }); 
    /* $("#submit3").click(function() {
       var v_data=document.getElementById("vdata").innerText;
       var v_count=document.getElementById("vcount").innerText;
       alert(v_count + ':' + v_data)
       console.log(v_data);
     });*/

     $("#submit2").click(function() {
      /*var markedCheckbox = document.querySelectorAll('input[type="checkbox"]:checked');
      document.getElementById('test').innerHTML = "";
      for (var checkbox of markedCheckbox) {
        console.log(checkbox.value);

        document.getElementById('test').innerHTML += checkbox.value + ' ';
        //document.body.append(checkbox.value + ' ');
      }*/
     /* $.get( baseurl+"council/check_session", function( data ) {
        console.log(data);
          if(data==="1")
           {

           }else{
            window.location = baseurl +'login/signout';
           }
         });*/

      //var pcode=$('#pcode').val();
      //var cardid=$('#cardid').val();
      
      var v_data=document.getElementById("vdata").innerText;
      var v_count=document.getElementById("vcount").innerText;
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
            //get_otp();
            var otp_a = <?php echo mt_rand(10,1000000);?>;
            var testVar = "254368";
            Swal.fire({
              title: 'ตรวจสอบ OTP >> ' + otp_a ,
              //input: 'text',
              html: `<input type="text" id="otpid" class="swal2-input" placeholder="รหัส OTP">`,
              inputLabel: 'Your IP address',
              confirmButtonText: 'ตรวจสอบ',
              //showCancelButton: true,
              showLoaderOnConfirm: true,
              focusConfirm: false,
              preConfirm: () => {
               const otp_idx = Swal.getPopup().querySelector('#otpid').value;

               const otp_x = otp_a;
                //const password = Swal.getPopup().querySelector('#password').value
                if (otp_x != otp_idx) {
                  Swal.showValidationMessage(`รหัส OTP ไม่ถูกต้อง`);
                }
                return { login: otp_idx};

              },
              allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {

              if(result.value){
               console.log('login '+ result.value.login);
               //console.log('cardid'+cardid);
               console.log('v_data '+v_data);
               var checkbox_value = [];
               $(checkbox).each(function(){
                checkbox_value.push($(this).val());
              });
               $(checkbox2).each(function(){
                checkbox_value.push($(this).val());
              });

               $.ajax({
                url: baseurl +"vote/add_vote",
                method:"POST",
                data:{checkbox_value:checkbox_value,otpcode:result.value.login,v_data:v_data,v_count:v_count},
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
                      window.location = baseurl +'vote/success';
                    });   
                  } else{
                    Swal.fire('OTP already use.');
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
        }); //end swal

    }else{
      Swal.fire({icon: 'info', title: 'กรุณาเลือกผู้สมัคร หรือ ไม่ประสงค์ลงคะแนน', });
    }

  });


  //setInterval(fetchdata,5000); //300000 (5*60*1000 = 5 minute)
});

var copt;
function get_opt(){
  $.ajax({
    url: baseurl +"home/generate_opt",
    method:"GET",
    
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
          window.location = baseurl +'home/success';
        });   
      } else{
        Swal.fire('You already vote.');
      }                    

    }
  });

}
</script>


<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>


</script>
</body>
</html>