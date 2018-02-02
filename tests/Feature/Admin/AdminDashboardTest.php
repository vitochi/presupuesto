<?php

namespace Tests\Feature\Admin;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminDashboardTest extends TestCase
{
	use RefreshDatabase; //Ejecuta todas las migraciones
						// Dentro de Transacciones

     /** @test */
     function admins_can_visit_the_admin_dashboard()
     {
     	$admin = factory(User::class)->create([
     			'admin' => true
     	]);

     	$this->actingAs($admin)
     		 ->get(route('admin_dashboard'))
     		 ->assertStatus(200)
     		 ->assertSee('Dashboard');

     }

     /** @test */
     function non_admin_users_cannot_visit_the_admin_dashboard()
     {
     	$user = factory(User::class)->create([
     			'admin' => false
     	]);

     	$this->actingAs($user)
     		 ->get(route('admin_dashboard'))
     		 ->assertStatus(403);

     }

     /** @test */
     function guests_cannot_visit_the_admin_dashboard()
     {
     	$this->get(route('admin_dashboard'))
     		 ->assertStatus(302)
     		 ->assertRedirect('login');

     }

}
