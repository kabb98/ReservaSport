<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('bookings')->delete();

        $facility1 = App\Facility::find(1);
        $user1 = App\User::find(1);

        $facility2 = App\Facility::find(2);
        $user2 = App\User::find(2);

        $facility4 = App\Facility::find(4);
        $user4 = App\User::find(4);

        $facility3 = App\Facility::find(3);
        $user3 = App\User::find(3);

        $facility5 = App\Facility::find(5);
        $user5 = App\User::find(5);

        $facility6 = App\Facility::find(6);
        $user6 = App\User::find(6);

        DB::table('bookings')->insert(
            
            [
                //'id' => 1,
                'fecha' => Carbon::parse('03-08-2023'),
                'hora' => Carbon::createFromTime(11,0,0,'Europe/Madrid'),
                'user_id' => $user1->id, //sustituir estas 2 cosas por un select!!!!!!!!!!!!!!!!!!!!!!
                'facility_id' => $facility1->id //!!!!!!!!!!!!!!!!!!!!!!
            ],
        );

        DB::table('bookings')->insert(
            [
                //'id' => 1,
                'fecha' => Carbon::parse('2023-08-29'),
                'hora' => Carbon::createFromTime(14,0,0,'Europe/Madrid'),
                'user_id' => $user2->id, //sustituir estas 2 cosas por un select!!!!!!!!!!!!!!!!!!!!!!
                'facility_id' => $facility3->id //!!!!!!!!!!!!!!!!!!!!!!
            ],
        );
        
        DB::table('bookings')->insert(
            [
                //'id' => 1,
                'fecha' => Carbon::createFromFormat('d/m/Y','29/08/2023'),
                'hora' => Carbon::createFromTime(12,0,0,'Europe/Madrid'),
                'user_id' => $user3->id, //sustituir estas 2 cosas por un select!!!!!!!!!!!!!!!!!!!!!!
                'facility_id' => $facility4->id //!!!!!!!!!!!!!!!!!!!!!!
            ],

        );

        DB::table('bookings')->insert(

            [
                //'id' => 1,
                'fecha' => Carbon::parse('2023-08-29'),
                'hora' => Carbon::createFromTime(13,0,0,'Europe/Madrid'),
                'user_id' => $user2->id, //sustituir estas 2 cosas por un select!!!!!!!!!!!!!!!!!!!!!!
                'facility_id' => $facility2->id //!!!!!!!!!!!!!!!!!!!!!!
            ],
        );

        DB::table('bookings')->insert(

            [
                //'id' => 1,
                'fecha' => Carbon::parse('2023-08-28'),
                'hora' => Carbon::createFromTime(14,0,0,'Europe/Madrid'),
                'user_id' => $user4->id, //sustituir estas 2 cosas por un select!!!!!!!!!!!!!!!!!!!!!!
                'facility_id' => $facility3->id //!!!!!!!!!!!!!!!!!!!!!!
            ],

        );

        DB::table('bookings')->insert(
            [
                //'id' => 1,
                'fecha' => Carbon::parse('2023-08-30'),
                'hora' => Carbon::createFromTime(14,0,0,'Europe/Madrid'),
                'user_id' => $user6->id, //sustituir estas 2 cosas por un select!!!!!!!!!!!!!!!!!!!!!!
                'facility_id' => $facility5->id //!!!!!!!!!!!!!!!!!!!!!!
            ],

        );
        
    }
}
