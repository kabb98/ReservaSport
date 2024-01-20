<?php

use Illuminate\Database\Seeder;
use App\Role;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Role::where('name','client')->first();
        $admin = Role::where('name','admin')->first();



        $role_admin = $admin->id;
        $role_user = $user->id;

        DB::table('users')->delete();

        DB::table('users')->insert([
            
            'email' => 'LuisBerrones@gmail.com',
            'password' => bcrypt('123'),
            'name' => 'LuisB',
            'telefono' => '666777888',
            'direccion' => 'Calle ABC',
            'fechaNacimiento' => date('Y-m-d',strtotime('10/16/1998')),
            'role_id' => $role_user
            
            
        ]);

        DB::table('users')->insert([
            
            'email' => 'KennyM@gmail.com',
            'password' => bcrypt('123k45'),
            'name' => 'KennyM',
            'telefono' => '666777889',
            'direccion' => 'Calle F',
            'fechaNacimiento' => date('Y-m-d',strtotime('10/12/2008')),
            'role_id' => $role_user
            
            
        ]);

        DB::table('users')->insert([
            
            'email' => 'Carlos@gmail.com',
            'password' => bcrypt('123K45'),
            'name' => 'Carlos',
            'telefono' => '666777890',
            'direccion' => 'Calle M',
            'fechaNacimiento' => date('Y-m-d',strtotime('05/28/2003')),
            'role_id' => $role_user
            
            
        ]);

        DB::table('users')->insert([
            
            'email' => 'Roberto@gmail.com',
            'password' => bcrypt('12A345'),
            'name' => 'ROberto',
            'telefono' => '666277890',
            'direccion' => 'Calle L',
            'fechaNacimiento' => date('Y-m-d',strtotime('05/22/2003')),
            'role_id' => $role_admin
            
            
        ]);

        DB::table('users')->insert([
            
            'email' => 'Raul@gmail.com',
            'password' => bcrypt('123s45'),
            'name' => 'Raúl',
            'telefono' => '666276890',
            'direccion' => 'Calle D',
            'fechaNacimiento' => date('Y-m-d',strtotime('05/10/2003')),
            'role_id' => $role_admin
            
        ]);

        DB::table('users')->insert([
            
            'email' => 'Pablo@gmail.com',
            'password' => bcrypt('123k45'),
            'name' => 'Pablo',
            'telefono' => '666266890',
            'direccion' => 'M30',
            'fechaNacimiento' => date('Y-m-d',strtotime('05/10/2001')),
            'role_id' => $role_user
            
            
        ]);

        DB::table('users')->insert([
            
            'email' => 'VaCarla@gmail.com',
            'password' => bcrypt('123245'),
            'name' => 'Carla',
            'telefono' => '666266899',
            'direccion' => 'Calle Twitter',
            'fechaNacimiento' => date('Y-m-d',strtotime('05/10/2002')),
            'role_id' => $role_user
            
            
        ]);
    }
}
