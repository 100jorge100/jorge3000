<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comunidad;
use App\Models\Proyecto;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todosLosDatos=[];
        $comunidades = Comunidad::where('canton', 'like', '%1%')->get();
        $proyectosPorComunidad = Proyecto::select('id_comunidad', DB::raw('COUNT(*) as total'))
            ->groupBy('id_comunidad')
            ->get();

        $data1 = [
            'label1' => [],
            'data1' => [],
        ];

        foreach ($comunidades as $comunidad) {
            $data1['label1'][] = $comunidad->nombre;
            $cantidadProyectos = $proyectosPorComunidad->where('id_comunidad', $comunidad->id)->first()->total ?? 0;
            $data1['data1'][] = $cantidadProyectos;
        }

        $data1['data1'] = ($data1);

        //return view('dashboards.index', $data1);
        /////////////////////////////////////////
        $comunidades = Comunidad::where('canton', 'like', '%2%')->get();
        $proyectosPorComunidad = Proyecto::select('id_comunidad', DB::raw('COUNT(*) as total'))
            ->groupBy('id_comunidad')
            ->get();

        $data2 = [
            'label2' => [],
            'data2' => [],
        ];

        foreach ($comunidades as $comunidad) {
            $data2['label2'][] = $comunidad->nombre;
            $cantidadProyectos = $proyectosPorComunidad->where('id_comunidad', $comunidad->id)->first()->total ?? 0;
            $data2['data2'][] = $cantidadProyectos;
        }

        $data2['data2'] = ($data2);
        /////////////////////////////////////
        $comunidades = Comunidad::where('canton', 'like', '%3%')->get();
        $proyectosPorComunidad = Proyecto::select('id_comunidad', DB::raw('COUNT(*) as total'))
            ->groupBy('id_comunidad')
            ->get();

        $data3 = [
            'label3' => [],
            'data3' => [],
        ];

        foreach ($comunidades as $comunidad) {
            $data3['label3'][] = $comunidad->nombre;
            $cantidadProyectos = $proyectosPorComunidad->where('id_comunidad', $comunidad->id)->first()->total ?? 0;
            $data3['data3'][] = $cantidadProyectos;
        }

        $data3['data3'] = ($data3);

        /////////////////////////////////////
        $comunidades = Comunidad::where('canton', 'like', '%4%')->get();
        $proyectosPorComunidad = Proyecto::select('id_comunidad', DB::raw('COUNT(*) as total'))
            ->groupBy('id_comunidad')
            ->get();

        $data4 = [
            'label4' => [],
            'data4' => [],
        ];

        foreach ($comunidades as $comunidad) {
            $data4['label4'][] = $comunidad->nombre;
            $cantidadProyectos = $proyectosPorComunidad->where('id_comunidad', $comunidad->id)->first()->total ?? 0;
            $data4['data4'][] = $cantidadProyectos;
        }

        $data4['data4'] = ($data4);

        /////////////////////////////////////
        $comunidades = Comunidad::where('canton', 'like', '%6%')->get();
        $proyectosPorComunidad = Proyecto::select('id_comunidad', DB::raw('COUNT(*) as total'))
            ->groupBy('id_comunidad')
            ->get();

        $data6 = [
            'label6' => [],
            'data6' => [],
        ];

        foreach ($comunidades as $comunidad) {
            $data6['label6'][] = $comunidad->nombre;
            $cantidadProyectos = $proyectosPorComunidad->where('id_comunidad', $comunidad->id)->first()->total ?? 0;
            $data6['data6'][] = $cantidadProyectos;
        }

        $data6['data6'] = ($data6);
        /////////////////////////////////////
        $comunidades = Comunidad::where('canton', 'like', '%7%')->get();
        $proyectosPorComunidad = Proyecto::select('id_comunidad', DB::raw('COUNT(*) as total'))
            ->groupBy('id_comunidad')
            ->get();

        $data7 = [
            'label7' => [],
            'data7' => [],
        ];

        foreach ($comunidades as $comunidad) {
            $data7['label7'][] = $comunidad->nombre;
            $cantidadProyectos = $proyectosPorComunidad->where('id_comunidad', $comunidad->id)->first()->total ?? 0;
            $data7['data7'][] = $cantidadProyectos;
        }

        $data7['data7'] = ($data7);
        /////////////////////////////////////
        $comunidades = Comunidad::where('canton', 'like', '%8%')->get();
        $proyectosPorComunidad = Proyecto::select('id_comunidad', DB::raw('COUNT(*) as total'))
            ->groupBy('id_comunidad')
            ->get();

        $data8 = [
            'label8' => [],
            'data8' => [],
        ];

        foreach ($comunidades as $comunidad) {
            $data8['label8'][] = $comunidad->nombre;
            $cantidadProyectos = $proyectosPorComunidad->where('id_comunidad', $comunidad->id)->first()->total ?? 0;
            $data8['data8'][] = $cantidadProyectos;
        }

        $data8['data8'] = ($data8);

         /////////////////////////////////////
         $comunidades = Comunidad::where('canton', 'like', '%5%')->get();
         $proyectosPorComunidad = Proyecto::select('id_comunidad', DB::raw('COUNT(*) as total'))
             ->groupBy('id_comunidad')
             ->get();

         $data5 = [
             'label5' => [],
             'data5' => [],
         ];

         foreach ($comunidades as $comunidad) {
             $data5['label5'][] = $comunidad->nombre;
             $cantidadProyectos = $proyectosPorComunidad->where('id_comunidad', $comunidad->id)->first()->total ?? 0;
             $data5['data5'][] = $cantidadProyectos;
         }

         $data5['data5'] = ($data5);

          /////////////////////////////////////
        $comunidades = Comunidad::where('canton', 'like', '%9%')->get();
        $proyectosPorComunidad = Proyecto::select('id_comunidad', DB::raw('COUNT(*) as total'))
            ->groupBy('id_comunidad')
            ->get();

        $data9 = [
            'label9' => [],
            'data9' => [],
        ];

        foreach ($comunidades as $comunidad) {
            $data9['label9'][] = $comunidad->nombre;
            $cantidadProyectos = $proyectosPorComunidad->where('id_comunidad', $comunidad->id)->first()->total ?? 0;
            $data9['data9'][] = $cantidadProyectos;
        }

        $data9['data9'] = ($data9);
////////////////////////hasta aqui es la consulta de la cantidad de proyoctos por canton inico//////////////////////////////////
        $proyectosPorCategoria = DB::table('proyectos as p')
                        ->join('comunidads as c', 'p.id_comunidad', '=', 'c.id')
                        ->join('categorias as cat', 'p.id_categoria', '=', 'cat.id')
                        ->where('c.canton', 1) // Identificador del cantón deseado
                        ->groupBy('cat.descripcion')
                        ->select('cat.descripcion as categoria', DB::raw('COUNT(p.id) as cantidad'))
                        ->get();
        $dataLabels = [];
        $dataCantidadProyectos = [];
        foreach($proyectosPorCategoria as $proyectoPorCategoria) {
            $dataLabels[] = $proyectoPorCategoria->categoria;
            $dataCantidadProyectos[] = $proyectoPorCategoria->cantidad;
        }

        $dataA = [
            'labelA' => $dataLabels,
            'dataA' => $dataCantidadProyectos,
        ];
        $dataA['dataA'] = ($dataA);
        ///////////////////////////////////////////////

        $proyectosPorCategoria = DB::table('proyectos as p')
                        ->join('comunidads as c', 'p.id_comunidad', '=', 'c.id')
                        ->join('categorias as cat', 'p.id_categoria', '=', 'cat.id')
                        ->where('c.canton', 2) // Identificador del cantón deseado
                        ->groupBy('cat.descripcion')
                        ->select('cat.descripcion as categoria', DB::raw('COUNT(p.id) as cantidad'))
                        ->get();
        $dataLabels = [];
        $dataCantidadProyectos = [];
        foreach($proyectosPorCategoria as $proyectoPorCategoria) {
            $dataLabels[] = $proyectoPorCategoria->categoria;
            $dataCantidadProyectos[] = $proyectoPorCategoria->cantidad;
        }

        $dataB = [
            'labelB' => $dataLabels,
            'dataB' => $dataCantidadProyectos,
        ];
        $dataB['dataB'] = ($dataB);
        ///////////////////////////////////////////////

        $proyectosPorCategoria = DB::table('proyectos as p')
                        ->join('comunidads as c', 'p.id_comunidad', '=', 'c.id')
                        ->join('categorias as cat', 'p.id_categoria', '=', 'cat.id')
                        ->where('c.canton', 3) // Identificador del cantón deseado
                        ->groupBy('cat.descripcion')
                        ->select('cat.descripcion as categoria', DB::raw('COUNT(p.id) as cantidad'))
                        ->get();
        $dataLabels = [];
        $dataCantidadProyectos = [];
        foreach($proyectosPorCategoria as $proyectoPorCategoria) {
            $dataLabels[] = $proyectoPorCategoria->categoria;
            $dataCantidadProyectos[] = $proyectoPorCategoria->cantidad;
        }

        $dataC = [
            'labelC' => $dataLabels,
            'dataC' => $dataCantidadProyectos,
        ];
        $dataC['dataC'] = ($dataC);
        ///////////////////////////////////////////////

        $proyectosPorCategoria = DB::table('proyectos as p')
                        ->join('comunidads as c', 'p.id_comunidad', '=', 'c.id')
                        ->join('categorias as cat', 'p.id_categoria', '=', 'cat.id')
                        ->where('c.canton', 4) // Identificador del cantón deseado
                        ->groupBy('cat.descripcion')
                        ->select('cat.descripcion as categoria', DB::raw('COUNT(p.id) as cantidad'))
                        ->get();
        $dataLabels = [];
        $dataCantidadProyectos = [];
        foreach($proyectosPorCategoria as $proyectoPorCategoria) {
            $dataLabels[] = $proyectoPorCategoria->categoria;
            $dataCantidadProyectos[] = $proyectoPorCategoria->cantidad;
        }

        $dataD = [
            'labelD' => $dataLabels,
            'dataD' => $dataCantidadProyectos,
        ];
        $dataD['dataD'] = ($dataD);
        ///////////////////////////////////////////////

        $proyectosPorCategoria = DB::table('proyectos as p')
                        ->join('comunidads as c', 'p.id_comunidad', '=', 'c.id')
                        ->join('categorias as cat', 'p.id_categoria', '=', 'cat.id')
                        ->where('c.canton', 6) // Identificador del cantón deseado
                        ->groupBy('cat.descripcion')
                        ->select('cat.descripcion as categoria', DB::raw('COUNT(p.id) as cantidad'))
                        ->get();
        $dataLabels = [];
        $dataCantidadProyectos = [];
        foreach($proyectosPorCategoria as $proyectoPorCategoria) {
            $dataLabels[] = $proyectoPorCategoria->categoria;
            $dataCantidadProyectos[] = $proyectoPorCategoria->cantidad;
        }

        $dataE = [
            'labelE' => $dataLabels,
            'dataE' => $dataCantidadProyectos,
        ];
        $dataE['dataE'] = ($dataE);
        ///////////////////////////////////////////////

        $proyectosPorCategoria = DB::table('proyectos as p')
                        ->join('comunidads as c', 'p.id_comunidad', '=', 'c.id')
                        ->join('categorias as cat', 'p.id_categoria', '=', 'cat.id')
                        ->where('c.canton', 7) // Identificador del cantón deseado
                        ->groupBy('cat.descripcion')
                        ->select('cat.descripcion as categoria', DB::raw('COUNT(p.id) as cantidad'))
                        ->get();
        $dataLabels = [];
        $dataCantidadProyectos = [];
        foreach($proyectosPorCategoria as $proyectoPorCategoria) {
            $dataLabels[] = $proyectoPorCategoria->categoria;
            $dataCantidadProyectos[] = $proyectoPorCategoria->cantidad;
        }

        $dataF = [
            'labelF' => $dataLabels,
            'dataF' => $dataCantidadProyectos,
        ];
        $dataF['dataF'] = ($dataF);
        ///////////////////////////////////////////////

        $proyectosPorCategoria = DB::table('proyectos as p')
                        ->join('comunidads as c', 'p.id_comunidad', '=', 'c.id')
                        ->join('categorias as cat', 'p.id_categoria', '=', 'cat.id')
                        ->where('c.canton', 8) // Identificador del cantón deseado
                        ->groupBy('cat.descripcion')
                        ->select('cat.descripcion as categoria', DB::raw('COUNT(p.id) as cantidad'))
                        ->get();
        $dataLabels = [];
        $dataCantidadProyectos = [];
        foreach($proyectosPorCategoria as $proyectoPorCategoria) {
            $dataLabels[] = $proyectoPorCategoria->categoria;
            $dataCantidadProyectos[] = $proyectoPorCategoria->cantidad;
        }

        $dataG = [
            'labelG' => $dataLabels,
            'dataG' => $dataCantidadProyectos,
        ];
        $dataG['dataG'] = ($dataG);
        ///////////////////////////////////////////////

        $proyectosPorCategoria = DB::table('proyectos as p')
                        ->join('comunidads as c', 'p.id_comunidad', '=', 'c.id')
                        ->join('categorias as cat', 'p.id_categoria', '=', 'cat.id')
                        ->where('c.canton', 5) // Identificador del cantón deseado
                        ->groupBy('cat.descripcion')
                        ->select('cat.descripcion as categoria', DB::raw('COUNT(p.id) as cantidad'))
                        ->get();
        $dataLabels = [];
        $dataCantidadProyectos = [];
        foreach($proyectosPorCategoria as $proyectoPorCategoria) {
            $dataLabels[] = $proyectoPorCategoria->categoria;
            $dataCantidadProyectos[] = $proyectoPorCategoria->cantidad;
        }

        $dataH = [
            'labelH' => $dataLabels,
            'dataH' => $dataCantidadProyectos,
        ];
        $dataH['dataH'] = ($dataH);
        ///////////////////////////////////////////////
        $proyectosPorCategoria = DB::table('proyectos as p')
                        ->join('comunidads as c', 'p.id_comunidad', '=', 'c.id')
                        ->join('categorias as cat', 'p.id_categoria', '=', 'cat.id')
                        ->where('c.canton', 5) // Identificador del cantón deseado
                        ->groupBy('cat.descripcion')
                        ->select('cat.descripcion as categoria', DB::raw('COUNT(p.id) as cantidad'))
                        ->get();
        $dataLabels = [];
        $dataCantidadProyectos = [];
        foreach($proyectosPorCategoria as $proyectoPorCategoria) {
            $dataLabels[] = $proyectoPorCategoria->categoria;
            $dataCantidadProyectos[] = $proyectoPorCategoria->cantidad;
        }

        $dataH = [
            'labelH' => $dataLabels,
            'dataH' => $dataCantidadProyectos,
        ];
        $dataH['dataH'] = ($dataH);
        ///////////////////////////////////////////////

        $proyectosPorCategoria = DB::table('proyectos as p')
                        ->join('comunidads as c', 'p.id_comunidad', '=', 'c.id')
                        ->join('categorias as cat', 'p.id_categoria', '=', 'cat.id')
                        ->where('c.canton', 9) // Identificador del cantón deseado
                        ->groupBy('cat.descripcion')
                        ->select('cat.descripcion as categoria', DB::raw('COUNT(p.id) as cantidad'))
                        ->get();
        $dataLabels = [];
        $dataCantidadProyectos = [];
        foreach($proyectosPorCategoria as $proyectoPorCategoria) {
            $dataLabels[] = $proyectoPorCategoria->categoria;
            $dataCantidadProyectos[] = $proyectoPorCategoria->cantidad;
        }

        $dataI = [
            'labelI' => $dataLabels,
            'dataI' => $dataCantidadProyectos,
        ];
        $dataI['dataI'] = ($dataI);
        ///////////////////////////////////////////////



////////////////////////hasta aqui comienza las consultas de la cantidad de proyoctos por categoria para cada canton final//////////////////////////////////


/////////////////////////////desde aqui comienza para enviar datos a la vista//////////////////////////////
        $todosLosDatos=[
            'data1' => $data1,
            'data2' => $data2,
            'data3' => $data3,
            'data4' => $data4,
            'data6' => $data6,
            'data7' => $data7,
            'data8' => $data8,
            'data5' => $data5,
            'data9' => $data9,
            //////////////////////////
            'dataA' => $dataA,
            'dataB' => $dataB,
            'dataC' => $dataC,
            'dataD' => $dataD,
            'dataE' => $dataE,
            'dataF' => $dataF,
            'dataG' => $dataG,
            'dataH' => $dataH,
            'dataI' => $dataI,
        ];

        // return var_dump($todosLosDatos);

        return view('dashboards.index', $todosLosDatos);
    /////////////////////////estos para retornar datos a la vista ///////////////////////////////////////////////
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
