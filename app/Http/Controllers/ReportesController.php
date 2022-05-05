<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Proceso;
use App\Models\Processes;
use Carbon\Carbon;

use Illuminate\Support\Facades\Input;
use Session;
use Illuminate\Support\Facades\Redirect;
use GuzzleHttp\Client;
class ReportesController extends Controller
{
    public function index(Request $request){
 
        if(auth()->user()->role_id===1){
            $procesos = DB::table('procesos')
         //   ->where('user_id','=',auth()->user()->id)
            ->whereNull ('fechabaja')
            ->get();
        }else{
           // dd(auth()->user()->id);
            $procesos = DB::table('procesos')
            ->where('user_id','=',auth()->user()->id)
            ->whereNull('fechabaja')
            ->get();
        }
        
/*
        if((isset($request->limit))){
           
            $procesos = $procesos->where('llaveProceso','like',$request->limit);
             
         }*/
         
 
 
         //dd($usuarios);
         return view ('admin.reportes.procesosactivos' , compact('procesos'));
     }


     public function indexEliminados(Request $request){
 
        if(auth()->user()->role_id===1){
            $procesos = DB::table('procesos')
         //   ->where('user_id','=',auth()->user()->id)
            ->whereNotNull ('fechabaja')
            ->get();
        }else{
           // dd(auth()->user()->id);
            $procesos = DB::table('procesos')
            ->where('user_id','=',auth()->user()->id)
            ->whereNotNull('fechabaja')
            ->get();
        }
        
/*
        if((isset($request->limit))){
           
            $procesos = $procesos->where('llaveProceso','like',$request->limit);
             
         }*/
         
 
 
         //dd($usuarios);
         return view ('admin.reportes.indexprocesoseliminados' , compact('procesos'));
     }
 
}
