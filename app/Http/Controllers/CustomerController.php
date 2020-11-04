<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\MCustomer;
use Illuminate\Http\Request;


class CustomerController extends Controller
{
    public function index(Request $request)
    {
        // $customers = MCustomer::select()
        // ->sortable()
        // ->paginate(5);
        // return view("customer.index", compact("customers"));

        $query = MCustomer::query();
        if (!empty($request->input("code")))
        {
            $query->where('code','like','%'.$request->input("code").'%');
        }
        if (!empty($request->input("name")))
        {
            $query->where('name','like','%'.$request->input("name").'%');
        }
        $customers = $query->sortable()->paginate(5);

        \Debugbar::addMessage($customers);
        return view("customer.index", compact("customers"));
    }

    public function create()
    {
        return view("customer.create");
    }

    public function store(CustomerRequest $request)
    {
        $customer = new MCustomer;
        $customer->fill($request->all())->save();
        return redirect()->route('customer.index');
    }

    public function show($id)
    {
        $customer = MCustomer::find($id);
        return view("customer.show", compact('customer'));
    }

    public function edit($id)
    {
        $customer = MCustomer::find($id);
        return view("customer.edit", compact('customer'));
    }

    public function update(CustomerRequest $request, $id)
    {
        $customer = MCustomer::find($id);
        $customer->fill($request->all())->save();
        return redirect()->route('customer.index');
    }

    public function destroy($id)
    {
        $customer = MCustomer::find($id);
        $customer->delete();
        return redirect()->route('customer.index');
    }

    // public function search(Request $request)
    // {
    //     if(is_null($request->input('code'))){
    //         $customers = MCustomer::where('name',$request->input('name'))->paginate(5);
    //     }elseif(is_null($request->input('name'))){
    //         $customers = MCustomer::where('code', $request->input('code'))->paginate(5);
    //     }else{
    //         $customers = MCustomer::where('code', $request->input('code'))->where('name',$request->input('name'))->paginate(5);
    //     }

    //     \Debugbar::addMessage($customers);
    //     return view('customer.index',compact('customers'));
    //     //return redirect()->back()->withInput()->with('customers', $customers);

    // }
}
