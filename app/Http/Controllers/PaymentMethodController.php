<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;

class PaymentMethodController extends Controller
{
    public function view()
    {
        $paymentmethods = PaymentMethod::all();  
        
        return view('paymentmethods', [
            'paymentmethods' => $paymentmethods,  
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
           
        ]);

        PaymentMethod::create($validated);

        return redirect()->back()->with('success', 'Payment method added successfully!');
    }
    public function destroy($id)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);

        $paymentMethod->delete();

        return redirect()->back()->with('success', 'Payment method deleted successfully!');
    }
}
