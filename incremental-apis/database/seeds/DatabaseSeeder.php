<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Lesson;
use App\Tag;

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

        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        Lesson::truncate();
        Tag::truncate();
        DB::table('lesson_tag')->truncate();
//        DB::table('lessons')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // $this->call(UserTableSeeder::class);

        $this->call(LessonsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(LessonTagTableSeeder::class);

        Model::reguard();
    }
}
