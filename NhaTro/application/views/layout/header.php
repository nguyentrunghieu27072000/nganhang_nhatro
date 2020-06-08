<!DOCTYPE html>
<html lang="">
<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" /> -->
    <title>Ngân Hàng Nhà Trọ HOU</title>
    <base href="{base_url()}"> 
    <link rel="icon" href="{$url}public/images/DV01.png">
    <link rel="stylesheet" href="{$url}public/bootstrap/css/bootstrap.min.css" >
    <link rel="stylesheet" href="{$url}public/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="{$url}public/css/style.css?v={time()}">
    <link rel="stylesheet" type="text/css" href="{$url}public/css/animate.css">
    <link rel="stylesheet" type="text/css" href="{$url}public/css/button.css">
    <link rel="stylesheet" type="text/css" href="{$url}public/css/bootstrap-toggle.min.css">
    <script src="{$url}public/jquery/jquery.js"></script>
    <script src="{$url}public/jquery/bootstrap-toggle.min.js"></script>
    <script src="{$url}public/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{$url}public/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css">
    <link rel="stylesheet" href="{$url}public/css/dataTables.bootstrap.min.css">
    <script src="{$url}js/simple.money.format.js"></script>
    <script src="{$url}public/jquery/jquery.dataTables.min.js"></script>
    <script src="{$url}public/jquery/dataTables.bootstrap.min.js"></script>
    <script src="{$url}public/jquery/jquery.validate.js"></script>
    <script type="text/javascript" src="{$url}public/select2/dist/js/select2.js"></script>
    <link rel="stylesheet" type="text/css" href="{$url}public/select2/dist/css/select2.css">
    <link href="{$url}public/plugin/style.css" rel="stylesheet">
    <link href="{$url}public/plugin/bootstrap-datepicker.min.css" rel="stylesheet">
    <script src="{$url}public/plugin/bootstrap-datepicker.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Arima+Madurai&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;subset=vietnamese" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{$url}public/jquery/jquery.fancybox.css" />
    <script type="text/javascript" src="{$url}public/jquery/jquery.fancybox.js"></script>
    <script type="text/javascript" src="{$url}public/jquery/fancybox.js"></script>
    <script type="text/javascript" src="{$url}public/jquery/jsTop.js"></script>
    <link rel="stylesheet" type="text/css" href="{$url}public/Toastr/toastr.css">
    <script type="text/javascript" src="{$url}public/Toastr/tienganh.js"></script>
    <script type="text/javascript" src="{$url}public/Toastr/toastr.js"></script>
    <link rel="stylesheet" type="text/css" href="{$url}public/css/responsive.css?v={time()}">
   <!--  <script src="{$url}public/jquery/chongchuotphai.js"></script>
    <style>
        body{
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            -o-user-select: none;
            user-select: none;
        }
    </style> -->
    <style type="text/css">
        .user{
            font-size: 25px;
            padding: 0px 5px 0 20px;
            color: #ff7675;
        }
        .mr{
            margin-right: 15px;
        }
        .user{
            padding: 15px;
            color: #fdcb6e;
        }
        .user_info{
            padding: 10px;
        }
        .user_avatar {
            display: inline-block;
        }
        .user_meta{
            display: inline-block;
            font-weight: bold;
            font-size: 1.5rem;
            vertical-align: middle;        }
        #doanhmuc li{
            border-bottom: 1px solid lightgray;
        } 
    </style>
</head>
<body>
    <div id="header" class="animated fadeInDown slow">
        <div class="col-md-7">
            <h3 class="title-h">
                 HỆ THỐNG NGÂN HÀNG NHÀ TRỌ <span class="hidden-sm hidden-xs">-</span><span class="hidden-lg hidden-md"><br></span> TRƯỜNG ĐẠI HỌC MỞ HÀ NỘI
            </h3>
        </div>
        {if !empty($session)}
            <div class="col-md-3">
                <div class="col-md-4 col-xs-2">
                    <img width="50px" height="50%" src="https://static123.com/uploads/images/2018/12/12/boy_1544603222.png">
                </div>
                <div class="col-md-8 col-xs-5" style="font-weight: bold; padding-top: 10px;">
                     <div>{$session['hoten']}</div>
                            <div style="color: #555; font-size: 1.2rem;">{$session['sdt']}</div>
                </div>
                <div class="col-xs-5 col-sm-5 text-right hidden-md hidden-lg" style="padding: 0; margin-top: 10px;">
                    <a href="themphong" class="btn btn-success btn-res" >&nbsp;<i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; Đăng Tin </a>
                    <a href="dangxuat" class="btn btn-danger btn-res" title="Đăng xuất" ><i class="fa fa-sign-out"></i> <span class="hidden-lg hidden-md"></span></a>
                </div>
            </div>
        {/if}
        <div class="{if !empty($session)}col-md-2{else}col-md-5{/if} text-right">
            <h3>
                {if !empty($session)}
                <div class="hidden-sm hidden-xs">
                    <a href="themphong" class="btn btn-success btn-res" >&nbsp;<i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; Đăng Tin </a>
                    <a href="dangxuat" class="btn btn-danger btn-res" title="Đăng xuất" ><i class="fa fa-sign-out"></i></a>
                </div>
                {else}
                <button type="button" class="btn btn-primary btn-res dangnhap3" ><i class="fa fa-user" aria-hidden="true"></i>&nbsp; Đăng Nhập</button>
                <button type="button" class="btn  btn-res btn-success" id="dangky"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp; Cung cấp thông tin nhà trọ</button>
                {/if}
            </h3>
        </div>
    </div>
    <div class="container-fluid" id="main">
        <header class="header">
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="{$url}public/images/ok.png" width="100%">
                        <!-- <img src="{$url}public/images/logotruong.png"> -->
                        <!-- <img src="{$url}public/images/hsv.png"> -->
                    </a>
                </div>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        {foreach $menu as $val}
                            <li><a href="{if $val.ghichu == 2}{$val.href}?maloai={$val.id_loai}{else}{$val.href}{/if}" ><i class="{$val.icon}" aria-hidden="true" ></i> &nbsp; {$val.ten_loai_nhatro}</a></li>
                        {/foreach}
                        {if !empty($session) && $session['maquyen'] == 1}
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-medium" aria-hidden="true"></i> &nbsp;Danh mục nhà trọ <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li><a href="themphong">Thêm nhà trọ</a></li>
                                <li><a href="ds_phong">Danh sách nhà trọ</a></li>
                              </ul>
                            </li>
                        {/if}
                        {if !empty($session) && $session['maquyen'] == 2}
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hệ thống <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Quản lý nhà trọ</a></li>
                                <li><a href="#">Quản lý hỏi đáp</a></li>
                              </ul>
                            </li>
                        {/if}
                    </ul>
                </div>
            </nav>
        </header>
    </div>
    <div class="dangnhap">
        <p class="close1"><span><i class="fa fa-times-circle" aria-hidden="true" style="font-size: 26px;
            color: #ff8d00a3;"></i></span></p>
        <p class="title-thongtin">Thông tin đăng nhập</p>
        <div id="dangnhap1">
            <form action="dangnhap" method="post">
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="text" class="form-control" name="sdt" >
                </div>
                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="password" class="form-control" name="matkhau">
                </div>
                <button type="submit" class= "btn btn-primary" name="dangnhap" value="dangnhap"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Đăng nhập</button>
            </form>
            <hr>
        </div>
    </div> 
    <div class="dangky">
        <p class="close2"><span><i class="fa fa-times-circle" aria-hidden="true" style="font-size: 26px;
        color: #ff8d00a3;"></i></span></p>
        <p class="title-thongtin">Thông tin đăng ký</p>
        <div id="dangnhap2">
            <form  method="POST" action="dangky" onsubmit="return check()">
                <div class="form-group">
                    <label>Họ tên</label>
                    <input type="text" class="form-control" id="hoten" name="hoten" required>
                </div>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="text" class="form-control" maxlength="11" id="sdt" name="phone" required>
                </div>
                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" required>
                </div>
                <button type="submit" class= "btn btn-primary" name="dangky" value="dangky">Đăng ký tài khoản</button>
            </form>
            <hr>
        </div>
    </div>
    <script type="text/javascript">
        function check(){
            hoten = $("#hoten").val();
            sdt   = $("#sdt").val();
            pass   = $("#pass").val();
            console.log(sdt.length);
            if(hoten.length < 8){
                alert("Họ tên của bạn chưa chính sác!");
                return false;
            }
            else if(sdt.length != 10 && sdt.length != 11){
                alert("Số điện thoại của bạn không đúng định dạng!");
                return false;
            }else{
                return true;
            }
        }
        $(document).ready(function() {
            $("#dangtin").click(function(event) {
                $(".dangnhap").toggleClass('sangtraidi');
            });
            $(".dangnhap3").click(function(event) {
                $(".dangnhap").toggleClass('sangtraidi');
            });
            $("#dangky, .dangkytc").click(function(event) {
                $(".dangky").toggleClass('sangtraidi');
            });

            $(".close1").click(function(event) {
                $(".dangnhap").removeClass('sangtraidi');
            });
            $(".close2").click(function(event) {
                $(".dangky").removeClass('sangtraidi');
            });
            $("#sdt").keydown(function (event) {
                if (event.shiftKey == true) {
                    event.preventDefault();
                }
                if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46) {
                  
                } else {
                    event.preventDefault();
                }
            });
        });
    </script>