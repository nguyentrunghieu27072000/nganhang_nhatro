<?php 
	/**
	 * summary
	 */
	class Cdm_NhaTro extends MY_Controller
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
	    	$maloai = $this->input->get("maloai");
	    	$start = 0;
	    	$limit = 2;
	    	// if ($this->input->get('page')) {
	    	// 	$data['page'] = $this->input->get('page');
	    	// 	$start = ($data['page']-1) * $limit;
	    	// 	if($start ==0){
	    	// 		$data['stt'] = 1;
	    	// 	}else{
	    	// 		$data['stt'] = $start + 1;
	    	// 	}
	    	// }
	    	// else{
	    	// 	$data['page'] = 1;
	    	// }
	    	// $sum_record 				 = count($this->Mtrangchu->get_where('tbl_phongtro', 'ma_loai_nhatro ', $maloai));
	    	// $data['total_page'] 		       = CEIL($sum_record/$limit);
	    	$data['tenloai'] = $this->Mtrangchu->get_where_row("tbl_loainhatro", "id_loai", $maloai);
	    	$data['dsphong'] 				= $this->Mtrangchu->getList($maloai);
	    	foreach ($data['dsphong'] as $key => $value) {
	    		$data['dsphong'][$key]['hinhanh'] = $this->Mtrangchu->get_where_row("tbl_hinhanh", "ma_nhatro", $value['ma_nhatro']);
	    	}
	    	// pr($dsphong);
	    	$temp['data'] = $data;
	    	$temp['template'] = 'TrinhDuyet/Vdm_nhatro';
        	$this->load->view('layout/content', $temp);
	    }
	}
 ?>