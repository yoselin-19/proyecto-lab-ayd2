@extends('layouts.index')
@section('titulo', 'SALDO')


@section('content')

<div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Saldo</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="" name="basic_validate" id="basic_validate" novalidate="novalidate">
            {{ csrf_field() }}
            <div class="control-group">
                <label class="control-label">{{$cuenta[0]->nombre}}</label>
                <div class="controls">
                  <input type="text" name="nombre" id="nombre">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">{{$cuenta[0]->cuenta}}</label>
                <div class="controls">
                  <input type="text" name="cuenta" id="cuenta">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">{{$cuenta[0]->saldo}}</label>
                <div class="controls">
                  <input type="text" name="saldo" id="saldo">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">CuentaHabiente</label>
                <div class="controls">
                  <input type="text" name="cuentahabiente" id="cuentahabiente">
                </div>
              </div>
         

              <div class="form-actions">
                <input type="button" onclick="acreditar();" value="Crear" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('scripts')

  @endsection
