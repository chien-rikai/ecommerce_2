$(document).ready(function () {
    $(document).on("click", ".suggest-more", function () {
        var $button = $(this);
        var productName = $button.parent().children('.product_name').val();
        var id = $button.parent().children('.product_id').val();
        $(".modal-body #id").val(id);
        $(".modal-body #name").val(productName);
        $('#suggest_more').modal('show');
   });
   $(document).on("click", ".request", function () {
        var id = $('.modal-body #id').val();
        var quantity = $('.modal-body #quantity').val();
        var note = $('.modal-body #message').val();
        suggestMoreProduct(id,quantity,note);
        $('#suggest_more').modal('hidden');
    });
    function suggestMoreProduct(id,quantity,note){
        $.ajax({
            url: "/admin/request",
            type: 'POST',
            dataType: 'json',
                cache: false,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                product_id: id,
                quantity:quantity,
                note :note
            },
            success: function(res) {
                var msg = alertify.message(res.message);
                msg.delay(3).setContent(res.message);
                console.log(res.message+'a');
            }
        }).fail(function(res){
            console.log(res.message+'a');
        });
    }
});
