<?php 
	class Ctrangchu extends MY_Controller
	{
	    public function __construct()
	    {
	        parent::__construct();
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
	    	foreach ($dsphong as $key => $val) {
	    		$dsphong[$key]['link_anh'] = $this->Mtrangchu->groupha($val['ma_nhatro']);
	    		$dsphong[$key]['tenquan'] = $this->Mtrangchu->get_tenhuyen($val['id_xa']);
	    		$dsphong[$key]['tenphuong'] = $this->Mtrangchu->gettenduonng($val['id_xa']);
	    	}
	    	$temp = array(
	    		'data'    		=> array(
	    			'dsphong'   => $dsphong,
	    			/*'dsquan'	=> $this->Mtrangchu->get_where('dm_huyen','matinh','01')*/
	    		),
		    	'template'  	=>'TrinhDuyet/Vtrangchu'
	    	);
        	$this->load->view('layout/content', $temp);
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
	}
 ?>