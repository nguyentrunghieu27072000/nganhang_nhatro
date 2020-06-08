<?php
  class Cds_phong extends My_Controller
  {
  	public function __construct()
  	{
  		parent::__construct();
        $this->load->model("Mphongtro");
  	}
  	public function index(){
        $session = $this->session->userdata("user");
        $dsPhongTro = $this->Mphongtro->dsPhongTro($session['ma_user']);
        foreach ($dsPhongTro as $key => $value) {
            $dsPhongTro[$key]['hinhanh'] = count($this->Mphongtro->get_where("tbl_hinhanh", "ma_nhatro", $value['ma_nhatro']));
        }
        $dk_con_phongtro = array(
            'user_id'       => $session['ma_user'],
            'id_trangthai'  => 1,
        );
        $dk_het_phongtro = array(
            'user_id'       => $session['ma_user'],
            'id_trangthai'  => 2,
        );
        $TrangThai['conphong'] = count($this->Mphongtro->get_many_where("tbl_phongtro", $dk_con_phongtro));
        $TrangThai['hetphong'] = count($this->Mphongtro->get_many_where("tbl_phongtro", $dk_het_phongtro));
        // pr($dsPhongTro);

        if($id = $this->input->post("xoaphongtro")){
            $ptro = $this->Mphongtro->get_where_row("tbl_phongtro", "ma_nhatro", $id);
            if(empty($ptro) || $ptro['user_id'] != $session['ma_user']){
                setMessages("warning", "Bạn không thể xóa!", "Thông báo");
                return redirect("ds_phong");
            }
            $row = $this->Mphongtro->xoaphongtro($id);
            if($row > 0){
                setMessages("success","Xóa phòng thành công", "Thông báo");
                return redirect("ds_phong");
            }
        }
        if($id = $this->input->post("suaphong")){
            return redirect(base_url()."themphong?trangthai=suaphong&maphong=".$id);
        }

        if($this->input->post('action') == "changeTT"){
            $ma_phong = $this->input->post("ma");
            $getTT = $this->Mphongtro->get_where_row("tbl_phongtro", "ma_nhatro", $ma_phong)['id_trangthai'];
            if($getTT == "1"){
                $trangthai['id_trangthai'] = 2;
                $this->Mphongtro->update("tbl_phongtro", "ma_nhatro", $ma_phong, $trangthai);
            }else{
                $trangthai['id_trangthai'] = 1;
                $this->Mphongtro->update("tbl_phongtro", "ma_nhatro", $ma_phong, $trangthai);
            }
            echo "thanhcong";
            exit();
        }
        $temp = array(
            'template' => 'HeThong/Vds_phong',
            'data'     => array(
                'dsPhongTro'     => $dsPhongTro,
                'trangthai'      => $TrangThai
            ),
        );
    	$this->load->view('layout/content', $temp);
  	}
  
  } 
?>