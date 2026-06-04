<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LessonCrudFlowTest extends TestCase
{
    use RefreshDatabase;

    public function test_post_crud_flow_works(): void
    {
        $createResponse = $this->post('/posts', [
            'title' => '最初の投稿',
            'body' => 'LaravelのCRUDを確認する本文です。',
        ]);

        $createResponse->assertRedirect('/posts');

        $post = Post::query()->firstOrFail();

        $this->get('/posts')
            ->assertOk()
            ->assertSee('最初の投稿');

        $this->get('/posts/' . $post->id)
            ->assertOk()
            ->assertSee('LaravelのCRUDを確認する本文です。');

        $updateResponse = $this->put('/posts/' . $post->id, [
            'title' => '更新後の投稿',
            'body' => '更新後の本文です。',
        ]);

        $updateResponse->assertRedirect('/posts/' . $post->id);

        $this->get('/posts/' . $post->id)
            ->assertOk()
            ->assertSee('更新後の投稿')
            ->assertSee('更新後の本文です。');

        $deleteResponse = $this->delete('/posts/' . $post->id);

        $deleteResponse->assertRedirect('/posts');

        $this->get('/posts')
            ->assertOk()
            ->assertDontSee('更新後の投稿');
    }

    public function test_title_is_required_when_creating_post(): void
    {
        $response = $this->post('/posts', [
            'title' => '',
            'body' => 'タイトルなしの投稿です。',
        ]);

        $response->assertSessionHasErrors('title');
    }
}