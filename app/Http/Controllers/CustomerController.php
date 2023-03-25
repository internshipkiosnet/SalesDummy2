<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index($id)
    {
      $customer = Customer::find($id);
      if($customer != null) {
        return response([
            'user' => $customer,
        ],200);  
      } else {
        return response([
            'message' => 'Data customer tidak ditemukan'
        ],200);
      }
        

    }
    public function createCustomer(Request $request)
    {
        
        try {
        Customer::create($request ->all());
        return response([
            'message' => 'Data customer berhasil diinputkan'
        ],200);
    }catch(Exception $e){
        return response([
           'message' => $e->getMessage()
        ],403);
    }
    }

}
