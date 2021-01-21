@extends('layouts.plantilla')


<div class="cantainer mt-5">
    <div class="row justify-content-center">
            <div class="col-md-7 mt-5">
             <!--mensaje flash-->
             @if(session('EmpleadoModificado'))
             <div class="alert alert-success">
             {{session('EmpleadoModificado')}}
             </div>
             @endif
            <!-- validacion de errores -->
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</i>
                @endforeach
                </ul>
                </div>
            @endif
                <div class="card">
                    <form action="{{route('edit', $empleado->id)}}" method="POST">
                    @csrf @method('PATCH')
                        <div class="card-header text-center">Modificar Empleado</div>
                        
                            <div class="card-body">
                                <div class="row form-group">
                                    <label for="" class="col-2">Nombre<label>
                                    <input type="text" name="nombre" class="form-control col-md-9" value="{{$empleado->nombre}}">
                                </div>
                                <div class="row form-group">
                                    <label for="" class="col-2">Apellido<label>
                                    <input type="text" name="apellido" class="form-control col-md-9" value="{{$empleado->apellido}}">
                                </div>
                                <div class="row form-group">
                                    <label for="" class="col-2">Correo<label>
                                    <input type="text" name="correo" class="form-control col-md-9" value="{{$empleado->correo}}">
                                </div>
                                <div class="row form-group">
                                    <label for="" class="col-2">Telefono<label>
                                    <input type="text" name="telefono" class="form-control col-md-9" value="{{$empleado->telefono}}">
                                </div>

                                <div class="row form-group">
                                <button type="submit" class="btn btn-success col-md-9 offset-2">Modificar</button>
                            </div>

                        </div>
                    </form>
    
                </div>
            </div>
        </div>
    </div>
    <a class="btn btn-light btn-xs mt-5" href="{{url('/')}}">Volver</a>
</div>