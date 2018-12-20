<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Zan;
use Illuminate\Database\Eloquent\Model;


class LikeTest extends TestCase


{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLikeSave()
    {


        $user = factory(\App\User::class)->make();
        $user->save();

        $question = factory(\App\Question::class)->make();
        $question->user()->associate($user);
        $question->save();

        /*
         * let the user like a question
         * ('zan' means 'like')
         */
        $zan = new Zan;
        $zan->user()->associate($user);
        $zan->question()->associate($question);

        //test if the 'like' is saved
        $this->assertTrue($zan->save());

    }
}
