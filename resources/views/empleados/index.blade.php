@extends('layouts.plantilla')

             @if(session('empleadoGuardado'))
             <div class="alert alert-success">
             {{session('empleadoGuardado')}}
             </div>
             @endif

              @if(session('empleadoEliminado'))
             <div class="alert alert-success">
             {{session('empleadoEliminado')}}
             </div>
             @endif

<div class="container mt-5">

    <div class="row justify-content-center">
    <div class="col-md-10">
    <h2 class= "text-center mb-5">Empleados</h2>

    <form class="form-inline ml-3">
    <div class="input-group input-group-sm">
    <input class="form-control form-control-navbar" name="search" type="search" aria-label="Search">
    <div class="input-group-append">
    <button class="btn btn-navbar" type="submit">
    <i class="fa fa-search"></i>
    </button>
    </div>
    </div>
    </form>
    
    <table class="table table-bordered tablet-strpied text-center">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Accion</th>
        </tr>
    </thead> 
    <tbody>

    @foreach($empleados as $empleado)
    <tr>
    <td>{{$empleado->nombre}}</td>
    <td>{{$empleado->apellido}}</td>
    <td>{{$empleado->correo}}</td>
    <td>{{$empleado->telefono}}</td>
    <td>
    <a href="{{route('editar',$empleado->id)}}" class="btn btn-primary mb-3" >
    <i class="fas fa-pencil-alt">
    </i>
    </a>
    <form action="{{ route('delete', $empleado->id)}}" method="POST">
    @csrf @method('DELETE')
    <button type="submit" onclick="return confirm('¿Eliminar?');" class="btn-danger ">
    <i class="fas fa-trash-alt">
    </i>
    </button>
    </from>
    </td>
    </tr>
    @endforeach
       
       </tbody>     
        </table>    
 
        <a class="btn btn-success mb-4" href={{url('/registrar')}}>Añadir Empleado</a>
</div>
</div>
</div>
