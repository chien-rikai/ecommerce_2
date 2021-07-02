<!-- <script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
    $(document).ready(function () {
        paypal.Button.render({
                env: 'sandbox',
                client: {
                    sandbox: 'AWsT1Oal_ELsxnKKOrh71amM4COQy7EWyaGalGlgKllQt3gZHTd7h9EeNtTH0UZp0FENEHIJ5qtUd448',
                    production: 'demo_production_client_id'
                },
                locale: 'en_US',
                style: {
                    size: 'large',
                    color: 'gold',
                    shape: 'pill',
                },
                commit: true,
                // Set up the payment:
                payment: function (data, actions) {
                    var price = $('.cart-product-total').val();
                    price = (price / 23000).toFixed(2);
                    return actions.payment.create({
                        transactions: [{
                            amount: {
                                total: price,
                                currency: 'USD'
                            }
                        }]
                    });
                },
                // Execute the payment:
                onAuthorize: function (data, actions) {
                    // 2. Make a request to your server
                    var name = $("#name-payment").val();
                    var address = $("#address-payment").val();
                    var phone = $("#phone-payment").val();
                    var email = $("#email-payment").val();
                    return actions.payment.execute().then(function () {
                        $.ajax({
                            url: '/web.com/payment/',
                            type: 'POST',
                            data: {
                                user_id: user_id,
                                name: name,
                                address: address,
                                phone: phone,
                                email: email,
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content')
                            },
                        }).done(function (response) {
                            $("#table-payment-id").empty();
                            $("#table-payment-id").html(response);
                        });
                    });
                }
            },
            '#paypal-button');
    });

</script> -->
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
    paypal.Button.render({
        // Configure environment
        env: 'sandbox',
        client: {
            sandbox: '{{env("PAYPAL_CLIENT_ID")}}',
            production: 'demo_production_client_id'
        },
        // Customize button (optional)
        locale: 'en_US',
        style: {
            size: 'small',
            color: 'gold',
            shape: 'pill',
        },

        // Enable Pay Now checkout flow (optional)
        commit: true,

        // Set up a payment
        payment: function (data, actions) {
            var price = $('#amount').val();
            price = (price / 23400).toFixed(2);
            return actions.payment.create({
                transactions: [{
                    amount: {
                        total: price,
                        currency: 'USD'
                    }
                }]
            });
        },
        // Execute the payment
        onAuthorize: function (data, actions) {
            return actions.payment.execute().then(function () {
                // Show a confirmation message to the buyer
                $.ajax({
                    url: "/web.com/payment/excecutePay",
                    type :'POST',
                    dataType: 'json',
                    cache: false,
                    data: {
                      _token: $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function (data) {
                      window.alert('{{__("lang.thank-you")}}');
                      location.reload();
                    }
                })
                
            });
        }
    }, '#paypal-button');

</script>
