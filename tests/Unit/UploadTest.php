<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class UploadTest extends TestCase
{
    /*
     * A basic test example.
     *
     * @return void
     */

    public function testExample()
    {

        Storage::fake('avatars');

        $response = $this->json('POST', '/avatar', [
            'avatar' => UploadedFile::fake()->image('avatar.jpg')
        ]);

        // assert if the file is saved...
        Storage::disk('avatars')->assertExists('avatar.jpg');

        // assert if the file is missing...
        Storage::disk('avatars')->assertMissing('missing.jpg');

    }

}
