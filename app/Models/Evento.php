<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = "eventos";
    protected $primaryKey = "id";

    public $timestamps =true;

    protected $fillable = ['user_id','title','descripcion','color' ,'start','end'];

    protected $guarded=[];
}
