<?php

namespace App\Http\Controllers;

use App\Models\SchoolFeePayment;
use Illuminate\Http\Request;

class SchoolFeePaymentController extends Controller
{
    public function index()
    {
        $payments = SchoolFeePayment::all();
        return view('school_fee_payments.index', compact('payments'));
    }

    public function create()
    {
        return view('school_fee_payments.create');
    }

    public function store(Request $request)
    {
        // Validate and store the payment

        return redirect()->route('school_fee_payments.index')
            ->with('success', 'Payment created successfully');
    }

    public function show($id)
    {
        $payment = SchoolFeePayment::findOrFail($id);
        return view('school_fee_payments.show', compact('payment'));
    }

    public function edit($id)
    {
        $payment = SchoolFeePayment::findOrFail($id);
        return view('school_fee_payments.edit', compact('payment'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the payment

        return redirect()->route('school_fee_payments.index')
            ->with('success', 'Payment updated successfully');
    }

    public function destroy($id)
    {
        $payment = SchoolFeePayment::findOrFail($id);
        $payment->delete();

        return redirect()->route('school_fee_payments.index')
            ->with('success', 'Payment deleted successfully');
    }
}

