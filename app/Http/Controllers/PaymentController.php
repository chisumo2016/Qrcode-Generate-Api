<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\AccountHistory;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Flash;
use  Paystack;
use App\Models\Trasanction;
use App\Models\Qrcode as QrcodeModel;
use App\Models\User;
use Auth;


class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
        if($paymentDetails ['data']['status'] != 'success')
        {
           Flash::error('Sorry, payment failed');
           //redirect here
            return redirect()->route('qrcodes.show',['id'=> $paymentDetails['data']['metadata']['qrcode_id'] ]);
        }



        dd($paymentDetails);
        //check if the amount paid is same as amount they are supposed to pay

        $qrcode = QrcodeModel::find($paymentDetails['data']['metadata']['qrcode_id']);
        if($qrcode->amount !=  ($paymentDetails['data']['amount'] / 100 ))
        {
            Flash::error('Sorry,you paid the wrong amount. pLeae conta');
            return redirect()->route('qrcodes.show',['id'=> $paymentDetails['data']['metadata']['qrcode_id'] ]);
        }

        //Update the transaction
        $transaction = Trasanction::where('id', $paymentDetails['data']['metadata']['transaction_id'] )->first();

        Trasanction::where('id', $paymentDetails['data']['metadata']['transaction_id'] )->update(['status'=>'completed']);

        // Get buyer  details
        $buyer = User::find($paymentDetails['data']['metadata']['buyer_user_id']);

        //update the qrcode owner account  and account history
        $qrCodeOwnerAccount = Account::where('user_id', $qrcode->user_id)->first();
        Account::where('user_id', $qrcode->user_id)->update([
            'balance'           =>  ($qrCodeOwnerAccount->balance +  $qrcode->amount),
            'total_credit'      =>  ($qrCodeOwnerAccount->balance +  $qrcode->amount)
        ]);

        AccountHistory::create([
            'user_id'  => $qrcode->user_id,
            'account_id' =>$qrCodeOwnerAccount->id,
            'message' => 'Received '.$transaction->payment_method.'payment from '. $buyer->email . 'from qrcode:'.$qrcode->product_name
        ]);

        //update the qrcode owner account  and account history
        $buyerAccount = Account::where('user_id', $paymentDetails['data']['metadata']['buyer_user_id'])->first();
        Account::where('user_id', $qrcode->user_id)->update([
//            'balance'           =>  ($qrCodeOwnerAccount->balance +  $qrcode->amount),
            'total_debit'      =>  ($qrCodeOwnerAccount->balance +  $qrcode->amount)
        ]);

        AccountHistory::create([
            'user_id'  => $paymentDetails['data']['metadata']['buyer_user_id'],
            'account_id' =>$buyerAccount->id,
            'message' => 'Paid'.$transaction->payment_method.'payment to'. $qrcode->user['email'] . 'from qrcode:'.$qrcode->product_name
        ]);

        return redirect(route('transactions.show', ['id' => $transaction->id]));


        //update buyer account and account history
        //QRCode owner email : $qrcode->user['email']
        //Buyer email : $paymentDetails['data']['metadata']['buyer_user_id']
        //send email alert both parties
        //send sms
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}