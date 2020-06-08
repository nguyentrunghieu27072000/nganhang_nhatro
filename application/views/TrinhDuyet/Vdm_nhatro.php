<div class="container-fluid" id="dmnt">
    <div class="row">
        <div class="col-md-12">
            <h3 class="h3-kn" style=" padding: 1em; font-size: 13px;">Trang chủ <i class="fa fa-angle-double-right" aria-hidden="true"></i> {$tenloai['ten_loai_nhatro']}</h3>
        </div>
    </div>
    <section class="div-product">
        {if empty($dsphong)}
                    <div class="col-md-12 text-center">
                        <p class="label label-danger" style="font-size: 19px;">Không có dữ liệu của phòng trọ  <i class="fa fa-spinner fa-spin"></i></p>
                    </div>
                {/if}
        <div class="col-md-12 col-div-product">
            <div class="sanpham" >
                {foreach $dsphong as $val}
                    <div class="col-md-3 col-sanpham no-boder-left">
                        <div class="main-sp">
                            <div class="div-img-product">
                                <div class="bacground-mo"></div>
                                <img src="{if !empty($val['hinhanh'])}{$val['hinhanh']['link_anh']}{/if}" width="100%" class="anhsanpham">
                                <div class="xemview"><a href="ChiTiet?maphongtro={$val.ma_nhatro}"> Xem review</a> &nbsp;<i class="fa fa-eye" aria-hidden="true"></i></div>
                                <div class="border-khung"></div>
                            </div>
                             <div class="noidungsp">
                                <div class="promotel__type bold" style="-webkit-box-orient: vertical;">
                                    {$val.ten_loai_nhatro}
                                </div>
                                <a href="{$url}ChiTiet?maphongtro={$val.ma_nhatro}">
                                    <p>
                                        <div class="promotel-title">
                                            {$val.ten_nhatro}
                                        </div>
                                    </p>
                                </a>
                                <div class="promotel-room dragscroll"> 
                                    <p>
                                        <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>&nbsp;Diện tích: {$val.dientich} <b>m2</b>
                                    </p>
                                </div>
                                <div class="promotel-price">
                                    <b><span class="glyphicon glyphicon-send" aria-hidden="true"></span>&nbsp;&nbsp;Giá phòng trọ: {$val.giaphong} Đ</b>
                                </div>
                                <div class="promotel-address col-md-12"  style="padding: 0; color:#08c">
                                    <p>
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp; <span>{$val['tenxa']} - {$val['tenhuyen']}</span> 
                                    </p>
                                </div>
                               <div class="col-md-12" style="padding: 0; color:#c12525">
                                <p>
                                    <i class="fa fa-clock-o" aria-hidden="true"></i><small>&nbsp;<span>Thời gian đăng:</span> {$val.ngaydang}</small></div>
                                </p>
                               <div class="col-md-12" style="padding: 0; color:#418042">
                                    <p>
                                        <i class="fa fa-user" aria-hidden="true"></i> &nbsp;<span>Người đăng bởi:</span>
                                        <strong>
                                          {$val.hoten}
                                        </strong>
                                    </p>
                               </div>
                            </div>
                        </div>
                    </div>
                {/foreach}
            </div>
        </div>
    </section>
</div>
<style>
    .promotel-price{
        margin-bottom: 1em;
    }
</style>