<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Openpay\Data\OpenpayApiAuthError;
use Openpay\Data\OpenpayApiConnectionError;
use Openpay\Data\OpenpayApiError;
use Openpay\Data\OpenpayApiRequestError;
use Openpay\Data\OpenpayApiTransactionError;

class pagotarjetaopen extends Controller
{
    public function procesar(Request $request){
        try {
            $openpay = Openpay::getInstance('mvnnhehtvrq','sk_4595fdec2b8544a88642247c996373b0','MX');
            Openpay::setProductionMode(false);

            $customer= array(
                'name' => 'EDUARDO PADILLA',
                'last_name' => '',
                'phone_number' => '',
                'email' => 'eduardomagdielpadilla@gmail.com'
            );

            $changeData = array(
                'method' => 'card',
                'source_id' => $_POST["token_id"],
                //'order_id' => $doc->CIDOOCUMENTO,
                'send-email' => true,
                'currency' => "",
                'amount' => 200, //Formato númerico con hasta 2 dígitos decimales
                'description' => "PAGO FAC: ",
                'use_card_points' => false, //Opcional, si estamos usando puntos
                'device_session_id' => $_POST["deviceIdHiddenFieldName"],
                'customer' => $customer,
                //'redirect_url' => "http://www.openpay.mx/index.html",
                //'use_id_secure' => "true"
            );

            $change = $openpay->changes->create($changeData);

            return "Listo: " . $openpay->token;

        } catch (OpenpayApiTransactionError $e) {

            return $e->getErrorCode() . ' => ' . $e->getMessage();

        } catch (OpenpayApiRequestError $e){

            return 'ERROR on the request: ' . $e->getMessage();

        } catch (OpenpayApiConnectionError $e){

            return 'ERROR while connecting to the API: ' . $e->getMessage();

        } catch (OpenpayApiAuthError $e){
            
            return 'ERROR on the authentication: ' . $e->getMessage();

        } catch (OpenpayApiError $e){

            return 'ERROR on the API: ' . $e->getMessage();

        } catch (Exception $e){

            return $e->getMessage();

        }
    }
}
