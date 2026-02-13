
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

  /* Hide layout2 navbar & footer */
  nav.navbar { display: none !important; }
  footer { display: none !important; }

  /* Glassmorphism Card */
  .loading-card {
    background: rgba(255, 255, 255, 0.88);
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    border-radius: 24px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12);
    border: 1px solid rgba(255, 255, 255, 0.5);
    padding: 50px 48px;
    max-width: 460px;
    width: 90%;
    text-align: center;
    animation: fadeInUp 0.6s ease-out;
  }

  @keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  /* Spinner */
  .spinner {
    width: 56px;
    height: 56px;
    border: 5px solid #e2e8f0;
    border-top: 5px solid #3b82f6;
    border-radius: 50%;
    animation: spin 0.9s linear infinite;
    margin: 0 auto 24px;
  }

  @keyframes spin {
    to { transform: rotate(360deg); }
  }

  .loading-card .loading-title {
    font-size: 1.15rem;
    font-weight: 600;
    color: #1e293b;
    margin-bottom: 8px;
  }

  .loading-card .loading-subtitle {
    font-size: 0.85rem;
    color: #64748b;
    margin-bottom: 28px;
  }

  /* Progress bar */
  .progress-track {
    width: 100%;
    height: 8px;
    background: #e2e8f0;
    border-radius: 8px;
    overflow: hidden;
  }

  .progress-fill {
    height: 100%;
    width: 0%;
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    border-radius: 8px;
    animation: fillBar 3s ease-in-out forwards;
  }

  @keyframes fillBar {
    0%   { width: 0%; }
    100% { width: 100%; }
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
</style>

<div class="loading-card">
  <div class="spinner"></div>
  <div class="loading-title"><i class="fas fa-chart-bar" style="margin-right:6px;color:#3b82f6;"></i> กำลังประมวลผลคะแนน</div>
  <div class="loading-subtitle">กรุณารอสักครู่...</div>
  <div class="progress-track">
    <div class="progress-fill"></div>
  </div>
</div>

<div class="page-footer">
  Copyright &copy; 2569 มหาวิทยาลัยสวนดุสิต
</div>

<script type="text/javascript">
  setTimeout(function(){
    window.location.href = '<?php echo site_url("score/scoredetail"); ?>';
  }, 3000);
</script>
