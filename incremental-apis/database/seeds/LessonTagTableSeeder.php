<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Lesson;
use App\Tag;

class LessonTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);

        $faker = Faker::create();

        $lessonIds = Lesson::lists('id')->all(); // An array of ID's in that table [1, 2, 3, 4, 5, 7]
        $tagIds = Tag::lists('id')->all();

        foreach(range(1, 30) as $index)
        {
            // a real lesson id
            // a real tag id
            DB::table('lesson_tag')->insert([
                'lesson_id' => $faker->randomElement($lessonIds),
                'tag_id'    => $faker->randomElement($tagIds),
            ]);
        }
    }
}