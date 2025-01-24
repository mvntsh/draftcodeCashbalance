<?php
    if(!isset($_SESSION['username'])){
      header('Location: login');
    }
?>
<style type="text/css">
	#btnDebit{
		  color: #fff;
		  border: 3px solid red;
		  background-image: -webkit-linear-gradient(30deg, red 50%, transparent 50%);
		  background-image: linear-gradient(30deg, red 50%, transparent 50%);
		  background-size: 500px;
		  background-repeat: no-repeat;
		  background-position: 0%;
		  -webkit-transition: background 0.1ms ease-in-out;
		  transition: background 350ms ease-in-out;
		}

		#btnDebit:hover{
		  background-position: 100%;
		  color: red;
		  border: 3px solid red;
		}

		#btnCredit{
		  color: #fff;
		  border: 3px solid #1900FF;
		  background-image: -webkit-linear-gradient(30deg, #1900FF 50%, transparent 50%);
		  background-image: linear-gradient(30deg, #1900FF 50%, transparent 50%);
		  background-size: 500px;
		  background-repeat: no-repeat;
		  background-position: 0%;
		  -webkit-transition: background 0.1ms ease-in-out;
		  transition: background 350ms ease-in-out;
		}

		#btnCredit:hover{
		  background-position: 100%;
		  color: #1900FF;
		  border: 3px solid #1900FF;
		}

		#btnSelectAccountno{
			background-color: #BAB6B6;

		}

		#btnSelectAccountno:hover{
			cursor: pointer;
			background-color: WHITE;
			transform: scale(1.03);
		}

		#btnSelectedAccountno:hover{
			background-color: #d4f0aa;
		}
</style>
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6" style="margin-top: 5%; margin-bottom: 5%; cursor: default;">
			<div class="card" style="backdrop-filter:blur(80px);">
				<div class="card-body">
					<h2><img src="../icons/feather-pen.png"> Accounting Entry</h2>
					<hr>
					<div style="margin: 5%;">
						<form id="frmInputs">
							<div class="form-floating" id="divAccountno">
								<input type="text" name="txtnmAccountno" id="inputnmAccountno" class="form-control" placeholder="Account No." autocomplete="off" required style="height: 70pt;">
								<label for="inputnmAccountno">Account No.</label>
							</div>
							<table id="tblBankAccount" style="margin-bottom: 1rem; width: 100%; display: none;">
								<tbody></tbody>
							</table>
							<div class="form-floating">
								<input type="text" name="txtnmAmount" id="inputnmAmount" class="form-control" placeholder="Amount" autocomplete="off" required style="height: 70pt;">
								<label for="inputnmAmount">Amount</label>
							</div>
							<div class="form-floating">
								<input type="date" name="txtnmDate" class="form-control" id="inputnmDate" placeholder="Date" autocomplete="off" required style="height: 70pt;">
								<label for="inputnmDate">Date</label>
							</div>
							<div hidden>
								<input type="text" class="form-control" name="txtnmAccountname" id="inputnmAccountname">
								<input type="text" class="form-control" name="txtnmType" id="inputnmType">
								<input type="text" class="form-control" name="txtnmBegbalance" id="inputnmBegBalance">
								<input type="text" class="form-control" name="txtnmDebit" id="inputnmDebit">
								<input type="text" class="form-control" name="txtnmCredit" id="inputnmCredit">
								<input type="text" class="form-control" name="txtnmEndBalance" id="inputnmEndBalance">
								<input type="text" class="form-control" name="txtnmCurrency" id="inputnmCurrency">
								<input type="text" class="form-control" name="txtnmBank" id="inputnmBank">
								<input type="text" name="txtnmUsername" value="<?php echo $_SESSION['username'] ?>">
								<input type="text" class="form-control" name="txtnmBanklogo" id="inputnmBanklogo">
								<input type="text" class="form-control" id="inputnmTransactionstatus">
								<input type="text" name="txtnmIssue" id="inputnmIssued">
								<input type="text" name="txtnmStatus" id="inputnmStatus">
							</div>
							<div class="form-floating">
								<input type="text" name="txtnmCheckno" class="form-control" id="inputnmCheckno" placeholder="Check No." autocomplete="off" required style="height: 70pt;">
								<label for="inputnmCheckno">Check No.</label>
							</div>
							<div class="alert alert-warning" role="alert" id="inputnmpromptexist" style="display: none;">
							  Check No. is already exist.
							</div>

							<div id="divAddtl" style="background-color: #e8e6e6; margin-bottom: 1em; display: none;">
								<div class="card-body">
									<h6>Deposit to:</h6>
									<div class="form-floating">
										<input type="text" name="txtnmDepositedAccountno" class="form-control" id="inputnmDepositedaccountno" placeholder="Partner Account" autocomplete="off" required style="background-color: #cccaca; border-color: transparent; height: 70pt;">
										<label for="inputnmDepositedaccountno">Mother Account</label>
									</div>
									<table id="tblPartner" class="table table-hover table-light" style="width: 100%; display: none;">
										<tbody></tbody>
									</table>
									<div class="form-floating">
										<input type="text" name="txtnmDepositedpartner" class="form-control" id="inputnmDepositedpartner" placeholder="Partner" autocomplete="off" required style="background-color: #cccaca; border-color: transparent; height: 70pt;">
										<label for="inputnmDepositedpartner">Account Name</label>
									</div>
									<div class="form-floating">
										<input type="text" name="txtnmDepositedbank" class="form-control" id="inputnmDepositedbank" placeholder="Partner Account" autocomplete="off" required style="background-color: #cccaca; border-color: transparent; height: 70pt;">
										<label for="inputnmDepositedbank">Bank</label>
									</div>
								</div>
							</div>
						</form>
					</div>
					<hr>
					<button style="float: left; font-size: 13pt; padding: 0.5rem; border-radius: 5px;" id="btnDebit" data-bs-target="#modalConfirmation" data-bs-toggle="modal"  role="button" disabled>Debit (<i class="fa-solid fa-minus"></i>)</button>
					<button style="float: right; font-size: 13pt; padding: 0.5rem; border-radius: 5px;" id="btnCredit" href="#modalConfirmation" data-bs-toggle="modal"  role="button" disabled>Credit (<i class="fa-solid fa-plus"></i>)</button>
				</div>
			</div>
	</div>
	<div class="col-md-3"></div>
</div>
<div class="modal fade" id="staticDebitBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="background-color: transparent; border-color: transparent;">
      <div class="modal-body">
        <div class="card mb-3" style="max-width: 540px; background-color: #FFCC33;">
		  <div class="row g-0">
		    <div class="col-md-4" style="background-color: #CFA527;">
		      <i class="far fa-question-circle" style="padding-top: 70px; padding-left: 25px; font-size: 80pt; color: red;"></i>
		    </div>
		    <div class="col-md-8">
		    	<div class="row">
		    		<div class="col-md-2 ms-auto">
		    			<i class="fa-solid fa-xmark" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 30pt; color: white;" id="btnCloseModal"></i>
		    		</div>
		    	</div>
		      <div class="card-body" style="cursor: default;">
		        <h5 class="card-title" style="color: red;">Alert!</h5>
		        <p class="card-text" id="inputpcardtext">Do you want to save a debit transaction on this account?</p>
		        <p><button class="btn btn-success" id="btnDebitYes">Yes</button><button class="btn btn-danger" data-bs-dismiss="modal">No</button></p>
		        <p class="card-text" style="color: black;"><small>Cash Balance Portal</small></p>
		      </div>
		    </div>
		  </div>
		</div>
      </div>
    </div>
  </div>
</div>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticDebitBackdrop" id="btnDebitConfirm" hidden>
  Launch modal
</button>

<div class="modal fade" id="staticCreditBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="background-color: transparent; border-color: transparent;">
      <div class="modal-body">
        <div class="card mb-3" style="max-width: 540px; background-color: #FFCC33;">
		  <div class="row g-0">
		    <div class="col-md-4" style="background-color: #CFA527;">
		      <i class="far fa-question-circle" style="padding-top: 70px; padding-left: 25px; font-size: 80pt; color: red;"></i>
		    </div>
		    <div class="col-md-8">
		    	<div class="row">
		    		<div class="col-md-2 ms-auto">
		    			<i class="fa-solid fa-xmark" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 30pt; color: white;" id="btnCloseCreditModal"></i>
		    		</div>
		    	</div>
		      <div class="card-body" style="cursor: default;">
		        <h5 class="card-title" style="color: red;">Alert!</h5>
		        <p class="card-text" id="inputpcardtext">Do you want to save a credit transaction on this account?</p>
		        <p><button class="btn btn-success" id="btnCreditYes">Yes</button><button class="btn btn-danger" data-bs-dismiss="modal">No</button></p>
		        <p class="card-text" style="color: black;"><small>Cash Balance Portal</small></p>
		      </div>
		    </div>
		  </div>
		</div>
      </div>
    </div>
  </div>
</div>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticCreditBackdrop" id="btnCreditConfirm" hidden>
  Launch modal
</button>
<script type="text/javascript">
	$(document).ready(function(){
		$("#headerTitle").text("Accounting Entry");
		$("#inputnmAccountno").focus();
		fresh();

		function fresh(){
			$("#inputnmIssued").val("No");
			$("#inputnmStatus").val("N/A");
			$("#inputnmDepositedaccountno").val("N/A");
			$("#inputnmDepositedpartner").val("N/A");
			$("#inputnmDepositedbank").val("N/A");
		}
		$(document).on("keyup","#inputnmAccountno",function(e){
			e.preventDefault();
			empty();
		})

		function empty(){
			var inputnmAccountno = $("#inputnmAccountno").val();

			if(inputnmAccountno==("")>0){
				$("#tblBankAccount").hide();
			}else{
				viewaccountno_v();
			}
		}

		function viewaccountno_v(){
			$.ajax({
				type:'ajax',
				method:'POST',
				url:'<?php echo base_url("Transaction/viewaccountno_c"); ?>',
				data:$("#frmInputs,#inputnmDepartment").serialize(),
				dataType:'json',
				success:function(response){
					if(response.success){
						var tbody = '';

						response.data.forEach(function(tbl){
							tbody += `<tr data-bankname="${tbl['bankname']}" data-type="${tbl['type']}" data-accountno="${tbl['accountno']}" data-accountname="${tbl['accountname']}" data-begbalance="${tbl['begbalance']}" data-currency="${tbl['currency']}" data-department="${tbl['department']}" data-banklogo="${tbl['banklogo']}" id="btnSelectAccountno">
								<td style="padding-top: 10px; padding-bottom: 10px; font-size: 11pt; text-align: left; font-weight: bold;">ACCOUNT <i class="fa-solid fa-hashtag"></i>: ${tbl['accountno']}</td>
								<td style="padding-top: 10px; padding-bottom: 10px; font-size: 11pt; text-align: left;">Beginning Balance: ${tbl['begbalance']}</td>
								<td style="text-align:right;"><img src="../logo/${tbl['banklogo']}" style="height: 20px;"></td>
							</tr>`;
						})
						$("#tblBankAccount").html(tbody);
						$("#tblBankAccount").fadeIn(500);
					}else{
						var tbody = '';

						tbody += `<tr style="text-align: center; background-color: #BAB6B6; height: 30pt;">
							<td colspan="3"><i class="fa-solid fa-user-slash" style="color: red;"></i> No Records found.</td>
						</tr>`;
						$("#tblBankAccount").html(tbody);
						$("#tblBankAccount").fadeIn(500);
					}
				}
			})
		}

		$(document).on("click","#btnSelectAccountno",function(e){
			e.preventDefault();

			$("#inputnmAccountno").val($(this).attr("data-accountno"));
			$("#inputnmAccountname").val($(this).attr("data-accountname"));
			$("#inputnmType").val($(this).attr("data-type"));
			$("#inputnmBegBalance").val($(this).attr("data-begbalance"));
			$("#inputnmCurrency").val($(this).attr("data-currency"));
			$("#inputnmBank").val($(this).attr("data-bankname"));
			$("#inputnmBanklogo").val($(this).attr("data-banklogo"));
			$("#tblBankAccount").hide();
			$("#inputnmAmount").focus();
			$("#btnCredit").removeAttr("disabled","disabled");
			$("#btnDebit").removeAttr("disabled","disabled");
		})

		$(document).on("keyup","#inputnmCheckno",function(e){
	    	e.preventDefault();
	    	var inputnmCheckno = $("#inputnmCheckno").val();

	    	if(inputnmCheckno==("")>0){
	    		$("#divAddtl").fadeOut(500);
	    		$("#inputnmIssued").val("No");
	    		$("#inputnmStatus").val("N/A");
	    		$("#inputnmDepositedaccountno").val("N/A");
	    		$("#inputnmDepositedpartner").val("N/A");
	    		$("#inputnmDepositedbank").val("N/A");
	    	}else{
	    		$("#divAddtl").fadeIn(20);
	    		$("#inputnmIssued").val("Yes");
	    		$("#inputnmStatus").val("Released");
	    		$("#inputnmDepositedaccountno").val("");
	    		$("#inputnmDepositedpartner").val("");
	    		$("#inputnmDepositedbank").val("");
	    		verifyCheckno_v();
	    	}
	    })

	    function verifyCheckno_v(){
			$.ajax({
				type:'ajax',
				method:'POST',
				url:'<?php echo base_url("Transaction/verifyCheckno_c"); ?>',
				data:$("#inputnmCheckno").serialize(),
				dataType:'json',
				success:function(response){
					if(response.success){
						$("#inputnmCheckno").css("border-color","red");
						$("#inputnmpromptexist").fadeIn(1000).fadeOut(500);
						$("#btnDebit").attr("disabled","disabled");
						$("#btnCredit").attr("disabled","disabled");

					}else{
						$("#inputnmCheckno").css("border-color","green");
						$("#btnDebit").removeAttr("disabled","disabled");
						$("#btnCredit").removeAttr("disabled","disabled");
					}
				}
			})
		}

	    $("#inputnmDepositedaccountno").keyup(function(e){
	    	e.preventDefault();
	    	viewPartneraccountno_v();
	    })

	    function ifemptyinputnmDepositedaccountno(){
	    	var inputnmDepositedaccountno = $("#inputnmDepositedaccountno").val();

	    	if(inputnmDepositedaccountno==("")>0){
	    		$("#tblPartner").fadeOut(500);
	    	}else{
	    		viewPartneraccountno_v();
	    	}
	    }

	    function viewPartneraccountno_v(){
	    	$.ajax({
	    		type:'ajax',
	    		method:'POST',
	    		url:'<?php echo base_url("Transaction/viewPartneraccountno_c") ?>',
	    		data:$("#inputnmDepositedaccountno,#inputnmDepartment").serialize(),
	    		dataType:'json',
	    		success:function(response){
	    			if(response.success){
	    				var tbody = '';

	    				response.viewAccountno.forEach(function(tbl){
	    					tbody += `<tr data-bank="${tbl['bank']}" data-accountno="${tbl['accountno']}" data-partner="${tbl['partner']}" id="btnSelectedAccountno" style="text-align: center; cursor: pointer;">
	    						<td>${tbl['bank']}</td>
	    						<td>${tbl['accountno']}</td>
	    						<td>${tbl['partner']}</td>
	    					</tr>`;
	    				})
	    				$("#tblPartner tbody").html(tbody);
	    				$("#tblPartner").fadeIn(500);
	    			}else{
	    				var tbody ='';
	    				tbody += `<tr>
	    					<td colspan="3">No Records found.</td>
	    				</tr>`;
	    			}
	    		},error:function(response){
	    			console("error line 449");
	    		}
	    	})
	    }

	    $(document).on("click","#btnSelectedAccountno",function(e){
	    	e.preventDefault();

	    	$("#inputnmDepositedaccountno").val($(this).attr("data-accountno"));
	    	$("#inputnmDepositedpartner").val($(this).attr("data-partner"));
	    	$("#inputnmDepositedbank").val($(this).attr("data-bank"));
	    	$("#tblPartner").fadeOut(500);
	    })

		$(document).on("click","#btnDebit",function(e){
			e.preventDefault();
			var inputnmAmount = $("#inputnmAmount").val();
			$("#inputnmDebit").val(inputnmAmount);
			$("#inputnmCredit").val("0.00");
			$("#inputnmTransactionstatus").val("Debit");
			emptyfieldsDebit();
		})

		function emptyfieldsDebit(){
			var inputnmAccountno = $("#inputnmAccountno").val();
			var inputnmAmount = $("#inputnmAmount").val();
			var inputnmDate = $("#inputnmDate").val();
			var inputnmCheckno = $("#inputnmCheckno").val();

			if(inputnmAccountno==("")>0){
				$("#inputnmAccountno").css("border-bottom-color","red");
			}else if(inputnmAmount==("")>0){
				$("#inputnmAmount").css("border-bottom-color","red");
			}else if(inputnmDate==("")>0){
				$("#inputnmDate").css("border-bottom-color","red");
			}else if(inputnmCheckno==("")>0){
				$("#btnDebitConfirm").click();
				debit();
			}else{
				debitemptyfield();
			}
		}

		function debitemptyfield(){
			var inputnmDepositedaccountno = $("#inputnmDepositedaccountno").val();

			if(inputnmDepositedaccountno==("")>0){
				alert("This transaction seems to have a deposit account.");
			}else{
				$("#btnDebitConfirm").click();
				debit();
				$("#divAddtl").fadeOut(500);
			}
		}

		function debit(){
			var inputnmBegBalance = $("#inputnmBegBalance").val().replace(/,/g,'');
			var inputnmDebit = $("#inputnmDebit").val().replace(/,/g,'');
			var decimal,fixedtwo;

			total = inputnmBegBalance - inputnmDebit;

			$("#inputnmEndBalance").val(total);
			decimal = parseFloat($("#inputnmEndBalance").val());
            fixedtwo = $("#inputnmEndBalance").val(decimal.toFixed(2));
            $("#inputnmEndBalance").keyup();
		}

		$(document).on("click","#btnCredit",function(e){
			e.preventDefault();
			var inputnmAmount = $("#inputnmAmount").val();
			$("#inputnmCredit").val(inputnmAmount);
			$("#inputnmDebit").val("0.00");
			$("#inputnmTransactionstatus").val("Credit");
			emptyfieldsCredit();
		})

		function emptyfieldsCredit(){
			var inputnmAccountno = $("#inputnmAccountno").val();
			var inputnmAmount = $("#inputnmAmount").val();
			var inputnmDate = $("#inputnmDate").val();

			if(inputnmAccountno==("")>0){
				$("#inputnmAccountno").css("border-bottom-color","red");
			}else if(inputnmAmount==("")>0){
				$("#inputnmAmount").css("border-bottom-color","red");
			}else if(inputnmDate==("")>0){
				$("#inputnmDate").css("border-bottom-color","red");
			}else{
				$("#btnCreditConfirm").click();
				credit();
			}
		}

		function credit(){
			var inputnmBegBalance = $("#inputnmBegBalance").val().replace(/,/g,'');
			var inputnmCredit = $("#inputnmCredit").val().replace(/,/g,'');
			var decimal,fixedtwo;

			total = inputnmBegBalance++ + +inputnmCredit;

			$("#inputnmEndBalance").val(total);
			decimal = parseFloat($("#inputnmEndBalance").val());
      		fixedtwo = $("#inputnmEndBalance").val(decimal.toFixed(2));
      		$("#inputnmEndBalance").keyup();
		}

		$(document).on("click","#btnDebitYes",function(e){
			e.preventDefault();
			insert_v();
		})

		$(document).on("click","#btnCreditYes",function(e){
			e.preventDefault();
			insert_v();
		})

		function insert_v(){
			$.ajax({
				type:'ajax',
				method:'POST',
				url:'<?php echo base_url("Transaction/insert_c"); ?>',
				data:$("#frmInputs,#inputnmDepartment").serialize(),
				dataType:'json',
				success:function(response){
					if(response.success){
						$("#btnCloseModal").click();
						$("#btnCloseCreditModal").click();
						update_v();
						
					}else{

					}
				}
			})
		}

		function update_v(){
			$.ajax({
				type:'ajax',
				method:'POST',
				url:'<?php echo base_url("Transaction/update_c"); ?>',
				data:$("#frmInputs").serialize(),
				dataType:'json',
				success:function(response){
					if(response.success){
						var inputnmEndBalance = $("#inputnmEndBalance").val();
						var inputnmAccountno = $("#inputnmAccountno").val();
						alert("The "+inputnmAccountno+" balance is "+inputnmEndBalance+".");
						location.reload();
					}else{

					}
				}
			})
		}

		$('#inputnmAmount,#inputnmEndBalance').keyup(function(event){

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

	    $('#inputnmAmount').keypress(function (e) {    
    
			var charCode = (e.which) ? e.which : event.keyCode    
			if (String.fromCharCode(charCode).match(/[^0-9,.]/g))
			return false;                        

		});

		 $('#inputnmAmount').keyup(function (e) {    
    
			var charCode = (e.which) ? e.which : event.keyCode    
			if (String.fromCharCode(charCode).match(/[^0-9,.]/g))
			return false;                        

		});
	})
</script>