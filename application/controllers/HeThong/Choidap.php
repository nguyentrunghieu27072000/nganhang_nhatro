<?php
  class Choidap extends My_Controller
  {
  	public function __construct()
  	{
  		parent::__construct();
  	}
  	public function index(){
  		$data['message'] = getMessages();
		  $temp['data'] = $data;
    	$temp['template'] = 'HeThong/Vhoidap';
    	$this->load->view('layout_admin/content', $temp);
  	}
  } 
?>