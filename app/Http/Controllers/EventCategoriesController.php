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
        $categories = EventCategories::all();
        return view('event_categories.index', [
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        return view("event_categories.form");
    }

    public function store(StoreEventCategoriesRequest $request)
    {
        EventCategories::create([
            'name' => $request->name,
            'description' => $request->description,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        FacadesSession::flash('message', 'Event category successfully created!');
        FacadesSession::flash('alert-class', 'success');
        return redirect()->route('event_categories.index');
    }

    public function show($id)
    {
        $category = EventCategories::findOrFail($id);
        return $category;
    }

    public function edit($id)
    {
        $category = EventCategories::findOrFail($id);
        return view("event_categories.form", [
            'category' => $category,
        ]);
    }

    public function update(UpdateEventCategoriesRequest $request, EventCategories $eventCategory)
    {
        $eventCategory->update([
            'name' => $request->name,
            'description' => $request->description,
            'updated_at' => Carbon::now(),
        ]);

        FacadesSession::flash('message', 'Event category successfully updated!');
        FacadesSession::flash('alert-class', 'success');
        return redirect()->route('event_categories.index');
    }

    public function destroy(EventCategories $eventCategory)
    {
        $eventCategory->delete();

        FacadesSession::flash('message', 'Event category successfully deleted!');
        FacadesSession::flash('alert-class', 'success');
        return redirect()->route('event_categories.index');
    }
}
