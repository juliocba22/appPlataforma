<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Models\Proceso;
 
use App\Models\Documento;
use Carbon\Carbon;

use Illuminate\Support\Facades\Input;
use Session;
use Illuminate\Support\Facades\Redirect;
use GuzzleHttp\Client;
use App\Http\Controllers\Str;

class ProcesosController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
     public function index(Request $request){
 
        if(auth()->user()->id===1){
            $procesos = DB::table('procesos')
            ->whereNull ('fechabaja')
            ->where('activo','=','0')
            ->orwhereNull('activo')
            ->get();
        }else{
           // dd(auth()->user()->id);
            $procesos = DB::table('procesos')
            ->where('user_id','=',auth()->user()->id)
            ->whereNull('fechabaja')
            ->where('activo','=','0')
            ->orwhere('activo')
            ->get();
        }
        
      

      

        if((isset($request->limit))){
           
           $procesos = $procesos->where('llaveProceso','like',$request->limit);
            
        }
        
        return view ('admin.procesos.index' , compact('procesos'));
    }

    public function indexarchivados(Request $request){
 
        if(auth()->user()->id===1){
            $procesos = DB::table('procesos')
            ->where('activo','=',1)
            
            ->get();
        }else{
           // dd(auth()->user()->id);
            $procesos = DB::table('procesos')
            ->where('user_id','=',auth()->user()->id)
            ->where('activo','=',1)
            ->get();
        }
        
      

        if((isset($request->limit))){
           
           $procesos = $procesos->where('llaveProceso','like',$request->limit);
            
        }
        

        return view ('admin.procesos.indexarchivados' , compact('procesos'));
    }

    function create(){

        //dd('llego');
        return view('admin.procesos.create');
    }

    public function verDetalle(Request $request ){
       $id  = $request->id;
       $data = [];
      //dd($request->id);
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://consultaprocesos.ramajudicial.gov.co:448',
            // You can set any number of default request options.
            'timeout'  => 50.0,
        ]);
    if(!$request->fecini  || !$request->fecfin ){
        //dd('PASO');
        $response = $client->request('GET', '/api/v2/Proceso/Actuaciones/'.$request->id);
    }else{

   
        $param = '/api/v2/Proceso/Actuaciones/'.$request->id.'?fechaIni='.$request->fecini.'&fechaFin='.$request->fecfin;
        
        try{
            $response = $client->request('GET',$param );

            $statusCode = $response->getStatusCode();
        }catch(Guzzle\Http\Exception\RequestException   $e)
        {
            $req = $e->getRequest();
             $resp =$e->getResponse();
             dd('RequestException');
            return view ('procesodetalle' , compact('data','id' ));
        }
        catch (Guzzle\Http\Exception\ServerErrorResponseException $e) {

            $req = $e->getRequest();
            $resp =$e->getResponse();
            dd('server');
           return view ('procesodetalle' , compact('data','id' ));
        }
        catch (Guzzle\Http\Exception\ClientException  $e) {

            $req = $e->getRequest();
            $resp =$e->getResponse();
          dd('BAD');
           return view ('procesodetalle' , compact('data','id' ));
        }
        catch( Exception $e){
          //  \Log::debug( $e);
          //  \Log::debug( $e);
          return view ('procesodetalle' , compact('data','id' ));
        }
              
    }
       //dd($response);

        $j =   $response->getBody()-> getContents();

        $nuevo = (array)json_decode($j);
       //dd($nuevo['actuaciones']);
        //$nuevo = json_decode($j,true)[0];
        
        $data  = $nuevo['actuaciones'];
        //$detalle = $nuevo['actuaciones'][0];
        //dd($data);
   
        return view ('admin.procesos.detalle' , compact('data','id' ));
    
    }

    function store( Request $request){
        
      //dd($request->get('inputNumero'));
      $validate = $this->validate($request , [
        'inputNumero'=>'required|min:23|max:23'      
  ]);
      $client = new Client([
        // Base URI is used with relative requests
        'base_uri' => 'https://consultaprocesos.ramajudicial.gov.co:448',
        // You can set any number of default request options.
        'timeout'  => 50.0,
    ]);
try{
    $response = $client->request('GET', '/api/v2/Procesos/Consulta/NumeroRadicacion?numero='.$request->inputNumero.'&SoloActivos=false');
}catch(Guzzle\Http\Exception\RequestException   $e)
{
    $req = $e->getRequest();
     $resp =$e->getResponse();
     Session::flash('error',' No Se registro su persona con exito');
       //dd($enviarproceso);
       return redirect()->to('crearproceso');
}
catch (Guzzle\Http\Exception\ServerErrorResponseException $e) {

    $req = $e->getRequest();
    $resp =$e->getResponse();
    Session::flash('error',' No Se registro su persona con exito');
    //dd($enviarproceso);
    return redirect()->to('crearproceso');
}
catch (Guzzle\Http\Exception\BadResponseException $e) {

    $req = $e->getRequest();
    $resp =$e->getResponse();
    Session::flash('error',' No Se registro su persona con exito');
    //dd($enviarproceso);
    return redirect()->to('crearproceso');
}
catch( Exception $e){
    Session::flash('error',' No Se registro su persona con exito');
    //dd($enviarproceso);
    return redirect()->to('crearproceso');
}
      


  
 
    if($response){
        $j =   $response->getBody()-> getContents();
        $nuevo = json_decode($j,true);
        $proceso = new Proceso;
        $proceso->llaveProceso=$nuevo["procesos"][0]["llaveProceso"];
        $proceso->user_id=auth()->user()->id;
        $proceso->email=auth()->user()->email;
        $proceso->idproceso = $nuevo["procesos"][0]["idProceso"];
        $proceso->idConexion = $nuevo["procesos"][0]["idConexion"];
        $fechapro =substr($nuevo["procesos"][0]["fechaProceso"], 0 , 10);
        $proceso->fechaProceso = date($fechapro);
       
        $fechapro = substr($nuevo["procesos"][0]["fechaUltimaActuacion"], 0 , 10);
        $proceso->fechaUltimaActuacion =date( $fechapro);
        $proceso->despacho =  $nuevo["procesos"][0]["despacho"];
        $proceso->sujetosProcesales = $nuevo["procesos"][0]["sujetosProcesales"];
       // $proceso->llaveProceso =  $nuevo["procesos"][0]["llaveProceso"];
        
        $proceso->depaprtamento =  $nuevo["procesos"][0]["departamento"];
    }
    $proceso->save();

    $enviarproceso =  Proceso::select("*")->latest()->first();

     
      Session::flash('succes','Se registro su persona con exito');
       //dd($enviarproceso);
       return redirect()->to('admin/procesos');

    }

    function destroy($id){
        $date = Carbon::now();
        $proceso = Proceso::findOrFail($id);
        $proceso->fechabaja=Carbon::now();

       // dd($proceso);
       $proceso->update();
       Session::flash('succes','Se eliminio su proceso con exito');
       
       return redirect()->to('admin/procesos');

   }


   function archivar(Request $request){
       //dd($request->id);
    $date = Carbon::now();
    $proceso = Proceso::findOrFail($request->id);
   // dd($proceso);
    $proceso->activo=1;

   // dd($proceso);
   $proceso->update();

      //dd($proceso);
   Session::flash('succes','Se Archivo su proceso con exito');

   return redirect()->to('admin/procesos');

}

function activar(Request $request){
    //dd($request->id);
 $date = Carbon::now();
 $proceso = Proceso::findOrFail($request->id);
// dd($proceso);
 $proceso->activo=0;

// dd($proceso);
$proceso->update();

   //dd($proceso);
Session::flash('succes','Se activo su proceso con exito');

return redirect()->to('admin/procesos');

}


function upload(Request $request){
   // dd($request);
 $date = Carbon::now();
 $docact = new Documento;
// dd($proceso);
 $docact->actuacion=$request->get('idReg');
 $docact->user_id=auth()->user()->id;
 
 
  if($request->hasFile("imagen")){
    $file=$request->file("imagen");
    
    $extension = $request->file('imagen')->getClientOriginalExtension();
    $filename = $request->file('imagen')->getClientOriginalName();
    $separador = ".";
    $separada = explode($separador, $filename);
    $filename=$separada[0];
    $file->move(
    public_path().'/documentos',$filename.time().".".$extension);
    $docact->imagen=$filename.time().".".$extension;
}
// dd($proceso);
$docact->save();

   //dd($proceso);
Session::flash('succes','El documento se subio con exito');

return redirect()->to('detalle?id='.$request->get('id'));

}

}
