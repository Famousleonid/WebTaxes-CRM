<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function getEvent()
    {
      $events = Event::all();

      return response()->json($events);
    }

    public function store(Request $request)
    {

        Event::create($request->all());

        return response()->json('Create Ok');

    }

    public function edit($id)
    {
        $firm = Firm::find($id);
        $users = User::pluck('name', 'id')->all();

        $tariffs = Tariff::where('visible', '1')->get();
        $tariffs = $tariffs->pluck('name', 'id')->all();

        return view('admin.firm.edit', compact('firm','users','tariffs'));
    }



    public function destroy($id)
    {

        Event::destroy($id);

        return response()->json('Delete Ok');
    }

}
