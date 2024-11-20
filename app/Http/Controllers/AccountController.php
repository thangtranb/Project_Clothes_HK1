<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Http\Requests\AccountCreateRequest;
use App\Http\Requests\AccountUpdateRequest;
class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $account = Account::paginate(3);
        return view('admin.account.index',['account' => $account]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.account.addAccount');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AccountCreateRequest $request)
    {
        $account = Account::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
        ]);
        $account->save();
        return redirect()->route('admin.account.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $account = Account::find($id);
        return view('admin.account.editAccount',['account' => $account]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AccountUpdateRequest $request, string $id)
    {
        $account = Account::find($id);
        $account->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
        ]);
        return redirect()->route('admin.account.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $account = Account::find($id);
        $account->delete();
        return redirect()->route('admin.account.index');
    }
}
