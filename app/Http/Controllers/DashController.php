<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comunidad;
use App\Models\Proyecto;
use Illuminate\Support\Facades\DB;

class DashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proyectosPorcomunidad = Proyecto::select('proyectos.id_comunidad', 'comunidades.nombre as nombre_comunidad', DB::raw('COUNT(proyectos.id) as cantidad_proyectos'))
                                            ->join('comunidads', 'comunidads.id', '=', 'proyectos.id_comunidad')
                                            ->groupBy('proyectos.id_comunidad', 'comunidads.nombre')
                                            ->get();

        $data = [];
        foreach($proyectosPorcomunidad as $proyporcom){
            $data['label'][] = $proyporcom->nombre;
            $data['data'][] = $proyporcom->id;
        }
        $data['data'] = json_encode($data);
        return view('dash.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
