<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBankRequest;
use App\Http\Requests\UpdateBankRequest;
use App\Http\Resources\BankResource;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index()
    {
        return BankResource::collection(Bank::all());
    }

    public function store(StoreBankRequest $request)
    {
        Bank::create([
            'name' => $request->name,
            'bik' => $request->bik,
            'korr' => $request->korr,
            'adr' => $request->adr,
            'city' => $request->city,
        ]);
    }

    public function show($id)
    {
        return new BankResource(Bank::findOrFail($id));
    }

    public function update(UpdateBankRequest $request, $id)
    {
        $item = Bank::findOrFail($id);
        $item->fill([
            'name' => $request->name,
            'bik' => $request->bik,
            'korr' => $request->korr,
            'adr' => $request->adr,
            'city' => $request->city,
        ]);
        $item->save();
    }

    public function destroy($id)
    {
        //
    }
}
