
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SDU eVote</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/adminlte.min.css">
  <style>
    .text-value-highlight{
        color:#007BFF;
    }
  </style>
</head>
<body class="hold-transition login-page" style="background-image: url(<?php echo base_url('uploads/bg3.jpg'); ?>);background-position: bottom;">
<div class="login-box">
  <div class="login-logo">
    <!--<a href="../../index2.html"><b>Admin</b>LTE</a> -->
   </div>  
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
     <div class="text-center">
     <a href="<?php echo base_url();?>">
   <img src="<?php echo base_url();?>uploads/1.png" height="80px" alt="logo">
  </a>
    <h4 style="padding-top:10px;">ตรวจสอบผู้มีสิทธิเลือกตั้ง</h4>
    <hr>
      <p >กรอกเลขประจำตัวประชาชนเพื่อใช้ในการค้นหา</p>
</div>
      <form method="post" id="electionform">
      <div class="row mb-3">
          <div class="col-12">
           <input type="text" name="cardid" id="cardid" class="form-control" placeholder="รหัสบัตรประชาชน" required="" autocomplete="off">          
           <?php echo form_error('cardid','<div style="color:red;">','</div>'); ?>
          </div>
      </div>
       
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block" id="btncheck" >ค้นหา</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
      <a href="<?php echo base_url();?>"><i class="fas fa-angle-double-left"></i> กลับหน้าหลัก</a>
        
      </p>
      <p class="mb-0">
        สอบถามรายละเอียดเพิ่มเติมได้ที่ 0 2244 5155-6
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<!-- Modal -->
<div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ผลการตรวจสอบ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div><div class="row">
      <div class="col-lg-12">
        <div class="text-value" style="font-weight: bold;"> การเลือกตั้งกรรมการสภามหาวิทยาลัย ประเภทจากพนักงานมหาวิทยาลัยสายสนับสนุน</div>
      </div></div>
      <div class="row pt-2">
      <div class="col-lg-12">
      <div class="text-label">วันที่เลือกตั้ง</div>
      <div class="text-value text-value-highlight"> วันจันทร์ที่ 25 มกราคม พ.ศ. 2564 </div>
      </div>   </div>
      <div class="row pt-2 pb-2">
      <div class="col-lg-12">
      <div class="text-label">ชื่อ</div>
      <div class="text-value text-value-highlight" id="fullname"></div>
      </div></div>
      <div class="row pt-2">
      <div class="col-lg-12">
      <div class="text-label"> สิทธิการเลือกตั้ง </div>
      <div class="text-value text-value-highlight"> มีสิทธิเลือกตั้งกรรมการสภามหาวิทยาลัย ประเภทจากพนักงานมหาวิทยาลัยสายสนับสนุน </div>
      </div></div>
      <!-- <div class="row pt-2">
      <div class="col-6">
      <div class="text-label">เขตเลือกตั้ง</div>
      <div class="text-value text-value-highlight">3</div>
      </div>
      <div class="col-6">
      <div class="text-label">หน่วยเลือกตั้ง</div>
      <div class="text-value text-value-highlight">32</div>
      </div>
      </div> -->
      <div class="row pt-2">
      <div class="col-lg-12">
      <div class="text-label"> สถานที่เลือกตั้ง </div>
      <div class="text-value text-value-highlight">เลือกตั้งผ่านระบบออนไลน์</div>
      </div></div>
      <div class="row pt-2">
      <div class="col-lg-12">
      <div class="text-label"> ลำดับที่ในบัญชีรายชื่อ </div>
      <div class="text-value text-value-highlight" id="n_order"></div>
      </div></div>
      <!---->
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>       
      </div>
    </div>
  </div>
</div>
<!-- jQuery -->
<script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/toastr/toastr.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
<script type="text/javascript">
 var baseurl='<?php echo base_url();?>'; 
  $(document).ready(function() { 
      $.validator.addMethod("checkNationalID", function(value, element) {
        if(value.length != 13) return false;
 
        for(i=0, sum=0; i < 12; i++) sum += parseFloat(value.charAt(i))*(13-i);
 
        if((11-sum%11)%10!=parseFloat(value.charAt(12))) return false;
 
        return true;
        }, "เลขประจำตัวประชาชนไม่ถูกต้อง."
    );
   
  $('#electionform').validate({

    rules: {
          cardid:{
                required:true,
                number:true,
                checkNationalID:true
            }, 
            
        },
        messages: {
          cardid:{
                required:"กรุณาระบุเลขประจำตัวประชาชน.",
                number:"ระบุตัวเลขเท่านั้น",
                checkNationalID:"เลขประจำตัวประชาชนไม่ถูกต้อง"
            },    
           
        },
        
        errorElement: "em",
        errorPlacement: function(error, element) {
            // Add the `help-block` class to the error element
            error.addClass("invalid-feedback");

            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.parent("label"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function(element, errorClass, validClass) {
            $(element).parents(".col-sm-5").addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents(".col-sm-5").addClass("is-valid").removeClass("is-invalid");
        },

    submitHandler: function(form) {
        $.ajax({
           url: baseurl +"home/get_profile",
           method:"POST",
           data:$(form).serialize(),
           dataType:"json",
           beforeSend:function()
           {
            $('#electionform').attr('disabled','disabled');
           },
           success:function(response)
           {
            $('#electionform').attr('disabled', false);
            
            if(response.status)
            {              
              if(response.profile==null){
                toastr.error("ไม่มีสิทธิเลือกตั้ง.");
               
              }else{     
                $('#fullname').empty();
                $('#n_order').empty();     
                $('#fullname').append(response.profile.fullname);
                $('#n_order').append(response.profile.n_order);
                $('#resultModal').modal();
              }
              
            }
            else
            {        
              toastr.error("ไม่พบข้อมูล.");
            
            }
           }
        });
      }

  });

  });
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

</script>
</body>
</html>
