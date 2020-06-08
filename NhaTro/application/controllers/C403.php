<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C403 extends CI_Controller {
	public $_title = 'Từ chối truy cập'; 
	protected $Error; 
	public function __construct() {
		parent:: __construct();
	}
	public function index()
	{
		$data['url'] = base_url();
		$data['title'] = $this->_title;
		$data['Error'] = $this->Error;
		$this->parser->parse('errors/V403');
		// echo "<center><h2>Bạn không có quyền truy cập chức năng này</h2></center>";
		// echo "<center><h2><a href=''>Đăng nhập </a> </h2></center>";
	}

}
