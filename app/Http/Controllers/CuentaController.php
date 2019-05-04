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
    $cuentas = DB::select( DB::raw("select  ch.cuentahabiente, ch.nombre, ch.direccion, ch.email, ch.telefono, ch.fecha_nacimiento, c.cuenta, c.saldo from cuentahabiente ch
    left join cuenta c
    on ch.cuentahabiente = c.cuentahabiente;") );
    return view('cuentahabientes',compact('cuentas'));
  }

  public function addCuenta(){

    return view('create');
  }

  public function add(){

    return view('crear');
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
     
      /*
      $cuentas = DB::select( DB::raw("insert into  cuentahabiente(cuenta, nombre, direccion, correo, telefono, fecha_nacimiento, saldo) 
                values(?,?,?,?,?,?,?)",[$cuenta, $nombre, $direccion, $correo, $telefono, $fecha, $saldo]));*/
                DB::table('cuentahabiente')->insert(
                  array('cuentahabiente' => $cuenta, 'nombre' => $nombre, 'direccion' => $direccion, 'email' => $correo, 'telefono' => $telefono, 'fecha_nacimiento' =>$fecha));
                  $cuentas = DB::select( DB::raw("select ch.cuentahabiente, ch.nombre, ch.direccion, ch.email, ch.telefono, ch.fecha_nacimiento, c.cuenta, c.saldo from cuentahabiente ch
                  left join cuenta c
                  on ch.cuentahabiente = c.cuentahabiente;") );
                  
                  \Log::info(print_r($cuentas,true));
      return view('cuentahabientes',compact('cuentas'));
  }
  public function store_cuenta(Request $request)
  {
      //
      $cuenta = $request->cuenta;
      $saldo = $request->saldo;
      $cuentahabiente = $request->cuentahabiente;
             
                DB::table('cuenta')->insert(
                  array('cuenta' => $cuenta, 'saldo' => $saldo, 'cuentahabiente' => $cuentahabiente));
                  $cuentas = DB::select( DB::raw("select ch.cuentahabiente, ch.nombre, ch.direccion, ch.email, ch.telefono, ch.fecha_nacimiento, c.cuenta, c.saldo from cuentahabiente ch
                  left join cuenta c
                  on ch.cuentahabiente = c.cuentahabiente;") );
                  
                  \Log::info(print_r($cuentas,true));
      return view('cuentahabientes',compact('cuentas'));;
  }
  public function destroy($cuenta)
  {
      //
       DB::table('cuentahabiente')
          ->where('cuentahabiente', $cuenta)
          ->delete();
      return redirect()->action('CuentaController@index')->with('success','Registro eliminado satisfactoriamente');
  }

  public function editar($cuenta)
  {
      //
      $cuenta = DB::select( DB::raw("select  ch.cuentahabiente, ch.nombre, ch.direccion, ch.email, ch.telefono, ch.fecha_nacimiento, c.cuenta, c.saldo from cuentahabiente ch
    left join cuenta c
    on ch.cuentahabiente = c.cuentahabiente
    and ch.cuentahabiente =:cuenta"), ["cuenta" => $cuenta]);
  
    return view('editar',compact('cuenta'));
  }

}
