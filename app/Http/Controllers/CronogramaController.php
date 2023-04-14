<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//icluir aqui el modelo
use App\Models\Cronograma;
use App\Models\Proyecto;
use App\Models\Comunidad;
use Illuminate\Support\Facades\Validator;

class CronogramaController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-cronograma|crear-cronograma|editar-cronograma|borrar-cronograma')->only('index');
        $this->middleware('permission:crear-cronograma', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-cronograma', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-cronograma', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cronogramas = Cronograma::all();
        $proyectos = Proyecto::all();
        return view('cronogramas.index', compact('cronogramas', 'proyectos'));
    }

    public function fetchCronograma($id)
    {
        // $cronogramas = Cronograma::all();
        $cronogramas = Cronograma::where('id_proyecto', $id)->get(); /// ******************************************filtrar por id_proyecto***********************************
        return response()->json([
            'cronogramas'=>$cronogramas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $proyecto =  Proyecto::all();
        // return view('cronogramas.crear', compact('proyecto'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre'=> 'required|max:191',
            'descripcion'=>'required|max:191',
            'fecha_inicio'=>'required',
            'fecha_final'=>'required',
            'id_proyecto'=>'',
            'face' => 'required',
            'estado'=>'required',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $cronograma = new Cronograma;
            $cronograma->nombre = $request->input('nombre');
            $cronograma->descripcion = $request->input('descripcion');
            $cronograma->fecha_inicio = $request->input('fecha_inicio');
            $cronograma->fecha_final = $request->input('fecha_final');
            // Asociar la comunidad
            // $proyecto = Proyecto::find($request->input('id_proyecto'));
            // $cronograma->proyectos()->associate($proyecto);
            $cronograma->proyectos()->associate($request->input('id_proyecto'));

            $cronograma->face = $request->input('face');
            $cronograma->estado = $request->input('estado');

            $cronograma->save();

            return response()->json([
                'status'=>200,
                'message'=>'empresa Agregado Exitosamente.'
            ]);
        }

    }
    // public function store(Request $request)
    // {
    //     request()->validate([
    //         'nombre' => 'required',
    //         'descripcion' => 'required',
    //         'fecha_inicio' => 'required',
    //         'fecha_final' => 'required',
    //         'id_proyecto' => 'required',
    //         'estado' => 'required'
    //     ]);
    //     $guardar = Cronograma::create($request->all());
    //     $guardar->proyectos()->attach($request->proyecto_id);
    //     return redirect()->route('cronogramas.index');
    // }

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
