<?php

use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('facilities')->delete();

        DB::table('facilities')->insert(
            
            [
                
                'descripcion' => 'Gimnasio',
                'aforo' => 50
            ],
        );

        DB::table('facilities')->insert(

            [
                
                'descripcion' => 'Pista de tenis 1',
                'aforo' => 1

            ],
        );

        DB::table('facilities')->insert(
            [
                
                'descripcion' => 'Pista de tenis 2',
                'aforo' => 1

            ],
        );

        DB::table('facilities')->insert(
            [
                
                'descripcion' => 'Pista de Ping Pong',
                'aforo' => 1

            ],
        );

        DB::table('facilities')->insert(
            [
                
                'descripcion' => 'Piscina',
                'aforo' => 20

            ],
        );

        DB::table('facilities')->insert(
            [
                
                'descripcion' => 'Campo de Fútbol',
                'aforo' => 1

            ],
        );

        DB::table('facilities')->insert(
            [
                
                'descripcion' => 'Spa',
                'aforo' => 10

            ]

        );
    }
}
