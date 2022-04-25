<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Command;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use App\Mail\ProcesosEnvios;
use Carbon\Carbon;
use DB;
use App\Models\Notification;
use App\Models\Proceso;
class ControlProcesos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'control:procesos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        //Armo la query para traer los procesos registrados de los usuarios
        $query = DB::table('procesos')
             ->select('*')
             ->whereNull('fechaNotificacion')
             ->get();

            
             $array = ['05001400300320200050200'];
        
             /*,'05001400300320200050100','05001400300320210082000','05001400300320210084000','05001400300320210084400','05001400300320210093400','05001400300520190053800',
             '05001400300520200003000','05001400300520200029600','05001400300520210012700','05001400300620200014400','05001400300620200020100','05001400300620200045600','05001400300620210006200'
             ,'05001400300620210007700','05001400300620210083800','05001400300920200050000','05001400300920210030400','05001400300920210086300'];
             */        
              
             //Configuracion para la invocacion  del api externa
             $client = new Client([
                 // Base URI is used with relative requests
                 'base_uri' => 'https://consultaprocesos.ramajudicial.gov.co:448',
                 // You can set any number of default request options.
                 'timeout'  => 30.0,
             ]);

             
             $n=0;

           
          
             //Recorremos la consulta
             // foreach ($array as $val) {
             foreach($query as $row) 
             {
                 \Log::debug($row->llaveProceso);
               
                 try{
                        $response = $client->request('GET', '/api/v2/Procesos/Consulta/NumeroRadicacion?numero='.$row->llaveProceso.'&SoloActivos=false');
                }catch(Guzzle\Http\Exception\RequestException   $e)
                {
                    $req = $e->getRequest();
                     $resp =$e->getResponse();
                    // \Log::debug( $req);
                    // \Log::debug( $resp );
                     continue;
                }
                catch (Guzzle\Http\Exception\ServerErrorResponseException $e) {

                    $req = $e->getRequest();
                    $resp =$e->getResponse();
                   // \Log::debug( $req);
                   // \Log::debug( $resp );
                    continue;
                }
                catch (Guzzle\Http\Exception\BadResponseException $e) {
        
                    $req = $e->getRequest();
                    $resp =$e->getResponse();
                   // \Log::debug( $req);
                   // \Log::debug( $resp );
                    continue;
                }
                catch( Exception $e){
                  //  \Log::debug( $e);
                  //  \Log::debug( $e);
                    continue;
                }
                      
                
                $j =   $response->getBody()-> getContents();
                        $nuevo = json_decode($j,true);
            
                    //   \Log::debug($nuevo);

                        $idprocess = $nuevo["procesos"][0]["idProceso"];
                        $fecha = strtotime($nuevo["procesos"][0]["fechaProceso"]);
                        $fechaUltima = strtotime($nuevo["procesos"][0]["fechaUltimaActuacion"]);
                        $sujetosprocesales = $nuevo["procesos"][0]["sujetosProcesales"];
                        $nroradicacion =  $nuevo["procesos"][0]["llaveProceso"];
                        $despacho =  $nuevo["procesos"][0]["despacho"];
                        $departamento =  $nuevo["procesos"][0]["departamento"];
            
                        //Variables para comparar dias
                        $newProcess = date('Y-m-d',$fecha );
                        $dateUpdate = date('Y-m-d',$fechaUltima );
                        $date = Carbon::now()-> toDateTimeString();
                        $n= $n+1;   
                        if($dateUpdate==$date){ // Si la fecha de la ult actuacion
                            // del proceso es igual a la fecha actual entonces tengo que enviar la notificacion
                            \Log::debug("GUARDAr".$idprocess);
                                        }
                        else{
                            $procesoBuscar =   DB::table('procesos')
                            ->select('*')
                            -> where('llaveProceso','=',$row->llaveProceso)
                            ->first();
                            \Log::debug("NO GUARDAr".$idprocess);
                            $proceso =  Proceso::findOrFail($procesoBuscar->id);
                            //$proceso  = $procesoBuscar;
                            $proceso->idProceso = $idprocess;
                            $proceso->fechaProceso=date('Y-m-d',$fecha);
                            $proceso->fechaUltimaActuacion=date('Y-m-d',$fechaUltima);
                            $proceso->fechaNotificacion = $date;
                            $proceso->update();
       
                           $notification = new Notification;
                           $notification->process_id = $procesoBuscar->llaveProceso;
                           $notification->notification_date = $date;
                           $notification->save();
                            
                        } 

                   
             
            }       
             \Log::debug("CANTIDAD : ".$n);
        return 0;
    }
}
