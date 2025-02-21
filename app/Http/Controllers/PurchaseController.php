<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Warehouse;

class PurchaseController extends Controller
{
    public function view()
    {
        $purchases = \DB::table('purchases')
                    ->join('suppliers', 'purchases.supplier_id', '=', 'suppliers.id')
                    ->join('warehouses', 'purchases.warehouse_id', '=', 'warehouses.id')
                    ->select('purchases.*', 'suppliers.name as supplier_name', 'warehouses.name as warehouse_name')
                    ->get();  
        $suppliers = Supplier::all(); 
        $warehouses = Warehouse::all(); 
        return view('purchase', [
            'purchases' => $purchases, 
            'suppliers' => $suppliers,
            'warehouses' => $warehouses, 
        ]);
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'date' => 'required|date',
            'category' => 'required|exists:suppliers,id', 
            'brand' => 'required|exists:warehouses,id', 
            'tax' => 'required|numeric',
            'discount' => 'required|numeric',
            'shipping' => 'required|numeric',
            'otherdetails' => 'required|string',
        ]);

      

       
        Purchase::create([
            'date' => $request->date,
            'supplier_id' => $request->category,
            'warehouse_id' => $request->brand,
            'tax' => $request->tax,
            'discount' => $request->discount,
            'shipping' => $request->shipping,
            'other_details' => $request->otherdetails,
        ]);

        
        return redirect()->back()->with('success', 'Purchase added successfully!');
    }

    public function destroy($id)
    {
        $purchase = Purchase::findOrFail($id);

        $purchase->delete();

        return redirect()->back()->with('success', 'Purchase deleted successfully!');
    }

}
