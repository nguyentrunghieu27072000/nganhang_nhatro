$(document).ready(function() {
	
	xoaanh();
	function xoaanh(){
		$("span.xoa_anh_im").click(function(event) {
			ma_anh = $(this).attr("data-info");
			if(confirm("Bạn có chắc chắn muốn xóa ảnh này khỏi phòng trọ không?")){
				$(this).parent().remove();
				$.ajax({
					url: window.location.pathname,
					type: 'post',
					data: {
						'action': 'xoa_anhnhatro',
						'ma' 	: ma_anh
					},
					success:function(data){
						if(data == "thanhcong"){

							success("Xóa ảnh thành công");
						}else{
							error("Xóa ảnh thất bại");
						}
					}
				})
			}
		});
	}
	

	$("#gia").keydown(function (event) {
		if (event.shiftKey == true) {
			event.preventDefault();
		}
		if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46) {

		} else {
			event.preventDefault();
		}
	});
	$('#gia').simpleMoneyFormat();

	$('#pro-image').on("change", readImage);
	$(document).on('click', '.image-cancel', function() {
		let no = $(this).data('no');
		$(".preview-image.preview-show-"+no).remove();
	});
	$(function() {				    				    
		CKEDITOR.replace('txt_content',{
			language: "vi",
		});
	})
	var tenxa, tenquan;
	// diachi  = tenxa +", " + tenquan+", Hà Nội"; 
	get_xa($('#quan').val());
	$('#quan').on('change',function(){
		tenquan = $(this). children("option:selected"). text();
		tenxa = "";
		get_xa($(this).val());
		diachi  =  +", " + tenquan+", Hà Nội";
		$("input[name='data[diachi]']").val(diachi);
	});
	$('#xa').on('change',function(){
		tenquan = $("#quan option:selected").text();
		tenxa = $(this). children("option:selected"). text();
		diachi  = tenxa +", " + tenquan+", Hà Nội";
		console.log($("#quan option:selected").text());
		if($("#quan option:selected").text() != "Chọn Quận"){
			$("input[name='data[diachi]']").val(diachi);
		}
	})
		
	$("#frmSaveData").validate({
		rules:{
			'data[ten_nhatro]'		: "required",
			'data[giaphong]'		: "required",
			'data[dientich]'		: "required",
			'data[ma_loai_nhatro]'	: "required",
			quan					: "required",
			'data[id_xa]' 			: "required",
      		'data[mota_phong]'		: "required"
  		},
		messages: {
			'data[ten_nhatro]'		: "Bạn chưa nhập tên phòng trọ",
			'data[giaphong]'		: "Bạn chưa nhập giá",
			'data[dientich]'		: "Bạn chưa nhập diện tích",
			'data[ma_loai_nhatro]'	: "Bạn chưa chọn loại nhà trọ",
			quan					: "Bạn chưa chọn quận/huyện",
			'data[id_xa]' 			: "Bạn chưa chọn xã/phường",
      		'data[mota_phong]'		: "Bạn chưa nhập nội dung mô tả",
			}
      	});
		$("#quan").select2({
			placeholder: "Chọn quân huyện",
			allowClear: true
		});
		$("#xa").select2({
			placeholder: "Chọn phường xã",
			allowClear: true
		});

		function get_xa(quan){
			$.ajax({
				type:"post",
				url: "themphong",
				data:{
					'get_xa':'get_xa',
					'quan':quan
				},
				success:function(data){
					var ds_xa = JSON.parse(data);
					var html = `<option selected value="">-- phường/xã --</option>`
					ds_xa.forEach(function(xa,index){
						html += `<option value="`+xa['maxa']+`">`+xa["tenxa"]+`</option>`
					})
					$("#xa").html(html);	
					xa = $("input[name='id_xa']").val();
					$('select[name="data[id_xa]"]').val(xa).trigger('change');
				}
			})
		}

		  // Multiple images preview in browser
	    var imagesPreview = function(input, placeToInsertImagePreview) {
	     	if (input.files) {
	     		var filesAmount = input.files.length;
	     		var html = '';
	     		for (i = 0; i < filesAmount; i++) {
	     			var reader = new FileReader();
	     			reader.onload = function(event) {
	     				html = '<span class="close-anh"><img class="anh_prev" src="'+event.target.result+'"><span class="xoa_anh_im" data-info="khongco">X</span></span>';
	     				$(placeToInsertImagePreview).append(html);
	     			}
	     			reader.readAsDataURL(input.files[i]);
	     		}
	     	}
	     };
	     $('#gallery-photo-add').on('change', function() {
	     	imagesPreview(this, 'div.gallery');
	     });
	     var num = 1;

	    function readImage() {
	     	if (window.File && window.FileList && window.FileReader && num <7) {
		        var files = event.target.files; //FileList object
		        var output = $(".preview-images-zone");

		        for (let i = 0; i < files.length; i++) {
		        	var file = files[i];
		        	if (!file.type.match('image')) continue;

		        	var picReader = new FileReader();

		        	picReader.addEventListener('load', function (event) {
		        		var picFile = event.target;
		        		var html =  '<div class="preview-image preview-show-' + num + '">' +
		        		'<div class="image-cancel" data-no="' + num + '">x</div>' +
		        		'<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result + '"></div>' +
		        		'<div class="tools-edit-image"><a href="javascript:void(0)" data-no="' + num + '" class="btn btn-light btn-edit-image">edit</a></div>' +
		        		'</div>';

		        		output.append(html);
		        		num = num + 1;
		        	});

		        	picReader.readAsDataURL(file);
		        }
		    } else {
		    	alert("Không thể tải thêm ảnh");
		    }
		}
		function readURL(input) {
		      if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        reader.onload = function(e) {
		          $('#anh').attr('src', e.target.result);
		        }
		        reader.readAsDataURL(input.files[0]); // convert to base64 string
		      }
		}

	    $("#anh_phongtro_dd").change(function() {
	      readURL(this);
	    });
});
