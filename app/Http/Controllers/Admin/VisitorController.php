<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitors = Visitor::all();

        return view('admin.visitors.index', compact('visitors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.visitors.create');
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
            'nombre' => 'required',
            'provincia' => 'required',
            'ciudad' => 'required',
            'barrio' => 'required',
            'lesson_id' => 'required',
            'slug' => 'required|unique:visitors,slug'
        ]);
        //$slug = Str::slug('$request name','-','es');

        $visitor = Visitor::create ($request->all());
        //return $request;
        return redirect()->route('admin.visitors.index', $visitor)->with('info','El visitante fue creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Visitor $visitor)
    {
        return view('admin.visitors.edit', compact('visitor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visitor $visitor)
    {
        $request -> validate([
            'nombre' => 'required',
            'provincia' => 'required',
            'ciudad' => 'required',
            'barrio' => 'required',
            'lesson_id' => 'required',
            'slug' => 'required'
        ]);

        $visitor -> update ($request->all());

        return redirect()->route('admin.visitors.index', $visitor)->with('info','Los datos fueron actualizados de manera exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visitor $visitor)
    {
        $visitor -> delete();

        return redirect()->route('admin.visitors.index', $visitor)->with('info','El visitante fue eliminado de manera exitosa');
    }
}
