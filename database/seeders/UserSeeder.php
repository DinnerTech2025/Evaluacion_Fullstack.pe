<?php

namespace Database\Seeders;

use App\Models\DataUser;
use App\Models\LoginUser;
use App\Models\User;
use Database\Factories\DataUserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    //Creamos un Seeder llamado UserSeeder el cual tiene la finalidad
    //de crear 10,000 usuarios y 10 logins por cada usuario
    //Con el comando php artisan make:seeder UserSeeder
    //Para esto debemos tener tambien creado los factories necesarios.

    public function run(): void
    {
        //Por problemas de disco, NO se puedo cargar 10 millones de usuarios.
        //Debido a que nunca terminaba de generarse los datos. Por eso solo
        //Se opto por la creacion de 10,000 usuarios.

        //A estos 10000 usuarios se les asigna a cada uno 1 DataUser
        //El cual es un modelo que tiene una relacion uno a uno con el modelo User
        User::factory(10000)
            ->has(DataUser::factory(1), 'dataUser')
            ->create();


        //Se utiliza el chunkById para evitar problemas de memoria
        //Al momento de crear los 10 logins por cada usuario
        //Se utiliza 1000 como tamaño del chunk
        User::chunkById(1000, function ($users) {
            foreach ($users as $user) {
                // Usando la relación para crear 10 logins por usuario
                $user->loginUser()->createMany(
                    LoginUser::factory(10)->make()->toArray()
                );
                // Limpiamos la memoria para evitar problemas de memoria
                gc_collect_cycles();
            }
        });
    }
}
