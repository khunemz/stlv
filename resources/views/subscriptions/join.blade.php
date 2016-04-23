@extends('layout.master')
@section('content')
    <h3>Subscriptoin now</h3>
    <form action="{{ URL::route('subscription.postJoin') }}"
          method="post" id="stripe" name="stripe" class="form-group">
        <span class="payment-errors alert alert-danger"></span>
        <br />
        <label for="plan">Plan : </label>
        <div class="form-group">
            <select name="plan" id="plan">
                <option value="monthly">Monthly Plan (200 THB per month)</option>
                <option value="yearly">Yearly Plan (1,500 THB per year)</option>
            </select>
        </div>

        <div class="form-group">
            <label for="number">Number : </label>
            <input name="number" type="text" class="form-control"
                placeholder="XXXX-XXXX-XXXX-XXXX" data-stripe="number">
        </div>

        <div class="form-group">
            <label for="expiry_month">Expiry month</label>
            <input name="exp_month" type="text" class="form-control"
                placeholder="MM" data-stripe="exp_month">
        </div>

        <div class="form-group">
            <label for="expiry_year">Expiry year</label>
            <input name="exp_year" type="text" class="form-control"
                   placeholder="YY" data-stripe="exp_year">
        </div>

        <div class="form-group">
            <label for="cvc">CVC number</label>
            <input name="cvc" type="text" class="form-control"
                   placeholder="cvc" data-stripe="cvc">
        </div>

        {!! Form::submit('Subscribe now!!', [
            'class' => 'btn btn-default'
        ]) !!}

        {!! Form::token() !!}
    </form>

    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script>
        $(document).ready(function(){
            Stripe.setPublishableKey('pk_test_dM2a4RjmA7LdXB4txSJHqQyq');

            $(function(){
                var $form = $('#stripe');
                $form.submit(function(event){
                    //Disable submit button to prevent
                    //repeated clicks:
                    $form.find('btn').prop('disabled', true);
                    //Request a token from stripe:
                    Stripe.card.createToken($form, stripeResponseHandler);
                    //Prevent the form from being submitted
                    return false;
                });

                function stripeResponseHandler(status , response) {
                    var $form = $('#stripe');
                    if (response.error) {
                        $form.find('.payment-errors').text(response.error.message);
                        $form.find('.btn').prop('disabled', false);
                    } else {
                        // Get the token ID:
                        var token = response.id;
                        // Insert the token ID into the form so it gets submitted to the server
                        $form.append($('<input type="hidden" name="stripeToken">').val(token));
                        //Submit the form :
                        $form.get(0).submit();
                    }

                }
            });


        });
    </script>
@endsection