<?php
  class Cchitiet_phong extends My_Controller
  {
  	public function __construct()
  	{
  		parent::__construct();
  	}
  	public function index(){
  		$data['message'] = getMessages();
		  $temp['data'] = $data;
    	$temp['template'] = 'Vchitiet_phong';
    	$this->load->view('layout_admin/content', $temp);
  	}
  } 
?>