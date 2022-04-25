<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Role::factory(1)->create(['name'=>'ADMIN','description'=>'DESCRIPCION ADMIN']);
        \App\Models\Role::factory(1)->create(['name'=>'USER','description'=>'DESCRIPCION ADMIN']);

     //   \App\Models\City::factory(1)->create(['name'=>'MEDELLIN','codigo'=>'005001']);

        \App\Models\User::factory(1)->create([
            'name'=>'admin',
            'email'=>'julioam22@gmail.com',
            'password'=> bcrypt('secret'),
             
            'role_id'=> \App\Models\Role::ADMIN
        ]);
        for($count=0;$count<2;$count++){
        DB::table('users')->insert([
            'name' => Str::random(2),
            'email' => Str::random(2).'@gmail.com',
            'password' => Hash::make('password'),
            'role_id'=> \App\Models\Role::USER
             
        ]);
    }
    }
}
