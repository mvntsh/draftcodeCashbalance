<?php
	/**
	 * 
	 */
	class bankaccount extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->model("bankaccount_m");
		}

		function index(){
			$this->load->view("common/header_v");
			$this->load->view("common/navbar_v");
			$this->load->view("bankaccount_v");
			$this->load->view("common/footer_v");
		}

		function insert_c(){
			$data["success"] = false;

			$values = array(
				'bankname' => $this->input->post("txtnmBankname"),
				'type' => $this->input->post("txtnmAccounttype"),
				'accountno' => $this->input->post("txtnmAccountno"),
				'accountname' => $this->input->post("txtnmAccountname"),
				'begbalance' => $this->input->post("txtnmBegbalance"),
				'currency' => $this->input->post("txtnmCurrency"),
				'department' => $this->input->post("txtnmAssign"),
				'banklogo' => $this->input->post("txtnmLogo"),
				'date' => $this->input->post("txtnmCurrent"),
				'accountstatus' => $this->input->post("txtnmStatus")
			);

			$response = $this->bankaccount_m->insert_m($values);

			if($response){
				$data["success"] = true;
			}
			echo json_encode($data);
		}

		function currentdate_c(){
			$data["success"] = false;

			$data["data"] = $this->bankaccount_m->currentdate_m();

			if(count($data["data"])>0){
				$data["success"] = true;
			}
			echo json_encode($data);
		}

		function exist_c(){
			$data["success"] = false;

			$accountno = $this->input->post("txtnmAccountno");			

			$response = $this->bankaccount_m->exist_m($accountno);

			if($response){
				$data["success"] = true;
			}
			echo json_encode($data);
		}

		function viewbankdetail_c(){
			$data["success"] = false;

			$data["data"] = $this->bankaccount_m->viewbankdetail_m();

			if(count($data["data"])>0){
				$data["success"] = true;
			}
			echo json_encode($data);
		}

		function viewlogo_c(){
			$data["success"] = false;

			$bankname = $this->input->post("txtnmBankname");

			$data["data"] = $this->bankaccount_m->viewlogo_m($bankname);

			if(count($data["data"])>0){
				$data["success"] = true;
			}
			echo json_encode($data);
		}
	}
?>