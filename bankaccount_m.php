<?php 
	/**
	 * 
	 */
	class bankaccount_m extends CI_Model{
		
		function insert_m($values){
			$this->db->insert("tblbank",$values);

			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}

		function currentdate_m(){
			$query = $this->db->query("SELECT CURDATE() as current;")->result_array();

			if(count($query)>0){
				return $query;
			}else{
				return array();
			}
		}

		function exist_m($accountno){
			$query = $this->db->query("SELECT * FROM tblbank WHERE accountno='$accountno'")->result_array();

			if(count($query)>0){
				return $query;
			}else{
				return array();
			}
		}

		function viewbankdetail_m(){
			$query = $this->db->query("SELECT * FROM tblbankdetails ORDER BY abbreviation ASC;")->result_array();

			if(count($query)>0){
				return $query;
			}else{
				return array();
			}
		}

		function viewlogo_m($bankname){
			$query = $this->db->query("SELECT * FROM tblbankdetails WHERE abbreviation='$bankname'")->result_array();

			if(count($query)>0){
				return $query;
			}else{
				return array();
			}
		}
	}
?>