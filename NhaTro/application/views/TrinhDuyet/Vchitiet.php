<script type="text/javascript" src="{$url}js/chitiet.js"></script>	
<div class="container-fluid p-d-0 c-t-ct">
	<section class="content fixdisplay content1 p-d-0">
		<div class="col-md-12" id="col-content">
			<div class="col-md-12" style="padding: 0;">
				<div class="col-md-6" style="padding: 0;">
					<b class="font-Arima title-p-ct"><p>Trang chủ <span>>></span> Thuê phòng <span>>></span>{$chitiet['diachi']}</p></b>
				</div>
				<div class="col-md-6 text-right">
					{if !empty($quaylai)}
					<a href="ds_phong" class="btn btn-danger">Quay lại <i class="fa fa-share-square-o" aria-hidden="true"></i></a>
					{/if}
				</div>
			</div>	
			<p  class="tieude-rom"><b>{$chitiet['diachi']}</b></p>	
			<div class="imgproduct thumbnail">
				<a href="{$url}{$chitiet['hinhanh_avata']}" class="img_sp" rel="motnhom">
					<img src="{$url}{$chitiet['hinhanh_avata']}" class="anhSP anhfrist">
				</a>
				<div class="text-center nhieuanh">
					<ul class="nav nav-pills">
						{foreach $chitiet['hinhanh'] as $key => $val}
						{if $val['ghichu'] != "avata"}
						<li>
							<a href="{$url}{$val.link_anh}" class="img_sp" rel="motnhom">
								<img src="{$url}{$val.link_anh}" class="anhSP" >
							</a>
						</li>
						{/if}
						{/foreach}
					</ul>
				</div>
			</div>
			<div class="mota_room">
				<div class="table-responsive">
					<table class="table table-hover table-bordered">
						<tbody>
							<tr>
								<td class="tieude-td"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Địa chỉ</td>
								<td class="tendiachi" width="35%"><b>{$chitiet.diachi}</b></td>
								<td class="tieude-td"><i class="fa fa-joomla" aria-hidden="true"></i>&nbsp;Chuyên mục</td>
								<td><b><label class="label label-warning">Thuê phòng trọ</label> </b></td>
							</tr>
							<tr>
								<td class="tieude-td"><i class="fa fa-product-hunt" aria-hidden="true"></i>&nbsp;Giá tiền</td>
								<td class="todo"><b>{$chitiet.giaphong}</b></td>
								<td class="tieude-td"><i class="fa fa-object-group" aria-hidden="true"></i>&nbsp;Diện tích</td>
								<td class="todo"><b>{$chitiet.dientich} m2</b></td>
							</tr>
							<tr>
								<td class="tieude-td"><i class="fa fa-mobile" aria-hidden="true"></i>&nbsp;Liên hệ</td>
								<td class="hoten_chuphong"><b>{$chitiet.hoten}</b></td>
								<td class="tieude-td"><i class="fa fa-phone-square" aria-hidden="true"></i>&nbsp;Điện thoại</td>
								<td ><b><a href="tel:0868378653">{$chitiet.sdt}</a> </b></td>
							</tr>
							<tr>
								<td class="tieude-td"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;Ngày đăng:</td>
								<td><b>{$chitiet.ngaydang}</b></td>
								<td class="tieude-td"><i class="fa fa-smile-o" aria-hidden="true"></i>&nbsp;Trạng thái:</td>
								<td>
									{if $chitiet['id_trangthai'] != 1}
									<b><label class="label label-danger">Đã hết phòng</label></b>
									{else}
									<b><label class="label label-success">Còn phòng</label></b>
									{/if}
								</td>
							</tr>
						</tbody>
					</table>
					<hr>
					<div class="nd-mt">
						<p class="title-mota-ch">✪ Địa chỉ chi tiết</p>
						<strong style="color:green">
							{$chitiet['diachi_chitiet']}.
						</strong>
					</div>
					<div class="nd-mt">
						<p class="title-mota-ch">✺ Mô tả chung</p>
						<strong>
							{$chitiet['mota_phong']}.
						</strong>
					</div>
					<div class="nd-mt">
						<p class="title-mota-ch">
							✺ Tiện nghi chỗ ở
						</p>
						<div class="tiennghicho_o">
							{foreach $chitiet['tiennghi'] as $key => $val}
							<div class="col-md-4 col-xs-6">
								<img src="{$url}public/images/do-room/{$val.link_anh}" class="img_tiennghi"> <span>{$val.ten_tiennghi}</span>
							</div>
							{/foreach}
						</div>
					</div>
					<div class="nd-mt">
						<p class="title-mota-ch">
							✺ Địa chỉ tòa nhà
						</p>
						<div class="tiennghicho_o">
							<div id="map">
								<iframe width="100%" height="480" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q={$chitiet.diachi}&output=embed"></iframe>
							</div>
						</div>
					</div>

				</div>
			</div>
			<div class="row" id="anh">
				{if count($dsPhongLQ) > 5}
				<p class="title-mota-ch">✪ Danh sách phòng liên quan</p>
				<div class="col-lg-12 col-md-12 col-xs-12 ">
					<marquee id="marq" class="imgproduct" scrollamount="9" direction="left" loop="50" scrolldelay="300" behavior="alternate" onmouseover="this.stop()" onmouseout="this.start()">
						{foreach $dsPhongLQ as $val}
						<div class="xemview">
							<a href="{$url}ChiTiet?maphongtro={$val.ma_nhatro}"> Xem review</a> &nbsp;
							<i class="fa fa-eye" aria-hidden="true"></i>
						</div>
						<a rel="motnhom"  href="{$url}ChiTiet?maphongtro={$val.ma_nhatro}"> 
							<img src="{$val['hinhanh']['link_anh']}" width="200" class="images_slide" height="180" >

						</a>
						{/foreach}
					</marquee>
					<hr>
				</div>
				{/if}
			</div>
			<div class="row">
				<div class="col-md-12">
					<p class="title-mota-ch">✪ Hỏi đáp</p>
					<input type="hidden" class="ma_nhatro" name="ma_nhatro" value="{$chitiet.ma_nhatro}">
					<p class="text-phanhoi">
						Mọi thông tin trên website chỉ mang tính chất tham khảo. Chúng tôi luôn cố gắng cung cấp các thông tin đầy đủ, chính xác và minh bạch đến người xem, tuy nhiên quá trình kiểm duyệt vẫn có thể xảy ra sơ sót. Nếu bạn có phản hồi với tin đăng này (tin đã cho thuê, không liên lạc được, các trường hợp khác), vui lòng thông báo để hệ thống có thể xử lý.
					</p>
					<div class="col-md-12" style="padding: 1em 0;">
						<div class="media">
							<div class="media-left">
								<img src="{$url}public/images/images-removebg-preview.png"/>
							</div>
							<div class="media-body">
								<textarea class="form-control add_comment" name="add_comment" placeholder="Bình luận..." rows="3"></textarea>
								{if isset($session) && !empty($session)}
								<button title="Gửi" type="button" id="gui_c1" name="gui" value="" class="btn text-white btn-primary" style="margin-top: 5px;"> 
									<i class="fa fa-paper-plane"></i>&nbsp;Bình luận
								</button>
								{else}
								<button type="button" class="btn text-white btn-primary  dangnhap3" style="margin-top: 5px;"> 
									<i class="fa fa-paper-plane"></i>&nbsp;Bình luận</button>
									{/if}
								</div>
							</div>
						</div>
						<!-- Latest compiled and minified CSS -->
						{foreach $comment_phong as $comment}
						<div class="col-md-12 dan-cmt">
							<div class="media">
								<div class="media-left media-top">
									<img src="{$url}public/images/images-removebg-preview.png" class="media-object" />
								</div>
								<div class="media-body">
									<strong class="media-heading">{$comment.hoten}</strong>&nbsp; &nbsp;<span class="display_cmt"><i class="fa fa-caret-down" aria-hidden="true"></i></span> &nbsp; {if isset($session) && !empty($session)}<span class="xoa_cmt_c1" data-maCH="{$comment['id_hoi']}"><i class="fa fa-trash" aria-hidden="true"></i></span>{/if}
									<p>
										<span style="color: #d7d9da;"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; {$comment.ngayhoi}</span>
									</p>
									<p>{$comment.noidung}</p>
									
									<div class="comt2">
										{foreach $comment.comment_cap2 as $cm_cap2} 
										<div class="media" style="padding: 10px 0;">
											<div class="media-left media-middle">
												<img src="{$url}public/images/images-removebg-preview.png" class="media-object" />
											</div>
											<div class="media-body">
												<strong class="media-heading">{$comment.hoten}</strong>&nbsp; {if isset($session) && !empty($session)}<span class="xoa_cmt_c2" data-maTL="{$cm_cap2['id_traloi']}"><i class="fa fa-trash" aria-hidden="true"></i></span>{/if}
												<p>
													<span style="color: #d7d9da;"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; {$comment.ngayhoi}</span>
												</p>
												<p>
													{$cm_cap2.noidung}
												</p>
											</div>
										</div>
										{/foreach}
									</div>

									{if isset($session) && !empty($session)}
									<p class="button">
										<input type="text" class="form-control comment" name="comment_cap2" value="" placeholder="Bình luận..." style="margin-bottom: 5px;"><br>
										<button type="button" id="gui_c2" name="gui" value="{$comment.id_hoi}" class="gui float-right btn text-white btn-primary btn-sm ml-2"> 
											Bình luận <i class="fa fa-paper-plane"></i>
										</button>

										<a class="huy float-right btn text-white btn-danger"> Hủy</a>
										<a class="phanhoi float-right btn btn-sm text-white btn-warning"> Phản hồi</a>

									</p>
									{/if}
								</div>
							</div>
						</div>
						{/foreach}
					</div>
				</div>    
			</section>
		</div>

