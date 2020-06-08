$(document).ready(function() {
   $(document).on('click',".timtrobt",function(){
    $('html, body').animate({
        scrollTop: $(".diden").offset().top-70
    }, 400);

});
   getXa($("#quanhuyen").val());
   $(document).on('change',"#quanhuyen",function(){
    getXa($(this).val())
});

   function getXa($mahuyen){
    $.ajax({
        url: window.location.href,
        type: 'POST',
        data: {
            mahuyen: $mahuyen,
            action: 'luachon'
        },
        success: function(data){
            html="";
            $data = JSON.parse(data);
            if ($data != null) {
                $.each($data, function(index, value){
                    html += '<option value= "'+value['maxa']+'">' + value['tenxa'] + '</option>';
                })
            }
            $('#phuong').append(html);
            var phuong_an = $("#phuong_an").val();
            $("#phuong").val(phuong_an).trigger('change');
        },
        error: function(){
            alert('Thất bại!');
        }
    })
}
});