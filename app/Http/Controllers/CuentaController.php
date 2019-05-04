<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\CuentaHabiente;

class CuentaController extends Controller
{
  public function index(){
    $cuentas = DB::select( DB::raw("select * from cuentahabiente;") );
    return view('cuentahabientes',compact('cuentas'));
  }

  public function addCuenta(){

    return view('create');
  }

  public function store(Request $request)
  {
      //
      $cuenta = $request->cuenta;
      $nombre = $request->nombre;
      $direccion = $request->direccion;
      $correo = $request->correo;
      $telefono = $request->telefono;
      $fecha = $request->fecha;
      $saldo = $request->saldo;
      /*
      $cuentas = DB::select( DB::raw("insert into  cuentahabiente(cuenta, nombre, direccion, correo, telefono, fecha_nacimiento, saldo) 
                values(?,?,?,?,?,?,?)",[$cuenta, $nombre, $direccion, $correo, $telefono, $fecha, $saldo]));*/
                DB::table('cuentahabiente')->insert(
                  array('cuenta' => $cuenta, 'nombre' => $nombre, 'direccion' => $direccion, 'correo' => $correo, 'telefono' => $telefono, 'fecha_nacimiento' =>$fecha, 'saldo' => $saldo));
                  $cuentas = DB::select( DB::raw("select * from cuentahabiente;") );
      return view('cuentahabientes',compact('cuentas'));;
  }
  public function destroy($cuenta)
  {
      //
       DB::table('cuentahabiente')
          ->where('cuenta', $cuenta)
          ->delete();
      return redirect()->action('CuentaController@index')->with('success','Registro eliminado satisfactoriamente');
  }

}
