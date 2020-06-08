<?php 
	/**
	 * summary
	 */
	class Cchitiet extends MY_Controller
	{
	    /**
	     * summary
	     */
	    public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Mtrangchu');
	    }
	    public function index(){
	    	date_default_timezone_set('Asia/Ho_Chi_Minh');
	    	$session = $this->session->userdata('user');
	    	$ma_nhatro = $this->input->get("maphongtro");
		    $getChiTietPhong = $this->Mtrangchu->get_where("tbl_phongtro", "ma_nhatro", $ma_nhatro);
		    $chiTietPhong = [];
		    $dsPhongLienQuan = [];
		    $cm_phong = [];
		    if($ma_nhatro){
		    	$cm_phong = $this->Mtrangchu->get_cm_phong($ma_nhatro); 
		    	$comment_phong = $cm_phong;
		    	$comment_cap2 = [];
		    	foreach ($cm_phong as $k => $cm) {
		    		$comment_cap2 = $this->Mtrangchu->get_comment_cap2($cm['id_hoi']);
		    		$comment_phong[$k]['comment_cap2'] = $comment_cap2;
		    	}
		    }
		    $action = $this->input->post('action');
		    if($action == "comment"){
		    	$content = $this->input->post('content');
		    	$ma_nhatro = $this->input->post('ma_nhatro');
		    	$this->add_comment($content,$session['ma_user'],$ma_nhatro);
		    }
		    if($action == "comment_cap2"){
		    	$content = $this->input->post('content');
		    	$id_hoi = $this->input->post('id_hoi');
		    	$this->add_comment_cap2($content,$session['ma_user'],$id_hoi);
		    }
		    if(!empty($getChiTietPhong)){
		    	$user = $this->Mtrangchu->get_where_row("tbl_user", "ma_user", $getChiTietPhong[0]['user_id']);
		    	$hinhanh = $this->Mtrangchu->get_where("tbl_hinhanh", "ma_nhatro", $ma_nhatro);
		    	$getChiTietPhong[0]['hinhanh'] = $hinhanh;
		    	$getChiTietPhong[0]['hinhanh_avata'] = $this->Mtrangchu->get_many_where("tbl_hinhanh",array("ma_nhatro" => $ma_nhatro, "ghichu" => "avata"))[0]['link_anh'];
		    	$tiennghi = $this->Mtrangchu->get_dstiennghi($ma_nhatro);
		    	$getChiTietPhong[0]['tiennghi'] = $tiennghi;
		    	$getChiTietPhong[0]['hoten'] = $user["hoten"];
		    	$getChiTietPhong[0]['sdt'] = $user["sdt"];
		    	$chiTietPhong = $getChiTietPhong[0];
		    	$dsPhongLienQuan = $this->Mtrangchu->get_dsPhongLienQuan($ma_nhatro);
		    	foreach ($dsPhongLienQuan as $key => $value) {
		    		$dsPhongLienQuan[$key]['hinhanh'] = $this->Mtrangchu->get_where_row("tbl_hinhanh", "ma_nhatro", $value['ma_nhatro']);
		    	}
		    }else{
		    	return redirect(base_url());
		    }
		    
		    if($this->input->get("action")  == "delete_comment"){
		    	$this->delete_comment();
		    }	

		    $quaylai = $this->input->get("quaylai");
		    // pr($chiTietPhong);
	    	$temp = array(
	    		'template' => 'TrinhDuyet/Vchitiet',
	    		'data'     => array(
	    			'quaylai'		=> $quaylai,
	    			'chitiet'       => $chiTietPhong,
	    			'dsPhongLQ'     => $dsPhongLienQuan,
	    			'comment_phong' => $comment_phong,
	    			'session' 		=> $session['ma_user']
	    		),
	    	);
        	$this->load->view('layout/content', $temp);
	    }

	    public function delete_comment(){
	    	$trangthai 	= $this->input->get('trangthai');
	    	if($trangthai == "cap1"){
	    		$ma 		= $this->input->get('ma');
	    		$row = $this->Mtrangchu->delete("tbl_traloi", "id_hoi", $ma);
	    		$row = $this->Mtrangchu->delete("tbl_hoi", "id_hoi", $ma);
	    		if($row  > 0){
	    			echo "thanhcong";
	    		}else{
	    			echo "thatbai";
	    		}
	    	}else{
	    		$ma 		= $this->input->get('ma');
				$row = $this->Mtrangchu->delete("tbl_traloi", "id_traloi", $ma);
	    		if($row  > 0){
	    			echo "thanhcong";
	    		}else{
	    			echo "thatbai";
	    		}
	    	}
	    	exit();

	    }

	    public function add_comment($content,$ma_user,$ma_nhatro){

	    	if($content != ""){
	    		$comment = array(
	    			'noidung' 	=> $content,
	    			'ma_user' 	=> $ma_user,
	    			'ngayhoi' 		=> date("d/m/Y H:i:s"),
	    			'ma_nhatro' => $ma_nhatro
	    		);
	    	}
	    	$id_hoi = $this->Mtrangchu->add_comment($comment);
	    	$data = $this->Mtrangchu->thongtin_comment($id_hoi);
	    	echo json_encode($data);
	    	die();
	    	
	    }
	    public function add_comment_cap2($content,$ma_user,$id_hoi){
	    	if($content != ""){
	    		$comment = array(
	    			'noidung'  		=> $content,
	    			'ma_user' 		=> $ma_user,
	    			'ngay_traloi' 	=> date("d/m/Y H:i:s"),
	    			'id_hoi' 		=> $id_hoi
	    		);
	    	}
    		$id_trahoi = $this->Mtrangchu->add_comment_cap2($comment);
	    	$data = $this->Mtrangchu->thongtin_comment_cap2($id_trahoi);
	    	echo json_encode($data);
	    	die();
	    }
	}
 ?>