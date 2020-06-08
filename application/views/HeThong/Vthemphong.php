<hr>
<div class="container box-shadow">
   <div class="panel panel-primary">
	   	<div class="panel-heading">
	   		<h3 class="panel-title">Bạn hãy nhập đầy đủ thông tin phòng bạn muốn cho thuê</h3>
	   	</div>
	   	<div class="panel-body">
	   		<form method="POST" id="frmSaveData" enctype="multipart/form-data">
	   			<div class="row">
					<div class="col-md-12">
						<div class="form-group col-md-6">
					        <label class="font-weight-bold">Tên phòng trọ</label>
					        <input type="text" class="form-control" name="data[ten_nhatro]" value="{if !empty($chitietPhong)}{$chitietPhong['ten_nhatro']}{/if}">
					    </div>
					    <div class="col-md-3">
			    			<div class="form-group">
			    				<label class="font-weight-bold">Loại nhà trọ</label>
			    				<select class="form-control" name="data[ma_loai_nhatro]">
			    					<option selected value="" disabled>Chọn loại nhà trọ</option>
			    					{foreach $ds_loai_nhatro as $nt}
			    					{if $nt.ghichu != "1"}
			    					<option value="{$nt['id_loai']}" {if !empty($chitietPhong) && $chitietPhong['ma_loai_nhatro'] == $nt['id_loai']}selected{/if}>{$nt['ten_loai_nhatro']}</option>
			    					{/if}
			    					{/foreach}
			    				</select>
			    			</div>
			    		</div>
			    		<div class="col-md-3">
			    			<div class="form-group">
			    				<label class="font-weight-bold">Thành Phố <i class="fa fa-map-marker" aria-hidden="true"></i></label>
			    				<select class="form-control">
			    					<option value="Hà Nội">Hà Nội</option>

			    				</select>
			    			</div>
			    		</div>
					    <div class="col-md-12">
					    	<div class="row">
					    		
					    		<div class="col-md-3">
					    			<div class="form-group">
					    				<label class="font-weight-bold">Quận/Huyện</label>
					    				<select class="form-control" name="quan" id="quan">
					    					<option selected value="">Chọn Quận</option>
					    					{foreach $ds_huyen as $huyen}
					    					<option value="{$huyen['mahuyen']}" {if !empty($chitietPhong) && $chitietPhong['huyen'] == {$huyen['mahuyen']}}selected{/if}>{$huyen['tenhuyen']}</option>
					    					{/foreach}
					    				</select>
					    			</div>
					    		</div>
					    		<div class="col-md-3 pt">
					    			<div class="form-group">
					    				<label class="font-weight-bold">Phường/Xã</label>
					    				<select id="xa" class="form-control" name="data[id_xa]">
					    					<option selected="" value="">Chọn Phường</option>

					    				</select>
					    			</div>
					    		</div>
					    		<div class="col-md-3">
					    			<div class="form-group">
					    				<label class="font-weight-bold">Giá (VNĐ)</label>
					    				<input id="gia" type="text" class="form-control" name="data[giaphong]" value="{if !empty($chitietPhong)}{$chitietPhong['giaphong']}{/if}">
					    			</div>
					    		</div>
					    		<div class="col-md-3">
					    			<div class="form-group">
					    				<label class="font-weight-bold">Diện tích (m<sup>2</sup>)</label>
					    				<input id="post_acreage" type="number" attern="[0-9.]+" name="data[dientich]" max="1000" class="form-control" data-msg-required="Bạn chưa nhập diện tích" value="{if !empty($chitietPhong)}{$chitietPhong['dientich']}{/if}">
					    			</div>
					    		</div>
					    		<input type="hidden" value="{if !empty($chitietPhong)}{$chitietPhong['id_xa']}{/if}" name="id_xa">
					    		
					    	</div>
					    </div>
					    <div class="col-md-12">
					    	<div class="row">
					    		<div class="col-md-6">
					    			<div class="form-group">
					    				<label class="font-weight-bold">Địa chỉ(<span style="color:#007eff">Nhập địa chỉ có trên bản đồ</span>)</label>
					    				<input type="text" class="form-control" name="data[diachi]" placeholder="Ví dụ: 96 định công thanh xuân hà  nội" value="{if !empty($chitietPhong)}{$chitietPhong['diachi']}{/if}">
					    			</div>
					    		</div>
					    		<div class="col-md-4">
					    			<div class="form-group">
					    				<label class="font-weight-bold">Địa chỉ chi tiết(<span style="color:#007eff">Nếu có</span>)</label>
					    				<input type="text" class="form-control" name="data[diachi_chitiet]" placeholder="Ví dụ: Số nhà 12 ngõ 282 định công thanh xuân hà nội"  value="{if !empty($chitietPhong)}{$chitietPhong['diachi_chitiet']}{/if}">
					    			</div>
					    		</div>
					    		<div class="col-md-2">
					    			<div class="form-group">
					    				<label class="font-weight-bold">SĐT chủ nhà trọ</label>
					    				<input type="text" class="form-control" name="" placeholder=""  value="">
					    			</div>
					    		</div>
					    		
					    	</div>
					    </div>
					</div>
					<div class="col-md-12">
					 	<div class="row" style="padding: 10px;">
					 		{if empty($chitietPhong)}
						 		{foreach $tiennghi as $val}
									<div class="col-md-3">
									   <div class="form-check">
										  <label class="form-check-label">
										    <input type="checkbox" name="tiennghi[]" class="form-check-input" value="{$val.id_tiennghi}">
											<img src="{$url}public/images/do-room/{$val.link_anh}" class="img_tiennghi"> <span >{$val.ten_tiennghi}</span>
										  </label>
										</div>
									</div>
								{/foreach}
							{else}
								{foreach $chitietPhong['tiennghi'] as $val}
									<div class="col-md-3">
										<div class="form-check">
											<label class="form-check-label">
												<input type="checkbox" name="tiennghi[]" class="form-check-input" value="{$val.id_tiennghi}" checked="">
												<img src="{$url}public/images/do-room/{$val.link_anh}" class="img_tiennghi"> <span >{$val.ten_tiennghi}</span>
											</label>
										</div>
									</div>
								{/foreach}
								{foreach $chitietPhong['tiennghi_HT'] as $val}
									<div class="col-md-3">
										<div class="form-check">
											<label class="form-check-label">
												<input type="checkbox" name="tiennghi[]" class="form-check-input" value="{$val.id_tiennghi}">
												<img src="{$url}public/images/do-room/{$val.link_anh}" class="img_tiennghi"> <span >{$val.ten_tiennghi}</span>
											</label>
										</div>
									</div>
								{/foreach}
							{/if}
						</div>
					</div>
					<br>
					<div class="col-md-12">
						<div class="col-md-4">
							<div class="form-group imgproduct" >
	                            <label>Chọn ảnh đại diện cho phòng trọ</label>
                            	<input type="file"  class="form-control" value="1" name="anh_phongtro_dd" id="anh_phongtro_dd" onchange="readURL(this);" data-toggle="tooltip" data-ariginal-title="Chọn file ảnh" accept=".jpg,.png, .jpeg" >
                            	{if !empty($chitietPhong['hinhanh_avata'])}
									<img src="{$chitietPhong['hinhanh_avata'][0]['link_anh']}" id="anh" width="100%"/>
									<input type="hidden" name="anh_phongtro_avata" value="{$chitietPhong['hinhanh_avata'][0]['id_anh']}">
								{else}
									<img src="{$url}public/images/image_upload.png" id="anh" width="100%"/>
                            	{/if}
	                        </div>
						</div>
						<div class="col-md-8">
							<div class="form-group imgproduct" >
	                            <label>Chọn ảnh phòng trọ(<span style="color:#007eff">Tối đa 10 ảnh phòng trọ</span>)</label>
	                            <input type="file" multiple id="gallery-photo-add" data-toggle="tooltip" data-ariginal-title="Chọn file ảnh" name="anhphongtro[]" accept=".jpg,.png, .jpeg">
								<div class="gallery">
									{if !empty($chitietPhong)}
										{foreach $chitietPhong['hinhanh'] as $val}
											<span class="close-anh">
												<input type="hidden" name="anh_phongtro_cu[]" value="{$val.id_anh}">
												<img class="anh_prev" src="{$val.link_anh}">
												<span class="xoa_anh_im" data-info="{$val.id_anh}">X</span>
											</span>
										{/foreach} 
									{/if}
								</div>
	                        </div>
						</div>
					</div>
					<div class="col-md-12 ">
					    <div class="form-group">
						  <label class="font-weight-bold" for="exampleFormControlTextarea1">Nội dung mô tả </label>
						  <textarea class="form-control rounded-0" id="txt_content" name="data[mota_phong]" rows="12">{if !empty($chitietPhong)}{$chitietPhong['mota_phong']}{/if}</textarea>
						</div>
					</div>
					<div class="col-md-12 text-center">
						{if !empty($chitietPhong)}
							<button class="btn btn-success" type="submit" id="action" name="suaphongtro" value="{$chitietPhong['ma_nhatro']}">Sửa phòng trọ <i class="fa fa-check" aria-hidden="true"></i>

						{else}
							<button class="btn btn-primary" type="submit" id="action" name="themphongtro" value="add">Thêm phòng trọ <i class="fa fa-check" aria-hidden="true"></i>
					 	</button>
						{/if}
						
					</div>
				</div>
	   		</form>
	   	</div>
   </div>
</div>
<script type="text/javascript" src="{$url}js/themphong.js?t={time()}"></script>
<style>
	 #anh{
        /*padding: 10px;*/
        border: 1px solid #ccc;
        background-image: linear-gradient(45deg, #cdebca, #1aa2ff00);
        /*border-radius: 22px;*/
    }
    #anhsanpham{
        position: absolute;
        top: 40px;
        left: 10px;
        width: 100%;
        height: 100%;
        border-radius: 20px;
        padding: 14px 0;
        cursor: pointer;
        opacity: 0;
    }
    .anh_prev{
        margin-top: 11px;
        height: 112px;
        width: 105px;
        border: 1px solid #ccc;
        background-image: linear-gradient(45deg, #cdebca, #1aa2ff00);
        padding: 2px;
        margin-left: 9px;
    }
    .gallery{
        border: 1px solid #ccc;
        margin-top: 10px;
        min-height: 283px;
        margin-right: 6px;
    }
     
</style>