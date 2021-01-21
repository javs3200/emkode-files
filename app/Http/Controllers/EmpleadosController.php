<?php

namespace App\Http\Controllers;

use App\Models\empleados;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    public function lista(Request $request){
        $query = trim($request->get('search'));
        if($request){
            $empleados = empleados::where('nombre','LIKE','%'.$query.'%')
            ->orWhere('apellido','LIKE','%'.$query.'%')
            ->orWhere('correo','LIKE','%'.$query.'%')
            ->orWhere('telefono','LIKE','%'.$query.'%')
            ->orderBy('id','asc')
            ->get();
        return view('empleados.index',['empleados' => $empleados,'search'=>$query]);
        }

    //  $data['empleados']=empleados::paginate(20);   
    //return view('empleados.index',$data);
    }


    public function empleadoform(){
        return view('empleados.registrar');
    }

    public function guardar(Request $data){
        $validator = $this->validate($data, [
            'nombre'=> 'required|string|max:255',
            'apellido'=> 'required|string|max:255',
            'correo'=> 'required|string|max:255|email|unique:empleados'
        ]);


        $data = request()->except('_token');
        empleados::insert($data);

       
       return redirect('/')->with('empleadoGuardado','Empleado Guardado');
    }

    public function editar($id){
        $empleado = empleados::findOrFail($id);
        return view('empleados.editar',compact('empleado'));
    }
    public function edit(Request $request,$id){
        $datosEmpleado = request()->except((['_token','_method']));
        empleados::where('id','=',$id)->update($datosEmpleado);

        return back()->with('EmpleadoModificado','Empleado Modificado');
    }

    public function delete($id){
        empleados::destroy($id);
        return back()->with('empleadoEliminado','Empleado Eliminado');

    }

    public function buscador(Request $request){
        $empleados = empleados::where('nombre','like',$request->text."%")->take(10)->get();
        return view('empleados.buscador',compact('empleados'));
    }

}
