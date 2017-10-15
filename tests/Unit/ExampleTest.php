<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Post;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        // $response = $this->get('/');
        // $response->assertStatus(200);

        //$this->get('/')->assertSee('The Bootstrap Blog');

        $first = factory(Post::class)->create();
        $second = factory(Post::class)->create([
            'created_at' => \Carbon\Carbon::now()->subMonth()
        ]);

        $posts = Post::archives();
        //dd($posts);
        //$this->assertCount(3, $posts);
        $this->AssertEquals([
            [
                "year" => $first->created_at->year,
                 "month" => $first->created_at->format('F'),
                 "published" => 1

            ],
            [
                "year" => $second->created_at->year,
                 "month" => $second->created_at->format('F'),
                 "published" => 1

            ],
        ],$posts);
    }
}
