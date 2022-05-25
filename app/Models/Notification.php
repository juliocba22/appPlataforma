<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = "notifications";
    protected $primaryKey = "id";

    public $timestamps =false;

    protected $fillable = ['id_proceso' ,'process_id','notification_date'];

    protected $guarded=[];
}
