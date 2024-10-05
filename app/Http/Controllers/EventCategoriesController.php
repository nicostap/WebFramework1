<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Requests\StoreEventCategoriesRequest;
use App\Http\Requests\UpdateEventCategoriesRequest;
use App\Models\EventCategories;
use Illuminate\Support\Facades\Session as FacadesSession;

class EventCategoriesController extends Controller
{
    public function index()
    {
        $categories = EventCategories::active()->orderBy('name')->get();
        return view('event_categories.index', [
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        return view('event_categories.form');
    }

    public function store(StoreEventCategoriesRequest $request)
    {
        $validated = $request->validate($request->rules(), $request->params());

        EventCategories::create($validated);

        FacadesSession::flash('message', 'Event category successfully created!');
        FacadesSession::flash('alert-class', 'success');
        return redirect()->route('event_categories.index');
    }

    public function show(EventCategories $eventCategory)
    {
        return $eventCategory;
    }

    public function edit(EventCategories $eventCategory)
    {
        return view('event_categories.form', [
            'category' => $eventCategory,
        ]);
    }

    public function update(UpdateEventCategoriesRequest $request, EventCategories $eventCategory)
    {
        $validated = $request->validate($request->rules(), $request->params());
        $validated['updated_at'] = Carbon::now();

        $eventCategory->update($validated);

        FacadesSession::flash('message', 'Event category successfully updated!');
        FacadesSession::flash('alert-class', 'success');
        return redirect()->route('event_categories.index');
    }

    public function destroy(EventCategories $eventCategory)
    {
        $eventCategory->update(['active' => 0, 'updated_at' => Carbon::now()]);

        FacadesSession::flash('message', 'Event category successfully deleted!');
        FacadesSession::flash('alert-class', 'success');
        return redirect()->route('event_categories.index');
    }
}
