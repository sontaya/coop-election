
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>การเลือกตั้งคณะกรรมการดำเนินการ สหกรณ์ออมทรัพย์ มหาวิทยาลัยสวนดุสิต จำกัด ประจำปี 2569</title>
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

		/* ปรับขนาดและการแสดงผลของ toast */
		#toast-container > .toast-error {
				width: 400px ;
				min-width: 400px ;
				padding: 15px ;
				display: flex ;
				align-items: center ;
		}

		/* ปรับขนาดและระยะห่างของข้อความ */
		#toast-container .toast-message {
				font-size: 18px ;
				line-height: 1.5 ;
				margin-left: 35px ;
		}


  </style>

</head>
<body class="hold-transition " >

  <nav class="navbar navbar-expand-md  bg-dark1 mb-4">
   <div class="container">

    <a class="navbar-brand" href="<?php echo site_url()?>" title="logo SDU">
      <div class="logo">
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

				<div class="login-logo">

					</div>
					<!-- /.login-logo -->
					<div class="card">
						<div class="card-body login-card-body" style="padding 100px 0px 100px 0px">


						<form action="<?php echo base_url()?>login/otpauth" method="post">
						<div class="row">
							<div class="col"></div>
							<div class="col">
							<label for="username" class="control-label">กรอกรหัสการเลือกตั้ง</label>
							<div class="input-group mb-3">
								<input id="txtname" name="username" type="text" class="form-control1 form-control-lg" maxlength="5" autocomplete="off" placeholder="" style="text-align:center;" required>

							</div>
							</div>
							<div class="col"></div>
						</div>
							<div class="row">
							<div class="col-12 text-center">
								<button type="submit" class="btn btn-primary shadow">เข้าสู่ระบบเลือกตั้ง</button>
							</div>
						</div>

						</form>

					</div>
			</div>

			</div>
		</div>

	</div>

<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-12 ">
        <div>
          Copyright &copy; 2569 มหาวิทยาลัยสวนดุสิต
        </div>
      </div>
    </div>
  </div>
</div>
</footer>

<!-- jQuery -->
<script src="<?php echo base_url();?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/admin/dist/js/adminlte.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#txtname').focus();
});
  toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": 300,
    "hideDuration": 1000,
    "timeOut": 3000,
    "extendedTimeOut": 1000,
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
		// "onHidden": function() {
    //     location.reload();
    // }
  }
  <?php
  if($this->session->flashdata('error_message')) { ?>
    toastr.error("<?php echo $this->session->flashdata('error_message'); ?>");
  <?php  }  ?>
</script>
</body>
</html>
