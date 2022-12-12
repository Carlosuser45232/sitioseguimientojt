<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Estudiante;

class PagesController extends Controller 
{
    public function fnIndex(){
        return view('welcome');
    }

        //CREATE
    public function fnRegistrar(Request $request) {

        //return $request;      //Verificando "token" y datos recibidos

        $request -> validate([
            'codEst'=>'required',
            'nomEst'=>'required',
            'apeEst'=>'required',
            'fnaEst'=>'required',
            'turMat'=>'required',
            'semMat'=>'required',
            'estMat'=>'required'
        ]);

        $nuevoEstudiante = new Estudiante;

        $nuevoEstudiante->codEst = $request->codEst;
        $nuevoEstudiante->nomEst = $request->nomEst;
        $nuevoEstudiante->apeEst = $request->apeEst;
        $nuevoEstudiante->fnaEst = $request->fnaEst;
        $nuevoEstudiante->turMat = $request->turMat;
        $nuevoEstudiante->semMat = $request->semMat;
        $nuevoEstudiante->estMat = $request->estMat;

        $nuevoEstudiante->save();                                   //Guarda en BD

        //return view('pagLista');
        return back()->with('msj','Se REGISTRO con exito...');      //Regresar
    }

    public function fnUpdate(Request $request, $id) {

        //return $request;      //Verificando "token" y datos recibidos

        $xUpdateAlumnos = Estudiante::findOrFail($id);


        $xUpdateAlumnos->codEst = $request->codEst;
        $xUpdateAlumnos->nomEst = $request->nomEst;
        $xUpdateAlumnos->apeEst = $request->apeEst;
        $xUpdateAlumnos->fnaEst = $request->fnaEst;
        $xUpdateAlumnos->turMat = $request->turMat;
        $xUpdateAlumnos->semMat = $request->semMat;
        $xUpdateAlumnos->estMat = $request->estMat;

        $xUpdateAlumnos->save();                                   //Guarda en BD

        //return view('pagLista');
        return back()->with('msj','Se ACTUALIZO con exito...');      //Regresar
    }


    public function fnEstDetalle($id){
        $xDetAlumnos = Estudiante::findOrFail($id);     //Datos de BD po ID
        return view('Estudiante.pagDetalle', compact('xDetAlumnos'));
    }

    public function fnEstActualizar($id){
        $xActAlumnos = Estudiante::findOrFail($id);     //Datos de BD po ID
        return view('Estudiante.pagActualizar', compact('xActAlumnos'));
    }

    public function fnEliminar($id){
        $xdeleteAlumnos = Estudiante::findOrFail($id);     //Datos de BD po ID
        $xdeleteAlumnos->delete();

        return back()->with('msj','Se ELIMINO con exito...');      //Regresar
    }

    public function fnLista(){
        $xAlumnos = Estudiante::paginate(4);      //Datos de BD
        return view('pagLista', compact('xAlumnos'));
    }

    public function fnGaleria($numero=0){
        $valor=$numero;
        $otro=25;
        //return view('pagGaleria', ['valor' => $numero, 'otro' => 25]);
        return view('pagGaleria', compact('valor', 'otro'));
    }
}
