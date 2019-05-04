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
                  <a href="{{ url('/addCuenta') }}" class="btn btn-info" >Añadir Cuentahabiente</a>
                </div>
              </div>
              <div class="table-container">
                <table id="mytable" class="table table-bordred table-striped">
                 <thead>
                   <th>Cuenta</th>
                   <th>Nombre</th>
                   <th>Direccion</th>
                   <th>Correo</th>
                   <th>Telefono</th>
                   <th>Fecha Nacimiento</th>
                   <th>Saldo Actual</th>
                   <th>Editar</th>
                   <th>Eliminar</th>
                 </thead>
                 <tbody>
                  @if($cuentas)
                      @foreach($cuentas as $cuenta)
                      <tr>
                        <td>{{$cuenta->cuenta}}</td>
                        <td>{{$cuenta->nombre}}</td>
                        <td>{{$cuenta->direccion}}</td>
                        <td>{{$cuenta->correo}}</td>
                        <td>{{$cuenta->telefono}}</td>
                        <td>{{$cuenta->fecha_nacimiento}}</td>
                        <td>{{$cuenta->saldo}}</td>
                        <td><a class="btn btn-primary btn-xs" href="" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                        <td>
                        <td>
                            <form action="{{action('CuentaController@destroy', $cuenta->cuenta)}}" method="post">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">          
                            <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
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

