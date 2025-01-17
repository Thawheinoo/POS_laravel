<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentController extends Controller
{   //direct route for payment method page
    public function page()
    {
        return view('admin.payment.method');
    }

    //add bank account to payments table
    public function add(Request $request)
    {
        $this->addValidation($request);
        $data = [
            'account_number' =>  $request->account_number,
            'account_name' => $request->account_name,
            'type' => $request->type,
        ];
        Payment::create($data);

        Alert::info('Bank Account Added', 'Payment Method is ready to use');

        return to_route('payment#allAccount');
    }

    //edit show page
    public function editshow($id)
    {
        $edit_data = Payment::findOrFail($id)->first();
        return view('admin.payment.edit', compact('edit_data'));
    }

    //edit data for payments table
    public function edit(Request $request, $id)
    {
        $this->addValidation($request);
        Payment::findOrFail($id)->update([
            'account_number' =>  $request->account_number,
            'account_name' => $request->account_name,
            'type' => $request->type,
        ]);

        Alert::info('Bank Account Updated', 'Bank Account is up to date');
        return to_route('payment#allAccount');
    }

    //delete data for payments table
    public function delete(Request $request, $id)
    {
        Payment::findOrFail($id)->delete();
        Alert::info('Bank Account Deleted', 'Bank Account has been deleted ');
        return to_route('payment#allAccount');
    }

    //direct route for view all bank accounts
    public function all()
    {
        //fetch data from payments table
        $payment_data = Payment::all();
        return view('admin.payment.view', compact('payment_data'));
    }

    //payment addValidation
    private function addValidation($request)
    {
        $request->validate([
            'account_name' => 'required|max:20',
            'account_number' => 'required|max:20',
            'type' => 'required|max:20'
        ]);
    }
}
