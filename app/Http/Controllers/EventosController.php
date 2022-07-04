<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use DB;
use Illuminate\Support\Facades\Input;
use Session;
use Illuminate\Support\Facades\Redirect;
class EventosController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index(Request $request){
      
        $eventos = DB::table('eventos')
        ->select('*')
         ->where('user_id','=',auth()->user()->id)
        ->get();

     //  dd($eventos);
        
        return view ('eventos.index' );
    }

    public function show(){
      
        $eventos = DB::table('eventos')
        ->select('*')
         ->where('user_id','=',auth()->user()->id)
        ->get();

      
        
        return response()->json($eventos);
    }

    public function store(Request $request){
       
       // $datosEvento=request()->all();
      
      $evento = new Evento;
       $datosEvento=request()->except('_token','_method');

        $evento->user_id=auth()->user()->id;
         $evento->title=$request->get('title');
         $evento->descripcion=$request->get('descripcion');
          $evento->color=$request->get('color');
        $evento->start=$request->get('start');
          $evento->end=$request->get('end');

          $evento->save();
        //print_r($evento);
       
       return $evento;
    }
    
    public function destroy($id){
        $eventos = Evento::findOrFail($id);
        Evento::destroy($id);

         
        return response()->json($id);
        
    }

    public function update(Request $request , $id){
        $datosEvento=request()->except('_token','_method','user_id');
        $respuesta =Evento::where('id','=',$id)->update($datosEvento);

         
        return response()->json($respuesta);
        
    }
}
