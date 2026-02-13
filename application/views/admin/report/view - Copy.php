
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ประมวลผลคะแนนการเลือกตั้ง</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">ประมวลผลผลคะแนนการเลือกตั้ง</li>
            </ol> 
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                   <h3 class="card-title">ประมวลผลผลคะแนนการเลือกตั้ง</h3>
                   
                </div>
              <div class="card-body p-0">
                        
             
                <style>
                  #tbl_score1,#tbl_score2 {
                    display: flex;
                    justify-content: center;
                  }

                  #desktop {
                    align-self: center;
                  }
                </style>
                <input type="hidden" name="pcode" id="pcode" value="<?php echo $this->session->userdata['pcode']; ?>">
                <div class="table-responsive " id="tbl_score1">
               <!-- <table class="table table-bordered" id="desktop1" style="width:60%">
                  <thead>
                    <tr>
                      <th colspan="5">ผลคะแนนการเลือกตั้งประธานสหกรณ์ออมทรัพย์</th>
                    </tr>
                    <tr>                      
                     <th valign="center" class="text-center">หมายเลขผู้สมัคร</th>
                     <th valign="center" class="text-center">รูปภาพ</th>
                      <th valign="center" class="text-center">ชื่อ - สกุล</th>
                      <th valign="center" class="text-center">คะแนนรวม</th>  
                      <th valign="center" class="text-center">ลำดับที่ได้</th>                    
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($group1 as $r){ ?>
                      <tr>
                        <td align="right" style="vertical-align:middle;text-align:center;"><strong><?php echo $r->c_number;?></strong></td>
                      <td><img src="<?php echo base_url('uploads/pic/');?><?php echo $r->picture;?>" width="64" height="80" class="my-n1" alt=""></td>
                      <td><?php echo $r->candidate_name;?></td>
                      <td style="vertical-align:middle;text-align:center;"><?php echo $r->total;?></td>
                      <td style="vertical-align:middle;text-align:center;"><?php echo $r->num_row;?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table> -->
                </div>

                <div class="table-responsive " id="tbl_score2">
                <table class="table table-bordered" id="desktop2" style="width:60%">
                  <thead>
                    <tr>
                      <th colspan="5">ผลคะแนนการเลือกตั้งคณะกรรมการดำเนินการสหกรณ์ออมทรัพย์</th>
                    </tr>
                    <tr>                      
                     <th valign="center" class="text-center">หมายเลขผู้สมัคร</th>
                     <th valign="center" class="text-center">รูปภาพ</th>
                      <th valign="center" class="text-center">ชื่อ - สกุล</th>
                      <th valign="center" class="text-center">คะแนนรวม</th>  
                      <th valign="center" class="text-center">ลำดับที่ได้</th>                    
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($group2 as $r2){ ?>
                      <tr>
                        <td align="right" style="vertical-align:middle;text-align:center;"><strong><?php echo $r2->c_number;?></strong></td>
                      <td><img src="<?php echo base_url('uploads/pic/'. $r2->picture);?>" width="64" height="80" class="my-n1" alt=""></td>
                      <td><?php echo $r2->candidate_name;?></td>
                      <td style="vertical-align:middle;text-align:center;"><?php echo $r2->total;?></td>
                      <td style="vertical-align:middle;text-align:center;"><?php echo $r2->num_row;?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
                </div>
             
              </div>
            </div>

           
          </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->