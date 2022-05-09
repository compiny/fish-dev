<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompanyResource;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        return CompanyResource::collection(Company::all()->where('dirID', $user->id));
    }

    public function store(Request $request)
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
            'ownerID' => $user->id,
        ]);
    }

    public function show($id)
    {
        return new CompanyResource(Company::findOrFail($id));
    }

    public function update(Request $request, $id)
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
            'ownerID' => $user->id,
        ]);
        $item->save();
    }

    public function destroy($id)
    {
        //
    }
}
