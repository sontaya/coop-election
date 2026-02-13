

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
    background-color: #0070c0;
    border-color: #0070c0;
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
      <div class="album py-3 ">
          <div class="container">
          <div class="row justify-content-center p-2">
          <div class="col-12 text-center">
         <h4 style="color:#003a70;"> การคัดเลือก กรรมการสรรหาอธิการบดีจากผู้ปฏิบัติงานในมหาวิทยาลัย </h4>
          </div>
          </div>
              <div class="row justify-content-center">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                 <div class="card">
                  <div class="card-header alert-yellow text-center">
                  <h5>สายวิชาการ</h5>
                  </div>
                  <div class="card-body ">
                     <div class="table-responsive " id="tbl_score">
                      <table class="table table-bordered" id="desktop" style="width:100%">
                        <thead>
                          <tr>                            
                           <th style="vertical-align:middle;text-align:center;font-size: 12px;">หมายเลข</th>
                            <th style="vertical-align:middle;text-align:center;font-size: 12px;">ชื่อ - สกุล</th>
                            <th style="vertical-align:middle;text-align:center;font-size: 12px;">คะแนนรวม</th>  
                                          
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($score_sum1 as $key => $r){ ?>
                          <tr>
                           <td style="vertical-align:middle;text-align:center;"><strong><?php echo $r->c_number;?></strong></td>
                          <td style="vertical-align:middle;text-align:center;"><img src="<?php echo base_url();?>uploads/events/<?php echo $r->picture; ?>" width="130" height="180" class="my-n1" alt=""><br><br><?php echo $r->fullname;?></td>
                          <td style="vertical-align:middle;text-align:center;"><?php echo $r->score;?></td>
                         
                          </tr>
                        <?php } ?>
                        </tbody>
                      </table>
                </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                 <div class="card">
                  <div class="card-header alert-green text-center">
                  <h5>สายสนับสนุน</h5>
                  </div>
                  <div class="card-body ">
                    <div class="table-responsive " id="tbl_score">
                      <table class="table table-bordered" id="desktop" style="width:100%">
                        <thead>
                          <tr>                            
                           <th style="vertical-align:middle;text-align:center;font-size: 12px;">หมายเลข</th>
                            <th style="vertical-align:middle;text-align:center;font-size: 12px;">ชื่อ - สกุล</th>
                            <th style="vertical-align:middle;text-align:center;font-size: 12px;">คะแนนรวม</th>  
                                        
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($score_sum2 as $key => $r2){ ?>
                          <tr>
                           <td style="vertical-align:middle;text-align:center;"><strong><?php echo $r2->c_number;?></strong></td>
                           <td style="vertical-align:middle;text-align:center;"><img src="<?php echo base_url();?>uploads/events/<?php echo $r2->picture; ?>" width="130" height="180" class="my-n1" alt=""><br><br><?php echo $r2->fullname;?></td>
                           <td style="vertical-align:middle;text-align:center;"><?php echo $r2->score;?></td> 
                        
                          </tr>
                        <?php } ?>
                        </tbody>
                      </table>
                </div>
                  </div>
                </div>
              </div>

              </div>

            
          </div>
      </div>

   <!--    <div class="loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
</div> -->

  </main>

  <script type="text/javascript">

 $(document).ready(function(){
  //jQuery(document).ready(function ($) {
    // $(window).on("load",function(){
        setTimeout(function(){
            $('.loader-wrapper').fadeOut('slow', function () {
            });
        },1000);

    });  
//});

</script>
