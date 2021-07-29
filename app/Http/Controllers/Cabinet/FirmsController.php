<?php

namespace App\Http\Controllers\Cabinet;

use App\Firm;
use App\Http\Controllers\Controller;
use App\Maindocument;
use App\Tariff;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FirmsController extends Controller
{
    public function create()
    {
        $userId = Auth::user()->id;
        $tariffs = Tariff::where('visible', '1')->get();
        $tariffs = $tariffs->pluck('name', 'id')->all();
        $user = Auth::user();
        $firms = User::find($userId)->Firms;

        return view('cabinet.profile.create', compact('tariffs', 'user', 'firms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'director_phone' => 'required',
            'tariff_id' => 'required',
            'business_number' => 'required|unique:firms|max:15',
        ]);

        $currentRecord = [
            'business_number' => $request->business_number,
            'company_name' => $request->company_name,
            'company_address' => $request->company_address,
            'main_business_activity' => $request->main_business_activity,
            'director_first_name' => $request->director_first_name,
            'director_last_name' => $request->director_last_name,
            'director_phone' => $request->director_phone,
            'director_email' => $request->director_email,
            'contact_first_name' => $request->contact_first_name,
            'contact_last_name' => $request->contact_last_name,
            'contact_phone' => $request->contact_phone,
            'contact_email' => $request->contact_email,
            'user_id' => Auth::user()->id,
            'tariff_id' => $request->tariff_id,
            'tariff_json' => $request->tariff_json
        ];

        $currentFirm = Firm::create($currentRecord);

        $articles_incorporation = $request->file('articles_incorporation');
        $business_number_registration = $request->file('business_number_registration');

        if ($articles_incorporation !== null) {
            for ($i = 0; $i < count($articles_incorporation); ++$i) {

                $fileName = $articles_incorporation[$i]->getClientOriginalName();

                $mm = $articles_incorporation[$i]->getMimeType();
                $articles_incorporationData[$i] = base64_encode(file_get_contents($articles_incorporation[$i]));
                Maindocument::create([
                    'firm_id' => $currentFirm->id,
                    'articles_incorporation' => "data:{$mm};base64, {$articles_incorporationData[$i]}",
                    'name_articles_incorporation' => $fileName
                ]);
            }
        }

        return redirect()->back()->with('success', 'Сompany added');
    }


    public function edit($id)
    {
        $user = Auth::user();
        $firm = Firm::find($id);
        $tariff = $firm->tariff;

        return view('cabinet.profile.edit', compact('firm', 'tariff', 'user'));
    }

    public function update(Request $request, $id)
    {

        $firm = Firm::find($id);

        $this->validate($request,[
            'company_name' => 'required',
            'director_phone' => 'required',
            'business_number' => "required|unique:firms,business_number, $id"
        ]);

        $firm->update($request->all());

        return redirect()->route('profile')->with('success', 'Update save');
    }


}
