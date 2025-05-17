<?php

namespace Database\Factories;

use App\Models\DataUser;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataUser>
 */
class DataUserFactory extends Factory
{

    //Creamos los Factorys con el comando php artisan make:factory DataUserFactory

    //Determinamos el modelo al cual pertenece a este factory
    protected $model = DataUser::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            //Genera un numero telefonico y direccion falsos
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address,
        ];
    }
}
