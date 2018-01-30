<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class DashboardTest extends TestCase
{
   /** @test */
   function it_shows_the_dashboard_page_to_authenticated_users()
   {

   	$user = factory(User::class)->create();

   	$this->actingAs($user)
   		 ->get(Route('home'))
   		 ->assertSee('Dashboard')
   		 ->assertStatus(200);
   }

   /** @test */
   function it_redirects_guests_users_to_the_login_page()
   {

   		$this->get(Route('home'))
   		     ->assertStatus(302)
   		     ->assertRedirect('login');

   }

}
