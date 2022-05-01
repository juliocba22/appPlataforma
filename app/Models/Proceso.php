<?php

namespace App\Models;

 
use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    protected $table = "procesos";
    protected $primaryKey = "id";

    public $timestamps =true;

    protected $fillable = ['user_id','email','llaveProceso','idProceso','idConexion','fechaProceso','fechaUltimaActuacion',
                            'fechaNotificacion','despacho','depaprtamento','sujetosProcesales','fechabaja'];

    protected $guarded=[];
}
