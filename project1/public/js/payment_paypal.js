

paypal.Button.render({
  // Configure environment
  env: 'sandbox',
  client: {
    sandbox: 'demo_sandbox_client_id',
    production: 'demo_production_client_id'
  },
  // Customize button (optional)
  locale: 'en_US',
  style: {
    size: 'responsive',
    color: 'blue',
    shape: 'rect',
  },

  // Enable Pay Now checkout flow (optional)
  commit: true,
  // Set up a payment
  payment: function (data, actions) {
    var price = $("#cart-total-price").val()/23000;
    price = price.toFixed(2);
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
  onAuthorize: function(data, actions) {
    var thanks = $("#thanks-comment").val();
    var user_id = $("#user-id-payment").val();
    var name = $("#name-payment").val();
    var address = $("#address-payment").val();
    var phone = $("#phone-payment").val();
    var email = $("#email-payment").val();
		return actions.payment.execute().then(function() {
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
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
			}).done(function(response){
        $("#table-payment-id").empty();
        $("#table-payment-id").html(response);
      });
			alert(thanks);
		});
		}
  
}, '#paypal-button');

  