<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('activities')->delete();

        $instructor3 = App\Instructor::find(3);
        $facility3 = App\Facility::find(3);

        $instructor1 = App\Instructor::find(1);
        $facility1 = App\Facility::find(1);

        $instructor2 = App\Instructor::find(2);
        $facility2 = App\Facility::find(2);

        $instructor4 = App\Instructor::find(4);
        $facility4 = App\Facility::find(4);

        $instructor5 = App\Instructor::find(5);
        $facility5 = App\Facility::find(5);

        $instructor6 = App\Instructor::find(6);
        $facility6 = App\Facility::find(6);

        DB::table('activities')->insert(
            
            [
                'nombre' => 'Spinning',
                'fecha' => Carbon::parse('2023-08-28'),
                'hora' => Carbon::createFromTime(18,0,0,'Europe/Madrid'),
                'instructor_id' => $instructor1->id, //sustituir estas 2 cosas por un select!!!!!!!!!!!!!!!!!!!!!!
                'facility_id' => $facility1->id //!!!!!!!!!!!!!!!!!!!!!!
            ]
            );
         
            DB::table('activities')->insert(
            [
                'nombre' => 'Spinning2',
                'fecha' => Carbon::parse('2023-08-28'),
                'hora' => Carbon::createFromTime(20,0,0,'Europe/Madrid'),
                'instructor_id' => $instructor4->id, //sustituir estas 2 cosas por un select!!!!!!!!!!!!!!!!!!!!!!
                'facility_id' => $facility6->id //!!!!!!!!!!!!!!!!!!!!!!
            ],

        );

        DB::table('activities')->insert(
            [
                'nombre' => 'Spinning3',
                'fecha' => Carbon::parse('2023-08-28'),
                'hora' => Carbon::createFromTime(12,0,0,'Europe/Madrid'),
                'instructor_id' => $instructor2->id, //sustituir estas 2 cosas por un select!!!!!!!!!!!!!!!!!!!!!!
                'facility_id' => $facility5->id //!!!!!!!!!!!!!!!!!!!!!!
            ]
            );
            

            DB::table('activities')->insert(
            [
                'nombre' => 'Spinning4',
                'fecha' => Carbon::parse('2023-08-28'),
                'hora' => Carbon::createFromTime(12,0,0,'Europe/Madrid'),
                'instructor_id' => $instructor3->id, //sustituir estas 2 cosas por un select!!!!!!!!!!!!!!!!!!!!!!
                'facility_id' => $facility4->id //!!!!!!!!!!!!!!!!!!!!!!
            ],

            );

            DB::table('activities')->insert(
                [
                    'nombre' => 'KickBoxing',
                    'fecha' => Carbon::parse('2023-07-28'),
                    'hora' => Carbon::createFromTime(12,0,0,'Europe/Madrid'),
                    'instructor_id' => $instructor3->id, //sustituir estas 2 cosas por un select!!!!!!!!!!!!!!!!!!!!!!
                    'facility_id' => $facility4->id //!!!!!!!!!!!!!!!!!!!!!!
                ],
    
                );

            DB::table('activities')->insert(

            [
                'nombre' => 'Spinning5',
                'fecha' => Carbon::parse('2023-05-28'),
                'hora' => Carbon::createFromTime(15,0,0,'Europe/Madrid'),
                'instructor_id' => $instructor2->id,
                'facility_id' => $facility3->id 
            ],
        );

        DB::table('activities')->insert(

            [
                'nombre' => 'Spinning6',
                'fecha' => Carbon::parse('2023-08-28'),
                'hora' => Carbon::createFromTime(16,0,0,'Europe/Madrid'),
                'instructor_id' => $instructor6->id, //sustituir estas 2 cosas por un select!!!!!!!!!!!!!!!!!!!!!!
                'facility_id' => $facility5->id //!!!!!!!!!!!!!!!!!!!!!!
            ]

        );
    }
}
