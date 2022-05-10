<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = "documentos";
    protected $primaryKey = "id";

    public $timestamps =true;

    protected $fillable = ['user_id','imagen','actuacion'];

    protected $guarded=[];
}
