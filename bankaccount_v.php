<?php
    if(!isset($_SESSION['username'])){
      header('Location: login');
    }
?>
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="card" style="cursor: default;">
			<div class="card-body">
				<h2><i class="fa-solid fa-id-badge"></i> Bank Account</h2>
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<form id="frmInputs">
							<div class="form-floating">
						  		<select class="form-select" name="txtnmBankname" id="inputnmBankname" style="height: 70pt;">
								    <option selected value="none">Open this select menu</option>
						  		</select>
							  	<label for="inputnmBankname">Bank Name</label>
							</div>
							<div class="form-floating">
						  		<select class="form-select" name="txtnmAccounttype" id="inputnmAccounttype" style="height: 70pt;">
								    <option selected value="none">Open this select menu</option>
								    <option value="Cash">Cash</option>
								    <option value="Checking">Checking</option>
								    <option value="Current">Current</option>
								    <option value="Savings">Savings</option>
						  		</select>
							  	<label for="inputnmAccounttype">Account Type</label>
							</div>
							<div class="form-floating">
								<input type="text" name="txtnmAccountno" class="form-control" id="inputnmAccountno" placeholder="Bank name" autocomplete="off" required style="height: 70pt;">
								<label for="inputnmAccountno">Account No.</label>
							</div>
							<div class="form-floating">
								<input type="text" name="txtnmAccountname" class="form-control" id="inputnmAccountname" placeholder="Bank name" required style="height: 70pt;">
								<label for="inputnmAccountname">Account Name</label>
							</div>
							<div class="form-floating">
								<input type="text" name="txtnmBegbalance" class="form-control" id="inputnmBegbalance" placeholder="Beginning Balance" autocomplete="off" required style="height: 70pt;">
								<label for="inputnmAccountname">Beginning Balance</label>
							</div>
							<div class="form-floating">
						  		<select class="form-select" name="txtnmCurrency" id="inputnmCurrency" style="height: 70pt;">
								    <option selected value="none">Open this select menu</option>
								    <option value="Dirham">Dirham</option>   
							    	<option value="Dollar">Dollar</option>
							    	<option value="Euro">Euro</option>
							    	<option value="HKD">HKD</option>
							    	<option value="Peso">Peso</option>
							    	<option value="Yen">Pound</option>
							    	<option value="Ringgit">Ringgit</option>
							    	<option value="SGD">SGD</option>
							    	<option value="USD">USD</option>
							    	<option value="Yen">Yen</option>
						  		</select>
							  	<label for="inputnmCurrency">Currency</label>
							</div>
							<div id="divAdtl" hidden>
								<input type="text" name="txtnmAssign" id="inputnmAssign" value="<?php echo $_SESSION['user_department'] ?>">
							</div>
							<div id="divCurrent" hidden></div>
							<div id="divLogo" hidden></div>
							<input type="text" name="txtnmStatus" value="Active" hidden>
						</form>
						<div class="row">
							<div class="col-md-6">
								<span style="font-size: 9pt;">Want to update?</span> <a href="updatebankaccount" style="font-size: 9pt;">Click here . . .</a>
							</div>
							<div class="col-md-6">
								<div class="btn button button-2" style="float: right;" id="btnSave"><img src="../img/logosave.png" style="height: 1.8em;"> Save Info</div>
							</div>
						</div>
					</div>
					<div class="col-md-1"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3"></div>
</div>
<div class="modal fade" id="SuccessModalToggle" data-bs-backdrop="static" aria-hidden="true" aria-labelledby="successModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background-color: transparent; border-color: transparent;">
    	
      <div class="modal-body">
        <div class="card mb-3" style="max-width: 540px; background-color: #82fc7e;">
		  <div class="row g-0">
		    <div class="col-md-4" style="background-color: #56ab54;">
		      <i class="fa-solid fa-user-check" style="padding-top: 56px; padding-left: 25px; font-size: 70pt; color: white;"></i>
		    </div>
		    <div class="col-md-8">
		    	<div class="row">
		    		<div class="col-md-2 ms-auto">
		    			<i class="fa-solid fa-xmark" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 30pt; color: #787a79;"></i>
		    		</div>
		    	</div>
		      <div class="card-body" style="cursor: default;">
		        <h5 class="card-title">Alert!</h5>
		        <p class="card-text">Account is registered successfully!</p>
		        <p class="card-text"><small class="text-muted">Cash Balance Portal</small></p>
		      </div>
		    </div>
		  </div>
		</div>
      </div>
    </div>
  </div>
</div>
<button class="btn btn-primary" data-bs-toggle="modal" href="#SuccessModalToggle" role="button" id="btnOpenSuccessbutton" hidden>Open Success modal</button>
<script type="text/javascript">
	$(document).ready(function(){
		$("#headerTitle").text("Bank Account");
		viewbankdetail_v();
		currentdate_v();
		notstaff();

		function notstaff(){
			var inputnmAssign = $("#inputnmAssign").val();

			if(inputnmAssign==="Admin"){
				location.replace("Home");
			}
		}

		$("#btnSave").click(function(e){
			e.preventDefault();
			empty();
		})

		function empty(){
			var inputnmBankname = $("#inputnmBankname").val();
			var inputnmAccounttype = $("#inputnmAccounttype").val();
			var inputnmAccountno = $("#inputnmAccountno").val();
			var inputnmAccountname = $("#inputnmAccountname").val();
			var inputnmCurrency = $("#inputnmCurrency").val();

			if(inputnmBankname==("")>0){
				$("#inputnmBankname").css("border-bottom-color","red");
			}else if(inputnmAccounttype==="none"){
				$("#inputnmAccounttype").css("border-bottom-color","red");
			}else if(inputnmAccountno==("")>0){
				$("#inputnmAccountno").css("border-bottom-color","red");
			}else if(inputnmAccountname==("")>0){
				$("#inputnmAccountname").css("border-bottom-color","red");
			}else if(inputnmCurrency==="none"){
				$("#inputnmCurrency").css("border-bottom-color","red");
			}else{
				exist_v();
			}
		}

		function exist_v(){
			$.ajax({
				type:'ajax',
				method:'POST',
				url:'<?php echo base_url("bankaccount/exist_c"); ?>',
				data:$("#frmInputs").serialize(),
				dataType:'json',
				success:function(response){
					if(response.success){
						var inputnmAccountno = $("#inputnmAccountno").val();
						$("#inputnmAccountno").focus();
						alert("Account No. "+inputnmAccountno+" is already exist.");
					}else{
						viewlogo_v();
					}
				}
			})
		}

		function viewlogo_v(){
			$.ajax({
				type:'ajax',
				method:'POST',
				url:'<?php echo base_url("bankaccount/viewlogo_c"); ?>',
				data:$("#inputnmBankname").serialize(),
				dataType:'json',
				success:function(response){
					if(response.success){
						var div = '';

						response.data.forEach(function(tbl){
							div += `<input type="text" name="txtnmLogo" value="${tbl['logo']}">`;
						})
						$("#divLogo").html(div);
						insert_v();
					}else{
						alert("Failed to line 190.");
					}
				}
			})
		}

		function insert_v(){
			$.ajax({
				type:'ajax',
				method:'POST',
				url:'<?php echo base_url("bankaccount/insert_c"); ?>',
				data:$("#frmInputs").serialize(),
				dataType:'json',
				success:function(response){
					if(response.success){
						$("#btnOpenSuccessbutton").click();
						$(".form-control").val("");
						$(".form-select").val("none");
					}else{
						alert("Failed to save");
					}
				}
			})
		}

		function currentdate_v(){
			$.ajax({
				type:'ajax',
				method:'POST',
				url:'<?php echo base_url("bankaccount/currentdate_c"); ?>',
				dataType:'json',
				success:function(response){
					if(response.success){
						var div = '';

						response.data.forEach(function(tbl){
							div += `<input type="date" value="${tbl['current']}" name="txtnmCurrent">`;
						})
						$("#divCurrent").html(div);
					}
				}
			})
		}

		function viewbankdetail_v(){
			$.ajax({
				type:'ajax',
				method:'POST',
				url:'<?php echo base_url("bankaccount/viewbankdetail_c"); ?>',
				dataType:'json',
				success:function(response){
					if(response.success){
						var option = '';

						response.data.forEach(function(tbl){
							option += `<option value="${tbl['abbreviation']}">
								${tbl['abbreviation']}
							</option>`;
						})
						$("#inputnmBankname").html(option);
					}
				}
			})
		}

		$('#inputnmBegbalance').keyup(function(event){

	        $(this).val(function(index, value) {
	            value = value.replace(/,/g,'');
	            return numberWithCommas(value);
	        });
	    });

	    function numberWithCommas(x){
	        var parts = x.toString().split(".");
	        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	        return parts.join(".");
	    }
	})
</script>