<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Models\Proceso;
use App\Models\Processes;


use Illuminate\Support\Facades\Input;
use Session;
use Illuminate\Support\Facades\Redirect;
use GuzzleHttp\Client;

class ProcesosController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
     public function index(Request $request){
 
        if(auth()->user()->id===1){
            $procesos = DB::table('procesos')
            
            ->get();
        }else{
            $procesos = DB::table('procesos')
            ->where('user_id','=',auth()->user()->id)
            ->get();
        }
        
      

      

        if((isset($request->limit))){
           
           $procesos = $procesos->where('llaveProceso','like',$request->limit);
            
        }
        


        //dd($usuarios);
        return view ('procesos_activos' , compact('procesos'));
    }

    function create(){

        //dd('llego');
        return view('crearproceso');
    }

    public function verDetalle(Request $request ){
       $id  = $request->id;
       $data = [];
     //  dd($request->id);
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
     //   dd($data);
   
        return view ('procesodetalle' , compact('data','id' ));
    
    }

    function store( Request $request){
        
      //dd($request->get('inputNumero'));

      $client = new Client([
        // Base URI is used with relative requests
        'base_uri' => 'https://consultaprocesos.ramajudicial.gov.co:448',
        // You can set any number of default request options.
        'timeout'  => 50.0,
    ]);

    $response = $client->request('GET', '/api/v2/Procesos/Consulta/NumeroRadicacion?numero='.$request->inputNumero.'&SoloActivos=false');
//dd($response);
  
 
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
       return redirect()->to('procesos');

    }
}
