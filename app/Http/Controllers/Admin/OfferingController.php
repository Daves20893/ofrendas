<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brother;
use App\Models\Offering;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;

class OfferingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offerings = Offering::all();

        return view('admin.offerings.index', compact('offerings'));
    }

    public function individual_index()
    {
        $offerings = Offering::all();

        return view('admin.reports.individual', compact('offerings'));
    }

    public function individual_index_pdf(Request $request)
    {
        $bro=Brother::find($request->nombre);
        //return ($bro);

        $offerings = Offering::select('offerings')
            ->join('brothers', 'offerings.brother_id', '=', 'brothers.id')
            ->select('offerings.*', 'brothers.name', 'brothers.identificador')
            ->where('brothers.name','like', '%' . $bro->name . '%')
            ->WhereBetween('offerings.fecha', [$request->fechainicio, $request->fechafin])
            ->orderBy('offerings.fecha', 'asc')
            ->get();

        /*return view('admin.reports.individual_pdf', compact('offerings','request','bro'));

         $offerings = $ofrendas;*/

        view()->share('admin.reports.individual_pdf',[$offerings,$request,$bro]);

        $pdf = PDF::loadView('admin.reports.individual_pdf', ['offerings' => $offerings,'request' => $request, 'bro' => $bro]);

        return $pdf->stream('ofrendas.pdf'); 
    }

    public function global_index()
    {
        $offerings = Offering::all();

        return view('admin.reports.global', compact('offerings'));
    }

    public function global_index_pdf(Request $request)
    {
        $bro=Brother::find($request->nombre);
        //return ($bro);

        $offerings = Offering::select('offerings')
            ->join('brothers', 'offerings.brother_id', '=', 'brothers.id')
            ->select('offerings.*', 'brothers.name', 'brothers.identificador')
            ->WhereBetween('offerings.fecha', [$request->fechainicio, $request->fechafin])
            ->orderBy('offerings.fecha', 'asc')
            ->get();

        $fecha= Offering::distinct('fecha')
            ->WhereBetween('offerings.fecha', [$request->fechainicio, $request->fechafin])
            ->orderBy('offerings.fecha', 'asc')
            ->get();

        $fechas = $fecha->unique('fecha');

        /*return view('admin.reports.individual_pdf', compact('offerings','request','bro'));

         $offerings = $ofrendas;*/

        view()->share('admin.reports.global_pdf',[$offerings,$request,$bro, $fechas]);

        $pdf = PDF::loadView('admin.reports.global_pdf', ['offerings' => $offerings,'request' => $request, 'bro' => $bro, 'fechas' => $fechas]);

        return $pdf->stream('ofrendas.pdf'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.offerings.create');
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
            'fecha' => 'required',
            'cedula' => 'required',
            'slug' => 'required|unique:offerings',
            'total' => 'required|numeric|min:0.01'
        ]);

        $offering = Offering::create ($request->all());
        //return $request;
        return redirect()->route('admin.offerings.index')->with('info','La ofrenda fue ingresada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Offering $offering)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Offering $offering)
    {
        return view('admin.offerings.edit', compact('offering'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offering $offering)
    {
        $request -> validate([
            'total' => 'required|numeric|min:0.01'
        ]);

        $offering -> update ($request->all());
        //return $request;
        return redirect()->route('admin.offerings.index')->with('info','La ofrenda fue actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offering $offering)
    {
        $offering -> delete();

        return redirect()->route('admin.offerings.index', $offering)->with('info','La ofrenda fue eliminada de manera exitosa');
    }
}
