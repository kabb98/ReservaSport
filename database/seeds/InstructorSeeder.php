<?php

use Illuminate\Database\Seeder;


class InstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('instructors')->delete();

        DB::table('instructors')->insert([
            
            'email' => 'KennyBerrones@gmail.com',
            'name' => 'KennyB',
            'telefono' => '666777888',
            'direccion' => 'Calle ABC',
            'fechaNacimiento' => date('Y-m-d',strtotime('10/16/1998'))
            
            
            
        ]);

        DB::table('instructors')->insert([
            
            'email' => 'CarlosTrainer@gmail.com',
            'name' => 'Carlos',
            'telefono' => '666777999',
            'direccion' => 'Calle LLL',
            'fechaNacimiento' => date('Y-m-d',strtotime('10/16/1995'))
            
            
            
        ]);

        DB::table('instructors')->insert([
            
            'email' => 'CarlaTrainer@gmail.com',
            'name' => 'Carla',
            'telefono' => '666777222',
            'direccion' => 'Calle F',
            'fechaNacimiento' => date('Y-m-d',strtotime('10/16/1992'))
            
            
            
        ]);

        DB::table('instructors')->insert([
            
            'email' => 'PacoTrainer@gmail.com',
            'name' => 'Francisco García',
            'telefono' => '666777333',
            'direccion' => 'Calle Valle',
            'fechaNacimiento' => date('Y-m-d',strtotime('10/12/1992'))
            
            
            
        ]);

        DB::table('instructors')->insert([
            
            'email' => 'AnaMonitora@gmail.com',
            'name' => 'Ana Macía',
            'telefono' => '666777111',
            'direccion' => 'Calle F',
            'fechaNacimiento' => date('Y-m-d',strtotime('03/12/1990'))
            
            
            
        ]);

        DB::table('instructors')->insert([
            
            'email' => 'Julia@gmail.com',
            'name' => 'Julia López',
            'telefono' => '666777000',
            'direccion' => 'Calle J',
            'fechaNacimiento' => date('Y-m-d',strtotime('02/10/1999'))
            
            
            
        ]);

        
       

    }
}
