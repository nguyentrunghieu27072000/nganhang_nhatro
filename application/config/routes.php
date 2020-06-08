<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['TrangChu'] 		= 'Ctrangchu';
$route['ChiTiet']  		= 'TrinhDuyet/Cchitiet';
$route['PhongTro']   	= 'TrinhDuyet/Cdm_NhaTro';
$route['facebook']   	= 'Ctrangchu/facebook';
$route['dangxuat']   	= 'Ctrangchu/dangxuat';
$route['dangnhap']   	= 'Ctrangchu/dangnhap';
$route['dangky']   		= 'Ctrangchu/dangky';
$route['location_Faculty']= 'TrinhDuyet/CFaculty';


//Hethong
$route['ThemPhongTro']   = 'HeThong/CThemPhongTro';


//user
$route['themphong'] 		= 'HeThong/Cthemphong';
$route['ds_phong'] 			= 'HeThong/Cds_phong';


$route['default_controller'] = 'Ctrangchu';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
