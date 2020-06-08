<?php
	$data['url'] = base_url();
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$data['menu'] = getMenu();
	// pr($data['menu']);
	$data['message'] = getMessages();
	if(!empty($this->session->get_userdata('user')['user'])){
		$data['session'] = $this->session->get_userdata('user')['user'];
	}
	// pr($data['session']);
	$this->parser->parse('layout/header', $data);
	$this->parser->parse($template, $data);
	$this->parser->parse('layout/footer', $data);
 ?>