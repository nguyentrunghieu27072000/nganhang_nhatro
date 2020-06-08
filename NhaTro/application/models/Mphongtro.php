<?php  
	/**
	 * 
	 */
	class Mphongtro extends MY_Model
	{
		public function dsPhongTro($user){
			$this->db->select("tbl_phongtro.ma_nhatro, tbl_phongtro.ngaydang, tbl_phongtro.diachi, tbl_phongtro.id_trangthai, tbl_phongtro.ten_nhatro, tbl_loainhatro.ten_loai_nhatro");
			$this->db->from("tbl_phongtro");
			$this->db->where("tbl_phongtro.user_id", $user);
			$this->db->join("tbl_loainhatro", "tbl_loainhatro.id_loai = tbl_phongtro.ma_loai_nhatro ");
			return $this->db->get()->result_array();
		}

		public function xoaphongtro($maphong){
			$this->db->where("ma_nhatro", $maphong);
			$this->db->from("tbl_hinhanh");
			$re = $this->db->get()->result_array();
			foreach ($re as $key => $value) {
				if(!file_exists($value['link_anh'])){
					unlink($value['link_anh']);
				}
			}
			$this->db->where("ma_nhatro", $maphong);
			$this->db->delete(" tbl_hinhanh");
			$this->db->where("id_nhatro", $maphong);
			$this->db->delete("tbl_tiennghi_nhatro");
			$this->db->where("ma_nhatro", $maphong);
			$this->db->delete("tbl_phongtro");
			return $this->db->affected_rows();
		}

		public function get_maphong($id){
			$this->db->where("ma_nhatro", $id);
			return $this->db->get("tbl_phong")->result_array();
		}
	}
?>