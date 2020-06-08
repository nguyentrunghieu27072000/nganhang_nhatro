<?php 
	class Mtrangchu extends MY_Model
	{
		function dsxa($mahuyen){
			$this->db->where('mahuyen',$mahuyen);
			return $this->db->get('dm_xa')->result_array();
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
			$this->db->where('tbl_tiennghi_nhatro.id_nhatro',$maphong);
			$this->db->join("tbl_tiennghi", "tbl_tiennghi_nhatro.id_tiennghi = tbl_tiennghi.id_tiennghi");
			return $this->db->get('tbl_tiennghi_nhatro')->result_array();
		}
		
		function getdschothue(){
			$this->db->select('tbl_phongtro.*,dm_huyen.tenhuyen,dm_xa.tenxa');
			$this->db->join('dm_xa','dm_xa.maxa=tbl_phongtro.id_xa','inner');
			$this->db->join('dm_huyen','dm_huyen.mahuyen=dm_xa.mahuyen','inner');
			$this->db->where('tbl_phongtro.ma_loai_nhatro',2);
			return $this->db->get('tbl_phongtro')->result_array();
		}
		function get_anhtieudiem($maphong){
			$this->db->select('link_anh');
			$this->db->where('ma_nhatro',$maphong);
			 return $this->db->get('tbl_hinhanh')->result_array();
		}
		function getMenu(){
			$this->db->order_by("stt");
			return $this->db->get("tbl_loainhatro")->result_array();
		}

		function danhsachphong($maphong){
			$this->db->select('tbl_phongtro.ma_nhatro, tbl_hinhanh.link_anh');
			$this->db->not_like('tbl_phongtro.ma_nhatro',$maphong);
			$this->db->join('tbl_hinhanh','tbl_phongtro.ma_nhatro=tbl_hinhanh.ma_nhatro','inner');
			$this->db->group_by('tbl_phongtro.ma_nhatro');
			return $this->db->get('tbl_phongtro')->result_array();
		}
		public function dsphongtro($page, $soluong){
			$page = ($page - 1) * $soluong;
			$this->db->select('tbl_phongtro.ma_nhatro,tbl_phongtro.ma_loai_nhatro,tbl_phongtro.ten_nhatro,tbl_phongtro.id_xa,tbl_phongtro.diachi,tbl_phongtro.dientich,tbl_phongtro.ngaydang,tbl_phongtro.giaphong,tbl_phongtro.id_trangthai,tbl_phongtro.ngaydang,dm_huyen.tenhuyen,dm_xa.tenxa');

			$this->db->join('dm_xa','dm_xa.maxa=tbl_phongtro.id_xa','inner');
			$this->db->join('dm_huyen','dm_huyen.mahuyen=dm_xa.mahuyen','inner');
			$this->db->order_by('tbl_phongtro.ngaydang', 'desc');
			$this->db->order_by('tbl_phongtro.ma_nhatro', 'desc');
			return $this->db->get('tbl_phongtro', $soluong, $page)->result_array();
		}
		public function layPhongTroPage($page, $soluong){
			$page = ($page - 1) * $soluong;
			$this->db->select('tbl_phongtro.ma_nhatro,tbl_phongtro.ten_nhatro,tbl_phongtro.id_xa,tbl_phongtro.diachi,tbl_phongtro.dientich,tbl_phongtro.ngaydang,tbl_phongtro.giaphong,tbl_phongtro.id_trangthai,STR_TO_DATE(tbl_phongtro.ngaydang, "%Y-%m-%d") as ngaydang,dm_huyen.tenhuyen,dm_xa.tenxa');
			$this->db->join('dm_xa','dm_xa.maxa=tbl_phongtro.id_xa','inner');
			$this->db->join('dm_huyen','dm_huyen.mahuyen=dm_xa.mahuyen','inner');
			$this->db->where('tbl_phongtro.ma_loai_nhatro',2);
			$this->db->order_by('ngaydang', 'desc');
			$this->db->order_by('tbl_phongtro.ma_nhatro', 'desc');
			return $this->db->get('tbl_phongtro', $soluong, $page)->result_array();
		}

		public function getList($ma_loai){
			// $this->db->limit($total, $start);
			$this->db->select('tbl_phongtro.ma_nhatro,tbl_phongtro.ten_nhatro,tbl_phongtro.id_xa,tbl_phongtro.diachi,tbl_phongtro.dientich,tbl_phongtro.ngaydang,tbl_phongtro.giaphong,tbl_phongtro.id_trangthai, tbl_phongtro.ngaydang,dm_huyen.tenhuyen,dm_xa.tenxa, tbl_loainhatro.ten_loai_nhatro');
			$this->db->join('dm_xa','dm_xa.maxa=tbl_phongtro.id_xa','inner');
			$this->db->join('dm_huyen','dm_huyen.mahuyen=dm_xa.mahuyen','inner');
			$this->db->join('tbl_loainhatro', 'tbl_loainhatro.id_loai = tbl_phongtro.ma_loai_nhatro ');
			$this->db->where('tbl_phongtro.ma_loai_nhatro',$ma_loai);
			$this->db->order_by('ngaydang', 'desc');
			$this->db->order_by('tbl_phongtro.ma_nhatro', 'desc');
			$query = $this->db->get("tbl_phongtro");
			return $query->result_array();
		}


		public function layTongSoNhaTro(){
			$this->db->select('count(ma_nhatro) as soluong');
			return $this->db->get('tbl_phongtro')->row_array()['soluong'];
		}

		public function get_dsPhongLienQuan($ma_nhatro){

			$this->db->where_not_in("ma_nhatro", $ma_nhatro);
			$this->db->order_by("ma_nhatro","RANDOM");
			return $this->db->get("tbl_phongtro")->result_array();
		}

		public function timkiem($quan, $phuong, $loainhatro, $gia, $search){
			$this->db->from("tbl_phongtro");
			if(!empty($phuong)){
				$this->db->where("tbl_phongtro.id_xa", $phuong);
			}
			if(!empty($loainhatro)){
				$this->db->where("tbl_phongtro.ma_loai_nhatro", $loainhatro);
			}
			if(!empty($gia[0])){
				$this->db->where("tbl_phongtro.giaphong >=",$gia[0]);
				$this->db->where("tbl_phongtro.giaphong <=",$gia[1]);
			}
			if(!empty($search)){
				$this->db->like("tbl_phongtro.diachi", $search);
				$this->db->or_like("tbl_phongtro.mota_phong", $search);
				$this->db->or_like("tbl_phongtro.ten_nhatro", $search);
				$this->db->or_like("tbl_phongtro.ngaydang", $search);
				$this->db->or_like("tbl_phongtro.ngaydang", $search);
				$this->db->or_like("tbl_phongtro.dientich", $search);
				$this->db->or_like("tbl_phongtro.giaphong", $search);
			}
			return $this->db->get()->result_array();
		}

	}
 ?>