<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;

class PaymentController extends Controller
{
    /**
     * Initiate a payment.
     */
    public function initiate($payment_data)
    {
        $data = [
            'name' => $payment_data['name'],
            'email' => $payment_data['email'],
            // Convert to kobo
            'amount' => $payment_data['amount'] * 100,
            'subaccount'=> $payment_data['payment_id'],

            // Test payment account information
            // Live Acc = ACCT_gfbo9r4csa29bnx
            // "subaccount" => "ACCT_7ib9ztjvcev66wo",
            // 'subaccount'=> 'ACCT_gfbo9r4csa29bnx',

            'metadata' => [
                // Your unique reference for the order
                'order_id' =>  $payment_data['payment_id'] . '-' . now()->format('Y-m-d H:i:sA'),
            ],
            // Your callback URL to handle payment status
            // 'callback_url' => route('payment.verify'),
            'callback_url' => $payment_data['redirect_url'] ?? url()->previous(),

        ];


        try {
            $response = Http::withToken(config('services.paystack.secret'))
                ->post(config('services.paystack.url') . '/transaction/initialize', $data);

            // return $response;
            // dd($response->body());

            if ($response->failed()) {
                return ([
                    'success'=> false,
                    'message' => 'Failed to initialize payment, ' . $response['message']
                ]);
            }

            return ([
                'success'=> true,
                'authorization_url' => $response['data']['authorization_url'],
                'access_code' => $response['data']['access_code'],
                'reference' => $response['data']['reference'],
                'gateway' => 'paystack',
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return ([
                'success'=> false,
                'message' => 'Failed to initialize payment, please try again later',
            ]);
        }
    }

    /**
     * Verify the payment.
     */
    public function verify($reference)
    {

        try {
            $response = Http::withToken(config('services.paystack.secret'))
                ->get(config('services.paystack.url') . '/transaction/verify/' . $reference);

            // dd($response);

            if ($response->failed()) {
                return (['success'=> false, 'message' => 'Failed to verify payment.']);
            }

            // response.data.status
            if ($response['data']['status'] === 'success') {
                return (['success'=> true, 'message' => 'Payment verified successfully.', 'data' => $response['data']]);
            }

        } catch (\Throwable $th) {
            //throw $th;
            return (['success'=> false, 'message' => 'Failed to verify payment, please try again later']);

        }

        return (['success'=> false, 'message' => 'Payment verification failed.']);
    }


    public function webHook(){

    }


    public function phpWebHook(){

        // only a post with paystack signature header gets our attention
        if ((strtoupper($_SERVER['REQUEST_METHOD']) != 'POST' ) || !array_key_exists('HTTP_X_PAYSTACK_SIGNATURE', $_SERVER) )
            exit();

        // Retrieve the request's body
        $input = @file_get_contents("php://input");

        // define('PAYSTACK_SECRET_KEY','SECRET_KEY');
        define('PAYSTACK_SECRET_KEY',config('services.paystack.secret'));


        // validate event do all at once to avoid timing attack
        if($_SERVER['HTTP_X_PAYSTACK_SIGNATURE'] !== hash_hmac('sha512', $input, PAYSTACK_SECRET_KEY))
            exit();

        http_response_code(200);

        // parse event (which is json string) as object
        // Do something - that will not take long - with $event
        $event = json_decode($input);




        exit();
    }
}





// webhook  Transaction Successful
// {
//   "event": "charge.success",
//   "data": {
//     "id": 302961,
//     "domain": "live",
//     "status": "success",
//     "reference": "qTPrJoy9Bx",
//     "amount": 10000,
//     "message": null,
//     "gateway_response": "Approved by Financial Institution",
//     "paid_at": "2016-09-30T21:10:19.000Z",
//     "created_at": "2016-09-30T21:09:56.000Z",
//     "channel": "card",
//     "currency": "NGN",
//     "ip_address": "41.242.49.37",
//     "metadata": 0,
//     "log": {
//       "time_spent": 16,
//       "attempts": 1,
//       "authentication": "pin",
//       "errors": 0,
//       "success": false,
//       "mobile": false,
//       "input": [],
//       "channel": null,
//       "history": [
//         {
//           "type": "input",
//           "message": "Filled these fields: card number, card expiry, card cvv",
//           "time": 15
//         },
//         {
//           "type": "action",
//           "message": "Attempted to pay",
//           "time": 15
//         },
//         {
//           "type": "auth",
//           "message": "Authentication Required: pin",
//           "time": 16
//         }
//       ]
//     },
//     "fees": null,
//     "customer": {
//       "id": 68324,
//       "first_name": "BoJack",
//       "last_name": "Horseman",
//       "email": "bojack@horseman.com",
//       "customer_code": "CUS_qo38as2hpsgk2r0",
//       "phone": null,
//       "metadata": null,
//       "risk_action": "default"
//     },
//     "authorization": {
//       "authorization_code": "AUTH_f5rnfq9p",
//       "bin": "539999",
//       "last4": "8877",
//       "exp_month": "08",
//       "exp_year": "2020",
//       "card_type": "mastercard DEBIT",
//       "bank": "Guaranty Trust Bank",
//       "country_code": "NG",
//       "brand": "mastercard",
//       "account_name": "BoJack Horseman"
//     },
//     "plan": {}
//   }
// }
