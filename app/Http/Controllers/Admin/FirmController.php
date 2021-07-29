<?php

namespace App\Http\Controllers\Admin;

use App\Firm;
use App\Http\Controllers\Controller;
use App\Tariff;
use App\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Boolean;

class FirmController extends Controller
{
    public function index()
    {
        $firms = Firm::all();

        return view('admin.firm.index', compact('firms'));
    }

    public function deletedFirmIndex()
    {
        $del_firms = Firm::onlyTrashed()->get();

        return view('admin.firm.deleted_index', compact('del_firms'));
    }

    public function create()
    {
        $users = User::all();

        return view('admin.firm.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'business_number' => 'required',
            'user_id' => 'required',
            'tariff_id' => 'required',
        ]);

        Firm::create($request->all());

        return redirect()->route('firm.index')->with('success', 'Firm added');
    }

    public function edit($id)
    {
        $firm = Firm::find($id);
        $nameTariff = json_decode($firm->tariff_json, true);

        return view('admin.firm.edit', compact('firm', 'nameTariff'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'company_name' => 'required',
            'business_number' => 'required',
            'director_phone' => 'required | numeric',
            'director_email' => 'required | email',
            'contact_email' => 'email',
        ], [
            'company_name.required' => 'Company Name field is required',
        ]);

        if ($request->has('verified'))
            $request->request->add(['verified' => 1]);
        else {
            $request->request->add(['verified' => 0]);
        }

        $firm = Firm::find($id);
        $firm->update($request->all());

        return redirect()->route('firm.index')->with('success', 'Update save success');
    }

    public function destroy($id)
    {
        Firm::destroy($id);

        return redirect()->route('firm.index')->with('success', 'Firm deleted');
    }

    public function permanentDestroy($id)
    {
        $firm= Firm::onlyTrashed()->find($id);
        $firm->forceDelete();

        return redirect()->route('deletedFirmIndex')->with('success', 'Firm permanently removed');
    }

    public function restore($id)
    {
        $firm= Firm::onlyTrashed()->find($id);
        $firm->restore();

        return redirect()->route('deletedFirmIndex')->with('success', 'Firm successfully restored');
    }
    public function docVerify ($id) {

        $firm = Firm::find($id);

        $articles_incorporation = $firm->getMedia('articles_incorporation');
        $business_number_registration = $firm->getMedia('business_number_registration');
        $shareholders = $firm->getMedia('shareholders');
        $director_information = $firm->getMedia('director_information');
        $resolutions = $firm->getMedia('resolutions');
        $articles_amalgamation = $firm->getMedia('articles_amalgamation');
        $notice_change_address = $firm->getMedia('notice_change_address');
        $last_t2 = $firm->getMedia('last_t2');

        return view('admin.firm.doc_verified', compact(
            'firm',
            'articles_incorporation',
            'business_number_registration',
            'shareholders',
            'director_information',
            'resolutions',
            'articles_amalgamation',
            'notice_change_address',
            'last_t2'
        ));

    }

    public function checkVerify ($id) {

        $firm = Firm::find($id);
        $invoices = $firm->getMedia('invoices');

        return view('admin.firm.check_verified', compact('firm','invoices'));

    }

    public function sendReport ($id) {

        $firm = Firm::find($id);
        $reports = $firm->getMedia('reports');

        return view('admin.firm.send_report', compact('firm','reports'));
    }





}
