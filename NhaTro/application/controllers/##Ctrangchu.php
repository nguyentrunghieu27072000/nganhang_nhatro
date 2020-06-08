<?php 
	class Ctrangchu extends MY_Controller
	{
	    public function __construct()
	    {
	        parent::__construct();
	        $this->load->library('pagination');
	    	$this->load->library('facebook');
	    	$this->load->model('Mtrangchu');
	    }
	    public function index(){
	    	if($action = $this->input->post('action')){
		    	switch ($action) {
		    		case 'luachon':
		    			$mahuyen = $this->input->post('mahuyen');
		    			$data = $this->Mtrangchu->dsxa($mahuyen);
		    			echo json_encode($data);
		    			break;
		    		default:
		    			# code...
		    			break;
		    	}
		    	return;
		    }
	    	$dsphong = $this->Mtrangchu->dsphongtro();
	    	$search = [];
		    if($this->input->post("timkiem")){
	    		$quan 			= $this->input->post("quan");
	    		$phuong 		= $this->input->post("phuong");
	    		$loainhatro 	= $this->input->post("loainhatro");
	    		$search 		= $this->input->post("search");
	    		$gia 			= explode(",", $this->input->post("gia")) ;
	    		$timkiem = $this->Mtrangchu->timkiem($quan, $phuong, $loainhatro, $gia, $search);
				$dsphong = $timkiem;
				$search = array(
					'quan' 			=> $quan,
					'phuong' 		=> $phuong,
					'loainhatro' 	=> $loainhatro,
					'search' 		=> $search,
					'gia' 			=> $this->input->post("gia"),
				);
	    	}

	    	foreach ($dsphong as $key => $val) {
	    		$dsphong[$key]['link_anh'] = $this->Mtrangchu->groupha($val['ma_nhatro']);
	    		$dsphong[$key]['tenquan'] = $this->Mtrangchu->get_tenhuyen($val['id_xa']);
	    		$dsphong[$key]['tenphuong'] = $this->Mtrangchu->gettenduonng($val['id_xa']);
	    		$dsphong[$key]['loainhatro'] = $this->Mtrangchu->get_where_row("tbl_loainhatro", "id_loai", $val['ma_loai_nhatro'])['ten_loai_nhatro'];
	    	}

	    	$temp = array(
	    		'data'    		=> array(
	    			'dsphong'   => $dsphong,
	    			'dsquan'	=> $this->Mtrangchu->get('dm_huyen'),
	    			'loaiNhaTro' => $this->Mtrangchu->get_where("tbl_loainhatro", "ghichu", NULL),
	    			'giaPhong'  => $this->Mtrangchu->get("tbl_giaphong"),
	    			'search'	=> $search,
	    		),
		    	'template'  	=>'TrinhDuyet/Vtrangchu'
	    	);
        	$this->load->view('layout/content', $temp);
	    }

	    public function dangnhap(){
	    	$sdt 		= $this->input->post("sdt");
	    	$matkhau 	= $this->input->post("matkhau");
	    	$check 		= $this->Mtrangchu->get_many_where("tbl_user", array("sdt" => $sdt, "matkhau" => sha1($matkhau)));
	    	if(!empty($check)){
	    		$this->session->set_userdata('user',$check[0]);
	    		setMessages("success","Đăng nhập thành công!", "Thông báo");
	    	}else{
	    		setMessages("error","Tài khoản hoặc mật khẩu không chính xác!", "Thông báo");
	    	}
			return redirect(base_url());	
	    }

	    public function dangky(){
			$ma_user = preg_replace("/[^a-zA-Z0-9]+/", "", $this->input->post('hoten').rand(1,1000)).time();
			$tk = array(
				'ma_user' 	=> $ma_user,
				'hoten' 	=> $this->input->post('hoten'),
				'sdt' 		=> $this->input->post('phone'),
				'matkhau' 	=>SHA1($this->input->post('pass')),
				'maquyen' 	=> 1
			);
			$row = $this->Mtrangchu->insert("tbl_user", $tk);
			if($row > 0){
				$this->session->set_userdata('user',$tk);
				setMessages("success","Đăng ký tài khoản thành công", "Thông báo");
			}else{
				setMessages("error","Đăng ký tài khoản thất bại", "Thông báo");
			}
			return redirect(base_url());
	    }


	    public function facebook(){
	    	$userData = array();
			if($this->facebook->is_authenticated()){
				$userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');
				echo "<pre>";
				die;
			}
			else
			{
	            $data['authUrl'] =  $this->facebook->login_url();
	        }
	    }

	    public function dangxuat(){
	    	$this->session->userdata = array();
	    	$this->session->sess_destroy();
	    	$this->input->set_cookie('', '', time()-36000);
	    	return redirect(base_url());
	    }
	}
 ?>