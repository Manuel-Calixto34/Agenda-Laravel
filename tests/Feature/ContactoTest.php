<?php

namespace Tests\Feature;

use App\Models\Contacto;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactoTest extends TestCase
{
    use RefreshDatabase;

    public function test_contactos_index_is_displayed_for_authenticated_users(): void
    {
        $user = User::factory()->create();
        $contacto = Contacto::factory()->create([
            'nombre' => 'Ana',
            'correo' => 'ana@example.com',
        ]);

        $response = $this->actingAs($user)->get(route('contactos.index'));

        $response
            ->assertOk()
            ->assertSee($contacto->nombre)
            ->assertSee($contacto->correo);
    }

    public function test_contacto_can_be_created(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('contactos.store'), [
            'nombre' => 'Laura',
            'apellidos' => 'Garcia',
            'direccion' => 'Calle Mayor 1',
            'correo' => 'laura@example.com',
            'telefono' => '600 123 456',
        ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect(route('contactos.index'));

        $this->assertDatabaseHas('contactos', [
            'nombre' => 'Laura',
            'correo' => 'laura@example.com',
        ]);
    }

    public function test_contacto_can_be_updated(): void
    {
        $user = User::factory()->create();
        $contacto = Contacto::factory()->create();

        $response = $this->actingAs($user)->put(route('contactos.update', $contacto), [
            'nombre' => 'Carlos',
            'apellidos' => 'Perez',
            'direccion' => 'Avenida Centro 2',
            'correo' => 'carlos@example.com',
            'telefono' => '+34 611 222 333',
        ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect(route('contactos.index'));

        $this->assertDatabaseHas('contactos', [
            'id' => $contacto->id,
            'nombre' => 'Carlos',
            'correo' => 'carlos@example.com',
        ]);
    }

    public function test_contacto_can_be_deleted(): void
    {
        $user = User::factory()->create();
        $contacto = Contacto::factory()->create();

        $response = $this->actingAs($user)->delete(route('contactos.destroy', $contacto));

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect(route('contactos.index'));

        $this->assertDatabaseMissing('contactos', [
            'id' => $contacto->id,
        ]);
    }
}
