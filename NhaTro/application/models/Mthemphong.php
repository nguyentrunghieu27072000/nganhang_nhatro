<?php  
	/**
	 * 
	 */
	class Mthemphong extends MY_Model
	{
		public function get_huyen(){
			return $this->db->get('dm_huyen')->result_array();
		}
		public function get_xa($mahuyen){
			$this->db->where('mahuyen',$mahuyen);
			return $this->db->get('dm_xa')->result_array();
		}
		public function get_loai_nhatro(){
			return $this->db->get('tbl_loainhatro')->result_array();
		}

		public function get_thongtinNhaTro($maphong){
			$this->db->where("tbl_phongtro.ma_nhatro", $maphong);
			return $this->db->get("tbl_phongtro")->row_array();
 		}
 		function get_dstiennghi($maphong){
			$this->db->where('tbl_tiennghi_nhatro.id_nhatro',$maphong);
			$this->db->join("tbl_tiennghi", "tbl_tiennghi_nhatro.id_tiennghi = tbl_tiennghi.id_tiennghi");
			return $this->db->get('tbl_tiennghi_nhatro')->result_array();
		}

		public function tienghi_hethong($arr){
			$this->db->where_not_in("id_tiennghi",$arr);
			return $this->db->get('tbl_tiennghi')->result_array();
		}

		public function delete_tiennghi($id_nhatro){
			$this->db->where("id_nhatro", $id_nhatro);
			$this->db->delete("tbl_tiennghi_nhatro");
			return $this->db->affected_rows();
		}

		public function delete_hinhanh($mahinhanh, $id_tro){
			$this->db->where_not_in("id_anh", $mahinhanh);
			$this->db->where("ma_nhatro", $id_tro);
			$this->db->where("ghichu", NULL);
			// $link =  $this->db->get("tbl_hinhanh")->result_array();
			// pr($link);
			$this->db->delete("tbl_hinhanh");

			return $this->db->affected_rows();
		}

		public function delete_avata($ma_tro){
			$this->db->where("ghichu","avata");
			$this->db->where("ma_nhatro", $ma_tro);
			$link =  $this->db->get("tbl_hinhanh")->result_array();
			unlink($link[0]['link_anh']);
			$this->db->where("ghichu","avata");
			$this->db->where("ma_nhatro", $ma_tro);
			$this->db->delete("tbl_hinhanh");
			return $this->db->affected_rows();
		}
	}
?>