<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Requests\StoreOrganizersRequest;
use App\Http\Requests\UpdateOrganizersRequest;
use App\Models\Organizers;
use Illuminate\Support\Facades\Session as FacadesSession;

class OrganizersController extends Controller
{
    public function index()
    {
        $organizers = Organizers::active()->orderBy('name')->get();
        return view('organizers.index', [
            'organizers' => $organizers,
        ]);
    }

    public function create()
    {
        return view('organizers.form');
    }

    public function store(StoreOrganizersRequest $request)
    {
        $validated = $request->validate($request->rules(), $request->params());

        Organizers::create($validated);

        FacadesSession::flash('message', 'Organizer successfully created!');
        FacadesSession::flash('alert-class', 'success');
        return redirect()->route('organizers.index');
    }

    public function show(Organizers $organizer)
    {
        return view('organizers.organizer', ['organizer' => $organizer]);
    }


    public function edit(Organizers $organizer)
    {
        return view('organizers.form', [
            'organizer' => $organizer,
        ]);
    }

    public function update(UpdateOrganizersRequest $request, Organizers $organizer)
    {
        $validated = $request->validate($request->rules(), $request->params());
        $validated['updated_at'] = Carbon::now();

        $organizer->update($validated);

        FacadesSession::flash('message', 'Organizer successfully updated!');
        FacadesSession::flash('alert-class', 'success');
        return redirect()->route('organizers.index');
    }

    public function destroy(Organizers $organizer)
    {
        $organizer->update(['active' => 0, 'updated_at' => Carbon::now()]);

        FacadesSession::flash('message', 'Organizer successfully deleted!');
        FacadesSession::flash('alert-class', 'success');
        return redirect()->route('organizers.index');
    }
}
