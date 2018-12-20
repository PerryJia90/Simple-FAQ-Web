<?php

namespace Tests\Unit;

use App\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FollowerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    //use RefreshDatabase;

    public function testFollow()
    {

        //generate 10 new users
        for ($i = 1; $i <= 10; $i ++) {
            $user = factory(\App\User::class)->make();
            $user->save();
        }

        $users = User::all();
        $user = $users->first();
        $user_id = $user->id;

        //Gets an array of user_ids for all users except user_1
        $followers = $users->slice(1);
        $follower_ids = $followers->pluck('id')->toArray();


        // let user_1 follow the other users
        $user->follow($follower_ids);

        // let the other users follow use_1
        foreach ($followers as $follower) {
            $follower->follow($user_id);
        }

        /*
         * test follow
         */

        //test whether the other users are followers of user_1
        $this->assertTrue($follower->isFollowing($user->id));

        //test whether user_1 follows itself
        $this->assertFalse($user->isFollowing($user->id));

        //test whether user_1 follows other users
        $this->assertTrue($user->isFollowing($follower));

    }
}
