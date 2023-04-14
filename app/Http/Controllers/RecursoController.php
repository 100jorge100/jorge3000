<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recurso;
use App\Models\Comunidad;

use Illuminate\Support\Facades\Validator;

class RecursoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-recurso|crear-recurso|editar-recurso|borrar-recurso')->only('index');
        $this->middleware('permission:crear-recurso', ['only'=>['create', 'store']]);
        $this->middleware('permission:editar-recurso', ['only'=>['edit', 'update']]);
        $this->middleware('permission:borrar-recurso', ['only'=>['destroy']]);
    }
    /**
     *
     * Display a listing of the resource.
     */
    public function index()
    {
        $comunidads = Comunidad::all();
        return view('recursos.index', ['comunidads' => $comunidads]);
    }

    public function fetchRecurso()
    {
        $recursos = Recurso::all();
        return response()->json([
            'recursos'=>$recursos,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre'=> 'required|max:191',
            'descripcion'=>'required|max:191',
            'gestion'=>'required|max:191',
            'monto'=>'required|max:191',
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
            $recurso = new Recurso;
            $recurso->nombre = $request->input('nombre');
            $recurso->descripcion = $request->input('descripcion');
            $recurso->gestion = $request->input('gestion');
            $recurso->monto = $request->input('monto');
            $recurso->estado = $request->input('estado');
            $recurso->save();
            return response()->json([
                'status'=>200,
                'message'=>'Recurso Agregado Exitosamente.'
            ]);
        }

    }

    public function edit($id)
    {
        $recurso = Recurso::find($id);
        if($recurso)
        {
            return response()->json([
                'status'=>200,
                'recurso'=> $recurso,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Student Found.'
            ]);
        }

    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nombre'=> 'required|max:191',
            'descripcion'=>'required|max:191',
            'gestion'=>'required|max:191',
            'monto'=>'required',
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
            $recurso = Recurso::find($id);
            if($recurso)
            {
                $recurso->nombre = $request->input('nombre');
                $recurso->descripcion = $request->input('descripcion');
                $recurso->gestion = $request->input('gestion');
                $recurso->monto = $request->input('monto');
                $recurso->estado = $request->input('estado');
                $recurso->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Recurso Actualizado Exitosamente.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No Student Found.'
                ]);
            }

        }
    }

    public function destroy($id)
    {
        $recurso = Recurso::find($id);
        if($recurso)
        {
            $recurso->delete();
            return response()->json([
                'status'=>200,
                'message'=>'recurso Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No recurso Found.'
            ]);
        }
    }
}
