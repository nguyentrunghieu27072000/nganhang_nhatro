        <section class="content">
            <div class="main-content">
                <div class="border-vuong"></div>
            </div>
        </section>
        <div class="fixdisplay"></div>
        <div class="thongtintk text-center">
            <button type="button" class="btn btn-primary btn-tk dangkytc"><i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;Bạn muốn cung cấp thông tin nhà trọ</button>
            <a class="btn btn-success btn-tk" href="PhongTro?maloai=9"><i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;Bạn muốn tìm người ở ghép</a>
            <button type="button" class="btn btn-warning btn-tk timtrobt"><i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;Bạn là sinh viên bạn muốn tìm nhà trọ</button>
        </div>
        <div class="fixdisplay"></div>
        <div class="container-fluid p-d-0">
            <section class="container-fluid" id="timkiem">
                <form method="post">
                    <fieldset>
                        <legend class="box-header text-danger" style="margin-top: 0px">Thông tin tìm kiếm liên quan đến nhà trọ</legend>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tìm kiếm:</label>
                                        <input type="text" class="form-control header__search-input" placeholder="Nhập thông tin loại nhà trọ hoặc tên phòng trọ...." name="search" value="{if !empty($search)}{$search['search']}{/if}">
                                        <!-- Search history -->
                                        <div class="header__search-history">
                                            <!-- <h3 class="header__search-history-heading">Gợi ý tìm kiếm</h3> -->
                                            <ul class="header__search-history-list">
                                                <li class="header__search-history-item">
                                                    <a href="">nhà tập thể</a>
                                                </li>

                                                <li class="header__search-history-item">
                                                    <a href="">ở ghép</a>
                                                </li>

                                                <li class="header__search-history-item">
                                                    <a href="">nguyễn văn trỗi</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-12 col-sm-12">
                                    <div class="form-group" >
                                        <label>Tỉnh</label>
                                        <select class="form-control">
                                            <option value="">Hà Nội</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-12 col-sm-12">
                                    <div class="form-group" >
                                        <label>Quận huyện</label>
                                        <select class="form-control" id="quanhuyen" name="quan" >
                                            <option value="">Quận huyện</option>
                                            {foreach $dsquan as $key =>$val}
                                            <option value="{$val.mahuyen}" {if !empty($search) && $search['quan'] == $val.mahuyen}selected{/if}>{$val.tenhuyen}</option>
                                            {/foreach}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Xã(Phường)</label>
                                        <select class="form-control" id="phuong"  name="phuong">
                                            <option value="" >Xã(Phường)</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="col-md-6 col-xs-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Loại nhà trọ</label>
                                        <select class="form-control"  name="loainhatro">
                                            <option value="" selected disabled>---Chọn loại nhà trọ---</option>
                                            {foreach $DSloaiNhaTro as $val}
                                            <option value="{$val.id_loai}" {if !empty($search) && $search['loainhatro'] == $val.id_loai}selected{/if}>{$val.ten_loai_nhatro}</option>
                                            {/foreach}
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xs-12 col-sm-12">
                                    <div class="form-group">
                                        <label> Giá phòng</label>
                                        <select class="form-control" id="giaphong" name="gia">
                                            <option value="">Giá từ - đến</option>
                                            {foreach $giaPhong as $val}
                                            <option value="{$val.id_giaphong}" {if !empty($search) && $search['gia'] == $val.id_giaphong}selected{/if}> {$val.giatu} VNĐ - {$val.giaden} VNĐ</option>
                                        {/foreach}
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                               <label> Tìm kiếm</label>
                               <button type="submit" name="timkiem" value="1" class="btn btn-warning" style="background: #707cd2; border-color: #707cd2; width: 100%"><i class="fa fa-search"> </i>&nbsp;Tìm kiếm</button>
                           </div>
                       </div>

              <!--   <div class="col-md-3">
                    <div class="form-group">
                        <select class="form-control">
                            <option value="">Diện tích từ - đến</option>
                            <option value="">10m2 - 15m2</option>
                            <option value="">15m2 - 20m2</option>
                        </select>
                    </div>
                </div> -->
            </div>
        </fieldset>

    </form>
</section>
<div class="diden"></div>
<div class="container-fluid hidden-sm hidden-xs" id="nd-trangchu">
    <div class="col-md-12 box-sh">
        <div class="col-md-7 col-xs-12 col-sm-12 " style="padding-right: 0px;">
            <span class="kedoc" style="background: #cfed12;"></span>
            <h2 class="tieude-h2cc"><i class="fa fa-gg" aria-hidden="true"></i>&nbsp;Thông tin nhà trọ</h2>
        </div>
        <!--  <div style="background: blue;" class="col-md-5 col-xs-12 col-sm-12 kengang hidden-xs"></div> -->
        <div class="col-md-12">
            <p class="p-cc">Slogan</p>
        </div>
    </div>
</div>
<div class="container-fluid hidden-lg hidden-md" id="nd-trangchu1">
    <div class="col-md-12 box-sh">
        <div class="col-md-7 col-xs-12 col-sm-12 sv1" style="padding-right: 0px;">
            <span class="kedoc" style="background: #cfed12;"></span>
            <h2 class="tieude-h2cc">Cho Thuê Phòng Trọ  {date(Y)}</h2>
        </div>
    </div>
</div>
<br>
<section class="div-product">
    <div class="col-md-12 col-div-product">
        <div class="sanpham">
            {foreach $dsphong as $key => $val}
            <div class="col-md-3 col-sanpham no-boder-left">
                <div class="main-sp">
                    <div class="div-img-product">
                        <div class="bacground-mo"></div>
                        <img src="{$url}{$val['link_anh']['link_anh']}" width="100%" class="anhsanpham">
                        <div class="xemview"><a href="{$url}ChiTiet?maphongtro={$val.ma_nhatro}"> Xem review</a> &nbsp;<i class="fa fa-eye" aria-hidden="true"></i></div>
                        <div class="border-khung"></div>
                    </div>
                    <div class="noidungsp">
                        <div class="promotel__type bold" style="-webkit-box-orient: vertical;">
                            {$val.loainhatro}
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
                        <div class="promotel-price {if $val.id_trangthai == 1}no-margin{/if}">
                            <div class="col-md-8 {if $val.id_trangthai == 2}col-xs-8{else}col-xs-12{/if}" style="padding: 0;">
                                 <b><span class="glyphicon glyphicon-send" aria-hidden="true"></span>&nbsp;&nbsp;Giá phòng trọ: {$val.giaphong} Đ</b>
                            </div>
                            <div class="col-md-4 {if $val.id_trangthai == 2}col-xs-4{/if} text-right" style="padding: 0;">
                                {if $val.id_trangthai == 2}<span class="hetphong"><strong>Hết phòng</strong> </span>{/if}
                            </div>
                            
                        </div>
                        <div class="promotel-address col-md-12"  style="padding: 0; color:#08c">
                            <p>
                                <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp; <span>{$val['tenxa']} - {$val['tenhuyen']}</span> 
                            </p>
                        </div>
                        <div class="col-md-12" style="padding: 0; color:#c12525">
                            <p>
                                <i class="fa fa-clock-o" aria-hidden="true"></i><small>&nbsp;<span>Thời gian đăng:</span> {$val.ngaydang}</small>
                            </p>
                        </div>
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
<!-- <div class="col-md-12 text-center">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            {$trang = $page}
            {if $page != 1}
            <li>
              <a href="{$url}?page={$page-1}" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        {/if}
        {$sopagehien = $page+5}
        {if $sotrang <= 5}
        {for $key=1 to $sotrang}
        <li><a href="{$url}?page={$key}">{$key}</a></li>
        {/for}
        {else if $sopagehien < $sotrang } 
        {for $key=$page to $sopagehien}
        <li><a href="{$url}?page={$key}">{$key}</a></li>
        {/for}
        {else if $page == $sotrang || $page >= 3}
        {$page = $page - 2}
        {for $key = $page to $sotrang}
        <li><a href="{$url}?page={$key}">{$key}</a></li>
        {/for}
        {else}
        {for $key=$page to $sotrang}
        <li><a href="{$url}?page={$key}">{$key}</a></li>
        {/for}
        {/if}
        {if $page != $sotrang}
        <li>
            <a href="{$url}?page={$trang+1}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
        {/if}
    </ul>
</nav>
</div>
-->
<div class="container-fluid timtrokhoa">
    <h3 class="h3-kn"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp; Tìm trọ gần khu vực của khoa thuộc trường Đại Học Mở Hà Nội</h3>
    <div class="col-md-12 col-khoa">
        <div class="awards-overlay"></div>
        <div class="list-inline">
            <div class="row">
                {foreach $dsKhoa as $key => $val}
                <div class="col-md-3" style="margin-bottom: 10px; ">
                    <a href="location_Faculty?makhoa={$val.makhoa}" target="_blank">
                        <div class="col-md-4 col-xs-2">
                            <img src="{$url}public/images/DV11.png" alt="logo" >
                        </div>
                        <div class="col-md-8 col-xs-10" style="padding-left: 0px;">
                            <h5 class="">{$val.tenkhoa}</h5>
                        </div>
                    </a>
                </div>
                {/foreach}
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="phuong_an" value="{if !empty($search)}{$search['phuong']}{/if}">
<div class="scrollTop hidden"></div>
<script type="text/javascript" src="{$url}public/jquery/trangchu.js"></script>
