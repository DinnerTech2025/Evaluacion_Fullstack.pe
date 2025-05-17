<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Se hace el llamado al seeder UserSeeder para generar los usuarios
        //al utilizar el comando php artisan db:seed
        $this->call([UserSeeder::class]);

        /* User::factory(100000)->create(); */

        /* User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */
    }
}
