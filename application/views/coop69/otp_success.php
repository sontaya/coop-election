
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SDU eVote | Success</title>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700&display=swap">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/dist/css/adminlte.min.css">
  <style>
    * { font-family: 'Prompt', sans-serif; }

    body.success-page {
      margin: 0;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background-image: url('<?php echo base_url('uploads/bg-vote.png'); ?>');
      background-size: cover;
      background-position: center center;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }

    .success-card {
      background: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
      border-radius: 24px;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12);
      border: 1px solid rgba(255, 255, 255, 0.5);
      padding: 48px 40px 36px;
      max-width: 420px;
      width: 90%;
      text-align: center;
      animation: fadeInUp 0.6s ease-out;
    }

    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* Animated check circle */
    .success-icon {
      width: 96px;
      height: 96px;
      margin: 0 auto 24px;
    }

    .success-icon svg {
      width: 96px;
      height: 96px;
    }

    .success-icon .circle {
      stroke: #22c55e;
      stroke-width: 2;
      fill: none;
      stroke-dasharray: 220;
      stroke-dashoffset: 220;
      animation: drawCircle 0.6s ease-out 0.2s forwards;
    }

    .success-icon .check {
      stroke: #22c55e;
      stroke-width: 3;
      fill: none;
      stroke-linecap: round;
      stroke-linejoin: round;
      stroke-dasharray: 60;
      stroke-dashoffset: 60;
      animation: drawCheck 0.4s ease-out 0.7s forwards;
    }

    @keyframes drawCircle {
      to { stroke-dashoffset: 0; }
    }

    @keyframes drawCheck {
      to { stroke-dashoffset: 0; }
    }

    .success-title {
      font-size: 1.25rem;
      font-weight: 600;
      color: #1e293b;
      margin-bottom: 8px;
      line-height: 1.6;
    }

    .success-subtitle {
      font-size: 0.9rem;
      color: #64748b;
      margin-bottom: 28px;
    }

    .btn-back {
      display: inline-block;
      width: 100%;
      padding: 14px 24px;
      background: linear-gradient(135deg, #3b82f6, #2563eb);
      color: #fff;
      border: none;
      border-radius: 12px;
      font-size: 1rem;
      font-weight: 500;
      text-decoration: none;
      transition: all 0.25s ease;
      box-shadow: 0 4px 14px rgba(37, 99, 235, 0.3);
    }

    .btn-back:hover {
      background: linear-gradient(135deg, #2563eb, #1d4ed8);
      transform: translateY(-1px);
      box-shadow: 0 6px 20px rgba(37, 99, 235, 0.4);
      color: #fff;
      text-decoration: none;
    }

    /* Countdown progress bar */
    .countdown-bar {
      width: 100%;
      height: 4px;
      background: #e2e8f0;
      border-radius: 4px;
      margin-top: 20px;
      overflow: hidden;
    }

    .countdown-bar-inner {
      height: 100%;
      background: linear-gradient(90deg, #3b82f6, #22c55e);
      border-radius: 4px;
      width: 100%;
      animation: countdown 3s linear forwards;
    }

    @keyframes countdown {
      from { width: 100%; }
      to { width: 0%; }
    }

    .countdown-text {
      font-size: 0.8rem;
      color: #94a3b8;
      margin-top: 10px;
    }
  </style>
</head>
<body class="success-page">

<div class="success-card">
  <!-- Animated Success Icon -->
  <div class="success-icon">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 96 96">
      <circle class="circle" cx="48" cy="48" r="44"></circle>
      <path class="check" d="M28 50 l14 14 l28-28"></path>
    </svg>
  </div>

  <div class="success-title">ขอบคุณที่ท่านได้มีส่วนร่วม<br>ในการออกเสียงเลือกตั้ง</div>
  <div class="success-subtitle">การลงคะแนนของท่านถูกบันทึกเรียบร้อยแล้ว</div>

  <a href="<?php echo base_url();?>" class="btn-back">
    <i class="fas fa-home" style="margin-right:6px;"></i> กลับสู่หน้าหลัก
  </a>

  <div class="countdown-bar"><div class="countdown-bar-inner"></div></div>
  <div class="countdown-text">กำลังกลับสู่หน้าหลักอัตโนมัติ...</div>
</div>

<!-- jQuery -->
<script src="<?php echo base_url();?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/admin/dist/js/adminlte.min.js"></script>
<script>
  var baseurl = '<?php echo base_url(); ?>';
  setTimeout(function () {
   window.location = baseurl ; //will redirect to your blog page (an ex: blog.html)
}, 3000); //will call the function after 5 secs.
</script>
</body>
</html>
