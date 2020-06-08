<footer id="footer">
    <center class="tieude-ft">
        <p>TRƯỜNG ĐẠI HỌC MỞ HÀ NỘI</p>
        <p class="chunho-ft"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;  B101 Nguyễn Hiền, Bách Khoa, Hai Bà Trưng, Hà Nội</p>
    </center>
    <div class="col-md-12 text-center">
        <h3 style="margin-top: 0;" class="chunho-ft1">Hệ thống ngân hàng nhà trọ của Trường Đại Mở Hà Nội(HOU)</h3>
        <p>Website được xây dựng và phát triển bởi:</p>

        <p> <a href="https://www.facebook.com/tophatrienvachuyengiaocongnghe/?pnref=story" style="color:rgb(255, 227, 89); font-size: 13px;" target="blank">Tổ phát triển - Khoa công nghệ thông tin</a></p>

    </div>
</footer>
<script type="text/javascript">
    $("#giaphong").select2({
        placeholder: "Giá từ - đến",
        allowClear: true
    });
    $("#giaphong").select2({
        placeholder: "Giá từ - đến",
        allowClear: true
    });
    $("#quanhuyen").select2({
            placeholder: "Chọn quân huyện",
            allowClear: true
    });
    $("#phuong").select2({
        placeholder: "Chọn phường xã",
        allowClear: true
    });

</script>
{literal}
<script type="text/javascript">
    $(document).ready(function() {
        top();
         function top(){
            var scrollTop = $(".scrollTop");
            $(window).scroll(function() {
                var topPos = $(this).scrollTop();
                if (topPos > 100) {
                   $("#header").addClass('an_header');
                } else {
                   $("#header").removeClass('an_header');
                }
            });
        }
    });
</script>
{/literal}

    {if !empty($message)}
    <script type="text/javascript">
    	  setTimeout(function() {
    	    toastr.options = {
    	      closeButton: true,
    	      progressBar: true,
    	      showMethod: 'slideDown',
    	      timeOut: 5000
    	    };
    	    toastr.{$message.type}("{$message.title}","{$message.message}");
    	  }, 200);
    </script>
    {/if}
   </body>
</html>