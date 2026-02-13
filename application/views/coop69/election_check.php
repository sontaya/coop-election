
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>การเลือกตั้งคณะกรรมการดำเนินการ สหกรณ์ออมทรัพย์ มหาวิทยาลัยสวนดุสิต จำกัด ประจำปี 2569</title>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/style.css">
  <style>
    * { font-family: 'Prompt', sans-serif; }

    /* Navbar override */
    .navbar.bg-dark1 {
      background: linear-gradient(135deg, #1e3a5f, #1e40af) !important;
    }

    /* Card override */
    .card {
      border-radius: 14px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.07);
      border: 1px solid #e2e8f0;
      overflow: hidden;
    }
    .card .card-header {
      background: linear-gradient(135deg, #3b82f6, #2563eb);
      border-bottom: none;
      padding: 14px 20px;
    }
    .card .card-header .card-title {
      color: #fff;
      font-size: 1rem;
      font-weight: 600;
      margin: 0;
    }
    .card .card-header .card-title i {
      margin-right: 6px;
    }
    .card .card-body {
      padding: 36px 24px;
    }

    /* Form label */
    .check-label {
      display: block;
      font-size: 0.9rem;
      font-weight: 500;
      color: #334155;
      margin-bottom: 10px;
    }
    .check-label i {
      margin-right: 4px;
      color: #3b82f6;
    }

    /* Input */
    .check-input {
      width: 100%;
      padding: 14px 16px;
      font-size: 1.5rem;
      font-weight: 600;
      font-family: 'Prompt', sans-serif;
      text-align: center;
      letter-spacing: 12px;
      border: 2px solid #e2e8f0;
      border-radius: 12px;
      background: rgba(255,255,255,0.7);
      color: #1e293b;
      outline: none;
      transition: all 0.25s ease;
      box-sizing: border-box;
    }
    .check-input:focus {
      border-color: #3b82f6;
      box-shadow: 0 0 0 4px rgba(59,130,246,0.15);
      background: #fff;
    }
    .check-input::placeholder {
      letter-spacing: 4px;
      font-size: 1rem;
      font-weight: 400;
      color: #94a3b8;
    }

    /* Button */
    .btn-check-submit {
      display: inline-block;
      padding: 12px 40px;
      margin-top: 20px;
      background: linear-gradient(135deg, #3b82f6, #2563eb);
      color: #fff;
      border: none;
      border-radius: 12px;
      font-size: 1rem;
      font-weight: 500;
      font-family: 'Prompt', sans-serif;
      cursor: pointer;
      transition: all 0.25s ease;
      box-shadow: 0 4px 14px rgba(37, 99, 235, 0.3);
    }
    .btn-check-submit:hover {
      background: linear-gradient(135deg, #2563eb, #1d4ed8);
      transform: translateY(-1px);
      box-shadow: 0 6px 20px rgba(37, 99, 235, 0.4);
    }
    .btn-check-submit:active {
      transform: translateY(0);
    }
    .btn-check-submit i {
      margin-right: 6px;
    }

    /* Navbar title */
    .nav-title {
      color: #fff;
    }
    .nav-title .main-title {
      font-size: 20px;
      font-weight: 600;
    }
    .nav-title .sub-title {
      font-size: 14px;
      opacity: 0.85;
    }

    /* Footer */
    footer {
      margin-top: 40px;
      text-align: center;
      padding: 16px;
      font-size: 0.78rem;
      color: #94a3b8;
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
    <div class="nav-title">
      <div class="main-title">ตรวจสอบการใช้สิทธิเลือกตั้งคณะกรรมการดำเนินการสหกรณ์ออมทรัพย์</div>
      <div class="sub-title">มหาวิทยาลัยสวนดุสิต จำกัด ประจำปี 2569</div>
    </div>
      </div>
    </div>
  </nav>

  <div class="container">

  <div class="row justify-content-center">
      <div class="col-sm-8 col-md-6">

        <div class="card">
					<div class="card-header">
						<h3 class="card-title"><i class="fas fa-search"></i> ตรวจสอบการใช้สิทธิ</h3>
					</div>
          <div class="card-body">

						<form>
							<div class="row justify-content-center">
								<div class="col-sm-10 col-md-8">
								<label for="otpcode" class="check-label"><i class="fas fa-key"></i> กรอกรหัสการเลือกตั้ง</label>
								<input id="otpcode" name="otpcode" type="text" class="check-input" maxlength="5" autocomplete="off" placeholder="XXXXX" required value="">
								</div>
							</div>

							<div class="row mt-3">
								<div class="col-12 text-center">
									<button type="button" class="btn-check-submit" name="check_button" id="check_button"><i class="fas fa-search"></i> ตรวจสอบ</button>
								</div>
							</div>

						</form>

        	</div>
    		</div>

    </div>
  </div>
</div>

<footer>
  Copyright &copy; 2569 มหาวิทยาลัยสวนดุสิต
</footer>


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
