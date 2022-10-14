<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Victorybiz\LaravelCryptoPaymentGateway\LaravelCryptoPaymentGateway;

class PaymentController extends Controller
{
    /**
     * Cryptobox callback.
     */
    public function callback(Request $request)
    {
      return LaravelCryptoPaymentGateway::callback();
    }

    /**
     * Cryptobox IPN Example
     *
     * @param \Victorybiz\LaravelCryptoPaymentGateway\Models\CryptoPaymentModel $cryptoPaymentModel
     * @param array $payment_details
     * @param string $box_status
     * @return bool
     */
    public static function ipn($cryptoPaymentModel, $payment_details, $box_status)
    {
        if ($cryptoPaymentModel) {
            /*
            // ADD YOUR CODE HERE
            // ------------------
            // For example, you have a model `UserOrder`, you can create new Bitcoin payment record to this model
            $userOrder = UserOrder::where('payment_id', $cryptoPaymentModel->paymentID)->first();
            if (!$userOrder)
            {
                UserOrder::create([
                    'payment_id' => $cryptoPaymentModel->paymentID,
                    'user_id'    => $payment_details["user"],
                    'order_id'   => $payment_details["order"],
                    'amount'     => floatval($payment_details["amount"]),
                    'amountusd'  => floatval($payment_details["amountusd"]),
                    'coinlabel'  => $payment_details["coinlabel"],
                    'txconfirmed'  => $payment_details["confirmed"],
                    'status'     => $payment_details["status"],
                ]);
            }
            // ------------------

            // Received second IPN notification (optional) - Bitcoin payment confirmed (6+ transaction confirmations)
            if ($userOrder && $box_status == "cryptobox_updated")
            {
                $userOrder->txconfirmed = $payment_details["confirmed"];
                $userOrder->save();
            }
            // ------------------
            */

            // Onetime action when payment confirmed (6+ transaction confirmations)
            if (!$cryptoPaymentModel->processed && $payment_details["confirmed"])
            {
                // Add your custom logic here to give value to the user.

                // ------------------
                // set the status of the payment to processed
                // $cryptoPaymentModel->setStatusAsProcessed();

                // ------------------
                // Add logic to send notification of confirmed/processed payment to the user if any
                $order = Order::find($payment_details["order"]);
                $order->payment_status = 'completed';
                $order->save();

                return redirect()->route('order.confirm');
            }

        }
        return true;
    }
}
