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
        $organizers = Organizers::all();
        return view("organizers.index", [
            'organizers' => $organizers,
        ]);
    }

    public function create()
    {
        return view("organizers.form");
    }

    public function store(StoreOrganizersRequest $request)
    {
        Organizers::create([
            'name' => $request->name,
            'facebook' => $request->facebook,
            'website' => $request->website,
            'about' => $request->about,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        FacadesSession::flash('message', 'Organizer successfully created!');
        FacadesSession::flash('alert-class', 'success');
        return redirect()->route('organizers.index');
    }

    public function show($id)
    {
        $organizer = Organizers::findOrFail($id);
        return view('organizers.organizer', ['organizer' => $organizer]);
    }


    public function edit($id)
    {
        $organizer = Organizers::findOrFail($id);
        return view("organizers.form", [
            'organizer' => $organizer,
        ]);
    }

    public function update(UpdateOrganizersRequest $request, Organizers $organizer)
    {
        $organizer->update([
            'name' => $request->name,
            'facebook' => $request->facebook,
            'website' => $request->website,
            'about' => $request->about,
            'updated_at' => Carbon::now(),
        ]);

        FacadesSession::flash('message', 'Organizer successfully updated!');
        FacadesSession::flash('alert-class', 'success');
        return redirect()->route('organizers.index');
    }

    public function destroy(Organizers $organizer)
    {
        $organizer->delete();

        FacadesSession::flash('message', 'Organizer successfully deleted!');
        FacadesSession::flash('alert-class', 'success');
        return redirect()->route('organizers.index');
    }
}
