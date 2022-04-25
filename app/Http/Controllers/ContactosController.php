<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;
use DB;
use Illuminate\Support\Facades\Input;
use Session;
use Illuminate\Support\Facades\Redirect;

class ContactosController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index(Request $request){
      
        $contactos = DB::table('contactos')
        ->select('*')
         ->where('user_id','=',auth()->user()->id)
        ->get();

      
        return view ('contactos.index' , compact('contactos'));
    }

    function create(){

        //dd('llego');
        return view('contactos.create');
    }

    function store(Request $request){
 
        $validate = $this->validate($request , [
            'fullName'=>'required' ,
            'email'=>'required | email |unique:contactos' 
      ]);
     
      //dd($request);
      $contact = new Contacto;
      
      $contact->fullName=$request->get('fullName');
      $contact->user_id=auth()->user()->id;
      $contact->email=$request->get('email');
      $contact->entity=request('entity');
      $contact->note=$request->get('note');
      $contact->phone=$request->get('phone');
      
 
      $contact->save();
      
      Session::flash('succes','Se registro existosamente');
      
      return redirect()->to('contactos');
    }

    function edit($id){
        $contacto = DB::table('contactos')
              ->where('id','=',$id)
           
              ->first();
             
              
              return view('contactos.edit',compact('contacto' ));
          }



          function update(Request $request , $id){
//dd($request);
       
         
        $validate = $this->validate($request , [
            'fullName'=>'required' 
           // 'email'=>'required | email |unique:contactos' 
      ]);
     
    //dd('PASO');
          $contact =  Contacto::findOrFail($id);
    
          $contact->fullName=$request->get('fullName');
          $contact->user_id=auth()->user()->id;
          $contact->email=$request->get('email');
          $contact->entity=request('entity');
          $contact->note=$request->get('note');
          $contact->phone=$request->get('phone');
          
     
        
          $contact->update();
         
           
      
              
            Session::flash('succes','Se registro corractamente la plantilla');
              
              return redirect()->to('contactos');
              
      
            //  return view('panel.plantillas.create');
      
          }

          function destroy($id){
        
            $contact = Contacto::findOrFail($id);
           $contact->delete();
           Session::flash('succes','Se eliminio su contacto con exito');
           
           return redirect()->to('contactos');
   
       }


}
