<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Customer;
use App\Models\Warehouse;

class SaleController extends Controller
{
    public function view()
    {
        $sales = \DB::table('sales')
                    ->join('customers', 'sales.customerid', '=', 'customers.id')
                    ->join('warehouses', 'sales.warehouseid', '=', 'warehouses.id')
                    ->select('sales.*', 'customers.name as customer_name', 'warehouses.name as warehouse_name')
                    ->get();  
        $customers = Customer::all(); 
        $warehouses = Warehouse::all(); 
        return view('sale', [
            'sales' => $sales, 
            'customers' => $customers,
            'warehouses' => $warehouses, 
        ]);
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'date' => 'required|date',
            'category' => 'required|exists:customers,id', 
            'brand' => 'required|exists:warehouses,id', 
            'tax' => 'required|numeric',
            'discount' => 'required|numeric',
            'shipping' => 'required|numeric',
            'otherdetails' => 'required|string',
        ]);  
       
        Sale::create([
            'date' => $request->date,
            'customerid' => $request->category,
            'warehouseid' => $request->brand,
            'tax' => $request->tax,
            'discount' => $request->discount,
            'shipping' => $request->shipping,
            'otherdetails' => $request->otherdetails,
        ]);

        
        return redirect()->back()->with('success', 'Sales added successfully!');
    }

    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);

        $sale->delete();

        return redirect()->back()->with('success', 'Sale deleted successfully!');
    }
}
