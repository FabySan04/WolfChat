<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Post;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class PostTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /**
     * Testing create posts and checked if exists and can be visualed
     *
     * @return void
     */
    public function testCreatePost()
    {
        $user = User::factory()->create();
        $title = 'Mi publicacion de prueba';
        $response = $this->actingAs($user)->post('/post', [
            'contenido' => $title,
            'fecha' => '2022-08-11 12:09:00.00',
            'imagen' => 'C:\Users\Fabian\Pictures\UTSJR.jpg'
        ]);
        $response->assertSessionHas('status', 'Publicacion creada con exito');
        $response->assertRedirect();

        // Con unique == false no revisa en la base posts y entonces no se raya con que sea un duplicado
        $slug_url = SlugService::createSlug(Post::class, 'slug', $title, ['unique' => false]);

        $response = $this->get('/post' . $slug_url);
        $response->assertStatus(200);

        $title .= '2';
        $response = $this->actingAs($user)->post('/admin/posts', [
            'contenido' => $title,
            'fecha' => '2022-08-11 12:09:00.00',
            'imagen' => 'C:\Users\Fabian\Pictures\yo.jpg'
        ]);
        $response->assertSessionHas('status', 'Publicacion creada con exito');
        $response->assertRedirect();

        // Con unique == false no revisa en la base posts y entonces no se raya con que sea un duplicado
        $slug_url = SlugService::createSlug(Post::class, 'slug', $title, ['unique' => false]);

        $response = $this->get('/post' . $slug_url);
        $response->assertStatus(404);

        $response = $this->actingAs($user)->post('/admin/posts', []);
        $response->assertSessionHasErrors([
            'contenido' => $title,
            'fecha' => '2022-08-11 12:09:00.00',
            'imagen' => 'C:\Users\Fabian\Pictures\yo.jpg'
        ]);
    }
}
