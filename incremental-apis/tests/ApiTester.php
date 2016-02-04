<?php

use Faker\Factory as Faker;

class ApiTester extends TestCase {
    protected $fake;
    protected $times = 1;

    /**
     * ApiTester constructor.
     * @param $faker
     */
    public function __construct()
    {
        $this->fake = Faker::create();
    }

    public function setUp()
    {
        parent::setUp();

        Artisan::call('migrate');
    }

    protected function times($count)
    {
        $this->times = $count;

        return $this;
    }

    protected function getJson($uri)
    {
        return json_decode($this->call('GET', $uri)->getContent());
    }

    protected function assertObjectHasAttributes()
    {
        $args = func_get_args();
        $object = array_shift($args);

//        dd($args);
//        dd($object);

        foreach ($args as $attribute) {
            $this->assertObjectHasAttribute($attribute, $object);
        }

    }


}