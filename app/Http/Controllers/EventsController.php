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
        $events = Events::active()->orderBy('date', 'desc')->get();
        return view('events.index', [
            'events' => $events,
        ]);
    }

    public function create()
    {
        $organizers = Organizers::active()->orderBy('name')->get();
        $categories = EventCategories::active()->orderBy('name')->get();
        return view('events.form', [
            'organizers' => $organizers,
            'event_categories' => $categories,
        ]);
    }

    public function store(StoreEventsRequest $request)
    {
        $validated = $request->validate($request->rules(), $request->params());

        Events::create($validated);

        FacadesSession::flash('message', 'Event successfully created!');
        FacadesSession::flash('alert-class', 'success');
        return redirect()->route('events.index');
    }

    public function show(Events $event)
    {
        return view('events.event', ['event' => $event]);
    }

    public function edit(Events $event)
    {
        $organizers = Organizers::active()->get();
        $categories = EventCategories::active()->get();
        return view('events.form', [
            'event' => $event,
            'organizers' => $organizers,
            'event_categories' => $categories,
        ]);
    }

    public function update(UpdateEventsRequest $request, Events $event)
    {
        $validated = $request->validate($request->rules(), $request->params());
        $validated['updated_at'] = Carbon::now();

        $event->update($validated);

        FacadesSession::flash('message', 'Event successfully updated!');
        FacadesSession::flash('alert-class', 'success');
        return redirect()->route('events.index');
    }

    public function destroy(Events $event)
    {
        $event->update(['active' => 0, 'updated_at' => Carbon::now()]);

        FacadesSession::flash('message', 'Event successfully deleted!');
        FacadesSession::flash('alert-class', 'success');
        return redirect()->route('events.index');
    }
}
