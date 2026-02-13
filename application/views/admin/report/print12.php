<!-- Content Wrapper. Contains page content -->
<style>
  body{
    font-size: 16px;
  }
 
.table-bordered th,
.table-bordered td {
  border: 1px solid #000 !important;
}
hr {
  border: 1px solid black;
}
@media print {

  body {
    font: 12pt;
    font-family: 'Sarabun', sans-serif;
  }
  footer{
    display: none;
  }
  .main-header{
    display: none;
  }
}
  table
</style>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>พิมพ์ผลคะแนนเรียงตามลำดับ</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">พิมพ์ผลคะแนนเรียงตามลำดับ</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
         

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
             <!--     <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> AdminLTE, Inc.
                    <small class="float-right">Date: 2/10/2014</small>
                  </h4>
                </div>
             
              </div>-->
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col text-center">
                 <img src="<?php echo base_url();?>uploads/logoth.png" width="90">
                 <h5 class="text-center">มหาวิทยาลัยสวนดุสิต</h5>
                </div>
                <!-- /.col -->
                <div class="col-sm-8 invoice-col">
                  <h5>แบบรายงานผลการออกเสียงเลือกตั้งคณะกรรมการดำเนินการสหกรณ์ออมทรัพย์</h5>
                  <h5>มหาวิทยาลัยสวนดุสิต จำกัด ประจำปี 2566</h5>
                  <h5>วันที่ 17 กุมภาพันธ์ 2567 เวลา 09.00 - 11.00 น.</h5>

                </div>
               
              </div>
              <hr>
              <br>
              <!-- /.row -->
              <div class="row">
                <div class="col-12">
                 <h5> 1.จำนวนผู้มีสิทธิออกเสียงลงคะแนนเลือกตั้งประธานสหกรณ์ออมทรัพย์ มหาวิทยาลัยสวนดุสิต จำกัด
    <?php echo $allvote;?> คน</h5>

                </div>
              </div><br>
               <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-bordered" ><!--style="border:1px solid black;" -->
                    <thead>
                    <tr>
                      <td colspan="2" valign="center" class="text-center"><strong>ใช้สิทธิลงคะแนน</strong></td>
                      <td valign="center" class="text-center"><strong>ไม่ใช้สิทธิ</strong></td>
                     
                    </tr>
                    
                    </thead>
                    <tbody>
                      <tr>
                      <td valign="center" class="text-center">ประสงค์ลงคะแนน</td>
                      <td valign="center" class="text-center">ไม่ประสงค์ลงคะแนน</td>
                     
                       <td rowspan="2" style="vertical-align : bottom;text-align:center;"><?php echo $unvote;?> คน</td>
                    </tr>
                    <tr>
                      <td valign="center" class="text-center"><?php echo $vote;?> คน</td>
                      <td valign="center" class="text-center"><?php echo $novote;?> คน</td>
                     
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <br>
               <div class="row">
                <div class="col-12">
                 <h5> 2.ผลการออกเสียงลงคะแนนเลือกตั้งประธานสหกรณ์ออมทรัพย์ มหาวิทยาลัยสวนดุสิต จำกัด (เรียงตามลำดับคะแนน)</h5>

                </div>
              </div><br>

              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-bordered">
                    <thead>
                    <tr>
                      <th valign="center" class="text-center">หมายเลข</th>
                      <th valign="center" class="text-center">ชื่อ-สกุล</th>
                      <th valign="center" class="text-center">คะแนนที่ได้</th>
                      <th valign="center" class="text-center">ลำดับที่ได้</th>                     
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                           // $i=1;
                            foreach ($userscore as $key => $r){ ?>
                              <tr>
                              
                                <td valign="center" class="text-center"><?php echo $r->c_number; ?></td>
                                <td ><?php echo $r->candidate_name; ?></td>
                                <td valign="center" class="text-center"><?php echo $r->total; ?></td>
                                 <td valign="center" class="text-center"><?php echo $r->num_row; ?></td>
                              </tr>
                          <?php 
                         // $i += 1; 
                          
                          } 

                          ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
 <br>
              <div class="row">
                <div class="col-6"></div>
                <div class="col-6 text-center">
                  รับรองผลการออกเสียงเลือกตั้งตามรายงานที่ปรากฏว่าเป็นไปตามนี้จริง<br><br><br>
                       ลงชื่อ ................................................................ ประธาน<br>
            (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br><br>
           
           
             ลงชื่อ ................................................................  กรรมการ<br> 
            (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br><br>
             ลงชื่อ ................................................................  กรรมการ<br> 
            (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br><br>
             ลงชื่อ ................................................................  กรรมการ<br> 
           (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br>

                </div>
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                <!--  <a href="" rel="noopener" target="_blank" class="btn btn-primary"><i class="fas fa-print"></i> พิมพ์</a> -->
                  <button onclick="window.print()"  class="btn btn-primary"><i class="fas fa-print"></i> พิมพ์</button>
                <!--  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button> -->
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>