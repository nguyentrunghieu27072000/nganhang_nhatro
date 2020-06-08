<div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  	<div class="p-4 border-bottom bg-light">
                   		<h4 class="card-title mb-0">Hỏi đáp</h4>
                  	</div>
				    <div class="card-body">
				        <div class="row">
			        	    <div class="col-md-1 img">
			        	        <img src="https://image.ibb.co/jw55Ex/def_face.jpg"/>
			        	    </div>
			        	    <div class="col-md-10">
			        	        <p>
			        	            <a class="float-left" href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>Nguyễn Trung Hiếu</strong></a>
			        	            <span class="text-secondary text-center ml-2">15 phút trước</span>
			        	       	</p>
			        	       <div class="clearfix"></div>
			        	        <p>Lorem Ipsum is simply dummy text of the pr make  but also the leap into electronic typesetting, remaining essentially unchanged.</p>
			        	        <p class="see-comment"><a href="#"><i class="fa fa-caret-down pr-2"></i> Xem câu trả lời</a></p>
			        	        <div class="comment-sm">
			            	        <div class="row">
			                    	    <div class="col-md-1 img">
			                    	        <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
			                    	    </div>
			                    	    <div class="col-md-10">
			                    	        <p>
			                    	        	<a href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>ADMIN</strong></a>
			                    	        	<span class="text-secondary text-center ml-2">20 phút trước</span>
			                    	        </p>
			                    	        <p>Lorem Ipsum is simply dummy text of the pr make  but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
			                    	    </div>
			            	        </div>
			            	        <div class="row">
			                    	    <div class="col-md-1 img">
			                    	        <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
			                    	    </div>
			                    	    <div class="col-md-10">
			                    	        <p>
			                    	        	<a href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>Maniruzzaman Akash</strong></a>
			                    	        	<span class="text-secondary text-center ml-2">20 phút trước</span>
			                    	        </p>
			                    	        <p>Lorem Ipsum is simply dummy text of the pr make  but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
			                    	    </div>
			            	        </div>
			            	    </div>
			        	        <p class="button">
			        	        	<input type="text" class="no-border comment" placeholder="Bình luận...">
			        	            <a class="gui float-right btn text-white btn-primary ml-2"> 
			        	            	<i class="fa fa-paper-plane"></i>
			        	            </a>
			        	            <a class="huy float-right btn text-white btn-danger"> Hủy</a>
			        	            <a class="phanhoi float-right btn text-white btn-danger"> Phản hồi</a>
			        	       </p>
			        	    </div>
			        	   
				        </div>
				    </div>
                </div>
              </div>
<style type="text/css">
	.card-body .img img{
		width: 70%;
		margin-left: 40%;
	}
	.card-body .img{
	}
	.no-border {
		width: 70%;
		border: none;
	    border-bottom: 1px solid lightgray;
	    box-shadow: none; /* You may want to include this as bootstrap applies these styles too */
	}
	.huy , .gui{
		display: none;
	}
	.comment{
		display: none;
	}
	.comment-sm{
		display: none;
	}
	.button{
		height: 25px;
	}
</style>
<script type="text/javascript">
	$(document).ready(function(){
		$(".phanhoi").click(function(){
			$(this).closest('.button').children('.gui,.huy').show();
			$(this).closest('.button').children('.comment').show();
			$(this).closest('.button').children('.comment').focus();
			$(this).hide();
			$(this).closest('.button').children('.comment').css('border-color', 'red');
		})
		$("#comment").click(function(){
			$(this).closest('.button').children('.gui,.huy').show();
			$(this).css('border-color', 'red');
		})
		$(".huy").click(function(){
			$(this).closest('.button').children('.hui,.gui').hide();
			$(this).closest('.button').children('.comment').hide();
			$(this).closest('.button').children('.phanhoi').show();
			$(this).hide();
		})
		$(".see-comment").click(function(){
			if($(".comment-sm").is(":visible")){
				$(".comment-sm").hide();
			}
			else{
				$(".comment-sm").show();
			}
		})
	})
</script>
