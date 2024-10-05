<?php

namespace App\Http\Controllers;

use App\Models\EventCategories;
use App\Models\Organizers;
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
        $organizers = Organizers::all();
        $categories = EventCategories::all();
        return view("events.form", [
            'organizers' => $organizers,
            'event_categories' => $categories,
        ]);
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
        return view('events.event', ['event' => $event]);
    }

    public function edit($id)
    {
        $event = Events::findOrFail($id);
        $organizers = Organizers::all();
        $categories = EventCategories::all();
        return view("events.form", [
            'event' => $event,
            'organizers' => $organizers,
            'event_categories' => $categories,
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
