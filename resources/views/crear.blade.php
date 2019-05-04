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
                <label class="control-label">Saldo</label>
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

  var myurl = window.location.origin + '/store_cuenta';
      var cuenta = $("#cuenta").val();
      var saldo = $('#saldo').val();
      var cuentahabiente = $('#cuentahabiente').val();
 
      var datos = {
          cuenta,
          saldo,
          cuentahabiente,
          _token: $('#basic_validate').find('[name=_token]').val()
      }
        $.ajax({
            url: myurl,
            data: datos,
            type: 'POST',
            dataType: 'HTML'
        }).success(function(data){
          alert('Exito al guardar al cuentahabiente');

        }
  ).fail(function(){
            alert('No se logro establecer comunicación con el servidor, por favor intente nuevamente');
        });

}

</script>

  @endsection
