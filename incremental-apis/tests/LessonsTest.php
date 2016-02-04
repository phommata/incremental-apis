<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Lesson;

class LessonsTest extends ApiTester
{
//    use DatabaseMigrations;

    /** @test */
    public function it_fetches_lessons()
    {
        // arrange
//        $this->times(5)->makeLesson();
        $this->makeLesson();

        // act
        $this->getJson('api/v1/lessons');

        //assert
        $this->assertResponseOk();
    }

    /** @test */
    public function it_fetches_a_single_lesson()
    {
        $this->makeLesson();

        $lesson = $this->getJson('api/v1/lessons/1')->data;

//        dd($lesson);

        $this->assertResponseOk();
//        $this->assertObjectHasAttribute('title', $lesson);
        $this->assertObjectHasAttributes($lesson, 'body', 'active');
    }

    /** @test */
    public function it_404s_if_a_lessons_is_not_found()
    {
        $this->getJson('api/v1/lessons/x');

        $this->assertResponseStatus(404);
    }

    private function makeLesson($lessonFields = [])
    {
        $lesson = array_merge([
            'title' => $this->fake->sentence,
            'body'  => $this->fake->paragraph,
            'some_bool' => $this->fake->boolean,
        ], $lessonFields);

        while($this->times--) Lesson::create($lesson);
    }

}
