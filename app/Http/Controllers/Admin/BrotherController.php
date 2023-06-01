<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brother;
use Illuminate\Support\Str;

class BrotherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brothers = Brother::all();

        return view('admin.brothers.index', compact('brothers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brothers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'name' => 'required',
            'identificador' => 'required|unique:brothers',
            'slug' => 'required'
        ]);
        //$slug = Str::slug('$request name','-','es');

        $brother = Brother::create ($request->all());
        //return $request->slug();
        return redirect()->route('admin.brothers.index', $brother)->with('info','El hermano fue ingresado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Brother $brother)
    {
        return view('admin.brothers.show', compact('brother'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brother $brother)
    {
        return view('admin.brothers.edit', compact('brother'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brother $brother)
    {
        $request -> validate([
            'name' => 'required',
            'identificador' => "required",
            'slug' => 'required'
        ]);

        $brother -> update ($request->all());

        return redirect()->route('admin.brothers.index', $brother)->with('info','Los datos fueron actualizados de manera exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brother $brother)
    {
        $brother -> delete();

        return redirect()->route('admin.brothers.index', $brother)->with('info','El hermano fue borrado de manera exitosa');
    }
}
