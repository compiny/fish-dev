<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Resources\CompanyResource;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{

    public function index()
    {
        return CompanyResource::collection(Company::all());
    }

    public function store(StoreCompanyRequest $request)
    {
        $user = Auth::user();
        Company::create([
            'name' => $request->name,
            'nameOff' => $request->nameOff,
            'inn' => $request->inn,
            'kpp' => $request->kpp,
            'ogrn' => $request->ogrn,
            'email' => $request->email,
            'urAdr' => $request->urAdr,
            'factAdr' => $request->factAdr,
            'mailAdr' => $request->mailAdr,
            'phones' => $request->phones,
            'web' => $request->web,
            'about' => $request->about,
            'dataReg' => $request->dataReg,
            'dataClose' => $request->dataClose,
            'dirID' => $request->dirID,
            'buhID' => $request->buhID,
            'ownerID' => $user->id,
        ]);
    }

    public function show($id)
    {
        return new CompanyResource(Company::findOrFail($id));
    }

    public function update(UpdateCompanyRequest $request)
    {
        $user = Auth::user();
        $item = Company::findOrFail($request->id);
        $item->fill([
            'name' => $request->name,
            'nameOff' => $request->nameOff,
            'inn' => $request->inn,
            'kpp' => $request->kpp,
            'ogrn' => $request->ogrn,
            'email' => $request->email,
            'urAdr' => $request->urAdr,
            'factAdr' => $request->factAdr,
            'mailAdr' => $request->mailAdr,
            'phones' => $request->phones,
            'web' => $request->web,
            'about' => $request->about,
            'dataReg' => $request->dataReg,
            'dataClose' => $request->dataClose,
            'dirID' => $request->dirID,
            'buhID' => $request->buhID,
            'ownerID' => $user->id,
        ]);
        $item->save();
    }

    public function destroy($id)
    {
        //
    }
}
