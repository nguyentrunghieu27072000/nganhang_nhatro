<?php 
	class Mdangky extends CI_Model{
		public function add_taikhoan($tk){
			$this->db->insert('tbl_user',$tk);
			return $this->db->affected_rows();
		}
		public function check_tk($sdt){
			$this->db->where('sdt',$sdt);
			return $this->db->get('tbl_user')->row_array();
		}
	}
 ?>