$(document).ready(function(){
	$(".display_cmt").click(function(event) {
		$(this).parent().find(".comt2").toggleClass('hide_cmt');
	});

	$(".xoa_cmt_c1").click(function(event) {
		ma = $(this).attr("data-maCH");
		trangthai = "cap1"; // xoa het cmt cả 1 và 2
		if(confirm("Bạn có chắc chắn muốn xóa câu hỏi này không?")){
			delete_comment(trangthai, ma);
			$('html, body').animate({
	            scrollTop: $(this).parent().offset().top-100
	        }, 400);
		}
	});

	$(".xoa_cmt_c2").click(function(event) {
		ma = $(this).attr("data-maTL");
		trangthai = "cap2"; // xoas cmt cap 2
		if(confirm("Bạn có chắc chắn muốn xóa câu trả lời này không?")){
			delete_comment(trangthai, ma);
			$('html, body').animate({
	            scrollTop: $(this).parent().offset().top-100
	        }, 400);
		}
	});

	function delete_comment(trangthai, ma){
		$.ajax({
			url: window.location.href,
			type: 'get',
			data: {
				'action'	: 'delete_comment',
				'trangthai' : trangthai,
				'ma'        : ma
			},
			success:function(data){
				if(data == "thanhcong"){
					success("Xóa thành công");
					setTimeout(function(){
						location.reload();
					}, 100)
				}else{
					error("Xóa thất bại");
				}
			}
		})
	}

	$(document).on('click','.phanhoi',function(){
		$(this).closest('.button').children('.gui,.huy').show();
		$(this).closest('.button').children('.comment').show();
		$(this).closest('.button').children('.comment').focus();
		$(this).hide();
	})
	$(document).on('click','#comment',function(){
		$(this).closest('.button').children('.gui,.huy').show();
	})
	$(document).on('click','.huy',function(){
		$(this).closest('.button').children('.hui,.gui').hide();
		$(this).closest('.button').children('.comment').hide();
		$(this).closest('.button').children('.comment').val("");
		$(this).closest('.button').children('.phanhoi').show();
		$(this).hide();
	})
	$(document).on('click','.see-comment',function(){
		if($(".comment_cap2").is(":visible")){
			$(".comment_cap2").hide();
		}
		else{
			$(".comment_cap2").show();
		}
	})
	$(document).on('click','#gui_c1',function(){
		var content = $('.add_comment').val();
		$('.add_comment').val("");
		var ma_nhatro = $('.ma_nhatro').val();
		comment(content,ma_nhatro);
		$('html, body').animate({
            scrollTop: $(".dan-cmt:first").offset().top-50
        }, 400);
	});
	$(document).on('click','#gui_c2',function(){
		var id_hoi = $(this).val();
		var content = $(this).closest('.button').children('.comment').val();
		$('.comment').val("");
		comment_cap2(content,id_hoi);
		$('html, body').animate({
            scrollTop: $(this).offset().top-100
        }, 400);
	});
})
function comment_cap2(content,id_hoi){
	$.ajax({
		type:"post",
		url: "ChiTiet",
		data:{
			'action':'comment_cap2',
			'content':content,
			'id_hoi':id_hoi
		},
		success:function(data){
			setTimeout(function() {
				location.reload();
			}, 100);	
		}
	});
}
function comment(content,ma_nhatro){
	$.ajax({
		type:"post",
		url: "ChiTiet",
		data:{
			'action':'comment',
			'content':content,
			'ma_nhatro':ma_nhatro
		},
		success:function(data){
			// var comment = JSON.parse(data);
			// url = window.location.origin + "/" + window.location.pathname.split("/")[1];
			// img = url + '/public/images/images-removebg-preview.png';
			// console.log(img);
			// html = '';
			// html += '<div class="col-md-12 dan-cmt">';
			// html += '<div class="media">';
			// html += '<div class="media-left media-top">';
			// html += '<img src="'+img+'" class="media-object" />';
			// html += '</div>';
			// html += '<div class="media-body">';
			// html += '<strong class="media-heading">'+comment['hoten']+'</strong>';
			// html += '<p>';
			// html += '<span style="color: #d7d9da;"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; '+comment['ngayhoi']+'</span>';
			// html += '</p>';
			// html += '<p>'+comment['noidung']+'</p>';
			// html += '</div>';
			// html += '</div>';
			// html += '</div>';
			// $('.dan-cmt').before(html);
			setTimeout(function() {
				location.reload();
			}, 100);
			
		}
	});


}