<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lesson::truncate();
//        DB::table('lessons')->truncate();
        // $this->call(UserTableSeeder::class);

         $this->call(LessonsTableSeeder::class);
    }
}