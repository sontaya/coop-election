
<style>
  @import url('https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700&display=swap');

  * { font-family: 'Prompt', sans-serif; }

  body {
    margin: 0;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background-image: url('<?php echo base_url('uploads/bg-vote.png'); ?>') !important;
    background-size: cover !important;
    background-position: center center !important;
    background-repeat: no-repeat !important;
    background-attachment: fixed !important;
    background-color: #1e293b !important;
    padding-top: 0 !important;
  }

  /* Hide layout2 navbar */
  nav.navbar { display: none !important; }
  footer { display: none !important; }

  /* Glassmorphism Card */
  .score-login-card {
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
    to   { opacity: 1; transform: translateY(0); }
  }

  /* Logo */
  .score-login-card .logo-img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    object-fit: cover;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    margin-bottom: 16px;
  }

  .score-login-card .card-title {
    font-size: 1.15rem;
    font-weight: 600;
    color: #1e293b;
    margin-bottom: 4px;
    line-height: 1.6;
  }

  .score-login-card .card-subtitle {
    font-size: 0.85rem;
    color: #64748b;
    margin-bottom: 32px;
  }

  /* Form */
  .score-login-card .form-label {
    display: block;
    font-size: 0.9rem;
    font-weight: 500;
    color: #334155;
    margin-bottom: 10px;
    text-align: left;
  }

  .score-login-card .form-input {
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

  .score-login-card .form-input:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 4px rgba(59,130,246,0.15);
    background: #fff;
  }

  .score-login-card .form-input::placeholder {
    letter-spacing: 4px;
    font-size: 1rem;
    font-weight: 400;
    color: #94a3b8;
  }

  /* Submit Button */
  .btn-score-login {
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

  .btn-score-login:hover {
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    transform: translateY(-1px);
    box-shadow: 0 6px 20px rgba(37, 99, 235, 0.4);
  }

  .btn-score-login:active {
    transform: translateY(0);
  }

  .btn-score-login i {
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

  /* SweetAlert2 overrides */
  .swal2-title {
    font-family: 'Prompt', sans-serif;
    font-size: 1rem;
  }
  .swal2-html-container, .swal2-content {
    font-family: 'Prompt', sans-serif;
    font-size: 14px;
  }

  /* Hide old layout containers */
  main.container > .album > .container > .row { display: none; }
</style>

<div class="score-login-card">
  <!-- Logo -->
  <img src="<?php echo base_url();?>uploads/sducoop.jpg" alt="SDU Coop" class="logo-img">

  <div class="card-title">ประกาศผลคะแนนการเลือกตั้ง<br>สหกรณ์ออมทรัพย์ มหาวิทยาลัยสวนดุสิต จำกัด</div>
  <div class="card-subtitle">ประจำปี 2569</div>

  <form action="<?php echo site_url("score/announce_login")?>" method="post">
    <label for="username" class="form-label">
      <i class="fas fa-lock" style="margin-right:4px;color:#3b82f6;"></i> กรอกรหัสยืนยัน
    </label>
    <input name="username" id="username" type="text" class="form-input" autocomplete="one-time-code" placeholder="* * * *" required style="-webkit-text-security: disc; -moz-text-security: disc; text-security: disc;">

    <button type="submit" class="btn-score-login">
      <i class="fas fa-chart-bar"></i> ประกาศผลคะแนน
    </button>
  </form>
</div>

<div class="page-footer">
  Copyright &copy; 2569 มหาวิทยาลัยสวนดุสิต
</div>

<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/sweetalert2/sweetalert2.min.css">
<script src="<?php echo base_url();?>assets/admin/plugins/sweetalert2/sweetalert2.all.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#username').focus();
  });

<?php
  if($this->session->flashdata('error_message')) { ?>
    Swal.fire({
      text: '<?php echo $this->session->flashdata('error_message'); ?>',
      icon: 'error',
      confirmButtonText: 'OK'
    });
<?php  }  ?>
</script>
