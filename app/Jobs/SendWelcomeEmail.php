<?php

namespace App\Jobs;

use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Console\Concerns\InteractsWithIO;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail implements ShouldQueue
{

    //Se importa InteractsWithIO para poder usar la consola
    //Se importa SerializesModels para poder serializar el modelo
    use Queueable, InteractsWithQueue, SerializesModels;

    //Es el usuario al que se le enviara el correo de bievenida
    public $user;

    /**
     * Create a new job instance.
     */
    //Recibe un objeto User y lo guarda para enviar los correos
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    //Ejecuta el Job
    public function handle(): void
    {
        //Indica el destinatario del correo. aluciendo a la clase WelcomeMail
        //El cual se crea mediante el comando php artisan make:mail WelcomeMail --markdown=emails.welcome
        Mail::to($this->user->email)->send(new WelcomeMail($this->user));
    }
}
