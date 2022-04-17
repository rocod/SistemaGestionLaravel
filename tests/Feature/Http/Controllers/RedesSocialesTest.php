<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\RedesSociales;
use App\Models\User;

class RedesSocialesTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_guest()
    {
        $this->get('redes_sociales')->assertRedirect('login');        //index
        $this->get('redes_sociales/create')->assertRedirect('login'); //create
        $this->post('redes_sociales', [])->assertRedirect('login');   //store
        $this->get('redes_sociales/1/edit')->assertRedirect('login'); //edit
        $this->put('redes_sociales/1')->assertRedirect('login');      //update
        $this->delete('redes_sociales/1')->assertRedirect('login');   //destroy
    }

    public function test_index_with_data()
    {
        $red_social = RedesSociales::factory()->create();
        $user = User::factory()->create();

        $this
            ->actingAs($user)
            ->get('redes_sociales')
            ->assertSee($red_social->nombre);
            // ->assertSee($red_social->direccion);
    }

    public function test_create()
    {
        $user = User::factory()->create();

        $this
            ->actingAs($user)
            ->get('redes_sociales/create')
            ->assertStatus(200);
    }

    public function test_store()
    {
        $user = User::factory()->create();

        $data = [
            'nombre' => $this->faker->name(),
            'direccion' => $this->faker->url()
        ];

        $this
            ->actingAs($user)
            ->post('redes_sociales', $data)
            ->assertRedirect('redes_sociales');

        $this->assertDatabaseHas('redes_sociales', $data);
    }

    public function test_edit()
    {
        $user = User::factory()->create();
        $red_social = RedesSociales::factory()->create();

        $this
            ->actingAs($user)
            ->get("redes_sociales/$red_social->id/edit")
            ->assertStatus(200);
    }
}
