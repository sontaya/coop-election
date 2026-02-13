

  <style>
    #confirm {
        text-align: center;
        padding: 30px 15px;
    }
    .main {
    /*padding: 20px 25px 10px 25px;*/
    }
    .add_bottom_15{
        padding-bottom:15px;
    }
    .alert-pink {
    color: #fff;
    background-color: #f13a72;
    border-color: #f13a72;
  }
  .alert-blue {
    color: #fff;
    background-color: #214AA6;
    border-color: #214AA6;
  }
  .alert-yellow{
        color:#fff ;
        background-color: #ffe232;
        border-color: #ffe232;
    }
    .alert-green{
        color:#fff ;
        background-color: #236D48;
        border-color: #236D48;
    }


.loader-wrapper {
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  background-color: #242f3f;
  display:flex;
  justify-content: center;
  align-items: center;
}
.loader {
  display: inline-block;
  width: 30px;
  height: 30px;
  position: relative;
  border: 4px solid #Fff;
  animation: loader 1s infinite ease;
}
.loader-inner {
  vertical-align: top;
  display: inline-block;
  width: 100%;
  background-color: #fff;
  animation: loader-inner 1s infinite ease-in;
}

@keyframes loader {
  0% { transform: rotate(0deg);}
  25% { transform: rotate(180deg);}
  50% { transform: rotate(180deg);}
  75% { transform: rotate(360deg);}
  100% { transform: rotate(360deg);}
}

@keyframes loader-inner {
  0% { height: 0%;}
  25% { height: 0%;}
  50% { height: 100%;}
  75% { height: 100%;}
  100% { height: 0%;}
}
  </style>

  <main role="main" class="container">
      <div class="album py-3">
          <div class="container">
          <div class="row justify-content-center p-2">
          <div class="col-12 text-center">
         <h4 style="color:#003a70;"> ผลการเลือกตั้งคณะกรรมการดำเนินการ <br>สหกรณ์ออมทรัพย์ มหาวิทยาลัยสวนดุสิต จำกัด ประจำปี 2568 </h4>
          </div>
          </div>

              <div class="row justify-content-center">
								<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
									<div class="card">
										<div class="card-header alert-blue text-center">
										<h5>คณะกรรมการดำเนินการ</h5>
										</div>
										<div class="card-body ">
											<div class="table-responsive " id="tbl_score">
												<table class="table table-bordered" id="desktop" style="width:100%">
													<thead>
														<tr>
														<th style="vertical-align:middle;text-align:center;font-size: 14px;">หมายเลข</th>
															<th style="vertical-align:middle;text-align:center;font-size: 14px;">ชื่อ - สกุล</th>
															<th style="vertical-align:middle;text-align:center;font-size: 14px;">คะแนนรวม</th>
															<th style="vertical-align:middle;text-align:center;font-size: 14px;">ลำดับคะแนน</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach ($score2 as $key => $r2){ ?>
														<tr>
														<td style="vertical-align:middle;text-align:center;"><strong><?php echo $r2->c_number;?></strong></td>
														<td style="font-size:14px;"><?php echo $r2->candidate_name;?></td>
														<td style="vertical-align:middle;text-align:center;"><?php echo $r2->total;?></td>
														<td style="vertical-align:middle;text-align:center;"><?php echo $r2->row_num;?></td>
														</tr>
													<?php } ?>
													</tbody>
												</table>
									</div>
										</div>
									</div>
								</div>


              </div>

           <!--    <div class="row justify-content-center py-3">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <a href="<?php echo site_url("score_summary");?>" class="btn btn-primary btn-lg">สรุปผลการคัดเลือก</a>
              </div>
            </div> -->

          </div>
      </div>
      <div class="loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
</div>
  </main>
<script type="text/javascript">
    $(document).ready(function(){
  //jQuery(document).ready(function ($) {
    // $(window).on("load",function(){
        setTimeout(function(){
            $('.loader-wrapper').fadeOut('slow', function () {
            });
        },2000);

    });
//});

</script>
