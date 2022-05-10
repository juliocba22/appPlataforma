<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Documento;
use DB;
class DocumentosController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index(Request $request){
     // dd($request->idR .'-'.auth()->user()->id.'-'.$request->id);
     $idR = $request->get('idR');
     $id = $request->get('id');
        $documentos = DB::table('documentos')
       ->where('actuacion','=',$request->id)
         ->where('user_id','=',auth()->user()->id)
        ->get();

       
        
        return view ('admin.documentos.index' , compact('documentos' , 'idR','id'));
    }

    function eliminar(Request $request ){
        //dd($request);
        $doc = Documento::findOrFail($request->get('id'));
       $doc->delete();
      // Session::flash('succes','Se eliminio su documento con exito');
       
       return redirect()->to('admin/documento?id='.$request->get('idP').'&idR='.$request->get('idR'));

   }

}
