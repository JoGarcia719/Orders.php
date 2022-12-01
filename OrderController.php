<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Order;
use App\Models\Customer;


class PaymentController extends Controller
{

    public function index()
    {
        $payment = Payment::all();
        $order = Order::all();
        $customer = Customer::all();
        return view ('index')->with('payment',$payment)->with('order',$order)->with('customer',$customer);
    }

    // public function viewPayment()
    // {
    //     $payments = Payment::all();
    //     $orders = Order::all();
    //     $customers = Customer::all();
    //     return view ('admin.payment', ['payments' => $payments,'orders' => $orders, 'customers' => $customers]);
    // }

    public function saveNewPayment(Request $request)
    {
        $validated = $request->validate([
            // 'order_id' => 'required',
            // 'customer_id' => 'required',
            'payment_method' => 'required|max:255',
            'payment_date' => 'required|max:255',
            'total_amount' => 'required|max:255'
        ]);

        try {

            $pay = Payment::create([
                // 'order_id' => $request->order_id,
                // 'customer_id' => $request->customer_id,
                'payment_method' => $request->payment_method,
                'payment_date' => $request->payment_date,
                'total_amount' => $request->total_amount
            ]);

            if (!is_null($pay)){
                Session::flash('message','Successfully added a new payment information');
            } else {
                throw new Exception('Unable to create a new payment information');
            }

        } catch (Exception $e) {
            Session::flash('error', 'Something went wrong, please try again later.');
        }
        return redirect ('/view_payment');
    }

    public function showNewFormPayment()
    {
        return view('admin.new-payment');
    }

    public function deletePayment($id)
    {
        $payment = Payment::find($id);
        $payment->delete();

        Session::flash('message', 'Successfully removed payment');
        return redirect('/view_payment');
    }

    public function showEditFormPayment($id)
    {
            $payment = Payment::find($id);
            if (!is_null($payment)){
                return view('admin.edit_payment', compact('payment'));
            }
            Session::flash('error', 'We cannot find the record you are searching for.');
            return redirect()->back();
    }


    public function savePaymentChanges(Request $request)
    {
        $validated = $request->validate([
            // 'order_id' => 'required',
            // 'customer_id' => 'required',
            'payment_method' => 'required|max:255',
            'payment_date' => 'required|max:255',
            'total_amount' => 'required|max:255'
        ]);

    try {
        $id = $request->id;
        $payment = Payment::find($id);
        $payment->update([
            // 'order_id' => $request->order_id,
            // 'customer_id' => $request->customer_id,
            'payment_method' => $request->payment_method,
            'payment_date' => $request->payment_date,
            'total_amount' => $request->total_amount
        ]);

        Session::flash('message', 'Successfully updated payment information!');
    } catch (Exception $e) {
        Session::flash('error', 'Something went wrong, please try again later!');
    }
        return redirect('/view_payment');
    }

}