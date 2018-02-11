<?php

namespace Tests\Feature\Admin;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HideAdminRoutesTest extends TestCase
{
    /** @test */
	function it_does_not_allow_guests_to_discover_admin_urls()
	{
		$this->get('admin/invalid-url')
			 ->assertStatus(302)
			 ->assertRedirect('login');
	}   

	/** @test */
	function it_displays_404s_when_admins_visit_invalid_urls()
	 {
	 	$admin = factory(User::class)->create(['admin' => true]);

	 	$this->actingAs($admin)
	 		 ->get('admin/invalid-url')
	 		 ->assertStatus(404);
	 } 
}
