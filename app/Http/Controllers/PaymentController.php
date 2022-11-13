<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{

    public function payment(){
        return view('payment');
    }

    public function verify(Request $request , $transaction_id){

        $request->session()->put('transaction_id' , $transaction_id);
        return redirect('complete');
    }

    public function complete(Request $request ){

        if($request->session()->has('transaction_id') && $request->session()->has('order_id')){

            $order_id           = $request->session()->get('order_id');
            $transaction_id     = $request->session()->get('transaction_id');
            $date               = date('Y-m-d h:i:s');
            $status             = "paid";

            $afect = DB::table('order_tables')
                            ->where('id' , $order_id)
                            ->update(['atatus' => $status]);


            DB::table('payments')->insert([

                'order_id'         => $order_id,
                'transaction_id'   => $transaction_id,
                'date'             => $date,
            ]);


            $request->session()->flush();

            return redirect('thank_you')->with('order_id' ,$order_id);

        }else{
            return redirect('/');
        }
    }

    public function index()
    {
        $payments = Payment::all();
        return view('admin.payment.all_payment' ,compact('payments'));
    }

    public function thank_you()
    {
        return view('thank_you');
    }


    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment 
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payments = Payment::find($id);
        $payments->delete();

        return redirect()->route('all_payment')->with('message','the payment is');
    }
}
