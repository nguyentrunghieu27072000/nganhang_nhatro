<?php 
	class Mtrangchu extends MY_Model
	{
		function dsxa($mahuyen){
			$this->db->where('mahuyen',$mahuyen);
			return $this->db->get('dm_xa')->result_array();
		}
		function upload($maphong,$duongdan,$ghichu){
			$anh = array(
				'id_anh'	=> $maphong,
				'link_anh' 	=> $duongdan,
				'ghichu' 	=> $ghichu
			);
			$this->db->insert('tbl_hinhanh',$anh);
			return $this->db->affected_rows();
		}
		function dsmaanh(){
			$this->db->select('id_anh');
			$this->db->group_by('id_anh'); 
			return $this->db->get('tbl_hinhanh')->result_array();
		}
		function groupha($maphong){
			$this->db->select('link_anh');
			$this->db->where('ma_nhatro',$maphong);
			$ds = $this->db->get('tbl_hinhanh')->result_array();
			$dsha = array();
			foreach ($ds as $key => $value) {
				array_push($dsha,$value['link_anh']);
			}
			return $dsha;
		}
		function dsphongtro(){
			$this->db->select('*');
			return $this->db->get('tbl_phongtro')->result_array();
		}
		function get_tenhuyen($id_xa){
			$this->db->select('tenhuyen');
			$this->db->where('maxa',$id_xa);
			$this->db->from('dm_huyen');
			$this->db->join('dm_xa','dm_xa.mahuyen=dm_huyen.mahuyen','inner');
			return $this->db->get()->row_array();
		}
		function gettenphuong($maphuong){
			$this->db->select('tenhuyen');
			$this->db->where('mahuyen',$maphuong);
			$tenhuyen = $this->db->get('dm_huyen')->row_array();
			return $tenhuyen;
		}
		function gettenduonng($maduong){
			$this->db->select('tenxa');
			$this->db->where('maxa',$maduong);
			$tenhuyen = $this->db->get('dm_xa')->row_array();
			return $tenhuyen;
		}
		function get_dsanh($maphong){
			$this->db->select('*');
			$this->db->where('ma_nhatro',$maphong);
			return $this->db->get('tbl_hinhanh')->result_array();
		}
		function getthongtin($maphong){
			$this->db->select('*');
			$this->db->where('ma_nhatro',$maphong);
			$this->db->from('tbl_phongtro');
			$this->db->join('tbl_user','tbl_user.ma_user=tbl_phongtro.user_id','inner');
			return $this->db->get()->row_array();
		}
		function get_dstiennghi($maphong){
			$this->db->select('id_tiennghi');
			$this->db->where('id_nhatro',$maphong);
			return $this->db->get('tbl_tiennghi_nhatro')->result_array();
		}
		function gettentiennghi($matiennghi){
			$this->db->select('ten_tiennghi');
			$this->db->where('id_tiennghi',$matiennghi);
			return $this->db->get('tbl_tienghi')->row_array();
		}
		/*function getdschothue(){
			$this->db->select('*');
			$this->db->where('ma_loai_nhatro',1);
			$this->db->join('')
		}*/
	}
 ?>