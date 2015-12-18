<?php


use App\Reservation;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder {


    public function run()
    {
        $faker = Faker\Factory::create();

        foreach(range(1,150) as $index)
        {
            Reservation::create([
                'id'            => $faker->randomDigit,
                'first_name'    => $faker->firstName,
                'last_name'     => $faker->lastName,
                'specialty'     => $faker->word,
                'email'         => $faker->email,
                'slot'          => $faker->dateTime($max = 'now'),
                'created_at'    => $faker->dateTime($max = 'now'),
                'updated_at'    => $faker->dateTime($max = 'now')
            ]);
        }
    }

}