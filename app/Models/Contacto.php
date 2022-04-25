<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $table = "contactos";
    protected $primaryKey = "id";

    public $timestamps =true;

    protected $fillable = ['user_id','fullName','email','entity','note','phone'];

    protected $guarded=[];
}
