<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class pamentController extends Controller
{

function payment(){

 $provider = new PayPalClient;

// Through facade. No need to import namespaces
$provider = \PayPal::setProvider();


// $config = [
//     "mode"    => "live",
//     "live" => [
//         "client_id"         => "some-client-id",
//         "client_secret"     => "some-client-secret",
//         "app_id"            => "APP-80W284485P519543T",
//     ],

//     "payment_action" => "Sale",
//     "currency"       => "USD",
//     "notify_url"     => "https://your-app.com/paypal/notify",
//     "locale"         => "en_US",
//     "validate_ssl"   => true,
// ];

$provider->setApiCredentials(config("paypal"));

$token = $provider->getAccessToken();
$provider->setAccessToken($token);


$price = 100;
$description ="test description";

$order=$provider->createOrder(
[
    "intent"=>"CAPTURE",
    "purchase_units"=>
    [
        "amout"=>[
            "currency_code"=>"USD",
            "value"=>$price,

        ],
        "description"=>$description

    ]
]

    );
return response()->json($order);
}



}
