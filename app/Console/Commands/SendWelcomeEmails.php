<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Jobs\SendWelcomeEmail;

class SendWelcomeEmails extends Command
{
    /* Para crear este comando se utiliza el siguiente comando:
    php artisan make:command SendWelcomeEmails y para
    ejecutar el comando se utiliza el siguiente comando:
    php artisan send:welcome-emails */

    //Comando para enviar correos de bienvenida a 500 usuarios aleatorios
    protected $signature = 'send:welcome-emails';
    //Descripción del comando
    protected $description = 'Envía correos de bienvenida a 500 usuarios aleatorios';

    //Funcion que ejecuta el comando
    public function handle()
    {
        //Elige 500 usuarios ramdom de la base de datos
        $users = User::inRandomOrder()->limit(500)->get();

        //Mediante un bucle foreach, se encolan los correos de bienvenida
        foreach ($users as $user) {
            SendWelcomeEmail::dispatch($user);
        }

        //Mensaje que se mostra en la consola
        $this->info('Se han encolado 500 correos de bienvenida.');
    }
}
