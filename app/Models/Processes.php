<?php

namespace App\Models;

 
use Illuminate\Database\Eloquent\Model;

class Processes extends Model
{
    protected $table = "processes";
    protected $primaryKey = "id";

    public $timestamps =false;

    protected $fillable = ['user_id','process','filing_number','register_date','update_date','last_update_date','count_process'
                            ,'active','defendant','demanding','city_id','specialty_id','office_id'];

    protected $guarded=[];
}
