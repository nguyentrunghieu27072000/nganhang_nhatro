<?php  
	
	class Cthemphong extends MY_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Mthemphong');
		}
		public function index(){
			$session = $this->session->userdata('user');

			$ds_huyen = $this->Mthemphong->get_huyen();
			$ds_loai_nhatro = $this->Mthemphong->get_loai_nhatro(); 
			$getChiTietPhong = [];
			if($this->input->post('get_xa')){
				$mahuyen = $this->input->post('quan');
				$this->get_xa($mahuyen);
			}
			$action = $this->input->post('themphongtro');
			if($action){
				$this->add($session);
			}
			if($this->input->get("trangthai") == "suaphong"){
				$ma_nhatro = $this->input->get("maphong");
				$getChiTietPhong = $this->Mthemphong->get_thongtinNhaTro($ma_nhatro);
				if(empty($getChiTietPhong) || $getChiTietPhong['user_id'] != $session['ma_user']){
	                setMessages("warning", "Bạn không thể sửa phòng này!", "Thông báo");
					return redirect("ds_phong");
				}
				$getChiTietPhong['huyen'] = $this->Mthemphong->get_where_row("dm_xa", "maxa", $getChiTietPhong['id_xa'])['mahuyen'];
		    	$getChiTietPhong['hinhanh_avata'] = $this->Mthemphong->get_many_where("tbl_hinhanh", array("ma_nhatro" => $ma_nhatro, "ghichu" => "avata"));
		    	$getChiTietPhong['hinhanh'] = $this->Mthemphong->get_many_where("tbl_hinhanh", array("ma_nhatro" => $ma_nhatro, "ghichu" => NULL));
		    	$tiennghi = $this->Mthemphong->get_dstiennghi($ma_nhatro);
		    	$arr = [];
		    	$dsTienNghi = $this->Mthemphong->get("tbl_tiennghi");
		    	foreach ($tiennghi as $key => $value) {
		    		array_push($arr, $value['id_tiennghi']);
		    	}
		    	$getChiTietPhong['tiennghi_HT'] = $this->Mthemphong->tienghi_hethong($arr);
		    	$getChiTietPhong['tiennghi'] = $tiennghi;
 			}
 			// cập nhật lại thông tin phòng trọ
 			
 			if($id = $this->input->post("suaphongtro")){
 				$this->update_phong($id, $session);
 				
 			}
 			if($this->input->post('action') == "xoa_anhnhatro"){
 				$ma = $this->input->post("ma");
 				$linkanh = $this->Mthemphong->get_where_row("tbl_hinhanh", "id_anh", $ma)['link_anh'];
 				$row = $this->Mthemphong->delete("tbl_hinhanh", "id_anh", $ma);
 				if($row > 0){
	 				if(!file_exists($linkanh)){
						unlink($linkanh);
					}
					echo "thanhcong";
 				}else{
 					echo "thatbai";
 				}
 				exit();
 			}
        	$temp = array(
        		'template' 	=> 'HeThong/Vthemphong',
        		'data'	   => array(
        			'tiennghi'			=> $this->Mthemphong->get("tbl_tiennghi"),
        			'ds_huyen'  		=> $ds_huyen,
        			'ds_loai_nhatro' 	=> $ds_loai_nhatro,
        			'chitietPhong'		=> $getChiTietPhong,
        		),
        	);
        	
        	$this->load->view('layout/content', $temp);
		}
		public function update_phong($id, $session){
 			$data 					= $this->input->post("data");
			$data['ma_nhatro'] 		= $id;
			$data['user_id'] 		= $session['ma_user'];
			$data['ngaydang']   	= date("d/m/Y");
			$data['id_trangthai']   = 1;
			$row = $this->Mthemphong->update("tbl_phongtro","ma_nhatro", $data['ma_nhatro'], $data);		
			$tienghi 				= $this->input->post("tiennghi");
			$row = $this->Mthemphong->delete_tiennghi($data['ma_nhatro']); // xóa tất cả tiện nghi trong nhà trọ
			for ($i=0; $i < count($tienghi); $i++) { 
				$arr_tiennghi = array(
					'id_tiennghi' => $tienghi[$i],
					'id_nhatro'   => $data['ma_nhatro']
				);
				$this->Mthemphong->insert("tbl_tiennghi_nhatro", $arr_tiennghi);	
			}

			$ma_anh_cu = $this->input->post("anh_phongtro_cu");
			$dir    = "public/images/anhphongtro/"."AnhPhongTro-". str_replace(" ","", $session['hoten']).$session['ma_user']."/";

			$name_avata = $_FILES['anh_phongtro_dd']['name'];
			$name_image = $_FILES['anhphongtro']['name'];

			if(!empty($name_avata)){
				$row = $this->Mthemphong->delete_avata($data['ma_nhatro']);
				$config['upload_path'] = $dir."avata-".$data['ma_nhatro'].".jpg";
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['file_name'] = "avata-".$data['ma_nhatro'].".jpg";
				$this->load->library("upload", $config);
				$this->upload->initialize($config);
				$row1 = move_uploaded_file($_FILES['anh_phongtro_dd']['tmp_name'], $config['upload_path']);
				if ($row1 > 0) {
					$data_image = array(
						'id_anh ' 	=> preg_replace("/[^a-zA-Z0-9]+/", "", $session['ma_user'].
							time()).rand(1,10000000),
						'link_anh' 	 => $config['upload_path'],
						'ma_nhatro ' => $data['ma_nhatro'],
						'ghichu'	 => "avata",
					);
					$row2 =  $this->Mthemphong->insert("tbl_hinhanh", $data_image);
				}
				else{
					setMessages("error", "Update ảnh bị lỗi", "Thông báo");
				}
			}

			if(!empty($name_image[0])){
				$count_img = count($this->Mthemphong->get_where("tbl_hinhanh", "ma_nhatro", $data['ma_nhatro']));
		        // $row = $this->Mthemphong->delete_hinhanh($ma_anh_cu, $data['ma_nhatro']);
				$config1['upload_path'] = $dir;
				$config1['allowed_types'] = 'jpg|jpeg|png|gif';
		        foreach ($_FILES['anhphongtro']['name'] as $key => $tenanh) {
		        	$count_img++;
					$_FILES['picture']['name']     = "anhnhatro-".$count_img."-".$data['ma_nhatro'].".jpg";
	                $_FILES['picture']['type']     = $_FILES['anhphongtro']['type'][$key];
	                $_FILES['picture']['tmp_name'] = $_FILES['anhphongtro']['tmp_name'][$key];
	                $_FILES['picture']['error']    = $_FILES['anhphongtro']['error'][$key];
	                $_FILES['picture']['size']     = $_FILES['anhphongtro']['size'][$key];
					$this->load->library('upload', $config1);
		        	$ds_anh[$key] = $tenanh;
			        $this->upload->initialize($config1);
			        if ($this->upload->do_upload('picture')) {
			        	$duongdan = $dir. $_FILES['picture']['name'] ;
			        	$tbl_hinhanh = array(
			        		'id_anh ' 	=> preg_replace("/[^a-zA-Z0-9]+/", "", $session['ma_user'].
			        			time()).rand(1,10000000),
			        		'link_anh' 	 => $duongdan,
			        		'ma_nhatro ' => $data['ma_nhatro'],
			        	);
				       $this->Mthemphong->insert("tbl_hinhanh", $tbl_hinhanh);
			        } 
		        }
			}
		  
		    setMessages("success","Sửa phòng trọ thành công!", "Thông báo");
			return redirect(base_url()."themphong?trangthai=suaphong&maphong=".$data['ma_nhatro']);	
		}

		public function get_xa($mahuyen){
			$ds_xa = $this->Mthemphong->get_xa($mahuyen);
			echo json_encode($ds_xa);
			die();	
		}
		private function add($session){
			$data 					= $this->input->post("data");
			$data['ma_nhatro'] 		= preg_replace("/[^a-zA-Z0-9]+/", "", $session['ma_user'].time());
			$data['user_id'] 		= $session['ma_user'];
			$data['ngaydang']   	= date("d/m/Y");
			$data['id_trangthai']   = 1;
			$tienghi 			= $this->input->post("tiennghi");
			$row = $this->Mthemphong->insert("tbl_phongtro", $data);		
			for ($i=0; $i < count($tienghi); $i++) { 
				$arr_tiennghi = array(
					'id_tiennghi' => $tienghi[$i],
					'id_nhatro'   => $data['ma_nhatro']
				);
				$this->Mthemphong->insert("tbl_tiennghi_nhatro", $arr_tiennghi);	
			}
			$dir = "public/images/anhphongtro/"."AnhPhongTro-". str_replace(" ","", $session['hoten']).$session['ma_user']."/";
			if (!empty($_FILES['anh_phongtro_dd'])) {
				$config['upload_path'] = $dir."avata-".$data['ma_nhatro'].".jpg";
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['file_name'] = "avata-".$data['ma_nhatro'].".jpg";
				// $config['max_size'] = 2419760; // byte
				$this->load->library("upload", $config);
				$this->upload->initialize($config);
				$row1 = move_uploaded_file($_FILES['anh_phongtro_dd']['tmp_name'], $config['upload_path']);
				if ($row1 > 0) {
					$data_image = array(
						'id_anh ' 	=> preg_replace("/[^a-zA-Z0-9]+/", "", $session['ma_user'].
		        			time()).rand(1,10000000),
		        		'link_anh' 	 => $config['upload_path'],
		        		'ma_nhatro ' => $data['ma_nhatro'],
		        		'ghichu'	 => "avata",
					);
					$row2 =  $this->Mthemphong->insert("tbl_hinhanh", $data_image);
				}
				else{
					setMessages("error", "Thêm ảnh bị lỗi", "Thông báo");
				}
			}
			if (!empty($_FILES['anhphongtro'])) {
		        $ds_anh = array();
				if (!is_dir($dir))
				{
				   //Tạo thư mục
					mkdir($dir, 0777, true);
				}
				$config1['upload_path'] = $dir;
				$config1['allowed_types'] = 'jpg|jpeg|png|gif';
		        foreach ($_FILES['anhphongtro']['name'] as $key => $tenanh) {
					$_FILES['picture']['name']     = "anhnhatro-".$key."-".$data['ma_nhatro'].".jpg";
	                $_FILES['picture']['type']     = $_FILES['anhphongtro']['type'][$key];
	                $_FILES['picture']['tmp_name'] = $_FILES['anhphongtro']['tmp_name'][$key];
	                $_FILES['picture']['error']    = $_FILES['anhphongtro']['error'][$key];
	                $_FILES['picture']['size']     = $_FILES['anhphongtro']['size'][$key];
					$this->load->library('upload', $config1);
		        	$ds_anh[$key] = $tenanh;
			        $this->upload->initialize($config1);
			        if ($this->upload->do_upload('picture')) {
			        	$duongdan = $dir. $_FILES['picture']['name'] ;
			        	$tbl_hinhanh = array(
			        		'id_anh ' 	=> preg_replace("/[^a-zA-Z0-9]+/", "", $session['ma_user'].
			        			time()).rand(1,10000000),
			        		'link_anh' 	 => $duongdan,
			        		'ma_nhatro ' => $data['ma_nhatro'],
			        	);
				       $this->Mthemphong->insert("tbl_hinhanh", $tbl_hinhanh);
			        } 
		        }
		    }
		    if($row > 0){
		    	setMessages("success","Thêm phòng trọ thành công!", "Thông báo");
				return redirect(base_url('ds_phong'));	
		    }
		}
	}
?>