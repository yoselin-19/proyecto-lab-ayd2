@extends('layouts.index')
@section('titulo', 'CUENTAHABIENTES')
@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

  <div class="container-fluid">

    <div class="row">
      <section class="content">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="pull-left"><h3>Listado Cuentahabientes</h3></div>
              <div class="pull-right">
                <div class="btn-group">
                  <a href="{{ url('/add') }}" class="btn btn-info" >Añadir Cuenta</a>
                </div>
                <div class="btn-group">
                  <a href="{{ url('/addCuenta') }}" class="btn btn-info" >Añadir Cuentahabiente</a>
                </div>
              </div>
              <div class="table-container">
                <table id="mytable" class="table table-bordred table-striped">
                 <thead>
                   <th>CuentaHabiente</th>
                   <th>Nombre</th>
                   <th>Direccion</th>
                   <th>Correo</th>
                   <th>Telefono</th>
                   <th>Fecha Nacimiento</th>
                   <th>Cuenta</th>
                   <th>Saldo Actual</th>
                   <th>Editar</th>
                   <th>Eliminar</th>
                 </thead>
                 <tbody>
                  @if($cuentas)
                      @foreach($cuentas as $i => $cuenta)
                      <tr>
                        <td>{{$cuenta->cuentahabiente}}</td>
                        <td>{{$cuenta->nombre}}</td>
                        <td>{{$cuenta->direccion}}</td>
                        <td>{{$cuenta->email}}</td>
                        <td>{{$cuenta->telefono}}</td>
                        <td>{{$cuenta->fecha_nacimiento}}</td>
                        <td>{{$cuenta->cuenta}}</td>
                        <td>{{$cuenta->saldo}}</td>
                        <td>
                        <form action="{{url('/editar/'.$cuenta->cuentahabiente)}}" method="post">
                            {{csrf_field()}}                                
                            <button class="btn btn-success btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                            </form>
                         <td>
                        <td>
                            <form action="{{url('/destroy/'.$cuenta->cuentahabiente)}}" method="post">
                            {{csrf_field()}}
                                
                            <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                            </form>
                          </td>
                         
                          <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                          
                        </td>
                      </tr>
                      @endforeach
                   @else
                   <tr>
                    <td colspan="8">No hay registro !!</td>
                  </tr>
                  @endif
                </tbody>

              </table>
            </div>
          </div>
       
        </div>
      </div>
    </section>

  </div>


@endsection

