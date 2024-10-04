<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Requests\StoreEventsRequest;
use App\Http\Requests\UpdateEventsRequest;
use App\Models\Events;
use Illuminate\Support\Facades\Session as FacadesSession;

class EventsController extends Controller
{
    public function index()
    {
        $events = Events::all();
        return view('events.index', [
            'events' => $events,
        ]);
    }

    public function create()
    {
        return view("events.form");
    }

    public function store(StoreEventsRequest $request)
    {
        $event = Events::create([
            'name' => $request->name,
            'date' => $request->date,
            'location' => $request->location,
            'description' => $request->description,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        FacadesSession::flash('message', 'Event successfully created!');
        FacadesSession::flash('alert-class', 'success');
        return redirect()->route('events.index');
    }

    public function show($id)
    {
        $event = Events::findOrFail($id);
        return view('events.event', compact('event'));
    }

    public function edit(Events $event)
    {
        return view("events.form", [
            'event' => $event,
        ]);
    }

    public function update(UpdateEventsRequest $request, Events $event)
    {
        $event->update([
            'name' => $request->name,
            'date' => $request->date,
            'location' => $request->location,
            'description' => $request->description,
            'updated_at' => Carbon::now(),
        ]);

        FacadesSession::flash('message', 'Event successfully updated!');
        FacadesSession::flash('alert-class', 'success');
        return redirect()->route('events.index');
    }

    public function destroy(Events $event)
    {
        $event->delete();

        FacadesSession::flash('message', 'Event successfully deleted!');
        FacadesSession::flash('alert-class', 'success');
        return redirect()->route('events.index');
    }
}
