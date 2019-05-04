<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuentaHabiente extends Model
{
    protected $fillable = ['cuenta', 'nombre', 'direccion','correo','telefono','fecha_nacimiento','saldo'];
}
