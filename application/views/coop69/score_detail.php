

<style>
  @import url('https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700&display=swap');

  * { font-family: 'Prompt', sans-serif; }

  body {
    background: #f1f5f9 !important;
    padding-top: 0 !important;
  }

  /* Override layout2 navbar */
  nav.navbar.navbar-custom,
  nav.navbar.fixed-top {
    background: linear-gradient(135deg, #1e3a5f, #1e40af) !important;
    position: relative !important;
    padding: 12px 24px;
  }
  nav.navbar .navbar-brand { display: none; }
  nav.navbar.fixed-bottom { display: none !important; }
  footer { display: none !important; }

  /* Top header bar */
  .score-header {
    background: linear-gradient(135deg, #1e3a5f, #1e40af);
    color: #fff;
    padding: 20px 0 16px;
    text-align: center;
    margin-bottom: 24px;
  }
  .score-header .logo-img {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    object-fit: cover;
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    margin-bottom: 10px;
  }
  .score-header h4 {
    font-size: 1.15rem;
    font-weight: 600;
    margin: 0 0 4px;
    line-height: 1.6;
  }
  .score-header .subtitle {
    font-size: 0.82rem;
    opacity: 0.8;
  }

  /* Cards */
  .score-card {
    border-radius: 16px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.07);
    border: 1px solid #e2e8f0;
    overflow: hidden;
    background: #fff;
    margin-bottom: 20px;
    animation: fadeInUp 0.5s ease-out both;
  }
  .score-card:nth-child(1) { animation-delay: 0.1s; }
  .score-card:nth-child(2) { animation-delay: 0.2s; }
  .score-card:nth-child(3) { animation-delay: 0.3s; }

  @keyframes fadeInUp {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  .score-card .card-header-custom {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    color: #fff;
    padding: 14px 20px;
    text-align: center;
  }
  .score-card .card-header-custom h5 {
    margin: 0;
    font-size: 1rem;
    font-weight: 600;
  }
  .score-card .card-header-custom i {
    margin-right: 6px;
  }

  .score-card .card-body {
    padding: 0;
  }

  /* Table */
  .score-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.85rem;
  }
  .score-table thead th {
    background: #f8fafc;
    color: #475569;
    font-weight: 600;
    font-size: 0.78rem;
    padding: 10px 12px;
    text-align: center;
    border-bottom: 2px solid #e2e8f0;
  }
  .score-table tbody tr {
    transition: background 0.15s ease;
  }
  .score-table tbody tr:hover {
    background: #f1f5f9;
  }
  .score-table tbody td {
    padding: 10px 12px;
    text-align: center;
    border-bottom: 1px solid #f1f5f9;
    vertical-align: middle;
  }
  .score-table tbody td.name-col {
    text-align: left;
    font-size: 0.82rem;
  }
  .score-table tbody td .badge-number {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 28px;
    height: 28px;
    border-radius: 8px;
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    color: #fff;
    font-weight: 700;
    font-size: 0.8rem;
  }
  .score-table tbody td .badge-rank {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 26px;
    height: 26px;
    border-radius: 50%;
    background: #f1f5f9;
    color: #475569;
    font-weight: 600;
    font-size: 0.8rem;
  }

  /* Elected candidate row */
  .score-table tbody tr.elected {
    background: #f0fdf4;
  }
  .score-table tbody tr.elected:hover {
    background: #dcfce7;
  }
  .score-table tbody tr.elected .badge-rank {
    background: linear-gradient(135deg, #22c55e, #16a34a);
    color: #fff;
  }
  .score-table tbody tr.elected .score-total {
    color: #16a34a;
  }

  .score-total {
    font-weight: 700;
    color: #1e293b;
    font-size: 0.95rem;
  }

  /* Footer bar */
  .score-footer {
    text-align: center;
    padding: 16px;
    font-size: 0.78rem;
    color: #94a3b8;
  }

  /* Back button */
  .btn-back {
    display: inline-block;
    padding: 10px 28px;
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    color: #fff;
    border: none;
    border-radius: 10px;
    font-size: 0.9rem;
    font-weight: 500;
    font-family: 'Prompt', sans-serif;
    cursor: pointer;
    transition: all 0.25s ease;
    box-shadow: 0 4px 14px rgba(37,99,235,0.3);
    text-decoration: none;
  }
  .btn-back:hover {
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    transform: translateY(-1px);
    box-shadow: 0 6px 20px rgba(37,99,235,0.4);
    color: #fff;
    text-decoration: none;
  }

  /* Loading overlay */
  .loader-wrapper {
    width: 100%;
    height: 100%;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 9999;
    background: rgba(255,255,255,0.95);
    backdrop-filter: blur(8px);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
  .loader-spinner {
    width: 48px;
    height: 48px;
    border: 5px solid #e2e8f0;
    border-top: 5px solid #3b82f6;
    border-radius: 50%;
    animation: spin 0.9s linear infinite;
    margin-bottom: 16px;
  }
  @keyframes spin {
    to { transform: rotate(360deg); }
  }
  .loader-text {
    font-size: 0.9rem;
    color: #64748b;
    font-weight: 500;
  }
</style>

<!-- Loading overlay -->
<div class="loader-wrapper" id="pageLoader">
  <div class="loader-spinner"></div>
  <div class="loader-text">กำลังโหลดข้อมูล...</div>
</div>

<!-- Header -->
<div class="score-header">
  <img src="<?php echo base_url();?>uploads/sducoop.jpg" alt="SDU Coop" class="img-fluid logo-img">
  <h4><i class="fas fa-chart-bar" style="margin-right:6px;"></i> ผลการเลือกตั้งคณะกรรมการดำเนินการ สหกรณ์ออมทรัพย์ มหาวิทยาลัยสวนดุสิต จำกัด ประจำปี 2569</h4>
</div>

<main role="main" class="container">
  <div class="row justify-content-center">

    <!-- ประธานสหกรณ์ -->
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="score-card">
        <div class="card-header-custom">
          <h5><i class="fas fa-user-tie"></i> ประธานสหกรณ์</h5>
        </div>
        <div class="card-body">
          <table class="score-table">
            <thead>
              <tr>
                <th>หมายเลข</th>
                <th>ชื่อ - สกุล</th>
                <th>คะแนน</th>
                <th>ลำดับ</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($score1 as $key => $r){ ?>
              <tr class="<?php echo ($r->score_order1 <= 1) ? 'elected' : ''; ?>">
                <td><span class="badge-number"><?php echo $r->c_number;?></span></td>
                <td class="name-col"><?php echo $r->candidate_name;?></td>
                <td><span class="score-total"><?php echo $r->score;?></span></td>
                <td><span class="badge-rank"><?php echo $r->score_order1;?></span></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- คณะกรรมการดำเนินการ -->
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="score-card">
        <div class="card-header-custom">
          <h5><i class="fas fa-users"></i> คณะกรรมการดำเนินการ</h5>
        </div>
        <div class="card-body">
          <table class="score-table">
            <thead>
              <tr>
                <th>หมายเลข</th>
                <th>ชื่อ - สกุล</th>
                <th>คะแนน</th>
                <th>ลำดับ</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($score2 as $key => $r2){ ?>
              <tr class="<?php echo ($r2->score_order1 <= 7) ? 'elected' : ''; ?>">
                <td><span class="badge-number"><?php echo $r2->c_number;?></span></td>
                <td class="name-col"><?php echo $r2->candidate_name;?></td>
                <td><span class="score-total"><?php echo $r2->score;?></span></td>
                <td><span class="badge-rank"><?php echo $r2->score_order1;?></span></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- ผู้ตรวจสอบกิจการ -->
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="score-card">
        <div class="card-header-custom">
          <h5><i class="fas fa-search"></i> ผู้ตรวจสอบกิจการ</h5>
        </div>
        <div class="card-body">
          <table class="score-table">
            <thead>
              <tr>
                <th>หมายเลข</th>
                <th>ชื่อ - สกุล</th>
                <th>คะแนน</th>
                <th>ลำดับ</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($score3 as $key => $r3){ ?>
              <tr class="<?php echo ($r3->score_order1 <= 3) ? 'elected' : ''; ?>">
                <td><span class="badge-number"><?php echo $r3->c_number;?></span></td>
                <td class="name-col"><?php echo $r3->candidate_name;?></td>
                <td><span class="score-total"><?php echo $r3->score;?></span></td>
                <td><span class="badge-rank"><?php echo $r3->score_order1;?></span></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>

  <div class="score-footer">
    Copyright &copy; 2569 มหาวิทยาลัยสวนดุสิต
  </div>
</main>

<script type="text/javascript">
  $(document).ready(function(){
    setTimeout(function(){
      $('#pageLoader').fadeOut('slow');
    }, 800);
  });
</script>
