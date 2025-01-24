<?php 
	/**
	 * 
	 */
	class transaction_m extends CI_Model
	{
		function viewaccountno_m($accountno,$department){
			$query = $this->db->query("SELECT * FROM `tblbank` WHERE accountno LIKE '%$accountno%' AND department='$department' ORDER BY bankname,accountno,currency ASC;")->result_array();

			if(count($query)>0){
				return $query;
			}else{
				return array();
			}
		}

		function insert_m($values){
			$this->db->insert("tbltransaction",$values);

			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}

		function update_m($accountno,$values){
			$this->db->where("accountno",$accountno);
			$this->db->update("tblbank",$values);

			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}

		function viewPartneraccountno_m($accountno,$department){
			$query = $this->db->query("SELECT * FROM `tblpartner` WHERE accountno LIKE '%$accountno%' AND department='$department' AND status='Active' ORDER BY accountno ASC;")->result_array();

			if(count($query)>0){
				return $query;
			}else{
				return array();
			}
		}

		function verifyCheckno_m($checkno){
			$query = $this->db->query("SELECT checkno FROM `tbltransaction` WHERE checkno='$checkno'")->result_array();

			if($query){
				return $query;
			}else{
				return array();
			}
		}
	}
?>