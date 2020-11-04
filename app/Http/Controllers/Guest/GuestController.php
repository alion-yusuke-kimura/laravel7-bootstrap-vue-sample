<?php

namespace App\Http\Controllers\Guest;

use App\Http\Requests\GuestRequest;
use App\Models\MGuest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GuestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:guest');
    }

    public function index(Request $request)
    {
        // $customers = MCustomer::select()
        // ->sortable()
        // ->paginate(5);
        // return view("customer.index", compact("customers"));

        $query = MGuest::query();
        if (!empty($request->input("code")))
        {
            $query->where('code','like','%'.$request->input("code").'%');
        }
        if (!empty($request->input("name")))
        {
            $query->where('name','like','%'.$request->input("name").'%');
        }
        $guests = $query->sortable()->paginate(5);

        \Debugbar::addMessage($guests);
        return view("guest.index", compact("guests"));
    }

    public function create()
    {
        return view("guest.create");
    }

    public function store(GuestRequest $request)
    {
        $guest = new MGuest;
        $guest->fill($request->all())->save();
        return redirect()->route('guest.index');
    }

    public function show($id)
    {
        $guest = MGuest::find($id);
        return view("guest.show", compact('guest'));
    }

    public function edit($id)
    {
        $guest = MGuest::find($id);
        return view("guest.edit", compact('guest'));
    }

    public function update(GuestRequest $request, $id)
    {
        $guest = MGuest::find($id);
        $guest->fill($request->all())->save();
        return redirect()->route('guest.index');
    }

    public function destroy($id)
    {
        $guest = MGuest::find($id);
        $guest->delete();
        return redirect()->route('guest.index');
    }
}
