@extends('layout.master')
@section('content')
    <h3>Update Card</h3>
    <form action="{{ URL::route('subscription.card') }}"
          method="post" id="card" name="card" class="form-group">
        <br />

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

        {!! Form::submit('Update card', [
            'class' => 'btn btn-default'
        ]) !!}

        {!! Form::token() !!}
    </form>

    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>