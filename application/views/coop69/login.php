
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>การเลือกตั้งคณะกรรมการดำเนินการ สหกรณ์ออมทรัพย์ มหาวิทยาลัยสวนดุสิต จำกัด ประจำปี 2569</title>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700&display=swap">
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

    body.login-page {
      margin: 0;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      background-image: url('<?php echo base_url('uploads/bg-vote.png'); ?>');
      background-size: cover;
      background-position: center center;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }

    /* Glassmorphism Card */
    .login-card {
      background: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
      border-radius: 24px;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12);
      border: 1px solid rgba(255, 255, 255, 0.5);
      padding: 44px 40px 36px;
      max-width: 460px;
      width: 90%;
      text-align: center;
      animation: fadeInUp 0.6s ease-out;
    }

    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* Logo */
    .login-card .logo-img {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      object-fit: cover;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      margin-bottom: 16px;
    }

    .login-card .card-title {
      font-size: 1.15rem;
      font-weight: 600;
      color: #1e293b;
      margin-bottom: 4px;
      line-height: 1.6;
    }

    .login-card .card-subtitle {
      font-size: 0.85rem;
      color: #64748b;
      margin-bottom: 32px;
    }

    /* Form */
    .login-card .form-label {
      display: block;
      font-size: 0.9rem;
      font-weight: 500;
      color: #334155;
      margin-bottom: 10px;
      text-align: left;
    }

    .login-card .form-input {
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

    .login-card .form-input:focus {
      border-color: #3b82f6;
      box-shadow: 0 0 0 4px rgba(59,130,246,0.15);
      background: #fff;
    }

    .login-card .form-input::placeholder {
      letter-spacing: 4px;
      font-size: 1rem;
      font-weight: 400;
      color: #94a3b8;
    }

    /* Submit Button */
    .btn-login {
      display: inline-block;
      width: 100%;
      padding: 14px 24px;
      margin-top: 24px;
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

    .btn-login:hover {
      background: linear-gradient(135deg, #2563eb, #1d4ed8);
      transform: translateY(-1px);
      box-shadow: 0 6px 20px rgba(37, 99, 235, 0.4);
    }

    .btn-login:active {
      transform: translateY(0);
    }

    .btn-login i {
      margin-right: 6px;
    }

    /* Footer */
    .page-footer {
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      text-align: center;
      padding: 12px;
      font-size: 0.8rem;
      color: rgba(255,255,255,0.7);
      text-shadow: 0 1px 3px rgba(0,0,0,0.3);
    }

    /* Toast overrides */
    #toast-container > .toast-error {
      width: 400px;
      min-width: 400px;
      padding: 15px;
      display: flex;
      align-items: center;
      border-radius: 12px;
    }

    #toast-container .toast-message {
      font-size: 18px;
      line-height: 1.5;
      margin-left: 35px;
    }
  </style>

</head>
<body class="login-page">

<div class="login-card">
  <!-- Logo -->
  <img src="<?php echo base_url()?>uploads/sducoop.jpg" alt="SDU Coop" class="logo-img">

  <div class="card-title">การเลือกตั้งคณะกรรมการดำเนินการ<br>สหกรณ์ออมทรัพย์ มหาวิทยาลัยสวนดุสิต จำกัด</div>
  <div class="card-subtitle">ประจำปี 2569</div>

  <form action="<?php echo base_url()?>login/otpauth" method="post">
    <label for="txtname" class="form-label">
      <i class="fas fa-key" style="margin-right:4px;color:#3b82f6;"></i> กรอกรหัสการเลือกตั้ง
    </label>
    <input id="txtname" name="username" type="text" class="form-input" maxlength="5" autocomplete="off" placeholder="XXXXX" required>

    <button type="submit" class="btn-login">
      <i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบเลือกตั้ง
    </button>
  </form>
</div>

<div class="page-footer">
  Copyright &copy; 2569 มหาวิทยาลัยสวนดุสิต
</div>

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
