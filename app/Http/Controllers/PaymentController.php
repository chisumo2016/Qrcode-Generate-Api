<?php

namespace App\Http\Controllers;

use App\Models\Account;
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
        //
        //Update the transaction
        Trasanction::where('id', $paymentDetails['data']['metadata']['transaction_id'] )->update(['status'=>'completed']);

        //update the qrcode owner account  and account history
        $qrCodeOwnerAccount = Account::where('user_id', $qrcode->user_id)->first();
        Account::where('user_id', $qrcode->user_id)->update([
            'balance'           =>  ($qrCodeOwnerAccount->balance +  $qrcode->amount),
            'total_credit'      =>  ($qrCodeOwnerAccount->balance +  $qrcode->amount)
        ]);

        
        //update buyer account and account history
        //send email alert both parties
        //send sms
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}