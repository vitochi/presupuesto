<?php

namespace Tests\Feature\Admin;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminAgendaTest extends TestCase
{
	use RefreshDatabase; //Ejecuta todas las migraciones
						// Dentro de Transacciones

     /** @test */
     function admins_can_visit_the_admin_agenda()
     {
     	$admin = factory(User::class)->create([
     			'admin' => true
     	]);

     	$this->actingAs($admin)
     		 ->get(route('admin_agenda'))
     		 ->assertStatus(200)
     		 ->assertSee('Admin Agenda');

     }

     /** @test */
     function non_admin_users_cannot_visit_the_admin_agenda()
     {
     	$user = factory(User::class)->create([
     			'admin' => false
     	]);

     	$this->actingAs($user)
     		 ->get(route('admin_agenda'))
     		 ->assertStatus(403);

     }

     /** @test */
     function guests_cannot_visit_the_admin_agenda()
     {
     	$this->get(route('admin_agenda'))
     		 ->assertStatus(302)
     		 ->assertRedirect('login');

     }

}
