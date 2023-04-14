<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => '12345678',
                'nombre' => 'Jorge Luis',
                'apellido_paterno' => 'Mamani',
                'apellido_materno' => 'Sonco',
                'fecha_nacimiento' => '29-05-1996',
                'telefono' => '69737181',
                'direccion' => 'Av. Nuevo Aviso',
                'sexo' => 'masculino',
            ],
        ];
        DB::table('users')->insert($data);
    }
}
