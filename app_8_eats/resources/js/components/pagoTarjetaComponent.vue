<template>
    <div class="card" style="margin:; width:auto;">
        <div class="card-body">
            
            <form id="payment-form" action="/procesarpagotarjeta" method="POST">
                <input type="hidden" name="token_id" id="token_id">
                <input type="hidden" name="_token" :value="csrf">

                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Número de Tarjeta</label>
                    <input class="form-control" type="text" minlength="16" id="example-text-input" data-openpay-card="card_number">
                </div>
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Nombre</label>
                    <input class="form-control" type="search" id="example-search-input" data-openpay-card="holder_name">
                </div>
                <div class="form-group row">
                    <label for="mes" class="col-sm-1 col-form-label">Mes</label>
                    <div class="col-sm-3">
                        <input class="form-control" type="text" id="mes" data-openpay-card="expiration_month">
                    </div>

                    <label for="anio" class="col-sm-1 col-form-label">Año</label>
                    <div class="col-sm-3">
                        <input class="form-control" type="text" id="anio" data-openpay-card="expiration_year">
                    </div>

                    <label for="cvv" class="col-sm-1 col-form-label">CVV</label>
                    <div class="col-sm-3">
                        <input class="form-control" type="password" id="password" data-openpay-card="cvv2">
                    </div>
                </div>

                <div class="form-group">
                    <button type="button" id="pay-button" class="form-control btn btn-primary">Cobrar</button>

                </div>

            </form>

        </div>
    </div>
</template>
<script>
export default {
    mounted(){
        console.log('Component mounted')
    },data(){
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    }
}
</script>