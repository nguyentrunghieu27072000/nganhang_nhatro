<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller {
    protected $_session;
    protected $_manhom;

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
       
    }

    // public function insert($table, $data,  $success, $error, $redirect){
    //     $row = $this->Mdanhsachcanbo->insert($table, $data);
    //     if($row > 0){
    //         setMessages("success",$success, "Thông báo");
    //     }else{
    //         setMessages("error", $error, "Thông báo");
    //     } 
    //     return redirect($redirect);
    // }

    // public function update($table, $key, $ma, $data, $success, $error, $redirect){
    //     $row =  $this->Mdanhsachcanbo->update($table, $key, $ma, $data);
    //     if($row > 0){
    //         setMessages("success",$success, "Thông báo");
    //     }else{
    //         setMessages("error", $error, "Thông báo");
    //     } 
    //     return redirect($redirect);
    // }

    // public function delete($table, $key, $ma, $success, $error, $redirect){
    //     $row = $this->Mdanhsachcanbo->delete($table, $key, $ma);
    //     if($row > 0){
    //         setMessages("success",$success, "Thông báo");
    //     }else{
    //         setMessages("error",$error, "Thông báo");
    //     }
    //     return redirect($redirect);
    // }

   

    
    
} // End class

