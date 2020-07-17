//var Stripe = Stripe('pk_test_51Gqb2DG4vtl0CqE0FFBLzsBAnjvOXgjIKXrlPC11Y3QE93GpD91iDoQsHWNdGYrpANhoACSPK6Avb7g1i7nqN8Nm007CIeD95F')
Stripe.setPublishableKey('pk_test_51Gqb2DG4vtl0CqE0FFBLzsBAnjvOXgjIKXrlPC11Y3QE93GpD91iDoQsHWNdGYrpANhoACSPK6Avb7g1i7nqN8Nm007CIeD95F');

var $form = $('#checkout-form');

//verification partie front
$form.submit(function(event){
    $('#charge-error').addClass('hidden');
    $form.find('button').prop('disabled', true);
    Stripe.card.createToken({
        number: $('#card-number').val(),
        cvc: $('#card-cvc').val(),
        exp_month: $('#card-expiry-month').val(),
        exp_year: $('#card-expiry-year').val(),
        name: $('#card-name').val()
    }, stripeResponseHandler);
    return false;
});
//dernière verification backend
function stripeResponseHandler(status, response){
    if(response.error){
        $('#charge-error').removeClass('hidden');
        $('#charge-error').text(response.error.message);
        $form.find('button').prop('disabled', false);
    }else{
        var token = response.id;
        $form.append($('<input type="hidden" name="stripeToken"/>').val(token));    

        //soumettre le formulaire
        $form.get(0).submit();
    }
}