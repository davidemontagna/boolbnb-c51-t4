@extends('layouts.app')


@section('content')

<div class="content">
    <form method="POST" id="payment-form" action="{{ route('user.checkout', [$apartment_id, $plan->id])}}">
        @csrf
        <section class="mt-3">
            <label for="amount ">
                <h3 class="input-label ">Riepilogo piano:</h3>
                <div class="mt-3">
                    <h2 class="mb-3">{{$plan->title}}</h2>
                    <h5 class="d-inline">Prezzo: {{$plan->price}} &euro;</h5>
                    <h5 class="ml-5 d-inline">Valido: {{$plan->duration}} ore</h5> 
                </div>
                   
                <div class="input-wrapper amount-wrapper">
                    <input id="amount" name="amount" type="hidden" readonly value="{{$plan->price}}">
                </div>
            </label>

            <div class="bt-drop-in-wrapper">
                <div id="bt-dropin"></div>
            </div>
        </section>

        <input id="nonce" name="payment_method_nonce" type="hidden" />
        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mt-3 mb-3 p-0">
            <button class="dm-button " type="submit"><span>Procedi all'acquisto</span></button>
        </div>
    </form>
    <a href="{{route("user.apartments.index")}}" class="col-12 col-sm-6 col-md-6 col-lg-3 mt-3 mb-3 p-0 d-inline-block"><button type="submit" class="mb-4 dm-button">Torna ai tuoi appartamenti</button></a>
</div>
</div>

<script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>

<script>
var form = document.querySelector('#payment-form');
var client_token = "{{ $token }}";
braintree.dropin.create({
    authorization: client_token,
    selector: '#bt-dropin',
}, function(createErr, instance) {
    if (createErr) {
        console.log('Create Error', createErr);
        return;
    }
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        instance.requestPaymentMethod(function(err, payload) {
            if (err) {
                console.log('Request Payment Method Error', err);
                return;
            }
            // Add the nonce to the form and submit
            document.querySelector('#nonce').value = payload.nonce;
            form.submit();
        });
    });
});
</script>
@endsection