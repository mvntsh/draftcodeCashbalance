<?php 
	/**
	 * 
	 */
	class Transaction extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model("transaction_m");
		}

		function index(){
			$this->load->view("common/header_v");
			$this->load->view("common/navbar_v");
			$this->load->view("transaction_v");
			$this->load->view("common/footer_v");
		}

		function viewaccountno_c(){
			$data["success"] = false;

			$accountno = $this->input->post("txtnmAccountno");
			$department = $this->input->post("txtnmDepartment");

			$data["data"] = $this->transaction_m->viewaccountno_m($accountno,$department);

			if(count($data["data"])>0){
				$data["success"] = true;
			}
			echo json_encode($data);
		}

		function insert_c(){
			$data["success"] = false;

			$values = array(
				'accountno' => $this->input->post("txtnmAccountno"),
				'accountname' => $this->input->post("txtnmAccountname"),
				'type' => $this->input->post("txtnmType"),
				'begbalance' => $this->input->post("txtnmBegbalance"),
				'debit' => $this->input->post("txtnmDebit"),
				'credit' => $this->input->post("txtnmCredit"),
				'endbalance' => $this->input->post("txtnmEndBalance"),
				'currency' => $this->input->post("txtnmCurrency"),
				'bankname' => $this->input->post("txtnmBank"),
				'user' => $this->input->post("txtnmUsername"),
				'date' => $this->input->post("txtnmDate"),
				'department' => $this->input->post("txtnmDepartment"),
				'banklogo' => $this->input->post("txtnmBanklogo"),
				'checkno' => $this->input->post("txtnmCheckno"),
				'issued' => $this->input->post("txtnmIssue"),
				'status' => $this->input->post("txtnmStatus"),
				'depositedaccountno' => $this->input->post("txtnmDepositedAccountno"),
				'depositedpartner' => $this->input->post("txtnmDepositedpartner"),
				'depositedbank' => $this->input->post("txtnmDepositedbank")
			);

			$response = $this->transaction_m->insert_m($values);

			if($response){
				$data["success"] = true;
			}
			echo json_encode($data);
		}

		function update_c(){
			$data["success"] = false;

			$accountno = $this->input->post("txtnmAccountno");
			$values = array(
				'begbalance' => $this->input->post("txtnmEndBalance"),
				'date' => $this->input->post("txtnmDate")
			);

			$response = $this->transaction_m->update_m($accountno,$values);

			if($response){
				$data["success"] = true;
			}
			echo json_encode($data);
		}

		function viewPartneraccountno_c(){
			$data["success"] = false;

			$accountno = $this->input->post("txtnmDepositedAccountno");
			$department = $this->input->post("txtnmDepartment");

			$data["viewAccountno"] = $this->transaction_m->viewPartneraccountno_m($accountno,$department);

			if(count($data["viewAccountno"])>0){
				$data["success"] = true;
			}
			echo json_encode($data);
		}

		function verifyCheckno_c(){
			$data["success"] = false;

			$checkno = $this->input->post("txtnmCheckno");

			$response = $this->transaction_m->verifyCheckno_m($checkno);

			if($response){
				$data["success"] = true;
			}
			echo json_encode($data);
		}
	}
?>