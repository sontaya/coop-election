
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SDU COOP eVote</title>

  <!-- Google Font: Source Sans Pro -->
  <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/style.css">
  <script src="<?php echo base_url()?>assets/admin/plugins/jquery/jquery.min.js"></script>
  <style>
      * { font-family: 'Prompt', sans-serif; }

      input[type=checkbox]
      {
        /* Double-sized Checkboxes */
        -ms-transform: scale(2); /* IE */
        -moz-transform: scale(2); /* FF */
        -webkit-transform: scale(2); /* Safari and Chrome */
        -o-transform: scale(2); /* Opera */
        transform: scale(2);
        padding: 10px;
      }

    .col img{
            height:120px;
            width: 100%;
            cursor: pointer;
            transition: transform 1s;
            object-fit: cover;
        }
        .col label{
            overflow: hidden;
            position: relative;
        }

        .imgbgchk:checked + label>.tick_container{
            opacity: 1;
        }

        .imgbgchk:checked + label>img{
            transform: scale(1.25);
            opacity: 0.3;
        }
        .tick_container {
            transition: .5s ease;
            opacity: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            cursor: pointer;
            text-align: center;
        }
        .tick {
            background-color: #FFF;
            border: 2px solid #000000;
            color: #03a709;
            padding: 3px 12px;
          /*  font-size: 16px;
            height: 60px;*/
            width: 120x;
            /*border-radius: 100%;*/
        }
        .tick i{
          font-size:90px;
        }

        /* Card overrides */
        .card {
          border-radius: 14px;
          box-shadow: 0 2px 8px rgba(0,0,0,0.07);
          border: 1px solid #e2e8f0;
          overflow: hidden;
        }
        .card.card-primary .card-header {
          background: linear-gradient(135deg, #3b82f6, #2563eb);
          border-bottom: none;
        }
        .card.card-danger .card-header {
          background: linear-gradient(135deg, #ef4444, #dc2626);
          border-bottom: none;
        }

				.vote-card-body {
					padding-top: 0.5rem;
					padding-bottom: 0.5rem;
				}

				 .card-body-no-vote {
					padding-top: 0.5rem;
					padding-bottom: 0.5rem;
				}

        /* Navbar override */
        .navbar.bg-dark1 {
          background: linear-gradient(135deg, #1e3a5f, #1e40af) !important;
        }

        /* Submit button */
        .btn-vote-submit {
          display: block;
          width: 100%;
          padding: 14px 24px;
          background: linear-gradient(135deg, #22c55e, #16a34a);
          color: #fff;
          border: none;
          border-radius: 12px;
          font-size: 1.05rem;
          font-weight: 600;
          font-family: 'Prompt', sans-serif;
          cursor: pointer;
          transition: all 0.25s ease;
          box-shadow: 0 4px 14px rgba(22,163,74,0.3);
        }
        .btn-vote-submit:hover {
          background: linear-gradient(135deg, #16a34a, #15803d);
          transform: translateY(-1px);
          box-shadow: 0 6px 20px rgba(22,163,74,0.4);
        }
        .btn-vote-submit:active {
          transform: translateY(0);
        }

				.candidate-name-label {
					display: block;
					margin-bottom: 0.1rem;
					margin-top: -10px;
					font-weight: 500;
				}
</style>


</head>
<body class="hold-transition " >
 <nav class="navbar navbar-expand-md  bg-dark1 mb-4">
   <div class="container">

    <a class="navbar-brand" href="<?php echo site_url()?>" title="logo SDU">
      <div class="logo">
      <img src="<?php echo base_url()?>uploads/sducoop.jpg" height="50" alt="SDU" title="SDU">
     <!--  <img src="<?php echo base_url()?>uploads/new_head20162.png" height="50" alt="SDU" title="SDU">-->
     </div>
   </a>
   <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <div style="color:#fff;">
          <div style="font-size: 20px; font-weight: 600;">ลงคะแนนเลือกตั้งคณะกรรมการดำเนินการสหกรณ์ออมทรัพย์</div>
          <div style="font-size: 14px; opacity: 0.85;">มหาวิทยาลัยสวนดุสิต จำกัด ประจำปี 2569</div>
        </div>
   			<ul class="navbar-nav mr-auto"></ul>
        <a class="btn btn-outline-success my-2 my-sm-0"  href="<?php echo base_url()?>login/signout">ออกจากระบบ</a>
      </div>
    </div>
  </nav>

  <div class="container">

  <form action="" method="POST" id="frmvote">
    <input type="hidden" name="otpcode" id="otpcode" value="<?php echo $this->session->userdata('otpcode'); ?>">
    <input type="hidden" name="pcode" id="pcode" value="<?php echo $this->session->userdata('pcode'); ?>">
    <!-- Group 1 -->
    <div class="row add_bottom_5">
      <div class="col-md-10">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">1.รายชื่อผู้สมัครประธานสหกรณ์</h3> <span class="text-warning">(เลือกผู้สมัครได้ 1 คน) </span>
          </div>
          <div class="card-body vote-card-body">
            <div class="row">

             <?php foreach ($cds1 as $key => $r){ ?>

              <div class="col col-lg-2 col-md-2 col-sm-2 col-6 text-center">
                 <input type="checkbox"  class="d-none candidate1 imgbgchk" name="candidate_id1[]" value="<?php echo $r->id; ?>" title='1' id="chk_<?php echo $r->id;?>" />

                        <label for="chk_<?php echo $r->id; ?>">
                          <img src="<?php echo base_url();?>uploads/2569/<?php echo $r->picture;?>" alt="Image<?php echo $r->c_number; ?>" width="90px">

                          <div class="tick_container">
                            <div class="tick"><i class="fa fa-times" aria-hidden="true" ></i></div>
                          </div>
                        </label><br>
                        <label class="candidate-name-label" style="font-size: 14px"><?php echo $r->candidate_name; ?></label>

              </div>

            <?php } ?>

          </div>
        </div>
      </div>
    </div>
    <div class="col-md-2">

     <div class="card card-danger ">
      <div class="card-header text-center">
        <h6>ไม่ลงคะแนน</h6>
      </div>
      <div class="card-body card-body-no-vote">
        <div class="row">
           <div class="col col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                 <input type="checkbox"  class="d-none no_candidate1 imgbgchk" name="no_candidate1" value="0" title='1' id="no_candidate1" />

                        <label for="no_candidate1">
                          <img src="<?php echo base_url();?>uploads/pic/vote2.jpg" alt="Image0" width="50px">

                          <div class="tick_container">
                            <div class="tick"><i class="fa fa-times" aria-hidden="true" ></i></div>
                          </div>
                        </label><br>
                    <!--    <label style="font-size: 11px">ไม่ลงคะแนน</label> -->

              </div>
         <!-- <input class="no_candidate" type="checkbox" name="no_candidate" value="0" id="no_candidate">-->
        </div>
      </div>

    </div>
     <!-- <div style="border:3px; border-style:solid; border-color:#f1f5f9;padding-top: 5px;padding-bottom: 5px">
      <h6 class="card-text text-danger">
        เบอร์ที่เลือก  &nbsp;<span class="text-primary" id="vcount1"></span>
      </h6>

     <span class="text-success cnumber text-center" id="vdata1"></span>
    </div> -->

  </div>


 </div>
 <!-- End Group 1 -->
<!-- Group 2 -->
    <div class="row add_bottom_5">
      <div class="col-md-10">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">2.รายชื่อผู้สมัครคณะกรรมการดำเนินการ</h3> <span class="text-warning">(เลือกผู้สมัครได้ 7 คน) </span>
          </div>
          <div class="card-body vote-card-body">
            <div class="row">

             <?php foreach ($cds2 as $key => $r2){ ?>

              <div class="col col-lg-2 col-md-2 col-sm-2 col-6 text-center">
                 <input type="checkbox"  class="d-none candidate2 imgbgchk" name="candidate_id2[]" value="<?php echo $r2->id; ?>" title='2' id="chk_<?php echo $r2->id;?>" />

                        <label for="chk_<?php echo $r2->id; ?>">
                          <img src="<?php echo base_url();?>uploads/2569/<?php echo $r2->picture;?>" alt="Image<?php echo $r2->c_number; ?>" width="120px">
                          <div class="tick_container">
                            <div class="tick"><i class="fa fa-times" aria-hidden="true" ></i></div>
                          </div>
                        </label><br>
                         <label class="candidate-name-label" style="font-size: 14px"><?php echo $r2->candidate_name; ?></label>

              </div>

            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-2">

     <div class="card card-danger">
      <div class="card-header text-center">
        <h6>ไม่ลงคะแนน</h6>
      </div>
      <div class="card-body card-body-no-vote">
        <div class="col col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                 <input type="checkbox"  class="d-none no_candidate2 imgbgchk" name="no_candidate2" value="0" title='2' id="no_candidate2" />

                        <label for="no_candidate2">
                          <img src="<?php echo base_url();?>uploads/pic/vote2.jpg" alt="Image0" width="50px">

                          <div class="tick_container">
                            <div class="tick"><i class="fa fa-times" aria-hidden="true" ></i></div>
                          </div>
                        </label><br>
                     <!--   <label style="font-size: 11px">ไม่ลงคะแนน</label> -->

              </div>

       <!--   <input class="no_candidate2" type="checkbox" name="no_candidate2" value="20" id="no_candidate2">-->

      </div>

    </div>
   <!--  <div style="border:3px; border-style:solid; border-color:#f1f5f9;padding-top: 5px;padding-bottom: 5px">
      <h6 class="card-text text-danger">
        เบอร์ที่เลือก  &nbsp;<span class="text-primary" id="vcount2"></span>
      </h6>

      <span class="text-success cnumber text-center" id="vdata2"></span>
    </div>-->

  </div>

</div>
<!-- End Group 2 -->

<!-- Group 3 -->
<div class="row add_bottom_5">
      <div class="col-md-10">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">3.รายชื่อผู้สมัครผู้ตรวจสอบกิจการ</h3> <span class="text-warning">(เลือกผู้สมัครได้ 3 คน) </span>
          </div>
          <div class="card-body vote-card-body">
            <div class="row">

             <?php foreach ($cds3 as $key => $r3){ ?>

              <div class="col col-lg-2 col-md-2 col-sm-2 col-6 text-center">
                 <input type="checkbox"  class="d-none candidate3 imgbgchk" name="candidate_id3[]" value="<?php echo $r3->id; ?>" title='2' id="chk_<?php echo $r3->id;?>" />

                        <label for="chk_<?php echo $r3->id; ?>">
                          <img src="<?php echo base_url();?>uploads/2569/<?php echo $r3->picture;?>" alt="Image<?php echo $r3->c_number; ?>" width="120px">
                          <div class="tick_container">
                            <div class="tick"><i class="fa fa-times" aria-hidden="true" ></i></div>
                          </div>
                        </label><br>
                         <label class="candidate-name-label" style="font-size: 14px"><?php echo $r3->candidate_name; ?></label>

              </div>

            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-2">

     <div class="card card-danger">
      <div class="card-header text-center">
        <h6>ไม่ลงคะแนน</h6>
      </div>
      <div class="card-body card-body-no-vote">
        <div class="col col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                 <input type="checkbox" class="d-none no_candidate3 imgbgchk" name="no_candidate3" value="0" title='3' id="no_candidate3" />

                        <label for="no_candidate3">
                          <img src="<?php echo base_url();?>uploads/pic/vote2.jpg" alt="Image0" width="50px">

                          <div class="tick_container">
                            <div class="tick"><i class="fa fa-times" aria-hidden="true" ></i></div>
                          </div>
                        </label><br>
                     <!--   <label style="font-size: 11px">ไม่ลงคะแนน</label> -->

              </div>

       <!--   <input class="no_candidate2" type="checkbox" name="no_candidate2" value="20" id="no_candidate2">-->

      </div>

    </div>
     <!--<div style="border:3px; border-style:solid; border-color:#f1f5f9;padding-top: 5px;padding-bottom: 5px">
      <h6 class="card-text text-danger">
        เบอร์ที่เลือก  &nbsp;<span class="text-primary" id="vcount3"></span>
      </h6>

     <span class="text-success cnumber text-center" id="vdata3"></span>
    </div>-->

  </div>


</div>

<!-- End Group 3 -->

<div class="row add_bottom_15">
      <div class="col-md-10">
 <button type="button" class="btn-vote-submit" id="submit2"><i class="fas fa-check-circle" style="margin-right:4px;"></i> บันทึกการลงคะแนน</button>
      </div>
    </div>
</form>

</div>

<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/sweetalert2/sweetalert2.min.css">
<script src="<?php echo base_url();?>assets/admin/plugins/sweetalert2/sweetalert2.all.min.js"></script>

<script>
  var baseurl='<?php echo base_url();?>';

  $(document).ready(function() {
// group 1
    $("input:checkbox.candidate1").click(function() {
     $('#no_candidate1').attr('disabled', true);
      //$('#no_candidate').prop('checked',false);
      //var markedCheckbox = document.querySelectorAll('input[type="checkbox"]:checked');
      var markedCheckbox1 = document.querySelectorAll('input[name="candidate_id1[]"]:checked');
      var cnklen1 = $('input[name="candidate_id1[]"]:checked').length;
      //console.log(cnklen1);
      if(cnklen1 > 1 ){

        Swal.fire({
          icon: 'error',
          title: 'เลือกได้ 1 คนเท่านั้น!',
        });

        //$(this).closest('tr').removeClass('removeRow');
        return false
      }else if (cnklen1 == 0) {
        //document.getElementById('vcount1').innerHTML = "";
        //document.getElementById('vdata1').innerHTML = "";
        $('#no_candidate1').attr('disabled', false);
      }else{

        //document.getElementById('vdata1').innerHTML = "";
        for (var checkbox1 of markedCheckbox1) {
          console.log(checkbox1.value);
          if (checkbox1.checked) {
          //document.getElementById('vcount1').innerHTML = cnklen1 ;
          //document.getElementById('vdata1').innerHTML += checkbox1.value + ' ';
           //document.body.append(checkbox1.value + ' ');
        }

      }
    }

  });

    $("input:checkbox.no_candidate1").click(function() {

      if(!$(this).is(":checked")){
        $('input:checkbox[name="candidate_id1[]"]').attr('disabled', false);
        //$("#image-checkbox").attr("disabled", false);
          //$(this).find('img').attr('disabled', false);

          console.log("no_candidate1 unchecked");
        }else{
         $('input:checkbox[name="candidate_id1[]"]').attr('disabled', true);
         //$("#image-checkbox").attr("disabled", true);
         //$(this).find('img').attr('disabled', true);

         console.log("no_candidate1 checked");
       }
        //alert('you are unchecked ' + $(this).val());
      });
// group 2
  $("input:checkbox.candidate2").click(function() {
     $('#no_candidate2').attr('disabled', true);
      //$('#no_candidate').prop('checked',false);
      //var markedCheckbox = document.querySelectorAll('input[type="checkbox"]:checked');
      var checkedElemets = $('.candidate2:checked');
      var markedCheckbox2 = document.querySelectorAll('input[name="candidate_id2[]"]:checked');
      var cnklen2 = $('input[name="candidate_id2[]"]:checked').length;
      //console.log(cnklen2);
      if(cnklen2 > 7 ){

        Swal.fire({
          icon: 'error',
          title: 'เลือกได้ 7 คนเท่านั้น!',
        });

        return false
      }else if (cnklen2 == 0) {
        //document.getElementById('vcount2').innerHTML = "";
        //document.getElementById('vdata2').innerHTML = "";
        $('#no_candidate2').attr('disabled', false);
      }else{

        //document.getElementById('vdata2').innerHTML = "";
        for (var checkbox2 of markedCheckbox2) {
          console.log(checkbox2.value);
          if (checkbox2.checked) {
          //document.getElementById('vcount2').innerHTML = cnklen2 ;
          //document.getElementById('vdata2').innerHTML += checkbox2.value + ' ';
           //document.body.append(checkbox1.value + ' ');
        }

      }
    }

  });

    $("input:checkbox.no_candidate2").click(function() {
      var checkedElemets = $('.no_candidate2:checked');
      if(!$(this).is(":checked")){
        $('input:checkbox[name="candidate_id2[]"]').attr('disabled', false);
        //$("#image-checkbox").attr("disabled", false);
          //$(this).find('img').attr('disabled', false);

          console.log("no_candidate2 unchecked");
        }else{
         $('input:checkbox[name="candidate_id2[]"]').attr('disabled', true);
         //$("#image-checkbox").attr("disabled", true);
         //$(this).find('img').attr('disabled', true);

         console.log("no_candidate2 checked");
       }
        //alert('you are unchecked ' + $(this).val());
      });
// group 3

$("input:checkbox.candidate3").click(function() {
     $('#no_candidate3').attr('disabled', true);
      //$('#no_candidate').prop('checked',false);
      //var markedCheckbox = document.querySelectorAll('input[type="checkbox"]:checked');
      var checkedElemets = $('.candidate3:checked');
      var markedCheckbox3 = document.querySelectorAll('input[name="candidate_id3[]"]:checked');
      var cnklen3 = $('input[name="candidate_id3[]"]:checked').length;
      //console.log(cnklen2);
      if(cnklen3 > 3 ){

        Swal.fire({
          icon: 'error',
          title: 'เลือกได้ 3 คนเท่านั้น!',
        });

        return false
      }else if (cnklen3 == 0) {
        //document.getElementById('vcount3').innerHTML = "";
        //document.getElementById('vdata3').innerHTML = "";
        $('#no_candidate3').attr('disabled', false);
      }else{

        //document.getElementById('vdata3').innerHTML = "";
        for (var checkbox3 of markedCheckbox3) {
          console.log(checkbox3.value);
          if (checkbox3.checked) {
          //document.getElementById('vcount3').innerHTML = cnklen3;
          //document.getElementById('vdata2').innerHTML += checkbox2.value + ' ';
           //document.body.append(checkbox1.value + ' ');
        }

      }
    }

  });

    $("input:checkbox.no_candidate3").click(function() {
      var checkedElemets = $('.no_candidate3:checked');
      if(!$(this).is(":checked")){
        $('input:checkbox[name="candidate_id3[]"]').attr('disabled', false);
        //$("#image-checkbox").attr("disabled", false);
          //$(this).find('img').attr('disabled', false);

          console.log("no_candidate3 unchecked");
        }else{
         $('input:checkbox[name="candidate_id3[]"]').attr('disabled', true);
         //$("#image-checkbox").attr("disabled", true);
         //$(this).find('img').attr('disabled', true);

         console.log("no_candidate3 checked");
       }
        //alert('you are unchecked ' + $(this).val());
      });


     $("#submit2").click(function() {

      //check current session and signout
      $.get( baseurl+"otp/check_session", function( data ) {
        console.log(data);
          if(data==="1")
           {

           }else{
            window.location = baseurl +'login/signout';
           }
      });

      var otpcode=$('#otpcode').val();
      var pcode=$('#pcode').val();
      //var cardid=$('#cardid').val();
      //var v_data=document.getElementById("vdata").innerText;
      //var v_count=document.getElementById("vcount").innerText;
      var checkbox11 =$('.candidate1:checked');
      var checkbox10=$('.no_candidate1:checked');
      var checkbox21 =$('.candidate2:checked');
      var checkbox20=$('.no_candidate2:checked');
      var checkbox31 =$('.candidate3:checked');
      var checkbox30=$('.no_candidate3:checked');
      if((checkbox11.length > 0 || checkbox10.length > 0) && (checkbox21.length > 0 || checkbox20.length > 0) && (checkbox31.length > 0 || checkbox30.length > 0)){
       // var values1 = checkbox11.map(function() {return { id: this.id, c_num: this.value, vgroup : this.title };}).get();
        //var values2 = checkbox11.map(function() {return { id: this.id, c_num: this.value, vgroup : this.title };}).get();
        //var values3 = checkbox11.map(function() {return { id: this.id, c_num: this.value, vgroup : this.title };}).get();
        //var values4 = checkbox11.map(function() {return { id: this.id, c_num: this.value, vgroup : this.title };}).get();

       Swal.fire({
        title: 'ยืนยันการลงคะแนน?',
        text: "โปรดตรวจสอบและยืนยันการเลือกของท่าน เมื่อท่านยืนยันแล้วระบบจะไม่สามารถเปลี่ยนแปลงแก้ไขได้!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ยืนยัน',
        cancelButtonText: 'ยกเลิก',
      }).then((result) => {

          if (result.value) { //isConfirmed
            //console.log('v_data'+v_data);
            var checkbox_value = [];
            //vote selected
            $(checkbox11).each(function(){
              $data=$(this).val()+':1';
              checkbox_value.push($data);
            });
            $(checkbox21).each(function(){
              $data=$(this).val()+':2';
              checkbox_value.push($data);
            });
            $(checkbox31).each(function(){
              $data=$(this).val()+':3';
              checkbox_value.push($data);
            });
            //no vote selected
            $(checkbox10).each(function(){
               $data=$(this).val()+':1';
               checkbox_value.push($data);
            });
            $(checkbox20).each(function(){
               $data=$(this).val()+':2';
               checkbox_value.push($data);
            });
            $(checkbox30).each(function(){
               $data=$(this).val()+':3';
               checkbox_value.push($data);
            });
            console.log(checkbox_value);


            $.ajax({
              url: baseurl +"otp/add_vote",
              method:"POST",
              data:{checkbox_value:checkbox_value,otpcode:otpcode,pcode:pcode}, //data:{checkbox_value:checkbox_value,otpcode:otpcode,v_data:v_data,v_count:v_count},
              success:function(data)
              {
                console.log(data);
                if(data==true){

                  $('#no_candidate1').attr('disabled', false);
                  $('#no_candidate2').attr('disabled', false);
                  $('#no_candidate3').attr('disabled', false);
                  window.location = baseurl +'otp/success';
               /*   swal.fire({
                    icon: 'success',
                    title: 'ขอบคุณ.',
                    showConfirmButton: false,
                    timer: 2000
                  }).then(function() {
                    window.location = baseurl +'otp/success';
                  });  */
                } else{
                  Swal.fire('รหัสนี้ใช้เลือกตั้งแล้ว.');
                }

              }
            });


          }else{}
        }); //end swal .catch(swal.noop)

    }else{
      Swal.fire({icon: 'info', title: 'กรุณาเลือกผู้สมัคร', });
    }

  });

});


</script>


<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/admin/dist/js/adminlte.min.js"></script>


</script>
</body>
</html>
