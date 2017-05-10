(function() {

    /***********************************************************/
    /* Handle Proceed to Payment
    /***********************************************************/
    jQuery(function() {
        jQuery(document).on('proceedToPayment', function(event, ShoppingCart) {

            if (ShoppingCart.gateway != 'twocheckout') {
                return;
            }

            var amount = ShoppingCart.calculateTotalPriceIncludingTaxesAndShipping();

            var twocheckoutHandler = TwocheckoutCheckout.configure({
                key: ShoppingCart.settings.payment.methods.twocheckout.publicKey,
                token: function(token, args) {
                    var order = {
                        products: storejs.get('grav-shoppingcart-basket-data'),
                        data: storejs.get('grav-shoppingcart-checkout-form-data'),
                        shipping: storejs.get('grav-shoppingcart-shipping-method'),
                        payment: 'twocheckout',
                        token: storejs.get('grav-shoppingcart-order-token').token,
                        extra: { 'twocheckoutToken': token.id },
                        taxes: ShoppingCart.taxesApplied.toString(),
                        amount: amount,
                        gateway: ShoppingCart.gateway
                    };

                    jQuery.ajax({
                        url: ShoppingCart.settings.baseURL + ShoppingCart.settings.urls.save_order_url + '/task:pay',
                        data: order,
                        type: 'POST'
                    })
                    .success(function(redirectUrl) {
                        ShoppingCart.clearCart();
                        window.location = redirectUrl;
                    })
                    .error(function() {
                        alert('Payment not successful. Please contact us.');
                    });
                }
            });

            twocheckoutHandler.open({
                name: ShoppingCart.settings.payment.methods.twocheckout.name,
                description: ShoppingCart.settings.payment.methods.twocheckout.description,
                email: storejs.get('grav-shoppingcart-checkout-form-data').email,
                amount: parseInt(amount.toString().replace('.', '')), //use cents, as required by Twocheckout
                currency: ShoppingCart.settings.general.currency
            });
        });

    });

})();
