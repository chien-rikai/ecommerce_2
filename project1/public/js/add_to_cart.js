    $(document).ready(function () {
        $(".qtybutton").on("click", function () {
            var $button = $(this);
            var oldValue = $button.parent().children("#quantity").val();
            var id = $button.parent().children('.id').val();
            console.log('Hello');
            if ($button.hasClass('inc')) {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                // Don't allow decrementing below zero
                if (oldValue > 1) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 1;
                }
            }
            $button.parent().children("#quantity").val(newVal);
            console.log(newVal);
        });
        $(".add-to-cart").on("click", function () {
            var $button = $(this);
            var quantity = $button.parent().children().children('#quantity').val();
            var id = $button.parent().children().children('.id').val();
            console.log(quantity + " " + id);
            addToCart(id, quantity);
        });
        $(document).on("click",'.add', function () {
            console.log('hello');
            var $button = $(this);
            var id = $button.children('.id_product').val();
            addToCart(id, 1);
            console.log(id);
        });

        function addToCart(id, quantity) {
            $.ajax({
                url: '/web.com/cart/',
                type: 'POST',
                dataType: 'json',
                cache: false,
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    quantity: quantity,
                    id: id
                }
            }).done(function (res) {
                if (res.hasAdd) {
                    var total = res.cart.total;
                    total = total.toLocaleString('it-IT', {
                        style: 'currency',
                        currency: 'VND'
                    });
                    $('#cart-total').text(total);
                    var msg = alertify.message(res.message);
                    msg.delay(3).setContent(res.message);
                } else {
                    var msg = alertify.message(res.message);
                    msg.delay(3).setContent(res.message);
                }
            });
        }
    });
