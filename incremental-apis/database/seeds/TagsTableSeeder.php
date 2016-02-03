<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Tag;

// composer require laracasts/testdummy
//use Laracasts\TestDummy\Factory as TestDummy;

class TagsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        // $this->call(UserTableSeeder::class);
        $faker = Faker::create();

        foreach(range(1, 10) as $index)
        {
            Tag::create([
                'name' => $faker->word
            ]);
        }

    }
}
