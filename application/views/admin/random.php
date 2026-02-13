<div class="has-text-centered">
	<h1 class="mb-2 is-size-3 has-text-centered has-text-danger has-text-weight-bold">สุ่มตัวเลข - random number</h1>
	<h2 class="mb-5 is-size-5 has-text-centered">โปรแกรมสุ่มตัวเลขหรือ number ที่ต้องการสามารถสุ่มได้ทั้งแบบตัวเลข 1 หลัก, 2 หลัก, 3 หลัก และ 6 หลัก</h2>
	<div class="columns is-multiline"><div class="column is-12">
		<div class="columns is-multiline is-centered is-mobile">
			<div class="column is-2-desktop is-6-mobile">
				<div class="field">
					<input class="is-checkradio" id="rbNumDisplay1" type="radio" value="1" name="rbNumDisplay">
					<label for="rbNumDisplay1">สุ่มตัวเลข 1 จำนวน</label>
				</div>
			</div>
			<div class="column is-2-desktop is-6-mobile">
				<div class="field">
					<input class="is-checkradio" id="rbNumDisplay2" type="radio" value="2" name="rbNumDisplay">
					<label for="rbNumDisplay2">สุ่มตัวเลข 2 หลัก</label>
				</div>
			</div>
					<div class="column is-2-desktop is-6-mobile">
						<div class="field">
							<input class="is-checkradio" id="rbNumDisplay3" type="radio" value="3" name="rbNumDisplay" checked="checked">
							<label for="rbNumDisplay3">สุ่มตัวเลข 3 หลัก</label>
						</div>
					</div>
							<div class="column is-2-desktop is-6-mobile">
								<div class="field">
									<input class="is-checkradio" id="rbNumDisplay4" type="radio" value="6" name="rbNumDisplay" checked="checked">
									<label for="rbNumDisplay4">สุ่มตัวเลข 6 หลัก</label>
								</div>
							</div>
						</div>
					</div>
					<div class="box no-border ele-center d-none" id="box-form-range-num">
						<form id="formSearchNum" action="#" class="has-text-centered">
							<div class="field is-horizontal">
								<div class="field-label is-normal">
									<label class="label">เริ่มจาก</label>
								</div>
								<div class="field-body">
									<div class="field">
										<div class="control">
											<input class="input is-primary input-num" type="text" name="start" placeholder="เลขเริ่มต้น" value="1">
										</div>
									</div>
									<div class="field-label is-normal">
										<label class="label">ถึง</label>
									</div>
									<div class="field">
										<div class="control">
											<input class="input is-primary input-num" type="text" name="end" placeholder="เลขสิ้นสุด" value="100">
										</div>
									</div>
								</div>
							</div>
									</form>
								</div>
								<div class="column is-12"><div id="range_number_random" class="slotwrapper d-none">
									<div id="rangNumerResult">?</div>
								</div>
								<div class="slotwrapper" id="box-random">
									<div class="columns is-mobile">
										<div class="column ">
											<ul data-playslot="4" style="top: -1000px;">
												<li>0</li><li>1</li><li>2</li><li>3</li><li>4</li><li class="has-text-danger">5</li><li>6</li><li>7</li><li>8</li><li>9</li>
											</ul>
										</div><div class="column ">
											<ul data-playslot="4" style="top: -1400px;">
												<li>0</li><li>1</li><li>2</li><li>3</li><li>4</li><li>5</li><li>6</li><li class="has-text-danger">7</li><li>8</li><li>9</li>
											</ul>
										</div>
										<div class="column ">
											<ul data-playslot="4" style="top: -1200px;">
												<li>0</li><li>1</li><li>2</li><li>3</li><li>4</li><li>5</li><li class="has-text-danger">6</li><li>7</li><li>8</li><li>9</li>
											</ul>
										</div>
										<div class="column ">
											<ul data-playslot="4" style="top: -1800px;">
												<li>0</li><li>1</li><li>2</li><li>3</li><li>4</li><li>5</li><li>6</li><li>7</li><li>8</li><li class="has-text-danger">9</li>
											</ul>
										</div>
										<div class="column ">
											<ul data-playslot="4" style="top: -400px;">
												<li>0</li><li>1</li><li class="has-text-danger">2</li><li>3</li><li>4</li><li>5</li><li>6</li><li>7</li><li>8</li><li>9</li>
											</ul>
										</div>
										<div class="column ">
											<ul data-playslot="4" style="top: -600px;">
												<li>0</li><li>1</li><li>2</li><li class="has-text-danger">3</li><li>4</li><li>5</li><li>6</li><li>7</li><li>8</li><li>9</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="ele-center mt-5 mb-5">
						
						<button type="button" class="button is-success" id="btn-random">สุ่มตัวเลข</button></div></div>


<script type="text/javascript"> 
	var lastResultMulti = [];
  // Start game on document load
  objBtn = $('.btnRandomSlotName');
  if(objBtn.attr('class')){
    setItemNameMulti();
    game = new randName();
    objBtn.click(function () {
      lastResultMulti=[];
      totalRandom = $("input:radio[name ='rbNumDisplayName']:checked").val();
      if(labelMulti.length >= totalRandom){
        $("input:radio[name ='rbNumDisplayName']").attr('disabled',true);
        game.setName(labelMulti,totalRandom);
        game.init();
        objBtn.prop('disabled', true);
        objBtn.html('กำลังทำการสุ่มชื่อ...');
        removeFirstQuestionMask();
        game.run(result => {
          lastResultMulti = result;
          removeNameMulti(lastResultMulti);
          $("input:radio[name ='rbNumDisplayName']").attr('disabled',false);
          objBtn.prop('disabled', false);
          objBtn.html('สุ่มชื่อ');
        });
      }else{
        current_temp_name = labelMulti.toString();
        if(current_temp_name==''){
          current_temp_name = '-';
        }
        showComponentModal('😝 กรอกชื่อไม่ครบ','เนื่องจากคุณเลือกสุ่มชื่อแบบ '+totalRandom+' ชื่อ<br><span class="has-text-danger">กรุณาใส่ชื่ออย่างน้อย '+totalRandom+' ชื่อค่ะ</span><br>รายชื่อที่มีอยู่ตอนนี้คือ '+current_temp_name);
      }
    });
  }
  function removeNameMulti(resultMulti){
    if($('#rm_multi_result').is(":checked")==1){
      for(const element of resultMulti) {
          rm_index = labelMulti.indexOf(element);
          if (rm_index !== -1) {
            labelMulti.splice(rm_index, 1);
          }
      }
      temp_txt = labelMulti.toString();
      if(temp_txt){
        temp_txt = temp_txt.replace(/,/g, "\n")
      }
      $('#txt_random_name_multi').val(temp_txt);
    }
  }
  $("#rm_multi_result").click(function(){
    if($('#rm_multi_result').is(":checked")==1){
      if(lastResultMulti){
        removeNameMulti(lastResultMulti);
      }
    }
    else{
      for(const element of lastResultMulti) {
          labelMulti.push(element);
      }
      temp_txt = labelMulti.toString();
      if(temp_txt){
        temp_txt = temp_txt.replace(/,/g, "\n")
      }
      $('#txt_random_name_multi').val(temp_txt);
    }
  });
</script>