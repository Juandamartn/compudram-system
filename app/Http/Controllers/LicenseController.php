<?php

namespace App\Http\Controllers;

use App\Client;
use App\License;
use App\System;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class LicenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $licenses = License::orderBy('status', 'asc')->orderBy('created_at', 'desc')->paginate(10);

        date_default_timezone_set('America/Chihuahua');
        $todayDate = strtotime(date("d-m-Y H:i:00", time()));

        return view('licenses.licenses', compact('licenses', 'todayDate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::latest()->get();
        $systems = System::latest()->get();

        return view('licenses.create', compact('clients', 'systems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        License::create($request->all());

        return back()->with('status', '!Licencia creada con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\License  $license
     * @return \Illuminate\Http\Response
     */
    public function show(License $license)
    {
        $license = License::find($license->id);

        date_default_timezone_set('America/Chihuahua');
        $todayDate = strtotime(date("d-m-Y H:i:00", time()));

        return view('licenses.show', compact('license', 'todayDate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\License  $license
     * @return \Illuminate\Http\Response
     */
    public function edit(License $license)
    {
        $clients = Client::latest()->get();
        $systems = System::latest()->get();

        return view('licenses.edit', compact('license', 'clients', 'systems'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\License  $license
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, License $license)
    {
        $license->update($request->all());

        return back()->with('status', '¡Licencia actualizada con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\License  $license
     * @return \Illuminate\Http\Response
     */
    public function destroy(License $license)
    {
        try {
            $license->delete();
        } catch (QueryException $ex) {
            return back()->with('error', '¡Ha ocurrido un error al eliminar!<br>' . $ex->getMessage());
        }

        return redirect()->route('licenses.index')->with('status', '!Licencia eliminada con éxito!');
    }
}
