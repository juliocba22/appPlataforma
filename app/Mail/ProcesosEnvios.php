<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProcesosEnvios extends Mailable
{
    use Queueable, SerializesModels;
    protected  $fecha, $nroradicacion , $sujetosProcesales , $fechaUltimaActuacion,$despacho,$departamento;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fecha ,$nroradicacion , $sujetosProcesales , $fechaUltimaActuacion,$despacho,$departamento)
    {
        $this->fecha=$fecha;
        $this->nroradicacion=$nroradicacion;
        $this->sujetosProcesales=$sujetosProcesales;
        $this->fechaUltimaActuacion=$fechaUltimaActuacion;
        $this->despacho=$despacho;
        $this->departamento=$departamento;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
 
        \Log::debug('FECHA : '.$this->fecha);
        //return $this->view('mails.procesos_mail');

        return $this
        ->view('mails.procesos_mail')
        ->subject("Notificación de Actualizacion de Proceso -". $this->nroradicacion)
        ->with([
            
            "fecha" => $this->fecha,
            "nroradicacion" => $this->nroradicacion,
            "sujetosProcesales" => $this->sujetosProcesales,
            "fechaUltimaActuacion" => $this->fechaUltimaActuacion,
            "despacho" => $this->despacho,
            "departamento" => $this->departamento,
        ]);
    }
}
