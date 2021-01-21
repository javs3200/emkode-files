@extends('layouts.plantilla')

 <!--mensaje flash-->
             @if(session('empleadoGuardado'))
             <div class="alert alert-success">
             {{session('empleadoGuardado')}}
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

<div class="cantainer mt-1">
    <div class="row justify-content-center">
        <div class="col-md-5 mt-5">
                <div class="card">
                    <form action={{route('guardar')}} method="POST">
                    @csrf
                        <div class="card-header text-center">Añadir Empleado</div>

                            <div class="card-body ">
                                <div class="row form-group">
                                    <label for="" class="col-2">Nombre</label>
                                    <input type="text" name="nombre" class="form-control col-md-9">
                                </div>

                                <div class="row form-group">
                                    <label for="" class="col-2">Apellido</label>
                                    <input type="text" name="apellido" class="form-control col-md-9">
                                </div>

                                <div class="row form-group">
                                    <label for="" class="col-2">Correo</label>
                                    <input type="text" name="correo" class="form-control col-md-9">
                                </div>

                                <div class="row form-group">
                                    <label for="" class="col-2">Telefono</label>
                                    <input type="text" name="telefono" class="form-control col-md-9 mb-2">
                                </div>
                             
                                <div class="row form-group">
                                <button type="submit" class="btn btn-success  col-md-3  mb-2">Agregar</button>
                                </div>
                                <div class="row form-group">
                                <a class="btn btn-primary  col-md-3" href="{{url('/')}}">Volver</a>
                                </div>
                            </div>
                      </form>
                            </div>     
                </div>
        </div>
    </div>
</div>
    