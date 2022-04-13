<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Paystack;
use App\sub;
use App\payment;
use App\usersub;
class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function index(){
        $subs = sub::where('isActive',true)->get();

        $usersubs = usersub::where('user_id',auth()->user()->id)->with('sub')->get();

        return view('backend.user.payment')->with(['subs' => $subs , 'payments' => payment::orderBy('id', 'DESC')->paginate(6),'usersubs'=>$usersubs]);
    }


    public function redirectToGateway(Request $request , $id )
    {
        $sub = new sub();
       $subs = $sub->where('id',$id)->first();
        $amount = $subs->amount *100;
        $currency = 'NGN';
        $reference = Paystack::genTranxRef();
        $metadata = json_encode(['data'=>$subs,'reference' => $reference]);
        $request['email'] = auth()->user()->email;
        $request['amount'] = $amount;
        $request['currency'] = $currency;
        $request['metadata'] = $metadata;
        $request['reference'] = $reference;
        $payment = new payment();
        $payment->is_successfull = false;
        $payment->amount = $amount/100;
        $payment->user_id = auth()->user()->id;
        $payment->references = $reference;
       // $payment->NoOfAds = $subs->NoOfAds;
      //  $payment->sub_id = $subs->id;
       // $payment->is_unlimited = $subs->is_infinteNofDays;
        $current = date('Y-m-d');
        $metadata = json_encode(['data' => $subs, 'reference' => $reference]);

        //$Date = "2010-09-17";
        // $expiring_date  =  date('Y-m-d', strtotime($current . ' + '.$subs->NofDays.' days'));
        // //return strtotime($expiring_date);
        // $payment->expiring_date = strtotime($expiring_date);

        try {
            $payment->save();
            return Paystack::getAuthorizationUrl()->redirectNow();
        } catch (\Exception $e) {
            return ['msg' => $e->getMessage(), 'type' => 'error'];
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
        $reference = $paymentDetails['data']['reference'];

       // dd($paymentDetails);
        if($paymentDetails['status'] == true){
            $payment = payment::where('references',$reference);
                if($payment->first()->used == false){
                $payment->update([
                    'is_successfull' => true
                ]);
                $metadata = ($paymentDetails['data']['metadata']);
                $data = $metadata['data'];
                $payment_id = $payment->first()->id;
                $subs = $data;
                $usersub = usersub::where('sub_id',$subs['id']);
                if($usersub->first() == null){
                    $usersub = new usersub();
                    $current = date('Y-m-d');
                    $metadata = json_encode(['data' => $subs, 'reference' => $reference]);
                    $expiring_date  =  date('Y-m-d', strtotime($current . ' + '.$subs['NofDays'].' days'));
                    $usersub->NoOfAds = $subs['NoOfAds'];
                    $usersub->sub_id = $subs['id'];
                    $usersub->is_unlimited = $subs['is_infinteNofDays'];//
                    $usersub->payment = $payment_id;
                    $usersub->NofDays = $subs['NofDays'];
                    $usersub->expiring_date = strtotime($expiring_date);
                    $usersub->user_id = $payment->first()->user_id;
                    $usersub->save();
                }else{
                    $current = date('Y-m-d');
                    $metadata = json_encode(['data' => $subs, 'reference' => $reference]);
                    $expiring_date  =  date('Y-m-d', strtotime($current . ' + '.$subs['NofDays'].' days'));
                    $userdata = $usersub->first();
                    $usersub->update([
                        'payment' => $userdata->payment.'|'.$payment_id,
                        'expiring_date' => strtotime($expiring_date),
                        'is_unlimited' => $subs['is_infinteNofDays'],
                        'NoOfAds' => $subs['NoOfAds'],
                        'NofDays' => $subs['NofDays']
                    ]);
                }
                $payment->update([
                    'used' => true
                ]);
            }
            return redirect(route('payment'));

        }else{
            payment::where('references',$reference)->update([
                'is_successfull' => false
            ]);

            return redirect(route('payment'));

        }
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}
