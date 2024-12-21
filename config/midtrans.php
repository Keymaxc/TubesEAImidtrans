<?php

return[
    'merchant_id' => env('MIDTRANS_MERCHANT_ID'),
    'clientKey' => env('MIDTRANS_CLIENT_KEY'),
    'serverKey' => env('MIDTRANS_SERVER_KEY'),
    'isProduction' => false, 
    'isSanitized' => true,
    'is3ds' => true,

];