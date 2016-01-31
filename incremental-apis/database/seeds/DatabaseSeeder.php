<?php

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
        Model::unguard();

//        Lesson::truncate();
//        DB::table('lessons')->truncate();
        // $this->call(UserTableSeeder::class);

        $this->call(LessonsTableSeeder::class);

        Model::reguard();
    }
}
