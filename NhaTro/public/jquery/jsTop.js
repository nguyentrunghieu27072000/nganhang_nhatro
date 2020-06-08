$(document).ready(function($) {
     top();
     function top(){
        var scrollTop = $(".scrollTop");
        $(window).scroll(function() {
            var topPos = $(this).scrollTop();
            if (topPos > 100) {
              $(scrollTop).css("opacity", "1");

            } else {
              $(scrollTop).css("opacity", "0");
            }
        });
        $(scrollTop).click(function() {
          $('html, body').animate({
            scrollTop: 0
          }, 800);
            return false;
        });
    }

    $('.js-example-basic-multiple').select2();
        $('.datepicker').datepicker({
          format: 'dd/mm/yyyy',
          autoclose: true
    });
    $('.js-example-basic-single').select2();
    $(function () {
        $('#datatable').DataTable({
            ordering: true,
            paging: true,
            "pageLength": 10
        })
    })
    $('.datepicker').datepicker({
      format: 'dd/mm/yyyy',
      autoclose: true
    });
    $(function() {
        $('#table_id').DataTable();
        // $('#tableleft').DataTable();
        // $('#tableright').DataTable();
    })
});
