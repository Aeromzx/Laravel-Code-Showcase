<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('modules.customer.customer', [
            'customers' => Customer::all(),
        ]);
    }


    public function store(Request $request)
    {
        if (isset($request->id)) {
            //change
            unset($request['_token']);
            Customer::where('id', "=", $request->id)->update($request->all());
            return redirect(route('customer'));
        } else {
            //create
            unset($request['_token']);
            Customer::create($request->all());
            return redirect(route('customer'));
        }
    }


    public function destroy($id)
    {
        //delete
        Customer::where('id', "=", $id)->delete();
        return redirect(route('customer'));
    }
}
