@extends('layouts.index')
@section('titulo', 'CUENTAHABIENTES')


@section('content')

<div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Creacion de Cuentahabiente</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ url('/store') }}" name="basic_validate" id="basic_validate" novalidate="novalidate">
            {{ csrf_field() }}
              <div class="control-group">
                <label class="control-label">Cuenta</label>
                <div class="controls">
                  <input type="text" name="cuenta" id="cuenta">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Nombre</label>
                <div class="controls">
                  <input type="text" name="nombre" id="nombre">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Direccion</label>
                <div class="controls">
                  <input type="text" name="direccion" id="direccion">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Correo</label>
                <div class="controls">
                  <input type="text" name="email" id="email">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Telefono</label>
                <div class="controls">
                  <input type="text" name="telefono" id="telefono">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Fecha Nacimiento</label>
                <div class="controls">
                  <input type="text" name="nacimiento" id="nacimiento">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Saldo</label>
                <div class="controls">
                  <input type="text" name="saldo" id="saldo">
                </div>
              </div>
              <div class="form-actions">
                <input type="button" onclick="guardar();" value="Crear" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('scripts')
<script>
$(document).ready(function(){


  
});
function guardar(){

  var myurl = window.location.origin + '/store';
      var cuenta = $("#cuenta").val();
      var nombre = $('#nombre').val();
      var direccion = $('#direccion').val();
      var correo = $('#email').val();
      var fecha = $('#nacimiento').val();
      var saldo = $('#saldo').val();
      var datos = {
          cuenta,
          nombre,
          correo,
          direccion,
          fecha,
          saldo,
          _token: $('#basic_validate').find('[name=_token]').val()
      }
        $.ajax({
            url: myurl,
            data: datos,
            type: 'POST',
            dataType: 'HTML'
        }).done(function(data){}
  ).fail(function(){
            alert('No se logro establecer comunicación con el servidor, por favor intente nuevamente');
        });

}

</script>

  @endsection
