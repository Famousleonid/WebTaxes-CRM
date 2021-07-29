<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tariff;
use Illuminate\Http\Request;

class TariffController extends Controller
{
    public function index()
    {
        $tariffs = Tariff::all();

       return view('admin.tariff.index', compact('tariffs'));
    }

    public function create(Request $request)
    {
        $constructor = $request->get('constructor');

        if($constructor)
            return view('admin.tariff.createconstructor');
        else
            return view('admin.tariff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

         if(isset($request->visible))
             $request->visible = 1;
         else{
             $request->visible = 0;
         }

        $countTariff = Tariff::where('visible',1)->count();
        $countTariff = $countTariff + $request->visible;

        if($countTariff > 4 ) return redirect()->route('tariff.index')->with('error', 'There can be only 4 marked visible tariffs');

        Tariff::create($request->all());

        return redirect()->route('tariff.index')->with('success', 'Tariff added');
    }

    public function edit($id, Request $request)
    {

        $tariff = Tariff::find($id);

        if($request->add) {

            $tariff->visible = 0;
            $newTariff = $tariff->replicate();
            $newTariff -> save();
            $newid = $newTariff->id;
            $tariff = Tariff::find($newid);
        }else{
            $tariff = Tariff::find($id);
        }

        if ($tariff->name === 'Constructor')
            return view('admin.tariff.constructor', compact('tariff'));
        else
            return view('admin.tariff.edit', compact('tariff'));

    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);

        if($request->has('visible'))
            $request->request->add(['visible' => 1]);
        else{
            $request->request->add(['visible' => 0]);
        }

        $countTariff = Tariff::where('visible',1)->count();
        $countTariff = $countTariff + $request->visible;

        if($countTariff > 4 ) return redirect()->route('tariff.index')->with('error', 'There can be only 4 marked visible tariffs');

        $tariff = Tariff::find($id);

        $tariff->update($request->all());

        return redirect()->route('tariff.index')->with('success', 'Update saccess');
    }

    public function destroy($id)
    {

        Tariff::destroy($id);

        return redirect()->route('tariff.index')->with('success', 'Tariff deleted');
    }
}
