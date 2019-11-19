<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = factory(User::class)->create([
          'password' => bcrypt('test1111')
        ]);

        // $this->assertFalse(Auth::check());

        $response = $this->post('login', [
          'email' => $user->email,
          'password' => 'test1111'
        ]);

        // $this->assertTrue(Auth::check());

        $response->assertRedirect('home');
    }
}
