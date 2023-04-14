<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comunidad;
use App\Models\Proyecto;
use Illuminate\Support\Facades\DB;

class Plantilla_baseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todosLosDatos = [];

        $proyectosPorComunidad = Proyecto::select('proyectos.id_comunidad', 'comunidads.nombre as nombre_comunidad', DB::raw('COUNT(proyectos.id) as cantidad_proyectos'))
                                            ->join('comunidads', 'comunidads.id', '=', 'proyectos.id_comunidad')
                                            ->groupBy('proyectos.id_comunidad', 'comunidads.nombre')
                                            ->get();

        $dataLabels = [];
        $dataCantidadProyectos = [];
        foreach($proyectosPorComunidad as $proyectoPorComunidad) {
        $dataLabels[] = $proyectoPorComunidad->nombre_comunidad;
        $dataCantidadProyectos[] = $proyectoPorComunidad->cantidad_proyectos;
        }

        $data = [
            'label' => $dataLabels,
            'data' => $dataCantidadProyectos,
        ];
        $data['data'] = ($data);
        //$data['data'] = json_encode($data);

        ////////////////////////////////////////////////////
        $proyectosPorCanton = DB::table('comunidads')
                                ->select('comunidads.descripcion as nombre_canton', DB::raw('COUNT(proyectos.id) as cantidad_proyectos'))
                                ->leftJoin('proyectos', 'comunidads.id', '=', 'proyectos.id_comunidad')
                                ->groupBy('comunidads.descripcion')
                                ->get();
        $dataLabels = [];
        $dataCantidadProyectos = [];
        foreach($proyectosPorCanton as $proyectoPorCanton) {
        $dataLabels[] = $proyectoPorCanton->nombre_canton;
        $dataCantidadProyectos[] = $proyectoPorCanton->cantidad_proyectos;
        }

        $data1 = [
            'label1' => $dataLabels,
            'data1' => $dataCantidadProyectos,
        ];
        $data1['data1'] = ($data1);

        ///////////////////////////////////////////////////////////////
        $proyectosPorCategoria = DB::table('proyectos as p')->select('c.nombre', DB::raw('COUNT(p.id) AS cantidad_proyectos'))
                                                ->join('categorias as c', 'p.id_categoria', '=', 'c.id')
                                                ->groupBy('c.nombre')
                                                ->orderByDesc('cantidad_proyectos')
                                                ->get();
        $dataLabels = [];
        $dataCantidadProyectos = [];
        foreach($proyectosPorCategoria as $proyectoPorCategoria) {
        $dataLabels[] = $proyectoPorCategoria->nombre;
        $dataCantidadProyectos[] = $proyectoPorCategoria->cantidad_proyectos;
        }

        $data2 = [
            'label2' => $dataLabels,
            'data2' => $dataCantidadProyectos,
        ];
        $data2['data2'] = ($data2);
        //////////////////////////////////////////////////////////////////////////
//////////////////////////////de aqui comienza las consultas para los meses inicio/////////////////////////////////////////////
        // Obtén los datos de proyectos
        $proyectos = Proyecto::selectRaw('MONTH(fecha_inicio) as mes, COUNT(*) as cantidad')
                            ->groupByRaw('MONTH(fecha_inicio)')
                            ->get();

        // Crea un arreglo con la cantidad de proyectos para cada mes (inicializado en 0 si no hay datos para algún mes)
        $cantidadPorMes = array();
        for ($mes = 1; $mes <= 12; $mes++) {
            $cantidadPorMes[$mes] = 0;
        }

        // Procesa los resultados de la consulta y actualiza el arreglo con la cantidad de proyectos para cada mes
        foreach ($proyectos as $proyecto) {
            $mes = $proyecto->mes;
            $cantidad = $proyecto->cantidad;
            $cantidadPorMes[$mes] = $cantidad;
        }
//////////////////////////////de aqui comienza las consultas para los meses final/////////////////////////////////////////////



        $todosLosDatos=[
            'data' => $data,
            'data1' => $data1,
            'data2' => $data2,
            'cantidadPorMes' => $cantidadPorMes,
        ];
        return view('dash.index', $todosLosDatos);
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
