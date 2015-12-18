<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();

        foreach(range(1,150) as $index)
        {
            DB::table('reservations')->insert([
                'first_name'    => $faker->firstName,
                'last_name'     => $faker->lastName,
                'speciality'    => $faker->word,
                'email'         => $faker->email,
                'slot'          => $faker->dateTimeThisYear($max = 'now'),
                'created_at'    => $faker->dateTime($max = 'now'),
                'updated_at'    => $faker->dateTime($max = 'now')
            ]);
        }

        Model::reguard();
    }
}
