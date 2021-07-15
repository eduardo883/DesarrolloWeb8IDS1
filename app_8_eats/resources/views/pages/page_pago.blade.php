@extends('layouts.app', ['title' => __('Pago Tarjeta')])

@push('jsH')
<script type="text/javascript" 
        src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script type="text/javascript" 
        src="https://openpay.s3.amazonaws.com/openpay.v1.min.js"></script>
<script type='text/javascript' 
  src="https://openpay.s3.amazonaws.com/openpay-data.v1.min.js"></script>
<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        OpenPay.setId('mrvvpagnemfnva98e3qu');
        OpenPay.setApiKey('pk_a7cb7f4f7d6c4af7ba81b94e744895e2');
        OpenPay.setSandboxMode(true);
        //Se genera el id de dispositivo
        var deviceSessionId = OpenPay.deviceData.setup("payment-form", "deviceIdHiddenFieldName");
        
        $('#pay-button').on('click', function(event) {
            event.preventDefault();
            $("#pay-button").prop( "disabled", true);
            OpenPay.token.extractFormAndCreate('payment-form', sucess_callbak, error_callbak);                
        });

        var sucess_callbak = function(response) {
          var token_id = response.data.id;
          $('#token_id').val(token_id);
          $('#payment-form').submit();
        };

        var error_callbak = function(response) {
            var desc = response.data.description != undefined ? response.data.description : response.message;
            alert("ERROR [" + response.status + "] " + desc);
            $("#pay-button").prop("disabled", false);
        };

    });
</script>
@endpush

@section('content')
    @include('users.partials.header', [
        'title' => __('Pago del Cliente: ') . ' '. auth()->user()->name,
        'description' => __('Pago con Tarjeta'),
        'class' => 'col-lg-7'
    ])

    <pagotarjeta-component/>
    
    @include('layouts.footers.auth')
</div>
@endsection