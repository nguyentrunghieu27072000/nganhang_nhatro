<div class="container ">
	<div class="col-md-12">
		<h1>Danh sách phòng trọ {if !empty($session)}{$session['hoten']}{/if} đã đăng lên hệ thống</h1>
	</div>
	<div class="col-md-12">
		<p class="label label-primary">Tổng số phòng trọ chưa cho thuê: {$trangthai['conphong']}</p>
		&nbsp;
		<p class="label label-warning">Tổng số phòng trọ đã cho thuê: {$trangthai['hetphong']}</p>
	</div>
	<div class="col-md-12">
		<br>
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th  style="vertical-align: middle;">STT</th>
					<!-- <th width="10%">Mã Phòng</th> -->
					<th width="20%" style="vertical-align: middle;">Loại Phòng</th>
					<th style="vertical-align: middle;">Địa chỉ</th>
					<th  style="vertical-align: middle;" class="text-center">Ngày đăng phòng</th>
					<!-- <th width="10%">Trạng Thái</th> -->
					<th  style="vertical-align: middle;">Trạng Thái Phòng</th>
					<th  style="vertical-align: middle;">Hình ảnh phòng</th>
					<th width="15%" style="vertical-align: middle;">Tác Vụ</th>
				</tr>
			</thead>
			<tbody>
				<form method="post">
					{foreach $dsPhongTro as $key => $val}
					<tr>
						<td class="text-center" style="vertical-align: middle;"><b>{$key+1}</b></td>
						<!-- <td style="vertical-align: middle;">{$val.ma_nhatro }</td> -->
						<td style="vertical-align: middle;">{$val.ten_loai_nhatro }</td>
						<td style="vertical-align: middle;">{$val.diachi }</td>
						<td style="vertical-align: middle;" class="text-center">{$val.ngaydang }</td>
						<!-- <td> <span class="label label-primary">Đã duyệt</span></td> -->
						<td style="vertical-align: middle;"> <input type="checkbox" checked data-toggle="toggle" value="{$val.ma_nhatro}" class="ma_phong" data-tt="{$val.id_trangthai}"></td>
						<td style="vertical-align: middle; text-align: center;"> <span class="label label-warning">{$val.hinhanh}</span> hình ảnh</td>
						<td>
							<a href="{$url}ChiTiet?maphongtro={$val.ma_nhatro}&quaylai=quaylai" >
								<button class="btn btn-warning" style="margin-bottom: 4px; width: 100%;">Review &nbsp;<i class="fa fa-eye"></i></button>
							</a>
							<button class="btn btn-primary" name="suaphong" value="{$val.ma_nhatro}" style="margin-bottom: 4px; width: 100%;">Sửa phòng <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
							{if $session['maquyen'] == 2}
							<button class="btn btn-danger" value="{$val.ma_nhatro}" name="xoaphongtro" style="margin-bottom: 4px; width: 100%;" onclick="return confirm('Bạn có chắc chắn muốn xóa phòng trọ này không?');">Xóa phòng <i class="fa fa-trash" aria-hidden="true"></i></button>
							{/if}
						</td>
					</tr>
				{/foreach}
						</form>
			</tbody>
		</table>
	</div>
</div>
{literal}
<script type="text/javascript">
	$(document).ready(function() {
		turn_on = $(".ma_phong");
		for($i=0; $i<turn_on.length; $i++){
			if(turn_on.eq($i).attr("data-tt") == 2){
				turn_on.eq($i).parent().addClass('off');
			}
		}
		$(".toggle-on").text("Còn phòng");
		$(".toggle-off").text("Hết phòng");
		$(document).on("click", ".toggle-on, .toggle-off", function(){
			changeTT($(this).parent().parent().find(".ma_phong").val());
		});

		function changeTT($manhatro){
			$.ajax({
				url: window.location.pathname,
				type: 'post',
				data: {'action': 'changeTT', 'ma': $manhatro},
				success:function(data){
					location.reload();
				}
			});
		}
	});
</script>
{/literal}

<style>
	.toggle.btn {
	    min-width: 100px;
	    min-height: 31px;
	}
</style>