$(document).ready(function () {
    $(".qtybutton").on("click", function () {
        var $button = $(this);
        var oldValue = $button.parent().children("#quantity").val();
        var id = $button.parent().children('.id').val();
        var newVal = parseFloat(oldValue);
            if ($button.hasClass('inc')) {
                    newVal +=1;
            } else {
                // Don't allow decrementing below zero
                if (oldValue > 1) {
                    newVal -= 1;
                } else {
                    newVal = 1;
                }
        }
        $.ajax({
            url: '/web.com/cart/' + id,
            type: 'PUT',
            dataType : 'json',
            cache: false,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                quantity: newVal,
                id: id
            }
        }).done(function (res) {
            if (res.hasUpdate) {
                $button.parent().children("#quantity").val(newVal);
                var total = res.cart.total;
                total = total.toLocaleString('it-IT', {
                    style: 'currency',
                    currency: 'VND'
                });
                var amount = res.cart[id].total.toLocaleString('it-IT', {
                    style: 'currency',
                    currency: 'VND'
                });
                $('#cart-total').text(total);
                $('#amount_' + id).text(amount);
                $('#totals').text(total);
            } else {
                var msg = alertify.message(res.message);
                msg.delay(3).setContent(res.message);
            }
        });
        console.log(newVal);
    });
    $(".remove").on("click", function () {
        var $button = $(this);
        var id = $button.parent().parent().children('.idProduct').val();
        if (confirm($button.parent().parent().children('.confirm').val())) {
            $.ajax({
                url: "/web.com/cart/" + id,
                type: "DELETE",
                cache: false,
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id: id
                },
            }).done(function (res) {
                if (res.hasRemove) {
                    var total = res.cart.total;
                    total = total.toLocaleString(
                        'it-IT', {
                            style: 'currency',
                            currency: 'VND'
                        });
                    $('#cart-total').text(total);
                    $('#totals').text(total);
                    $("#product-id-" + id).remove();
                    var msg = alertify.message();
                    msg.delay(3).setContent(res.message);
                } else {
                    var msg = alertify.message();
                    msg.delay(3).setContent(res.message);
                }
            });
        }
    });
});