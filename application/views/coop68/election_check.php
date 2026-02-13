
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>การเลือกตั้งคณะกรรมการดำเนินการ สหกรณ์ออมทรัพย์ มหาวิทยาลัยสวนดุสิต จำกัด ประจำปี 2568</title>

  <!-- Google Font: Source Sans Pro -->
  <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/style.css">
  <style>
    .bigText {
        height:30px;
    }

  </style>

</head>
<body class="hold-transition " >

  <nav class="navbar navbar-expand-md  bg-dark1 mb-4">
   <div class="container">

    <a class="navbar-brand" href="<?php echo site_url()?>" title="logo SDU">
      <div class="logo">
       <!-- <img src="<?php echo base_url()?>uploads/images/bkk_web_logo.jpg" alt="logo BMA" title="logo BMA">-->
       <img src="<?php echo base_url()?>uploads/sducoop.jpg" height="50" alt="SDU" title="SDU">
     </div>
   </a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
   <div class="text-center" style="color:#fff;font-size: 25px;">สหกรณ์ออมทรัพย์ มหาวิทยาลัยสวนดุสิต จำกัด</div>


      </div>
    </div>
  </nav>

  <div class="container">

  <div class="row">
      <div class="col-sm-12">

        <!-- /.login-logo -->
        <div class="card">
					<div class="card-header">
						<h3 class="card-title">ตรวจสอบการใช้สิทธิ</h3>
					</div>
          <div class="card-body login-card-body" style="padding 100px 0px 100px 0px">

						<form >
							<div class="row">
								<div class="col"></div>
								<div class="col">
								<label for="username" class="control-label">กรอกรหัสการเลือกตั้ง</label>
								<div class="input-group mb-3">
									<input id="otpcode" name="otpcode" type="text" class="form-control1 form-control-lg" maxlength="5" autocomplete="off" placeholder="" style="text-align:center;" required value="31569">

								</div>
								</div>
								<div class="col"></div>
							</div>


							<div class="row">
								<div class="col-12 text-center">
									<button type="button" class="btn btn-primary shadow" name="check_button" id="check_button">ตรวจสอบ</button>
								</div>
							</div>

						</form>

        	</div>
    		</div>

    </div>
  </div>
</div>



<!-- jQuery -->
<script src="<?php echo base_url();?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/admin/dist/js/adminlte.min.js"></script>

<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/sweetalert2/sweetalert2.min.css">
<script src="<?php echo base_url();?>assets/admin/plugins/sweetalert2/sweetalert2.all.min.js"></script>

<script type="text/javascript">
	 	var baseurl='<?php echo base_url();?>';

			$(document).ready(function() {
				$('#otpcode').focus();
			});

			// รับค่าจากปุ่ม Enter ใน textbox
			$("#otpcode").keypress(function(event) {
					if (event.keyCode === 13) { // 13 คือ keyCode ของปุ่ม Enter
							event.preventDefault(); // ป้องกันการ submit form
							$("#check_button").click(); // จำลองการคลิกปุ่มตรวจสอบ
					}
			});

			// ฟังก์ชันเดิมสำหรับปุ่มตรวจสอบ
			$("#check_button").click(function() {
					var otpcode = $('#otpcode').val();
					$.ajax({
							url: baseurl + "otp/do_election_check",
							type: 'post',
							dataType: 'json',
							data: {
									otpcode: otpcode,
							},
							success: function(res) {
									console.log(res);
									if(res === true) {
											Swal.fire({
													title: "ใช้สิทธิเรียบร้อยแล้ว",
													text: "รหัส: " + otpcode,
													icon: "success"
											}).then((result) => {
													// Clear input and set focus after alert is closed
													$('#otpcode').val('').focus();
											});
									} else {
											Swal.fire({
													title: "ยังไม่ได้ใช้สิทธิลงคะแนน",
													text: "รหัส: " + otpcode,
													icon: "error"
											}).then((result) => {
													// Clear input and set focus after alert is closed
													$('#otpcode').val('').focus();
											});
									}
							}
					});
			});

</script>

</body>
</html>
