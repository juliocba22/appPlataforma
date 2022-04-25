<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Input;
use Session;
use Illuminate\Support\Facades\Redirect;

class UsuariosController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index(Request $request){
      
        $usuarios = DB::table('users')
         
        ->get();

       
        
        return view ('admin.usuarios.index' , compact('usuarios'));
    }

    

    function create(){
 
      $roles = DB::table('roles')
        
      ->get();
        return view('admin.usuarios.create', compact('roles'));
    }

    function store(Request $request){

        \Log::debug("PASO0");
        $validate = $this->validate($request , [
            'name'=>'required' ,
            'email'=>'required | email |unique:users' ,
            'password'=>'required' 
      ]);
      \Log::debug("PASO");
      $user = new User;

      $user->name=$request->get('name');
      $user->email=$request->get('email');
      $user->password=bcrypt($request->get('password'));
      $user->role_id=request('role_id');
      $user->telefono=$request->get('telefono');
      $user->mobile=$request->get('mobile');
      $user->direccion=$request->get('direccion');
      \Log::debug("PASO2");
      if($request->hasFile("imagen")){
        $file=$request->file("imagen");
        //dd($file);
        $extension = $request->file('imagen')->getClientOriginalExtension();
        $file->move(
        public_path().'/usuarios',time().".".$extension);
        $user->imagen=time().".".$extension;
    }

    \Log::debug("PASO3");
      $user->save();
     
      \Log::debug("PASO4");
      Session::flash('succes','Se registro existosamente');
      \Log::debug("PASO5");
      return redirect()->to('admin/usuarios');
    }

    function edit($id){
        $usuario = DB::table('users')
              ->where('id','=',$id)
              ->first();
              $roles = DB::table('roles')
        
              ->get();
              
              return view('admin.usuarios.edit',compact('usuario','roles'));
          }

    
          function perfil(){


            $usuario = DB::table('users')
                  ->where('id','=',auth()->user()->id)
                  ->first();
                
                  return view('admin.usuarios.perfil',compact('usuario'));
              }

              function updatePerfil(Request $request , $id){

               // dd($id);
                $validate = $this->validate($request , [
                    'name'=>'required' ,
                    //'email'=>'required | email |unique:users' ,
                    'password' => 'required | min:6'  //|required_with:password_confirmation|same:password_confirmation'
                    //'password_confirmation' => 'min:6'
              ]);
            // dd('PASO');
              $user =  User::findOrFail($id);
        
              $user->name=$request->get('name');
              $user->email=$request->get('email');
              $user->password=bcrypt($request->get('password'));
              $user->role_id=auth()->user()->role_id;
              $user->telefono=$request->get('telefono');
              $user->mobile=$request->get('mobile');
              $user->direccion=$request->get('direccion');
              \Log::debug("PASO2");
              if($request->hasFile("imagen")){
                $file=$request->file("imagen");
                //dd($file);
                $extension = $request->file('imagen')->getClientOriginalExtension();
                $file->move(
                public_path().'/usuarios',time().".".$extension);
                $user->imagen=time().".".$extension;
            }
        
            \Log::debug("PASO3");
              $user->update();
             
               
          
                  
                Session::flash('succes','Se registro corractamente la plantilla');
                  
                  return redirect()->to('admin/usuarios');
                  
          
                //  return view('panel.plantillas.create');
          
              }



          function update(Request $request , $id){

            //dd('LEGO');
            $validate = $this->validate($request , [
                'name'=>'required' ,
                'email'=>'required | email |unique:users' ,
                'password'=>'required' 
          ]);
        // dd('PASO');
          $user =  User::findOrFail($id);
    
          $user->name=$request->get('name');
          $user->email=$request->get('email');
          $user->password=bcrypt($request->get('password'));
          $user->role_id=$request->get('role_id');
          $user->telefono=$request->get('telefono');
          $user->mobile=$request->get('mobile');
          $user->direccion=$request->get('direccion');
          \Log::debug("PASO2");
          if($request->hasFile("imagen")){
            $file=$request->file("imagen");
            //dd($file);
            $extension = $request->file('imagen')->getClientOriginalExtension();
            $file->move(
            public_path().'/usuarios',time().".".$extension);
            $user->imagen=time().".".$extension;
        }
    
        \Log::debug("PASO3");
          $user->update();
         
           
      
              
            Session::flash('succes','Se registro corractamente la plantilla');
              
              return redirect()->to('admin/usuarios');
              
      
            //  return view('panel.plantillas.create');
      
          }

          function destroy($id){
        
            $usuario = User::findOrFail($id);
           $usuario->delete();
           Session::flash('succes','Se eliminio su plantilla con exito');
           
           return redirect()->to('admin/usuarios');
   
       }
      
}
