<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Empleado;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = new User();
        $usuario->nombre = 'admin';
        $usuario->apellido = 'admin';
        $usuario->domicilio = 'care24_domicilio';
        $usuario->dni='administrador';
        $usuario->email = 'care24web@gmail.com';
        $usuario->tipo="Administrativo";
        $usuario->password = bcrypt('admin');
        $usuario->save();
        $emp=new Empleado();
        $emp->puesto='Administrativo';
        $emp->user()->associate($usuario);
        $emp->save();


    }
}
