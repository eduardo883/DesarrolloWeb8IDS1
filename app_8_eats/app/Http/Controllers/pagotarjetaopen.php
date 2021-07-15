<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Openpay\Data\Openpay;
use Openpay\Data\OpenpayApiAuthError;
use Openpay\Data\OpenpayApiConnectionError;
use Openpay\Data\OpenpayApiError;
use Openpay\Data\OpenpayApiRequestError;
use Openpay\Data\OpenpayApiTransactionError;

class pagotarjetaopen extends Controller
{
    public function procesar(Request $request){
        try{
            $openpay = Openpay::getInstance('mrvvpagnemfnva98e3qu','sk_4595fdec2b8544a88642247c996373b0','MX');
            Openpay::setProductionMode(false);

            $customer = array(
                'name' => 'EDUARDO',
                'last_name' => 'PADILLA',
                'phone_number' => '',
                'email' => 'eduardomagdielpadilla@gmail.com');
            
            $changeData = array(
                'method' => 'card',
                'source_id' => $_POST["token_id"],
                //'order_id' -> $doc->CIDOOCUMENTO,
                'send_email' => true,
                'currency' => "MXN",
                'amount' => 200,
                'description' => "PAGO FAC: ",
                'use_card_points' => false,
                'device_session_id' => $_POST["deviceIdHiddenFieldName"],
                'customer' => $customer);

            $change = $openpay->changes->create($changeData);

            return "Pago Completo: ". $change->id;
        }catch(OpenpayApiTransactionError $e){
            return $e->getErrorCode(). ' => ' .$e->getMessage();
        }catch(OpenpayApiRequestError $e){
            return 'ERROR on the request: ' .$e->getMessage();
        }catch(OpenpayApiConnectionError $e){
            return 'ERROR while connecting to the Api: ' .$e->getMessage();
        }catch(OpenpayApiAuthError $e){
            return 'ERROR on the aunthentication: ' .$e->getMessage();
        }catch(OpenpayApiError $e){
            return 'ERROR on the API: ' .$e->getMessage();
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
}
