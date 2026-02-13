

  <style>
    .login-head {
      margin-top: 0;
      margin-bottom: 20px;
      padding-bottom: 20px;
      border-bottom: 1px solid #ddd;
      text-align: center;
  }
  .form-control {
    display: block;
    width: 100%;
    padding: 0.375rem 0.75rem;
    font-size: 0.875rem;
    line-height: 1.5;
    color: #495057;
    background-color: #FFF;
    background-clip: padding-box;
    border: 2px solid #ced4da;
    border-radius: 4px;
    -webkit-transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    -o-transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
}
  </style>
  <main role="main" class="container">
      <div class="album py-3 ">
          <div class="container">

              <div class="row justify-content-center">

              <!--  <div class="login-box"> -->
                  <div class="login-logo">

                  </div>
                  <!-- /.login-logo -->
                  <div class="card">
                    <div class="card-body login-card-body">
                     <div class="text-center">
                     <img src="<?php echo base_url();?>uploads/sducoop.jpg" height="80px" alt="logo">
                                เข้าสู่ระบบ			</h3> --><br>
                      </div>
                       <p class="login-box-msg"></p>
                      <form action="<?php echo site_url("s_signin")?>" method="post">
                      <label for="username" class="control-label">กรอกรหัสยืนยัน:</label>

                          <input name="username" id="username" style="height:50px;font-size: 32px;font-weight: 700;text-align: center;" type="password" class="form-control input-lg" autocomplete="off" required>
                        <div class="row mt-3">

                          <!-- /.col -->
                          <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">ประกาศผลคะแนน</button>
                          </div>
                          <!-- /.col -->
                        </div>
                      </form>

                    </div>

                  </div>

              <!--  </div> -->

              </div>

          </div>
      </div>
  </main>

 <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/sweetalert2/sweetalert2.min.css">
<script src="<?php echo base_url();?>assets/admin/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<style>
  .swal2-title {
    font-size: 1rem;
  }
  .swal2-content {
    font-size: 14px;
  }
</style>

<script type="text/javascript">
 // $("#username").focus();

<?php
        if($this->session->flashdata('error_message')) { ?>
        Swal.fire({
          //title: 'Error!',
          text: '<?php echo $this->session->flashdata('error_message'); ?>',
          icon: 'error',
          confirmButtonText: 'OK'
        });
        //Swal.fire("<?php echo $this->session->flashdata('error_message'); ?>");
          <?php  }  ?>
</script>

