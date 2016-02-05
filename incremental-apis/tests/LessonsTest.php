<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Lesson;

class LessonsTest extends ApiTester
{
    use Factory;

    /** @test */
    public function it_fetches_lessons()
    {
        // arrange
//        $this->times(5)->makeLesson();
//        $this->makeLesson();
        $this->times(3)->make('App\Lesson');
//        $this->times(3)->make('App\Lesson', ['title' => 'HELLO WORLD']);
//        dd(Lesson::all()->toArray());

        // act
        $this->getJson('api/v1/lessons');

        //assert
        $this->assertResponseOk();
    }

    /** @test */
    public function it_fetches_a_single_lesson()
    {
        $this->make('App\Lesson');

        $lesson = $this->getJson('api/v1/lessons/1')->data;

//        dd($lesson);

        $this->assertResponseOk();
//        $this->assertObjectHasAttribute('title', $lesson);
        $this->assertObjectHasAttributes($lesson, 'body', 'active');
    }

    /** @test */
    public function it_404s_if_a_lessons_is_not_found()
    {
        $json = $this->getJson('api/v1/lessons/x');

        $this->assertResponseStatus(404);
        $this->assertObjectHasAttributes($json, 'error');
    }

    /** @test */
    public function it_creates_a_new_lesson_given_valid_parameters()
    {
        $this->getJson('api/v1/lessons', 'POST', $this->getStub());

        $this->assertResponseStatus(201);
    }

    /** @test */
    public function it_throws_a_422_if_a_new_lesson_request_fails_validation()
    {
        $this->getJson('api/v1/lessons', 'POST');

        $this->assertResponseStatus(422);
    }

    protected function getStub()
    {
        return [
            'title' => $this->fake->sentence,
            'body'  => $this->fake->paragraph,
            'some_bool' => $this->fake->boolean,
        ];
    }

}
