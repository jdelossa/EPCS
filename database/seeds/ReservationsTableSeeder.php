<?php

use App\Reservation;
use Illuminate\Database\Seeder;

class ReservationsTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker\Factory::create();

        $dates = [
            // week 1
            '2016-01-18',
            '2016-01-19',
            '2016-01-20',
            '2016-01-21',
            // week 2
            '2016-01-25',
            '2016-01-26',
            '2016-01-27',
            '2016-01-28',
            // week 3
            '2016-02-01',
            '2016-02-02',
            '2016-02-03',
            '2016-02-04',
            // week 4
            '2016-02-08',
            '2016-02-09',
            '2016-02-10',
            '2016-02-11'
        ];

        $times = [
            '08:00:00',
            '09:00:00',
            '10:00:00',
            '11:00:00',
            '12:00:00',
            '13:00:00',
            '14:00:00'
        ];

        foreach(range(1,1000) as $index)
        {
            Reservation::create([
                'id'            => $index,
                'first_name'    => $faker->firstName,
                'last_name'     => $faker->lastName,
                'specialty'     => $faker->word,
                'email'         => $faker->email . $index,
                'date'          => $faker->randomElement($dates),
                'time'          => $faker->randomElement($times)
            ]);
        }
    }

}