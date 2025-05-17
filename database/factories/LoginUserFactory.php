<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LoginUser>
 */
class LoginUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    //Creamos los Factorys con el comando php artisan make:factory LoginUserFactory
    public function definition(): array
    {

        //En variables se guardan los navegadores y sistemas operativos
        //Para generar un userAgent aleatorio
        $browsers = [
            'Chrome',
            'Firefox',
            'Safari',
            'Edge',
            'Opera',
            'Internet Explorer',
            'Brave',
            'Vivaldi'
        ];
        $os = [
            'Windows 10',
            'Windows 11',
            'Mac OS X',
            'Linux',
            'Android',
            'iOS',
            'Chrome OS'
        ];

        return [
            //Direcciones IP falsas y aleatorias
            'ip' => $this->faker->ipv4(),

            //Genera una cadena User-Agent aleatoria, convinando
            //un sistema operativo y un navegador aleatorio
            'userAgent' => sprintf(
                'Mozilla/5.0 (%s) AppleWebKit/537.36 (KHTML, like Gecko) %s/%s',
                $this->faker->randomElement($os), // el sistema operativo
                $this->faker->randomElement($browsers), // El tipo ed navegador
                $this->faker->randomFloat(1, 10, 15) // Vesion edl navegador
            ),

            //Relacion con usuario
            'user_id' => User::factory(),

            //Fechas Aleatorias entre 1 año y ahora
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
