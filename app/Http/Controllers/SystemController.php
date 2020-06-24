<?php

namespace App\Http\Controllers;

use App\System;
use App\Http\Requests\SystemRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $systems = System::paginate(10);

        return view('systems', compact('systems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('systems.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SystemRequest $request)
    {
        $system = System::create($request->all());

        if ($request->file('image')) {
            $system->image = $request->file('image')->store('systems', 'public');
            $system->save();
        }

        return back()->with('status', '¡Sistema creado con éxito!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\System  $system
     * @return \Illuminate\Http\Response
     */
    public function edit(System $system)
    {
        return view('systems.edit', compact('system'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\System  $system
     * @return \Illuminate\Http\Response
     */
    public function update(SystemRequest $request, System $system)
    {
        $system->update([
            'name' => $request->name
        ]);

        if ($request->file('image')) {
            Storage::disk('public')->delete($system->image);
            $system->image = $request->file('image')->store('systems', 'public');
            $system->save();
        }

        return back()->with('status', '¡Sistema actualizado con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\System  $system
     * @return \Illuminate\Http\Response
     */
    public function destroy(System $system)
    {
        try {
            $system->delete();
        } catch (QueryException $ex) {
            return back()->with('error', '¡Ha ocurido un error al eliminar!<br>' . $ex->getMessage());
        }

        if ($system->image) {
            Storage::disk('public')->delete($system->image);
        }

        return back()->with('status', '¡Sistema eliminado con éxito!');
    }
}
