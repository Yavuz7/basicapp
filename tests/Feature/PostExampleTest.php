<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Post;


class PostExampleTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_examplePost()
    {
       $post = Post::factory()->create();
       $post->title = "Please Work";
       $post->save();

       $user = User::find(1);
       $user->name = "Test Name";
       $user->save();
       $posts = $user->posts;

       dd($posts);
    }
}
