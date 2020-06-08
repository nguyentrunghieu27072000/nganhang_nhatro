<?php 
	/**
	 * 
	 */
	class CFaculty extends MY_Controller
	{
		
		public function __construct()
	    {
	        parent::__construct();
	    	$this->load->model('Mtrangchu');
	    }
	    public function index(){
	    	$makhoa = $this->input->get("makhoa");
	    	$khoa = $this->Mtrangchu->get_where_row("dm_khoa", "makhoa",$makhoa );
	    	if(!empty($khoa['diachi_khoa'])){
	    		$diachi = explode(",", $khoa['diachi_khoa']);
	    		$diachi = trim($diachi[1]).", ".trim($diachi[2]);
	    	}else{
	    		$diachi = "Nguyễn Hiền, Hai Bà Trưng, Hà Nội";
	    	}
	    	$data['dsphong'] 				= $this->Mtrangchu->get_dsNhaTro_Faculty("$diachi");
	    	foreach ($data['dsphong'] as $key => $value) {
	    		$data['dsphong'][$key]['hinhanh'] = $this->Mtrangchu->get_where_row("tbl_hinhanh", "ma_nhatro", $value['ma_nhatro']);
	    	}
	    	$temp = array(
	    		'data'    			=> array(
	    			'khoa'		=> $khoa,
	    			'dsphong'   => $data['dsphong'],
	    		),
		    	'template'  	=>'TrinhDuyet/VFaculty'
	    	);
        	$this->load->view('layout/content', $temp);
	    }
	}
 ?>